<div class="card">
    <h1 class="card-title">Gerador de Lorem Ipsum</h1>
    <p class="card-description">Gere texto de preenchimento em latim para maquetes, wireframes e protótipos. Escolha o formato e a quantidade desejada.</p>

    <div class="lorem-controls">
        <div class="form-group">
            <label class="form-label" for="lorem-qty">Quantidade</label>
            <input type="number" id="lorem-qty" value="3" min="1" max="100" style="max-width: 120px;">
        </div>
        <div class="form-group">
            <label class="form-label" for="lorem-type">Tipo</label>
            <select id="lorem-type" class="lorem-select">
                <option value="paragraphs">Parágrafos</option>
                <option value="words">Palavras</option>
                <option value="sentences">Frases</option>
                <option value="list">Lista HTML</option>
            </select>
        </div>
        <div class="form-group lorem-html-group">
            <label class="form-label">&nbsp;</label>
            <label class="radio-label" style="display:inline-flex;align-items:center;gap:8px;padding:10px 14px;cursor:pointer;">
                <input type="checkbox" id="lorem-html-tags" checked>
                <span>Incluir tags HTML</span>
            </label>
        </div>
    </div>

    <button class="btn btn-primary" id="lorem-btn" type="button">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Gerar
    </button>

    <div class="form-group" style="margin-top: 24px;" id="lorem-result-wrap" hidden>
        <div class="input-copy-row" style="margin-bottom: 8px;">
            <label class="form-label" style="margin:0;flex:1;">Resultado</label>
            <button class="btn btn-ghost btn-sm" id="lorem-copy-btn" type="button">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                Copiar
            </button>
        </div>
        <textarea id="lorem-output" class="input-readonly" rows="12" readonly></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é Lorem Ipsum?</h2>
    <p>Lorem Ipsum é um texto de preenchimento em latim derivado de <em>De Finibus Bonorum et Malorum</em>, de Cícero (45 a.C.). Desde a década de 1500, tipógrafos usam variações desse texto para demonstrar leiautes sem distrair com conteúdo significativo.</p>

    <h3>Parágrafos, palavras e frases</h3>
    <p>Use parágrafos para preencher blocos de texto maiores, palavras para testar limites de caracteres e frases para componentes como tooltips ou labels. A opção de Lista HTML gera itens <code>&lt;ul&gt;&lt;li&gt;</code> prontos para colar em templates.</p>

    <h3>Incluir tags HTML</h3>
    <p>Quando marcado, o resultado é encapsulado em tags semânticas (<code>&lt;p&gt;</code>, <code>&lt;ul&gt;&lt;li&gt;</code>), permitindo colar diretamente em editores HTML ou sistemas de template. Desmarcado, o texto é gerado puro, ideal para campos de texto simples.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
