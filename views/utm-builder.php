<div class="card">
    <h1 class="card-title">Gerador de UTMs</h1>
    <p class="card-description">Preencha os campos abaixo para criar uma URL rastreável para suas campanhas. Os campos marcados com <span class="required-mark">*</span> são obrigatórios.</p>

    <div class="utm-grid">
        <div class="form-group">
            <label class="form-label" for="utm-url">URL do Site <span class="required-mark">*</span></label>
            <input type="url" id="utm-url" placeholder="https://meusite.com/pagina">
        </div>

        <div class="utm-section-label">Parâmetros obrigatórios</div>

        <div class="utm-fields-group">
            <div class="form-group">
                <label class="form-label" for="utm-source">Campaign Source <span class="required-mark">*</span></label>
                <input type="text" id="utm-source" placeholder="google, newsletter, instagram">
                <small class="field-hint">utm_source — identifica o canal de tráfego</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-medium">Campaign Medium <span class="required-mark">*</span></label>
                <input type="text" id="utm-medium" placeholder="cpc, email, social">
                <small class="field-hint">utm_medium — identifica a mídia da campanha</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-campaign">Campaign Name <span class="required-mark">*</span></label>
                <input type="text" id="utm-campaign" placeholder="black_friday, lancamento_2025">
                <small class="field-hint">utm_campaign — nome da campanha</small>
            </div>
        </div>

        <div class="utm-section-label utm-section-label--optional">Parâmetros opcionais</div>

        <div class="utm-fields-group">
            <div class="form-group">
                <label class="form-label" for="utm-term">Campaign Term</label>
                <input type="text" id="utm-term" placeholder="sapatos esportivos">
                <small class="field-hint">utm_term — palavras-chave pagas</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-content">Campaign Content</label>
                <input type="text" id="utm-content" placeholder="banner_topo, link_bio">
                <small class="field-hint">utm_content — diferencia anúncios ou links</small>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top: 1.5rem;">
        <label class="form-label" for="utm-output">URL gerada</label>
        <div class="input-copy-row input-copy-row--tall">
            <textarea
                id="utm-output"
                class="input-readonly"
                readonly
                rows="3"
                placeholder="Preencha os campos obrigatórios para gerar a URL…"
            ></textarea>
            <button id="btn-copy-utm" class="btn btn-secondary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copiar
            </button>
        </div>
    </div>
</div>
