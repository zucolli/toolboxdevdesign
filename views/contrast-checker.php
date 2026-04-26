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

    <section class="tool-seo-content">
        <h3>O que é o Calculadora de Contraste WCAG?</h3>
        <p>A Calculadora de Contraste WCAG é uma ferramenta profissional para designers e desenvolvedores web que desejam garantir a acessibilidade de seus projetos. Ela avalia o contraste de cores conforme os critérios de acessibilidade web WCAG 2.1 AA e AAA, determinando se a combinação de cores escolhida permite leitura adequada para pessoas com baixa visão ou daltonismo. Um bom contraste é fundamental para tornar seu site acessível a todos.</p>

        <h3>Como usar o Calculadora de Contraste WCAG?</h3>
        <p>Use a ferramenta selecionando a cor do texto e a cor do fundo nos campos de entrada, ou digitando códigos hexadecimais diretamente. A calculadora exibe instantaneamente a razão de contraste (contrast ratio) e indica se a combinação atende aos critérios AA (4.5:1 para texto normal) ou AAA (7:1 para texto normal). Você também recebe recomendações de ajustes se a combinação não passar nos testes.</p>

        <h3>Casos de uso práticos do Calculadora de Contraste WCAG</h3>
        <p>Conformidade com WCAG é essencial em projetos comerciais e governamentais, frequentemente exigida por lei em muitos países. Além da conformidade legal, melhorar contraste beneficia todos os usuários em ambientes com luz solar intensa ou em dispositivos com telas de baixa qualidade. Investir em acessibilidade aumenta o alcance do seu produto e demonstra responsabilidade corporativa.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em tabloides digitais para grandes redes varejistas, o preço é o elemento mais crítico de legibilidade. Sempre valide contraste mínimo AA (4,5:1) entre a cor do preço e o fundo. Telas de tablet em PDVs sob iluminação fluorescente exigem contraste ainda maior — designers experientes miram em AAA (7:1) para garantir legibilidade em qualquer ambiente de loja, de atacado ao varejo especializado.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
