# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Idioma

Todas as respostas devem ser em **português brasileiro**. Este arquivo deve ser mantido em português brasileiro.

## Abreviações

- **CC** = Claude Code
- **.md** = CLAUDE.md

## Deploy / GitHub

- Repositório: `https://github.com/zucolli/toolboxdevdesign.git` (branch `main`)
- URL de produção: `https://digitallps.com.br/carloszucolli/toolboxdevdesign/`

**Ao finalizar qualquer tarefa que deva ser testada na web, executar o fluxo de deploy abaixo automaticamente (sem usar `Skill()`) antes de avisar o usuário para testar:**

```
git add <arquivos modificados>
git commit -m "tipo: descrição resumida"
git push
```

> **Nota técnica:** A skill `/commit-push` (`.claude/skills/commit-push.md`) só funciona quando o **usuário** digita `/commit-push` no prompt. O CC **não consegue** invocá-la via `Skill("commit-push")` — isso sempre resulta em "Unknown skill". Portanto, execute os comandos git diretamente via `Bash`.

## Arquitetura

**Front Controller único** — `index.php` é o único ponto de entrada. Ele:
1. Executa os endpoints de API no topo (antes de qualquer output HTML), cada um com `exit` obrigatório
2. Roteia views via `match ($path)` com IIFEs que definem `$titulo` e `$view`
3. Inclui layout: `header.php` → `sidebar.php` → view → `footer.php`

**Adicionar uma nova ferramenta exige sempre 4 etapas:**
1. `index.php` — novo `case` no `match` (e novo bloco de API antes do `match`, se necessário)
2. `includes/sidebar.php` — novo `<li>` com link e SVG icon inline
3. `views/nome-da-ferramenta.php` — markup da ferramenta
4. `assets/js/main.js` — lógica JS no final do arquivo (sem módulos, sem bundler)
5. `assets/css/style.css` — estilos novos inseridos antes do bloco `Footer`

**Endpoints de API PHP** recebem JSON via `php://input`, retornam JSON, encerram com `exit`. Padrão atual:
- `POST /api/generate-hash` — Bcrypt (cost 12) ou MD5
- `POST /api/generate-argon2` — `PASSWORD_ARGON2ID`
- `POST /api/verify-argon2` — `password_verify`

## Padrões JavaScript (`main.js`)

O arquivo é um único script síncrono, sem módulos. Toda lógica nova é adicionada no final.

**Função utilitária compartilhada:**
```js
copyToClipboard(btn, getValue)  // reutilizada por todas as ferramentas
```

**Fetch para APIs PHP:**
```js
fetch('/carloszucolli/toolboxdevdesign/api/nome-endpoint', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ ... }),
})
```

**Two-way binding sem loop infinito** (padrão URL Encoder/Decoder): usar flag `let updating = false` para evitar que o listener do campo A dispare o do campo B ao atualizar.

## Padrões CSS (`style.css`)

Design tokens em `:root` (cores, radius, fontes). Classes utilitárias consolidadas:

| Classe | Uso |
|---|---|
| `.btn`, `.btn-primary`, `.btn-secondary`, `.btn-ghost`, `.btn-sm` | Botões |
| `.btn-success` | Estado de feedback "copiado" |
| `.input-readonly` | Campos de resultado (monospace, fundo cinza, cor primária) |
| `.input-copy-row` | Flex row: input readonly + botão Copiar |
| `.radio-group` / `.radio-label` | Seleção de algoritmo/modo (usa `:has(input:checked)`) |
| `.form-group` / `.form-label` / `.field-hint` | Campos de formulário |
| `.checksum-block` / `.checksum-block-header` | Painel com header cinza + conteúdo (SHA-512, SVG output) |

**CSS transitions:** nunca usar `hidden` (display:none) em elementos que precisam de transição. Padrão correto:
```css
.meu-elemento { opacity: 0; max-height: 0; overflow: hidden; transition: opacity 0.25s, max-height 0.25s; }
.meu-elemento.is-visible { opacity: 1; max-height: 80px; }
```
Adicionar `.is-visible` via `requestAnimationFrame()` no JS.

**`input[type="url"]`** deve ser incluído nos seletores CSS junto com `input[type="text"]` — ambos precisam dos mesmos estilos de formulário.

## Lições aprendidas

- **SVGO via CDN não funciona** como `<script>` clássico (v3 é ES Module, v2 via jsDelivr também falhou). O SVG Optimizer usa otimizador em JS puro: remoção de metadata/namespaces de editores + IDs não referenciados + arredondamento de coordenadas para 2 casas decimais + compressão de path `d=`.
- **Cache** está desabilitado na Hostinger — não é necessário adicionar headers `no-cache` no PHP.
