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
