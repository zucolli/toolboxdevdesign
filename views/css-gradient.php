<div class="card">
    <h1 class="card-title">Gerador de CSS Gradient</h1>
    <p class="card-description">Crie gradientes lineares e radiais com preview em tempo real. Copie o código CSS com um clique.</p>

    <div class="grad-preview" id="grad-preview" style="margin-top:24px"></div>

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

    <div class="form-group" style="margin-top:20px">
        <label class="form-label">CSS Gerado</label>
        <div class="input-copy-row">
            <textarea id="grad-result" class="input-readonly bs-result-textarea" readonly></textarea>
            <button class="btn btn-secondary btn-sm" id="grad-copy-btn">Copiar</button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que são gradientes CSS?</h2>
    <p>Gradientes CSS permitem criar transições suaves entre duas ou mais cores diretamente via CSS, sem imagens. Eles são amplamente usados em backgrounds, botões e overlays modernos.</p>

    <h3>Linear vs Radial</h3>
    <p>O <code>linear-gradient</code> distribui as cores ao longo de uma linha reta com um ângulo definido (0° = baixo para cima, 90° = esquerda para direita). Já o <code>radial-gradient</code> irradia do centro para fora em forma circular. O CSS gerado inclui o prefixo <code>-webkit-</code> para garantir compatibilidade com versões antigas de Safari.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Escolha o tipo de gradiente, selecione as duas cores e ajuste o ângulo (apenas para Linear). O preview atualiza instantaneamente. Clique em "Copiar" para levar o CSS para o seu projeto — já com prefixo cross-browser incluído.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de CSS Gradient?</h3>
        <p>O Gerador de CSS Gradient é uma ferramenta visual para criar gradientes CSS lineares e radiais com preview em tempo real. Gradientes adicionam sofisticação visual a backgrounds, botões e elementos decorativos. A ferramenta permite selecionar múltiplas cores, ajustar ângulo (para lineares), raio e posição (para radiais), gerando código CSS pronto para usar. Tudo sem necessidade de conhecimento prévio de sintaxe CSS.</p>

        <h3>Como usar o Gerador de CSS Gradient?</h3>
        <p>Selecione o tipo de gradiente (linear ou radial) e adicione cores clicando em um seletor visual. Ajuste a posição de cada cor (color stops) usando sliders. Para gradientes lineares, configure o ângulo de direção. Para radiais, configure tamanho e posição. Visualize o resultado em tempo real em um elemento de exemplo. Copie o código CSS gerado para usar em seu projeto.</p>

        <h3>Casos de uso práticos do Gerador de CSS Gradient</h3>
        <p>Gradientes CSS modernos são essenciais em web design. Desde backgrounds atraentes até botões com efeitos hover, gradientes criam maior impacto visual comparado a cores sólidas. Profissionais usam gradientes em hero sections, CTAs (call-to-action), overlays de imagem e efeitos de loading. A ferramenta economiza tempo comparado a pesquisar sintaxe CSS ou usar editores online alternativos.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
