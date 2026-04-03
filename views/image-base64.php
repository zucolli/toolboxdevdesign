<div class="card">
    <h1 class="card-title">Imagem para Base64</h1>
    <p class="card-description">Arraste uma imagem ou clique para selecionar. O código Base64 é gerado instantaneamente no navegador — nenhum dado é enviado ao servidor.</p>

    <div class="ib64-dropzone" id="ib64-dropzone">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        <p>Arraste a imagem aqui ou <label for="ib64-file" class="ib64-browse-label">clique para selecionar</label></p>
        <p class="field-hint">JPG, PNG, GIF, WebP, SVG — qualquer formato</p>
        <input type="file" id="ib64-file" accept="image/*" style="display:none;">
    </div>

    <div class="ib64-preview-wrap" id="ib64-preview-wrap" hidden>
        <img id="ib64-preview-img" class="ib64-preview-img" src="" alt="Preview da imagem">
        <div class="ib64-meta" id="ib64-meta"></div>
    </div>

    <div class="form-group" id="ib64-result-wrap" hidden>
        <div class="input-copy-row" style="margin-bottom:8px;">
            <label class="form-label" style="margin:0;flex:1;">Código Base64 (Data URL)</label>
            <button class="btn btn-ghost btn-sm" id="ib64-copy-btn" type="button">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                Copiar
            </button>
        </div>
        <textarea id="ib64-output" class="input-readonly" rows="6" readonly placeholder="O código Base64 aparecerá aqui…"></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é Base64 de imagem?</h2>
    <p>Base64 é um esquema de codificação que converte dados binários (como arquivos de imagem) em uma string de texto ASCII. Isso permite embutir imagens diretamente em código HTML, CSS ou JSON, eliminando requisições HTTP adicionais.</p>

    <h3>Como usar o código gerado</h3>
    <p>No HTML, use o resultado como valor do atributo <code>src</code>: <code>&lt;img src="data:image/png;base64,…"&gt;</code>. No CSS, use como <code>background-image: url("data:image/png;base64,…")</code>. O código começa sempre com o prefixo <code>data:</code> seguido do MIME type e do conteúdo codificado.</p>

    <h3>Quando usar e quando evitar</h3>
    <p>Base64 é útil para ícones pequenos, logos e imagens críticas acima da dobra que precisam ser carregadas sem latência. Evite para imagens grandes: a codificação Base64 aumenta o tamanho do arquivo em ~33%, podendo prejudicar o carregamento da página em vez de otimizá-la.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
