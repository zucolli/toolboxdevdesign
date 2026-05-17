<div class="card">
    <h1 class="card-title">Gerador de Meta Tags</h1>
    <p class="card-description">Preencha os campos abaixo para gerar automaticamente as meta tags HTML padrão, Open Graph e Twitter Cards.</p>

    <div class="form-group">
        <label class="form-label" for="mt-title">Título da Página</label>
        <input type="text" id="mt-title" placeholder="Ex: Toolbox Dev Design — Ferramentas para devs" maxlength="70" />
        <span class="field-hint" id="mt-title-count">0/70 caracteres</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-description">Descrição</label>
        <textarea id="mt-description" rows="3" placeholder="Ex: Ferramentas gratuitas para desenvolvedores e designers web." maxlength="160"></textarea>
        <span class="field-hint" id="mt-desc-count">0/160 caracteres</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-url">URL Canônica</label>
        <input type="url" id="mt-url" placeholder="https://seusite.com.br/pagina" />
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-image">URL da Imagem (Open Graph)</label>
        <input type="url" id="mt-image" placeholder="https://seusite.com.br/og-image.jpg" />
        <span class="field-hint">Recomendado: 1200 × 630 px</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-author">Autor</label>
        <input type="text" id="mt-author" placeholder="Nome do autor ou empresa" />
    </div>

    <div class="checksum-block" style="margin-top: 16px;">
        <div class="checksum-block-header">
            <span class="checksum-block-title">Código HTML gerado</span>
            <button class="btn btn-sm btn-secondary" id="mt-copy">Copiar HTML</button>
        </div>
        <textarea class="input-readonly mt-output" id="mt-output" rows="18" readonly placeholder="Preencha os campos acima para gerar as meta tags…"></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Como usar o Gerador de Meta Tags</h2>
    <p>Preencha os campos e o código HTML é atualizado em tempo real. Copie e cole diretamente na seção <code>&lt;head&gt;</code> do seu site.</p>

    <h3>Tags geradas</h3>
    <p>O gerador produz três conjuntos de tags: <strong>meta tags padrão</strong> (title, description, author, canonical), <strong>Open Graph</strong> (og:title, og:description, og:image, og:url) para redes sociais como Facebook e LinkedIn, e <strong>Twitter Cards</strong> (twitter:card, twitter:title, twitter:description, twitter:image) para compartilhamentos no X/Twitter.</p>

    <h3>Boas práticas</h3>
    <p>O título ideal tem entre 50–60 caracteres e a descrição entre 120–160 caracteres para evitar truncamento nos resultados de busca. A imagem Open Graph deve ter proporção 1.91:1 (ex: 1200×630 px) para exibição ideal em compartilhamentos sociais.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Meta Tags SEO?</h3>
        <p>O Gerador de Meta Tags SEO é uma ferramenta profissional para otimizar conteúdo web em motores de busca e redes sociais. Meta tags como title, description, Open Graph (para Facebook/LinkedIn) e Twitter Cards controlam como sua página aparece em resultados de busca e ao compartilhar em redes sociais. Uma meta tag bem escrita pode aumentar taxa de cliques (CTR) em 20-40% comparado a uma genérica.</p>

        <h3>Como usar o Gerador de Meta Tags SEO?</h3>
        <p>Configure os campos: título da página (50-60 caracteres), descrição (155-160 caracteres), URL canonônica, palavras-chave e informações Open Graph. A ferramenta valida comprimentos recomendados e oferece preview visual de como suas meta tags aparecerão no Google e Facebook. Copie o código HTML gerado e cole no <head> de sua página. Teste seus resultados visualizando live preview.</p>

        <h3>Casos de uso práticos do Gerador de Meta Tags SEO</h3>
        <p>Meta tags são fundamentais em SEO moderno. Mesmo com conteúdo excelente, meta tags pobres resultam em baixo CTR e traffic reduzido. Profissionais de SEO, content managers e developers usam geradores de meta tags para garantir consistência e otimização. Google e redes sociais utilizam meta tags para indexar e apresentar seu conteúdo — descuida disso e seu tráfego orgânico sofre.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Protocolo de Meta Tags para Landing Pages Temporárias de Promoção de Grande Rede de Home Center</h3>
    <p>Um líder nacional em home center lançava em média 8 landing pages de promoção por mês — campanhas sazonais, liquidações de categoria, kits especiais e ofertas relâmpago. O problema emergiu quando a equipe de SEO identificou que o Google havia indexado 47 landing pages expiradas que ainda apareciam nos resultados de busca com preços promocionais desatualizados: "Piso vinílico com 50% OFF" apontando para uma página com erro 404, ou pior, para a mesma página reaproveitada com produto diferente mas preço antigo no snippet do Google. Clientes clicavam, chegavam à página errada e a taxa de rejeição nessas URLs atingia 94% — destruindo a reputação do domínio.</p>
    <p>Usamos o Gerador de Meta Tags para criar um protocolo padrão de três camadas para landing pages temporárias. Primeira camada (durante a promoção): meta description com preço, prazo e disponibilidade, Open Graph completo para compartilhamento no WhatsApp e <code>robots: index, follow</code>. Segunda camada (última semana da promoção): adicionar <code>&lt;link rel="canonical"&gt;</code> apontando para a categoria permanente e trocar Open Graph para imagem genérica da categoria. Terceira camada (após expiração): <code>robots: noindex, nofollow</code> imediato e redirecionamento 301 para a categoria. O Gerador foi usado para criar templates de meta tags para cada camada, que a equipe copiava e adaptava.</p>
    <p>Com o protocolo implementado, em 90 dias o número de landing pages expiradas indexadas caiu de 47 para 3. Os snippets de promoções encerradas pararam de aparecer no Google em até 72 horas após a aplicação do <code>noindex</code>. O compartilhamento das páginas de promoção no WhatsApp aumentou 28% porque o Open Graph passou a mostrar imagem do produto e preço em vez de uma URL genérica. A diretoria de marketing passou a usar o protocolo como documento de briefing para novos lançamentos de campanha.</p>
    <p>Landing pages de promoção sem gestão de meta tags são bombas-relógio de SEO. Para varejistas que lançam campanhas com frequência alta, um protocolo documentado de meta tags por fase de vida da página é tão importante quanto o design da própria página.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em e-commerce de varejo, a meta description da página de produto é mais importante que o título para conversão orgânica. Inclua preço, marca e disponibilidade (ex: <em>Piso Vinílico XYZ — R$ 49,90/m² · Em estoque · Entrega para todo Brasil</em>). Essa informação no snippet aumenta o CTR de forma significativa comparado a meta descriptions genéricas copiadas do ERP.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
