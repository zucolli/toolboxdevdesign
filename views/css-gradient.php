<div class="card">
    <h1 class="card-title">Gerador de CSS Gradient</h1>
    <p class="card-description">Crie gradientes lineares e radiais com preview em tempo real. Copie o código CSS com um clique.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<div class="card">
    <div class="grad-preview" id="grad-preview"></div>

    <div class="grad-controls">
        <div class="grad-controls-row">
            <div class="form-group">
                <label class="form-label" for="grad-type">Tipo</label>
                <select id="grad-type" class="grad-select">
                    <option value="linear">Linear</option>
                    <option value="radial">Radial</option>
                </select>
            </div>
            <div class="form-group" id="grad-angle-group">
                <label class="form-label" for="grad-angle">Ângulo: <span id="grad-angle-val">135</span>°</label>
                <input type="range" id="grad-angle" min="0" max="360" value="135">
            </div>
        </div>

        <div class="grad-colors-row">
            <div class="form-group">
                <label class="form-label" for="grad-color1">Cor 1</label>
                <input type="color" id="grad-color1" value="#667eea" class="bs-color-input">
            </div>
            <div class="grad-arrow">→</div>
            <div class="form-group">
                <label class="form-label" for="grad-color2">Cor 2</label>
                <input type="color" id="grad-color2" value="#764ba2" class="bs-color-input">
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top:16px">
        <label class="form-label">CSS Gerado</label>
        <div class="input-copy-row">
            <textarea id="grad-result" class="input-readonly bs-result-textarea" readonly></textarea>
            <button class="btn btn-secondary btn-sm" id="grad-copy-btn">Copiar</button>
        </div>
    </div>
</div>

<article class="tool-content">
    <h2>O que são gradientes CSS?</h2>
    <p>Gradientes CSS permitem criar transições suaves entre duas ou mais cores diretamente via CSS, sem imagens. Eles são amplamente usados em backgrounds, botões e overlays modernos.</p>

    <h3>Linear vs Radial</h3>
    <p>O <code>linear-gradient</code> distribui as cores ao longo de uma linha reta com um ângulo definido (0° = baixo para cima, 90° = esquerda para direita). Já o <code>radial-gradient</code> irradia do centro para fora em forma circular.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Escolha o tipo de gradiente, selecione as duas cores e ajuste o ângulo (apenas para Linear). O preview atualiza instantaneamente. Clique em "Copiar" para levar o CSS para o seu projeto.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
