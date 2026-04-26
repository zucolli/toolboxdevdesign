<div class="card">
    <h1 class="card-title">Gerador de Placeholder de Imagem</h1>
    <p class="card-description">Configure largura, altura, cores e texto para gerar um placeholder de imagem personalizado. Preview em tempo real — sem dependências externas.</p>

    <div class="iph-controls">
        <div class="iph-row">
            <div class="form-group">
                <label class="form-label" for="iph-width">Largura (px)</label>
                <input type="number" id="iph-width" value="400" min="1" max="2000">
            </div>
            <div class="form-group">
                <label class="form-label" for="iph-height">Altura (px)</label>
                <input type="number" id="iph-height" value="300" min="1" max="2000">
            </div>
        </div>
        <div class="iph-row">
            <div class="form-group">
                <label class="form-label" for="iph-bg">Cor de Fundo</label>
                <div class="iph-color-row">
                    <input type="color" id="iph-bg" value="#cccccc" class="iph-color-input">
                    <input type="text" id="iph-bg-hex" value="#cccccc" class="iph-hex-input">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="iph-fg">Cor do Texto</label>
                <div class="iph-color-row">
                    <input type="color" id="iph-fg" value="#666666" class="iph-color-input">
                    <input type="text" id="iph-fg-hex" value="#666666" class="iph-hex-input">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="iph-text">Texto customizado (opcional)</label>
            <input type="text" id="iph-text" placeholder="Deixe em branco para usar as dimensões">
        </div>
    </div>

    <div class="iph-preview-wrap">
        <canvas id="iph-canvas" class="iph-canvas"></canvas>
    </div>

    <div class="iph-actions">
        <button class="btn btn-primary" id="iph-download-btn" type="button">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Baixar PNG
        </button>
        <button class="btn btn-ghost btn-sm" id="iph-copy-url-btn" type="button">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            Copiar Data URL
        </button>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Para que servem placeholders de imagem?</h2>
    <p>Placeholders de imagem são usados no desenvolvimento de layouts antes que as imagens reais estejam disponíveis. Eles permitem visualizar proporções, espaçamentos e composição da página sem depender de assets finais.</p>

    <h3>Vantagens de um placeholder gerado localmente</h3>
    <p>Ao contrário de serviços externos como <em>placehold.it</em> ou <em>via.placeholder.com</em>, esta ferramenta gera a imagem 100% no navegador via Canvas API, sem realizar requisições de rede. Isso garante funcionamento offline e total privacidade.</p>

    <h3>Usando o Data URL diretamente no código</h3>
    <p>O botão "Copiar Data URL" copia a imagem codificada em Base64, pronta para usar como valor de <code>src</code> em qualquer tag <code>&lt;img&gt;</code> ou como <code>background-image</code> no CSS — sem precisar hospedar o arquivo em nenhum lugar.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Placeholder de Imagem?</h3>
        <p>O Gerador de Placeholder de Imagem é uma ferramenta para designers e desenvolvedores que precisam gerar imagens temporárias para mockups e prototipagem. Ao invés de buscar imagens ou usar URLs de placeholder online, você gera localmente usando HTML5 Canvas API. Você customiza dimensões exatas, cores, texto e estilo, obtendo placeholder profissional pronto para usar em wireframes e mockups.</p>

        <h3>Como usar o Gerador de Placeholder de Imagem?</h3>
        <p>Configure os parâmetros: largura e altura em pixels (ex: 800x600), cor de fundo, cor do texto, tamanho da fonte e o texto a exibir (ex: "Imagem Placeholder"). A ferramenta gera instantaneamente a imagem via Canvas API. Você pode copiar o HTML gerado ou baixar como PNG. A imagem é gerada localmente — perfeita para projetos offline e sem dependência de URLs externas.</p>

        <h3>Casos de uso práticos do Gerador de Placeholder de Imagem</h3>
        <p>Designers usam placeholders para estruturar layouts sem imagens finais. Desenvolvedores frontend usam para testar responsividade. Equipes que precisam compartilhar mockups rapidamente geram placeholders customizados. Ao fazer apresentações de design, placeholders permitem comunicar layout e estrutura sem distração de imagens variadas. Essa ferramenta torna processo mais rápido que buscar e redimensionar imagens.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Ao apresentar wireframes de e-commerce para aprovação de clientes varejistas, use placeholders com as dimensões exatas dos seus formatos padrão de banner (ex: <code>1200×628</code> para Facebook/LinkedIn, <code>300×250</code> para Display). Apresentar o layout com proporções corretas elimina retrabalho e alinha expectativa visual antes da produção criativa.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
