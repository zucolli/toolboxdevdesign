# Módulo Artigos (Base de Conhecimento)

**Status:** 🟢 Documentado em 2026-05-07  
**Framework:** PHP 8+ (front controller único — `index.php`)  
**URL(s):**
- `/artigos` — listagem KB
- `/artigos/utm-varejo-alto-volume`
- `/artigos/matematica-testes-ab`
- `/artigos/privacidade-client-side-lgpd`

---

## Banco de Dados

Nenhum. Módulo 100% estático — sem tabelas, sem queries.

---

## Arquivos Envolvidos

| Arquivo | Tipo | Responsabilidade |
|---------|------|-----------------|
| `index.php` (linhas 261–280) | Roteador | 4 `case` no `match ($path)` definem `$titulo`, `$pageDescription` e `$view` para cada rota |
| `views/artigos/index.php` | View — KB listing | Grid de cards com os 3 artigos disponíveis |
| `views/artigos/utm-varejo-alto-volume.php` | View — Artigo 1 | ~950 palavras sobre taxonomia UTM para varejo de alto volume |
| `views/artigos/matematica-testes-ab.php` | View — Artigo 2 | ~950 palavras sobre P-value, Z-score e significância estatística |
| `views/artigos/privacidade-client-side-lgpd.php` | View — Artigo 3 | ~950 palavras sobre client-side processing e LGPD |
| `includes/sidebar.php` (linhas 228–271) | Nav | Seção "Base de Conhecimento" com `data-key="kb"` e 4 links |
| `views/home.php` (linhas 376–401) | Seção home | Grid `.home-artigos` com 3 cards linkando aos artigos |
| `assets/css/style.css` (linhas 2626–2860) | CSS | Todas as classes de artigos, KB e home-artigos |
| `sitemap.xml` | SEO | 4 novas URLs com `priority` 0.8–0.9 e `lastmod` 2026-05-07 |

---

## Rotas (index.php)

| Path | Título da página | View |
|------|-----------------|------|
| `artigos` | Base de Conhecimento | `views/artigos/index.php` |
| `artigos/utm-varejo-alto-volume` | Estratégia de UTM para Varejo... | `views/artigos/utm-varejo-alto-volume.php` |
| `artigos/matematica-testes-ab` | A Matemática por Trás dos Testes A/B... | `views/artigos/matematica-testes-ab.php` |
| `artigos/privacidade-client-side-lgpd` | Privacidade Client-Side e LGPD... | `views/artigos/privacidade-client-side-lgpd.php` |

---

## Estrutura de uma View de Artigo

Cada artigo segue o mesmo template HTML (sem arquivo PHP compartilhado — cada view é independente):

```
.article-wrap (max-width: 680px, centrado)
  <header class="article-header">
    .article-eyebrow   → categoria (ex: "Marketing & Analytics")
    h1.article-title
    .article-meta      → "por Carlos Zucolli · NuAto | X min | Categoria"
  </header>
  <div class="article-body">
    h2, h3, p, ul, ol, code, blockquote
  </div>
  <aside class="article-related">
    .article-related-tools  → links para ferramentas relacionadas
  </aside>
```

---

## Classes CSS Novas

| Classe | Arquivo | Uso |
|--------|---------|-----|
| `.article-wrap` | style.css:2628 | Container leitura (680px max) |
| `.article-header` | style.css:2635 | Cabeçalho do artigo c/ border-bottom |
| `.article-eyebrow` | style.css:2641 | Badge de categoria (uppercase, primary) |
| `.article-title` | style.css:2652 | H1 do artigo (clamp 1.4–1.9rem) |
| `.article-meta` | style.css:2660 | Flex row: autor + sep + tempo + sep + cat |
| `.article-body` | style.css:2671 | Prosa: h2, h3, p, ul, ol, code, blockquote |
| `.article-related` | style.css:2727 | Seção de ferramentas relacionadas |
| `.article-related-tool` | style.css:2748 | Card de ferramenta (icon + texto) |
| `.kb-wrap` | style.css:2628 | Container KB index (mesmo max-width) |
| `.kb-card` | style.css:2793 | Card de listagem de artigo na KB |
| `.home-artigos` | style.css:2820 | Seção home (border-top + grid) |
| `.home-artigo-card` | style.css:2841 | Card do artigo na home |

---

## Sidebar — Seção KB

```php
// includes/sidebar.php — data-key="kb"
// Active state: ($path === 'artigos/slug-do-artigo')
// 4 links: artigos (index) + 3 artigos
```

---

## Fluxo Principal

1. Usuário acessa `/artigos/utm-varejo-alto-volume`
2. `.htaccess` → `index.php`
3. `$path = 'artigos/utm-varejo-alto-volume'`
4. `match($path)` → define `$titulo`, `$pageDescription`, `$view`
5. `header.php` + `sidebar.php` (com active state no link correto) + view + `footer.php`
6. View renderiza `.article-wrap` com conteúdo estático

---

## Como Adicionar um Novo Artigo

1. **`index.php`** — novo `case` no `match`:
   ```php
   'artigos/meu-novo-slug' => (function () use (&$titulo, &$pageDescription, &$view) {
       $titulo          = 'Título | Toolbox Dev Design';
       $pageDescription = 'Description para SEO.';
       $view            = BASE_PATH . '/views/artigos/meu-novo-slug.php';
   })(),
   ```
2. **`views/artigos/meu-novo-slug.php`** — copiar estrutura de qualquer artigo existente
3. **`includes/sidebar.php`** — novo `<li>` na seção `data-key="kb"`
4. **`views/artigos/index.php`** — novo `.kb-card` na listagem
5. **`views/home.php`** — atualizar grid (se quiser mostrar na home)
6. **`sitemap.xml`** — nova entrada `<url>`

> Nenhum CSS novo necessário — todas as classes já existem.

---

## Dependências Externas

- Nenhuma. Conteúdo 100% estático, sem CDN, sem JS, sem API.

---

## Decisões Técnicas

- **Sem template compartilhado de artigo:** cada view é um arquivo PHP independente. Mantém simplicidade do front controller e evita abstração prematura.
- **Conteúdo inline:** texto dos artigos está hardcoded nas views — não há CMS ou banco. Adequado para volume de 3–10 artigos.
- **KB listing como view separada** (`views/artigos/index.php`): permite rota `/artigos` limpa e indexável pelo Googlebot.
- **`max-width: 680px`** para leitura: referência tipográfica (~65–70 chars/linha) em fonte 16px.

---

## Pendências / Próximos Passos

- Adicionar `<article>` schema markup (JSON-LD) para E-E-A-T
- Considerar data de publicação visível nos cards do KB listing
- Avaliar breadcrumb `Home > Artigos > Título` para navegação e SEO
