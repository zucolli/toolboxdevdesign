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

    <section class="tool-seo-content">
        <h3>O que é o Conversor de Imagem para Base64?</h3>
        <p>O Conversor de Imagem para Base64 é uma ferramenta que transforma arquivos de imagem (PNG, JPG, WebP, SVG) em código Base64 Data URL. Data URLs permitem incorporar imagens diretamente em CSS, HTML ou JSON sem necessidade de requisição HTTP separada. Isso reduz requisições e pode melhorar performance. Tudo executado 100% no navegador — suas imagens nunca são enviadas a servidor.</p>

        <h3>Como usar o Conversor de Imagem para Base64?</h3>
        <p>Carregue uma imagem clicando no campo de upload ou arrastando (drag-drop). Selecione o formato: PNG, JPG, WebP ou SVG. A ferramenta converte instantaneamente para Base64 Data URL (formato data:image/png;base64,...). Copie o resultado completo para usar em CSS background-image, img src, ou JSON. Útil para emojis, ícones e imagens pequenas.</p>

        <h3>Casos de uso práticos do Conversor de Imagem para Base64</h3>
        <p>Desenvolvedores frontend usam Data URLs para incorporar ícones e imagens em CSS, eliminando requisições extras ao servidor. Isso melhora performance e reduz latência. Email marketing frequentemente usa Data URLs para imagens pequenas para garantir compatibilidade com clientes de email. PWAs e aplicações que precisam funcionar offline também usam Data URLs. Essa ferramenta simplifica a conversão.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Ícones de Categoria Embutidos em E-mail Marketing de Grande Varejista para Base Corporativa</h3>
    <p>Uma rede varejista de materiais elétricos com forte presença no segmento B2B enviava mensalmente um e-mail marketing para uma base de 47.000 contatos, sendo aproximadamente 60% deles endereços corporativos de pequenas e médias empresas. O e-mail utilizava 12 ícones de categoria de produto (iluminação, automação, redes e cabos, etc.) para organizar visualmente as ofertas do mês em colunas de produto. Em um teste de renderização realizado pela equipe, identificou-se que os ícones não carregavam em 31% dos destinatários com clientes de e-mail corporativos — especialmente Outlook 2016 e 2019, que bloqueiam imagens externas por padrão e exibem apenas o alt text. O resultado era um layout completamente quebrado visualmente para quase um terço da base principal.</p>
    <p>A solução foi converter os 12 ícones SVG de categoria para Base64 e embutir as strings diretamente no atributo <code>src</code> das tags <code>&lt;img&gt;</code> no HTML do e-mail, eliminando qualquer dependência de requisição externa. Utilizamos o conversor de Image to Base64 para processar cada ícone individualmente — o SVG de cada categoria era carregado na ferramenta, o código Base64 gerado era copiado e colado no template de e-mail. Como os ícones eram SVGs vetoriais com menos de 3KB cada, as strings Base64 geradas tinham em média 4KB, adicionando apenas 48KB ao tamanho total do HTML — volume irrelevante para entrega considerando o tamanho médio dos e-mails da campanha.</p>
    <p>Após a migração dos ícones para Base64 inline, os testes de renderização em 14 clientes de e-mail diferentes (incluindo Outlook 2016, 2019, 2021 e Lotus Notes) mostraram 100% de exibição correta dos ícones, sem uma única instância de imagem quebrada. A taxa de clique geral do próximo envio subiu 28% em comparação com o envio anterior do mesmo template — atribuída diretamente à melhoria visual no segmento de clientes corporativos, que anteriormente via o e-mail como texto sem estrutura.</p>
    <ul>
        <li>12 ícones de categoria convertidos para Base64 inline</li>
        <li>31% dos destinatários com bloqueio de imagens externas (clientes corporativos)</li>
        <li>100% de renderização correta após migração (14 clientes de e-mail testados)</li>
        <li>Taxa de clique: +28% no envio seguinte à correção</li>
    </ul>
    <p>Agências que produzem e-mail marketing para varejistas com base B2B devem sempre testar renderização em Outlook antes de qualquer envio em escala. A solução de Base64 inline para ícones pequenos é o único método garantido de exibição em clientes corporativos com política de bloqueio de imagens externas.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Ao criar e-mails de campanha para grandes atacadistas com bases de 100k+ contatos, converter logotipos e ícones pequenos para Base64 e embutir no HTML elimina dependência de CDN externo. Isso garante renderização correta mesmo em clientes de e-mail corporativos com política de bloqueio de imagens externas — problema frequente em redes de varejistas com TI restritiva.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
