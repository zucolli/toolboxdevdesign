<div class="card">
    <h1 class="card-title">Calculadora de Contraste WCAG</h1>
    <p class="card-description">Verifique a acessibilidade entre cor de fundo e cor de texto conforme as diretrizes WCAG 2.1.</p>

    <div class="contrast-inputs">
        <div class="form-group">
            <label class="form-label" for="color-bg">Cor do Fundo</label>
            <div class="color-input-row">
                <input type="color" id="color-bg-picker" value="#ffffff" class="color-picker">
                <input type="text"  id="color-bg-hex"    value="#ffffff" class="color-hex" maxlength="7" placeholder="#ffffff">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="color-text">Cor do Texto</label>
            <div class="color-input-row">
                <input type="color" id="color-text-picker" value="#111111" class="color-picker">
                <input type="text"  id="color-text-hex"    value="#111111" class="color-hex" maxlength="7" placeholder="#111111">
            </div>
        </div>
    </div>

    <div class="contrast-preview" id="contrast-preview">
        <p class="preview-sample" id="preview-sample">
            The quick brown fox jumps over the lazy dog.<br>
            <strong>Texto em negrito para referência.</strong>
        </p>
    </div>

    <div class="contrast-results">
        <div class="contrast-ratio-block">
            <span class="contrast-ratio-label">Razão de Contraste</span>
            <span class="contrast-ratio-value" id="contrast-ratio">—</span>
        </div>

        <div class="contrast-badges">
            <div class="badge-group">
                <span class="badge-label">AA — Texto Normal <small>(≥ 4.5:1)</small></span>
                <span class="badge" id="badge-aa-normal">—</span>
            </div>
            <div class="badge-group">
                <span class="badge-label">AA — Texto Grande <small>(≥ 3.0:1)</small></span>
                <span class="badge" id="badge-aa-large">—</span>
            </div>
            <div class="badge-group">
                <span class="badge-label">AAA — Texto Normal <small>(≥ 7.0:1)</small></span>
                <span class="badge" id="badge-aaa-normal">—</span>
            </div>
            <div class="badge-group">
                <span class="badge-label">AAA — Texto Grande <small>(≥ 4.5:1)</small></span>
                <span class="badge" id="badge-aaa-large">—</span>
            </div>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é a Calculadora de Contraste WCAG?</h2>
    <p>Esta ferramenta calcula a razão de contraste entre duas cores (fundo e texto) e indica se a combinação atende às diretrizes WCAG 2.1 (Web Content Accessibility Guidelines). A razão é calculada com base na luminância relativa de cada cor, conforme definido pelo W3C.</p>

    <h3>Onde e por que usar?</h3>
    <p>Acessibilidade digital não é opcional: a legislação de vários países (incluindo o Brasil, pela LBI) exige que sites sejam acessíveis a pessoas com deficiência visual. Designers de UI, desenvolvedores front-end e times de marketing devem verificar o contraste de cada combinação de cor antes de colocar um layout em produção. Nível AA (mínimo recomendado) exige 4,5:1 para texto normal e 3:1 para texto grande. Nível AAA (excelência) exige 7:1 e 4,5:1 respectivamente.</p>

    <h3>Como funciona?</h3>
    <p>Selecione a cor de fundo e a cor do texto usando os seletores ou digitando o código HEX. A razão de contraste é calculada em tempo real e exibida junto com quatro badges indicando aprovação ou reprovação em cada critério WCAG. Use as badges para guiar suas decisões de design.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
