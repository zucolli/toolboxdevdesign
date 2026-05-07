# Módulo ferramentas

**Status:** 🟡 Documentado em 2026-05-07
**Framework:** PHP 8+ genérico — Front Controller único (`index.php`)
**URL(s):** `/ferramentas` (hub) · `/ferramentas/{slug}` (ferramenta individual) · 301 de `/{slug}` (legado)

---

## Banco de Dados

Nenhum. Todas as ferramentas são **100% client-side** (JS no navegador).
Exceções com backend PHP (sem banco):

| Endpoint | Método | Descrição |
|----------|--------|-----------|
| `POST /api/generate-hash` | PHP | Bcrypt (cost 12) ou MD5 via `password_hash` / `md5` |
| `POST /api/generate-argon2` | PHP | `password_hash($p, PASSWORD_ARGON2ID)` |
| `POST /api/verify-argon2` | PHP | `password_verify($p, $hash)` |
| `GET /api/get-ip` | PHP | Retorna IP público via `$_SERVER` headers |

---

## Arquivos Envolvidos

| Arquivo | Tipo | Responsabilidade |
|---------|------|-----------------|
| `index.php` | Front Controller / Router | Roteamento de todas as 33 ferramentas + 301 redirects + endpoints de API |
| `views/ferramentas.php` | View — Hub | Grid filtrado por categoria + busca client-side das 33 ferramentas |
| `views/{slug}.php` | View — Ferramenta | Markup HTML de cada ferramenta individual (33 arquivos) |
| `assets/js/main.js` | JS monolítico | Toda a lógica de todas as ferramentas (2534 linhas, sem módulos) |
| `assets/css/style.css` | CSS | Design tokens, layout 2-col, `.kb-card`, `.tool-card`, sidebar-right |
| `includes/header.php` | Layout | Topbar fixo + logo + nav 3 links + busca; abre `<div class="layout">` |
| `includes/sidebar.php` | Layout | Abre `<main class="content">` + injeta breadcrumbs |
| `includes/footer.php` | Layout | Fecha `<main>`, inclui `sidebar-right.php`, fecha `<div class="layout">`, rodapé |
| `includes/sidebar-right.php` | Layout | NuAto card + widget Ferramentas em Destaque + Fato Curioso + slot AdSense |
| `includes/breadcrumbs.php` | Componente | Breadcrumb dinâmico via segmentos do `$path` (Início > Ferramentas > Nome) |
| `components/contextual-nav.php` | Componente | Prev/Next sequencial por categoria + link "Leia também" para artigos |
| `includes/related-articles.php` | Componente | Sugere até 2 artigos relacionados por ferramenta (match por slug) |

---

## Categorias de Ferramentas (33 no total)

| Categoria | Ferramentas |
|-----------|------------|
| **Dev** (15) | slug-generator, hash-generator, argon2-generator, sha512-crc32-generator, svg-optimizer, url-encoder-decoder, url-parser, json-formatter, base64-encoder, px-rem-converter, csv-json, uuid-generator, sql-formatter, image-base64, password-generator |
| **Design** (5) | contrast-checker, color-palette-generator, css-box-shadow, css-gradient, image-placeholder |
| **Marketing** (6) | utm-builder, bulk-utm-generator, roi-calculator, whatsapp-link, copy-generator, ab-test-calculator |
| **Texto** (4) | word-counter, lorem-ipsum, case-converter, text-cleaner |
| **Rede / SEO** (3) | qr-generator, meta-tags, my-ip |

---

## Roteamento (`index.php`)

| Padrão de rota | Comportamento |
|----------------|--------------|
| `/{slug}` (33 slugs antigos) | `header('Location: /ferramentas/{slug}', true, 301)` + `exit` |
| `GET /ferramentas` | Hub — renderiza `views/ferramentas.php` |
| `GET /ferramentas/{slug}` | Renderiza `views/{slug}.php` com `$titulo` e `$pageDescription` definidos |
| `POST /api/generate-hash` | Endpoint PHP — Bcrypt/MD5, retorna JSON, `exit` |
| `POST /api/generate-argon2` | Endpoint PHP — Argon2id, retorna JSON, `exit` |
| `POST /api/verify-argon2` | Endpoint PHP — verifica hash, retorna JSON, `exit` |
| `GET /api/get-ip` | Endpoint PHP — retorna `{'ip': '...'}`, `exit` |
| `default` | 404 — `views/404.php` |

---

## Seções do `main.js` por ferramenta

| Linha | Ferramenta | Tipo de lógica |
|-------|-----------|---------------|
| 3 | Toast Notification | Utilitário global `showToast(msg, type)` |
| 22 | Contrast Checker (WCAG) | WCAG 2.1 AA/AAA — cálculo de luminância e ratio em JS puro |
| 110 | Slug Generator | Regex + mapeamento de acentos → ASCII |
| 134 | `copyToClipboard(btn, getValue)` | Utilitário compartilhado por todas as ferramentas |
| 154 | Hash Generator | SHA-256 via Web Crypto API; Bcrypt/MD5 via `POST /api/generate-hash` |
| 223 | UTM Builder | Monta URL com params UTM em tempo real |
| 268 | URL Encoder/Decoder | Two-way binding com flag `updating` anti-loop |
| 325 | Color Palette Generator | HSL → harmonias (analógica, complementar, triádica, monocromática) |
| 476 | SVG Optimizer | Otimizador JS puro: remove metadata, IDs órfãos, arredonda coords |
| 646 | SHA-512 / CRC32 | SHA-512 via Web Crypto; CRC32 via tabela de lookup |
| 706 | Argon2id | POST `/api/generate-argon2` + `/api/verify-argon2` |
| 784 | URL Parser | `new URL()` → desmembra componentes |
| 857 | Copy Generator | Fórmulas AIDA/PAS/BAB com interpolação de inputs |
| 1281 | CSS Box Shadow | Sliders → `box-shadow` CSS em tempo real |
| 1348 | CSS Gradient | Linear/radial com preview canvas |
| 1394 | Password Generator | Web Crypto API `getRandomValues` |
| 1487 | Word Counter | Contagem de palavras, chars, parágrafos, tempo de leitura + density map |
| 1561 | Lorem Ipsum | Gerador em parágrafos/palavras/frases/lista HTML |
| 1645 | Case Converter | camelCase, PascalCase, snake_case, kebab-case, UPPER, lower, Title |
| 1714 | QR Code Generator | Biblioteca qrcodejs via CDN |
| 1771 | Meta Tags Generator | Gera HTML + OG + Twitter Card |
| 1835 | My IP | `fetch('/api/get-ip')` |
| 1866 | Sidebar collapsible | Legado — não usado no layout v4.0 |
| 1886 | Imagem → Base64 | FileReader API → Data URL |
| 1942 | Placeholder de Imagem | Canvas API → PNG/SVG placeholder |
| 2017 | Limpador de Texto | Regex: espaços extras, linhas vazias, duplicatas |
| 2075 | CSV ↔ JSON | Parser CSV manual com suporte a aspas e campos com vírgula |
| 2200 | UUID / GUID | Web Crypto `getRandomValues` → UUID v4, múltiplos formatos |
| 2253 | SQL Formatter | Formatador JS puro — indentação, keywords uppercase |
| 2310 | Home search | Filtra `.tool-card` por `data-title` |
| 2466 | KB Index filter | Filtro por categoria + busca em `#kb-grid` |
| 2508 | Topbar search | Redireciona para `/ferramentas?q=` ou foca `#kb-search` inline |

---

## Layout e Componentes (v4.0)

```
<body>
  <header class="topbar">          ← fixo, max-width 1200px centrado
    topbar-inner: logo | nav (3 links bordados) | search (desktop)
  </header>

  <div class="layout">             ← grid 2-col: 1fr 300px, max-width 1200px
    <main class="content">         ← coluna esquerda (75%)
      breadcrumbs                  ← Início > Ferramentas > [Nome]
      [view da ferramenta]
      contextual-nav               ← prev/next + "Leia também"
      ads-slot--bottom
    </main>
    <aside class="sidebar-right">  ← coluna direita (300px), sticky
      nuato-promo-card
      sidebar-widget (Ferramentas em Destaque)
      knowledge-card (Fato Curioso — randomizado)
      ads-slot--sidebar (min-height: 600px)
    </aside>
  </div>

  <footer>
</body>
```

---

## Fluxo Principal

1. **Usuário acessa** `/ferramentas/utm-builder`
2. **`.htaccess`** — front controller redireciona tudo para `index.php`
3. **`index.php`** — `$path = 'ferramentas/utm-builder'`, match encontra case correto, define `$titulo`, `$pageDescription`, `$view`
4. **`header.php`** — HTML head + topbar + abre `<div class="layout">`
5. **`sidebar.php`** — abre `<main class="content">` + renderiza breadcrumbs via `$path`
6. **`views/utm-builder.php`** — markup HTML da ferramenta (form + output)
7. **`components/contextual-nav.php`** — detecta categoria via `$path`, renderiza prev/next + artigos relacionados
8. **`footer.php`** — fecha main, renderiza sidebar-right, fecha layout, rodapé, `<script main.js>`
9. **`main.js`** — detecta elementos da ferramenta por ID, registra listeners, processa lógica client-side

---

## Dependências Externas

| Dependência | Ferramenta | Como carregada |
|-------------|-----------|---------------|
| Web Crypto API | hash, password, uuid, sha512 | Browser nativo |
| FileReader API | image-base64 | Browser nativo |
| Canvas API | image-placeholder | Browser nativo |
| `qrcode.min.js` | QR Code | CDN via `<script>` na view |
| Google AdSense `adsbygoogle.js` | Layout global | `<script async>` no header |
| Google Analytics `gtag.js` | Layout global | `<script async>` no header |
| Inter / Roboto | CSS `--font-sans` | Google Fonts (stack fallback) |

---

## Padrões de Implementação

### Nova ferramenta — 4 passos obrigatórios
1. **`index.php`** — novo `case 'ferramentas/{slug}'` no `match` com `$titulo`, `$pageDescription`, `$view`
2. **`views/{slug}.php`** — markup HTML da ferramenta
3. **`assets/js/main.js`** — lógica JS no final do arquivo (sem módulos, sem bundler)
4. **`assets/css/style.css`** — estilos específicos inseridos antes do bloco `Footer`
5. **`components/contextual-nav.php`** — adicionar `['slug' => 'ferramentas/{slug}', 'name' => '...']` na categoria correta
6. **`includes/breadcrumbs.php`** — adicionar `'{slug}' => 'Label'` em `$_bc_labels`

### Fetch para API PHP
```js
fetch('/api/nome-endpoint', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ key: value }),
})
.then(r => r.json())
.then(data => { /* usa data.hash ou data.error */ });
```

### Copiar para clipboard
```js
copyToClipboard(btnEl, () => inputEl.value); // utilitário compartilhado, main.js:134
```

### Two-way binding sem loop
```js
let updating = false;
inputA.addEventListener('input', () => {
    if (updating) return;
    updating = true;
    inputB.value = transform(inputA.value);
    updating = false;
});
```

---

## Decisões Técnicas

- **v4.0 (2026-05-07):** Layout migrado para 2-col centralizado (max-width 1200px), sidebar-left eliminada. URLs movidas para `/ferramentas/{slug}` com 301 redirects dos slugs antigos.
- **SVG Optimizer client-side:** SVGO via CDN não funciona (v3 é ES Module, v2 falhou no jsDelivr). Otimizador em JS puro implementado em `main.js:504`.
- **Argon2 server-side:** Único hash que exige backend PHP — não é possível gerar Argon2 no browser.
- **Sem bundler:** `main.js` é script síncrono único. Toda nova ferramenta appenda ao final.
- **Cache desabilitado na Hostinger:** sem necessidade de headers `no-cache` no PHP.

---

## Pendências / Próximos Passos

> _A preencher nas sessões de trabalho._
