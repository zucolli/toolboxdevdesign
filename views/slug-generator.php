<div class="card">
    <h1 class="card-title">Gerador de Slugs</h1>
    <p class="card-description">Cole ou escreva qualquer texto abaixo e obtenha um slug limpo e otimizado para URLs em tempo real.</p>

    <div class="form-group">
        <label class="form-label" for="input-text">Texto original</label>
        <textarea
            id="input-text"
            rows="4"
            placeholder="Ex: Ação de Varejo 100% OFF!"
            autofocus
        ></textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="output-slug">Slug gerado</label>
        <input
            type="text"
            id="output-slug"
            class="input-readonly"
            readonly
            placeholder="acao-de-varejo-100-off"
        >
    </div>

    <button id="btn-copy" class="btn btn-primary" type="button">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
        </svg>
        Copiar Slug
    </button>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um Slug?</h2>
    <p>Um slug é a parte de uma URL que identifica uma página de forma legível por humanos e motores de busca. É gerado a partir do título ou texto da página, removendo acentos, caracteres especiais e substituindo espaços por hífens. Exemplo: "Ação de Varejo 100% OFF!" vira <code>acao-de-varejo-100-off</code>.</p>

    <h3>Onde e por que usar?</h3>
    <p>Slugs limpos são fundamentais para SEO: URLs amigáveis têm maior chance de ranquear bem no Google e são mais fáceis de compartilhar. Use este gerador ao criar posts em CMS (WordPress, Ghost, Strapi), rotas em frameworks (Laravel, Next.js), IDs de produtos em e-commerce ou qualquer situação em que o texto precisa virar parte de uma URL.</p>

    <h3>Como funciona?</h3>
    <p>Cole ou escreva qualquer texto no campo acima. A ferramenta normaliza o texto em tempo real: converte para minúsculas, remove acentos via NFD, elimina caracteres não alfanuméricos e substitui espaços consecutivos por um único hífen. O resultado aparece imediatamente no campo "Slug gerado".</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
