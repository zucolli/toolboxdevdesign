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

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Lorem Ipsum?</h3>
        <p>O Gerador de Lorem Ipsum é uma ferramenta padrão em design mockups e desenvolvimento web. Lorem Ipsum é um texto placeholder em pseudo-latim usado para demonstrar layout e visual de um projeto sem distração do conteúdo real. Designers de UI/UX, desenvolvedores frontend e stakeholders usam Lorem Ipsum para avaliar espaçamento, tipografia e composição visual antes que conteúdo real esteja disponível.</p>

        <h3>Como usar o Gerador de Lorem Ipsum?</h3>
        <p>Use o Gerador selecionando a unidade: parágrafos, palavras, frases ou listas HTML. Configure a quantidade (1-100+). Opcionalmente, marque para incluir tags HTML (< p>, <li>) ao redor de cada unidade. Clique em "Gerar" e receba o Lorem Ipsum conforme especificado. Copie e cole em seu arquivo HTML, email, documento ou ferramenta de design para visualizar layout imediatamente.</p>

        <h3>Casos de uso práticos do Gerador de Lorem Ipsum</h3>
        <p>Lorem Ipsum é utilizado universalmente: mockups de site, emails, apresentações, prototipagem em Figma/Adobe XD, e testes A/B de layout. Qualquer designer profissional ou desenvolvedor precisa ter acesso rápido a um gerador de Lorem. Usar conteúdo real em estágios iniciais de design pode enviesar decisões de layout. Lorem Ipsum permite design objetivo focado apenas em estrutura e visual.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Ao criar mockups de e-mail marketing ou landing pages para varejistas, use Lorem Ipsum apenas nos blocos de texto editorial. Nas áreas de preço, CTA e headline, insira o texto real — mesmo que provisório. Clientes de varejo tomam decisões visuais olhando para preço e oferta, não para o layout em si, e texto real acelera a aprovação.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
