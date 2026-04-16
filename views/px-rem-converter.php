<div class="card">
    <h1 class="card-title">Conversor PX ↔ REM</h1>
    <p class="card-description">Converta valores entre pixels e REM em tempo real, com base no font-size raiz configurável.</p>

    <div class="form-group px-rem-base-group">
        <label class="form-label" for="px-rem-base">Root Font-size (base HTML)</label>
        <div class="px-rem-base-row">
            <input type="number" id="px-rem-base" value="16" min="1" max="100" step="1">
            <span class="px-rem-base-unit">px</span>
        </div>
        <small class="field-hint">Padrão dos navegadores: 16px. Altere se o seu projeto usa um valor diferente (ex: 10px para facilitar o cálculo).</small>
    </div>

    <div class="px-rem-converter-grid">
        <div class="px-rem-block">
            <label class="form-label" for="px-rem-px-input">Pixels (PX)</label>
            <input type="number" id="px-rem-px-input" placeholder="16" min="0" step="0.01">
            <svg class="px-rem-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            <label class="form-label" for="px-rem-px-result">Resultado em REM</label>
            <input type="text" id="px-rem-px-result" class="input-readonly" readonly placeholder="1">
        </div>

        <div class="px-rem-divider">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4-4 4"/><path d="M3 7h18"/><path d="M7 21l-4-4 4-4"/><path d="M21 17H3"/></svg>
        </div>

        <div class="px-rem-block">
            <label class="form-label" for="px-rem-rem-input">REM</label>
            <input type="number" id="px-rem-rem-input" placeholder="1" min="0" step="0.001">
            <svg class="px-rem-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            <label class="form-label" for="px-rem-rem-result">Resultado em PX</label>
            <input type="text" id="px-rem-rem-result" class="input-readonly" readonly placeholder="16">
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Por que usar REM em vez de PX?</h2>
    <p>REM (Root EM) é uma unidade relativa ao <code>font-size</code> do elemento raiz (<code>&lt;html&gt;</code>). Ao contrário de pixels, que são fixos, valores em REM escalam proporcionalmente quando o usuário ajusta o tamanho de fonte nas configurações do navegador — o que melhora a acessibilidade e a responsividade do layout.</p>

    <h3>Fórmula de conversão</h3>
    <p>A conversão é direta: <code>REM = PX ÷ base</code> e <code>PX = REM × base</code>. Com a base padrão de 16px, <code>24px = 1.5rem</code> e <code>1rem = 16px</code>. Muitos projetos adotam <code>font-size: 62.5%</code> (= 10px) no <code>html</code> para facilitar o cálculo: nesse caso, <code>1rem = 10px</code>.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Altere o campo "Root Font-size" para refletir a base do seu projeto. Em seguida, digite o valor em PX para obter o equivalente em REM, ou vice-versa. Ambos os campos atualizam em tempo real e a troca de base recalcula automaticamente os dois blocos.</p>

    <section class="tool-seo-content">
        <h3>O que é o Conversor PX para REM?</h3>
        <p>O Conversor PX para REM é uma ferramenta essential para desenvolvedores frontend que seguem as melhores práticas de design responsivo. REM (root em) é uma unidade relativa ao tamanho de fonte do elemento raiz, permitindo escalabilidade consistente. Ao invés de usar px (pixels absolutos), usar REM torna o design mais flexível e acessível, especialmente para usuários que customizam tamanho de fonte no navegador.</p>

        <h3>Como usar o Conversor PX para REM?</h3>
        <p>Use o Conversor digitando valores em PX e vendo a conversão para REM em tempo real, ou vice-versa. Configure a base de tamanho de fonte (padrão 16px, mas pode ser 10px ou outro valor conforme seu projeto). A ferramenta calcula automaticamente: 16px em base 16 = 1rem. Copie valores convertidos para usar em seu arquivo CSS, estilos inline ou variáveis CSS.</p>

        <h3>Casos de uso práticos do Conversor PX para REM</h3>
        <p>Profissionais frontend que utilizam metodologia Mobile-First e responsive design adotam REM como padrão. Ao ajustar o font-size da raiz, todos os tamanhos escalados em REM ajustam proporcionalmente — perfeito para criar layouts que funcionam em qualquer dispositivo. Projetos que precisam suportar usuários com baixa visão beneficiam especialmente de REM, tornando o design mais inclusivo.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
