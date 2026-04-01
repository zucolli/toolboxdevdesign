<div class="card">
    <h1 class="card-title">Gerador de CSS Box Shadow</h1>
    <p class="card-description">Crie e personalize sombras CSS visualmente. Arraste os sliders e copie o código pronto.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<div class="card">
    <div class="bs-layout">
        <div class="bs-controls">
            <div class="form-group">
                <label class="form-label" for="bs-offset-x">Deslocamento X: <span id="bs-offset-x-val">4</span>px</label>
                <input type="range" id="bs-offset-x" min="-50" max="50" value="4">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-offset-y">Deslocamento Y: <span id="bs-offset-y-val">4</span>px</label>
                <input type="range" id="bs-offset-y" min="-50" max="50" value="4">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-blur">Desfoque (Blur): <span id="bs-blur-val">10</span>px</label>
                <input type="range" id="bs-blur" min="0" max="100" value="10">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-spread">Propagação (Spread): <span id="bs-spread-val">0</span>px</label>
                <input type="range" id="bs-spread" min="-50" max="50" value="0">
            </div>
            <div class="bs-colors-row">
                <div class="form-group">
                    <label class="form-label" for="bs-color">Cor da Sombra</label>
                    <input type="color" id="bs-color" value="#000000" class="bs-color-input">
                </div>
                <div class="form-group">
                    <label class="form-label" for="bs-opacity">Opacidade: <span id="bs-opacity-val">30</span>%</label>
                    <input type="range" id="bs-opacity" min="0" max="100" value="30">
                </div>
                <div class="form-group">
                    <label class="form-label" for="bs-bg-color">Cor do Fundo</label>
                    <input type="color" id="bs-bg-color" value="#ffffff" class="bs-color-input">
                </div>
            </div>
            <div class="form-group">
                <label class="bs-inset-label">
                    <input type="checkbox" id="bs-inset">
                    Sombra Interna (inset)
                </label>
            </div>
        </div>

        <div class="bs-preview-area">
            <div class="bs-preview-bg" id="bs-preview-bg">
                <div class="bs-preview-box" id="bs-preview-box"></div>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top:16px">
        <label class="form-label">CSS Gerado</label>
        <div class="input-copy-row">
            <textarea id="bs-result" class="input-readonly bs-result-textarea" readonly>box-shadow: 4px 4px 10px 0px rgba(0,0,0,0.30);</textarea>
            <button class="btn btn-secondary btn-sm" id="bs-copy-btn">Copiar</button>
        </div>
    </div>
</div>

<article class="tool-content">
    <h2>O que é CSS Box Shadow?</h2>
    <p>A propriedade <code>box-shadow</code> aplica sombras ao redor de um elemento HTML. É amplamente usada em UI design para criar profundidade, realce de cards e efeitos de foco em botões.</p>

    <h3>Parâmetros da propriedade</h3>
    <p>A sintaxe completa é: <code>box-shadow: [inset] offset-x offset-y blur-radius spread-radius color;</code>. O <strong>offset-x</strong> e <strong>offset-y</strong> definem a posição da sombra, <strong>blur</strong> controla o desfoque e <strong>spread</strong> expande ou contrai a sombra.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Ajuste os sliders para personalizar a sombra em tempo real. Use o checkbox "inset" para criar sombras internas. Marque a cor com transparência usando o controle de opacidade. Quando estiver satisfeito, clique em "Copiar" para obter o CSS pronto.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
