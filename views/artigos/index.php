<div class="kb-wrap kb-wrap--index">

    <header class="kb-hero">
        <h1 class="kb-hero-title">Base de Conhecimento</h1>
        <p class="kb-hero-desc">Artigos de profundidade sobre marketing digital, analytics e privacidade — escritos por quem gerencia a comunicação de grandes operações do varejo brasileiro.</p>
        <div class="kb-search-wrap">
            <svg class="kb-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" id="kb-search" class="kb-search-input" placeholder="Buscar artigos…" autocomplete="off">
        </div>
    </header>

    <nav class="kb-filter" aria-label="Filtrar por categoria">
        <button class="kb-filter-btn active" data-filter="todos">Todos</button>
        <button class="kb-filter-btn" data-filter="marketing">Marketing</button>
        <button class="kb-filter-btn" data-filter="desenvolvimento">Desenvolvimento</button>
        <button class="kb-filter-btn" data-filter="privacidade">Privacidade</button>
        <button class="kb-filter-btn" data-filter="varejo">Varejo</button>
        <button class="kb-filter-btn" data-filter="design">Design</button>
        <button class="kb-filter-btn" data-filter="seo">SEO</button>
        <button class="kb-filter-btn" data-filter="performance">Performance</button>
    </nav>

    <div class="kb-grid" id="kb-grid">

        <a href="<?= BASE_URL ?>artigos/utm-varejo-alto-volume" class="kb-card" data-category="marketing varejo" data-title="Estratégia de UTM para Varejo de Alto Volume: Como Grandes Redes Organizam Dados de Campanha">
            <span class="kb-badge kb-badge--marketing">Marketing</span>
            <h2 class="kb-card-title">Estratégia de UTM para Varejo de Alto Volume: Como Grandes Redes Organizam Dados de Campanha</h2>
            <p class="kb-card-desc">Quando você gerencia centenas de campanhas por semana, UTMs sem padrão viram caos de atribuição. Veja como estruturar uma taxonomia que escala — e como automatizar a geração para não errar.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">6 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/matematica-testes-ab" class="kb-card" data-category="marketing desenvolvimento" data-title="A Matemática por Trás dos Testes A/B: O que um Diretor de Marketing Precisa Saber">
            <span class="kb-badge kb-badge--desenvolvimento">Desenvolvimento</span>
            <h2 class="kb-card-title">A Matemática por Trás dos Testes A/B: O que um Diretor de Marketing Precisa Saber</h2>
            <p class="kb-card-desc">P-value, Z-score, significância estatística — sem fórmulas. Entenda por que uma diferença de taxa de conversão, sozinha, não significa nada, e o que você precisa olhar antes de escalar uma variante.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">7 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/privacidade-client-side-lgpd" class="kb-card" data-category="privacidade desenvolvimento" data-title="Privacidade Client-Side: Por que Processar Dados no Navegador é a Única Garantia de 100% de Conformidade com a LGPD">
            <span class="kb-badge kb-badge--privacidade">Privacidade</span>
            <h2 class="kb-card-title">Privacidade Client-Side: Por que Processar Dados no Navegador é a Única Garantia de 100% de Conformidade com a LGPD</h2>
            <p class="kb-card-desc">A maioria das ferramentas online trata seus dados em servidores de terceiros — o que constitui tratamento de dados pessoais nos termos da LGPD. Entenda a diferença arquitetural e o que isso significa juridicamente.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">6 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/psicologia-cores-varejo" class="kb-card" data-category="design varejo" data-title="A Psicologia das Cores no Varejo: Como Paletas Harmônicas Aumentam o Ticket Médio">
            <span class="kb-badge kb-badge--design">Design</span>
            <h2 class="kb-card-title">A Psicologia das Cores no Varejo: Como Paletas Harmônicas Aumentam o Ticket Médio</h2>
            <p class="kb-card-desc">Fluência de processamento, temperatura cromática e percepção de preço — como a escolha de paleta impacta o comportamento de compra e por que dissonância visual deprime o ticket médio.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">7 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/seguranca-client-side-hash" class="kb-card" data-category="desenvolvimento privacidade" data-title="Segurança Client-Side: Por Que Desenvolvedores Sêniores Não Usam Geradores de Hash que Processam no Servidor">
            <span class="kb-badge kb-badge--desenvolvimento">Desenvolvimento</span>
            <h2 class="kb-card-title">Segurança Client-Side: Por Que Desenvolvedores Sêniores Não Usam Geradores de Hash que Processam no Servidor</h2>
            <p class="kb-card-desc">Quando uma ferramenta de hash processa seu input em servidor remoto, ela recebe o dado original antes de retornar o hash. Web Crypto API, superfície de ataque e os limites do que é seguro client-side.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">7 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/seo-ecommerce-construcao-urls" class="kb-card" data-category="seo desenvolvimento" data-title="SEO para E-commerce de Construção: O Guia de URLs Amigáveis para 50.000 SKUs">
            <span class="kb-badge kb-badge--seo">SEO</span>
            <h2 class="kb-card-title">SEO para E-commerce de Construção: O Guia de URLs Amigáveis para 50.000 SKUs</h2>
            <p class="kb-card-desc">Catálogos de alto volume criam matrizes de URLs que diluem autoridade e desperdiçam crawl budget. Como estruturar hierarquia, slugs e canonicals para materiais de construção.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">8 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/atribuicao-vendas-ga4-utm" class="kb-card" data-category="marketing varejo" data-title="Atribuição de Vendas no GA4: Como o UTM em Massa Salva o ROI do Atacarejo">
            <span class="kb-badge kb-badge--marketing">Marketing</span>
            <h2 class="kb-card-title">Atribuição de Vendas no GA4: Como o UTM em Massa Salva o ROI do Atacarejo</h2>
            <p class="kb-card-desc">O modelo de atribuição padrão do GA4 distorce a realidade de operações de varejo com ciclos longos. Taxonomia UTM consistente, User-ID e leitura correta dos relatórios de atribuição.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">7 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/acessibilidade-wcag-negocio" class="kb-card" data-category="desenvolvimento" data-title="Acessibilidade Digital (WCAG) como Estratégia de Negócio, não apenas Compliance">
            <span class="kb-badge kb-badge--desenvolvimento">Desenvolvimento</span>
            <h2 class="kb-card-title">Acessibilidade Digital (WCAG) como Estratégia de Negócio, não apenas Compliance</h2>
            <p class="kb-card-desc">Contraste, navegação por teclado e alt text como alavancas de SEO, expansão de mercado e qualidade de código. O argumento de ROI para levar acessibilidade à diretoria.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">7 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/varejo-phygital-integracao-pdv" class="kb-card" data-category="varejo" data-title="Varejo Phygital: A Integração Real entre o PDV Físico e o Digital em Operações de Alto Volume">
            <span class="kb-badge kb-badge--varejo">Varejo</span>
            <h2 class="kb-card-title">Varejo Phygital: A Integração Real entre o PDV Físico e o Digital em Operações de Alto Volume</h2>
            <p class="kb-card-desc">Estoque em tempo real, Click & Collect, atribuição cross-channel e uso de dados de loja para segmentação digital. Phygital sem buzzword para operações com 50+ lojas.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">8 min de leitura</span>
            </footer>
        </a>

        <a href="<?= BASE_URL ?>artigos/core-web-vitals-varejo" class="kb-card" data-category="performance seo desenvolvimento" data-title="Core Web Vitals para Varejistas: Como a Velocidade de Carregamento Impacta Diretamente o Faturamento e a Conversão">
            <span class="kb-badge kb-badge--performance">Performance</span>
            <h2 class="kb-card-title">Core Web Vitals para Varejistas: Como a Velocidade de Carregamento Impacta Diretamente o Faturamento e a Conversão</h2>
            <p class="kb-card-desc">LCP, INP e CLS em termos de receita: cada 0,1s de melhoria impacta 8% de conversão. Roadmap de otimização de imagens, lazy loading e gestão de scripts de terceiros.</p>
            <footer class="kb-card-footer">
                <span class="kb-card-author">Carlos Zucolli</span>
                <span class="kb-card-sep">·</span>
                <span class="kb-card-time">8 min de leitura</span>
            </footer>
        </a>

    </div>

    <p class="kb-empty" id="kb-empty" style="display:none;">Nenhum artigo encontrado para essa busca.</p>

</div>
