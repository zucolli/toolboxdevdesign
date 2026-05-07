# Módulo Artigos (Base de Conhecimento)

**Status:** 🟢 Atualizado em 2026-05-07 (v4.1 — 10 artigos, badges por categoria)  
**Framework:** PHP 8+ (front controller único — `index.php`)  
**URL(s):**
- `/artigos` — listagem KB
- `/artigos/utm-varejo-alto-volume`
- `/artigos/matematica-testes-ab`
- `/artigos/privacidade-client-side-lgpd`
- `/artigos/psicologia-cores-varejo`
- `/artigos/seguranca-client-side-hash`
- `/artigos/seo-ecommerce-construcao-urls`
- `/artigos/atribuicao-vendas-ga4-utm`
- `/artigos/acessibilidade-wcag-negocio`
- `/artigos/varejo-phygital-integracao-pdv`
- `/artigos/core-web-vitals-varejo`

---

## Banco de Dados

Nenhum. Módulo 100% estático — sem tabelas, sem queries.

---

## Arquivos Envolvidos

| Arquivo | Tipo | Responsabilidade |
|---------|------|-----------------|
| `index.php` | Roteador | 11 `case` no `match ($path)` definem `$titulo`, `$pageDescription` e `$view` para cada rota |
| `views/artigos/index.php` | View — KB listing | Grid de cards com os 10 artigos + filtros por categoria + busca |
| `views/artigos/utm-varejo-alto-volume.php` | View — Artigo 1 | ~950 palavras sobre taxonomia UTM para varejo de alto volume |
| `views/artigos/matematica-testes-ab.php` | View — Artigo 2 | ~950 palavras sobre P-value, Z-score e significância estatística |
| `views/artigos/privacidade-client-side-lgpd.php` | View — Artigo 3 | ~950 palavras sobre client-side processing e LGPD |
| `views/artigos/psicologia-cores-varejo.php` | View — Artigo 4 | ~900 palavras sobre psicologia das cores e ticket médio no varejo |
| `views/artigos/seguranca-client-side-hash.php` | View — Artigo 5 | ~900 palavras sobre Web Crypto API vs geradores server-side |
| `views/artigos/seo-ecommerce-construcao-urls.php` | View — Artigo 6 | ~950 palavras sobre URLs para catálogos de 50k SKUs |
| `views/artigos/atribuicao-vendas-ga4-utm.php` | View — Artigo 7 | ~900 palavras sobre atribuição GA4 e UTM em massa no atacarejo |
| `views/artigos/acessibilidade-wcag-negocio.php` | View — Artigo 8 | ~900 palavras sobre WCAG como estratégia de negócio |
| `views/artigos/varejo-phygital-integracao-pdv.php` | View — Artigo 9 | ~950 palavras sobre integração PDV físico e digital |
| `views/artigos/core-web-vitals-varejo.php` | View — Artigo 10 | ~950 palavras sobre Core Web Vitals e impacto em faturamento |
| `views/home.php` | Seção home | Grid `.home-artigos` com cards linkando aos artigos |
| `assets/css/style.css` | CSS | Classes de artigos, KB, badges por categoria |
| `sitemap.xml` | SEO | 10 URLs de artigos com `priority` 0.8 |
| `includes/breadcrumbs.php` | Componente | Breadcrumb automático: `Início > Base de Conhecimento > [Título]` |
| `components/contextual-nav.php` | Componente | Prev/Next entre os 10 artigos (array `$_ctx_articles`) |

---

## Rotas (index.php)

| Path | Título da página | View |
|------|-----------------|------|
| `artigos` | Base de Conhecimento | `views/artigos/index.php` |
| `artigos/utm-varejo-alto-volume` | Estratégia de UTM para Varejo... | `views/artigos/utm-varejo-alto-volume.php` |
| `artigos/matematica-testes-ab` | A Matemática por Trás dos Testes A/B... | `views/artigos/matematica-testes-ab.php` |
| `artigos/privacidade-client-side-lgpd` | Privacidade Client-Side e LGPD... | `views/artigos/privacidade-client-side-lgpd.php` |
| `artigos/psicologia-cores-varejo` | A Psicologia das Cores no Varejo... | `views/artigos/psicologia-cores-varejo.php` |
| `artigos/seguranca-client-side-hash` | Segurança Client-Side... | `views/artigos/seguranca-client-side-hash.php` |
| `artigos/seo-ecommerce-construcao-urls` | SEO para E-commerce de Construção... | `views/artigos/seo-ecommerce-construcao-urls.php` |
| `artigos/atribuicao-vendas-ga4-utm` | Atribuição de Vendas no GA4... | `views/artigos/atribuicao-vendas-ga4-utm.php` |
| `artigos/acessibilidade-wcag-negocio` | Acessibilidade Digital (WCAG)... | `views/artigos/acessibilidade-wcag-negocio.php` |
| `artigos/varejo-phygital-integracao-pdv` | Varejo Phygital... | `views/artigos/varejo-phygital-integracao-pdv.php` |
| `artigos/core-web-vitals-varejo` | Core Web Vitals para Varejistas... | `views/artigos/core-web-vitals-varejo.php` |

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
    h2, h3, p, ul, ol, code, pre, blockquote
  </div>
  <aside class="article-related">
    .article-related-tools  → links para ferramentas relacionadas (2–3 por artigo)
  </aside>
```

---

## Categorias de Artigos e Badges

| Badge CSS | Cor (light) | Artigos |
|-----------|------------|---------|
| `.kb-badge--marketing` | azul | UTM Varejo, Atribuição GA4 |
| `.kb-badge--desenvolvimento` | verde | Testes A/B, Segurança Hash, WCAG |
| `.kb-badge--privacidade` | roxo | LGPD Client-Side |
| `.kb-badge--varejo` | amarelo | Phygital PDV |
| `.kb-badge--design` | rosa | Psicologia das Cores |
| `.kb-badge--seo` | verde-esmeralda | SEO E-commerce Construção |
| `.kb-badge--performance` | lilás | Core Web Vitals |

Todos os badges têm variante dark mode em `@media (prefers-color-scheme: dark)`.

---

## Filtros do KB Index

`views/artigos/index.php` tem botões de filtro por `data-filter`:
- `todos`, `marketing`, `desenvolvimento`, `privacidade`, `varejo`, `design`, `seo`, `performance`

Lógica de filtro e busca em `main.js` (seção KB Index filter, aprox. linha 2466).

---

## Classes CSS

| Classe | Arquivo | Uso |
|--------|---------|-----|
| `.article-wrap` | style.css | Container leitura (680px max) |
| `.article-header` | style.css | Cabeçalho do artigo c/ border-bottom |
| `.article-eyebrow` | style.css | Badge de categoria (uppercase, primary) |
| `.article-title` | style.css | H1 do artigo (clamp 1.4–1.9rem) |
| `.article-meta` | style.css | Flex row: autor + sep + tempo + sep + cat |
| `.article-body` | style.css | Prosa: h2, h3, p, ul, ol, code, pre, blockquote |
| `.article-related` | style.css | Seção de ferramentas relacionadas |
| `.article-related-tool` | style.css | Card de ferramenta (icon + texto) |
| `.kb-wrap` | style.css | Container KB index (mesmo max-width) |
| `.kb-card` | style.css | Card de listagem de artigo na KB |
| `.kb-badge--*` | style.css | 7 variantes de badge por categoria |
| `.home-artigos` | style.css | Seção home (border-top + grid) |
| `.home-artigo-card` | style.css | Card do artigo na home |

---

## Fluxo Principal (v4.0 — sem sidebar-left)

1. Usuário acessa `/artigos/psicologia-cores-varejo`
2. `.htaccess` → `index.php`
3. `$path = 'artigos/psicologia-cores-varejo'`
4. `match($path)` → define `$titulo`, `$pageDescription`, `$view`
5. `header.php` + `sidebar.php` (abre main + breadcrumbs) + view + `contextual-nav.php` + `footer.php`
6. View renderiza `.article-wrap` com conteúdo estático
7. Links para ferramentas relacionadas usam `/ferramentas/{slug}`

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
3. **`components/contextual-nav.php`** — adicionar `['slug' => 'artigos/meu-novo-slug', 'name' => 'Título']` no array `$_ctx_articles`
4. **`views/artigos/index.php`** — novo `.kb-card` na listagem com `data-category` correto
5. **`includes/breadcrumbs.php`** — adicionar `'meu-novo-slug' => 'Label'` em `$_bc_labels`
6. **`sitemap.xml`** — nova entrada `<url>` com `priority` 0.8
7. **`views/home.php`** — atualizar grid (se quiser mostrar na home)

> Nenhum CSS novo necessário para artigo comum — classes já existem. Para nova categoria, adicionar `.kb-badge--nova-cat` no style.css com variante dark.

---

## Dependências Externas

- Nenhuma. Conteúdo 100% estático, sem CDN, sem JS, sem API.

---

## Decisões Técnicas

- **Sem template compartilhado de artigo:** cada view é um arquivo PHP independente. Mantém simplicidade do front controller e evita abstração prematura.
- **Conteúdo inline:** texto dos artigos está hardcoded nas views — não há CMS ou banco. Adequado para volume de até ~20 artigos.
- **KB listing como view separada** (`views/artigos/index.php`): permite rota `/artigos` limpa e indexável.
- **`max-width: 680px`** para leitura: referência tipográfica (~65–70 chars/linha) em fonte 16px.
- **v4.0 (2026-05-07):** sidebar-left eliminada. Links de ferramentas migrados para `/ferramentas/{slug}`. Breadcrumbs e prev/next implementados.
- **v4.1 (2026-05-07):** expansão de 3 para 10 artigos. Badges por categoria com dark mode. 3 novos filtros no KB index (design, seo, performance). Minimum 800 palavras por artigo, foco em Information Gain.

---

## Pendências / Próximos Passos

- Adicionar `<article>` schema markup (JSON-LD) para E-E-A-T
- Considerar data de publicação visível nos cards do KB listing
- ~~Avaliar breadcrumb~~ ✅ Implementado em v4.0
- Considerar exibir 3–4 artigos mais recentes na home (atualizar `views/home.php`)
