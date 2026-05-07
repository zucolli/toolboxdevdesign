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

    </div>

    <p class="kb-empty" id="kb-empty" style="display:none;">Nenhum artigo encontrado para essa busca.</p>

</div>
