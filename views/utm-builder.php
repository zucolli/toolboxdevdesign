<div class="card">
    <h1 class="card-title">Gerador de UTMs</h1>
    <p class="card-description">Preencha os campos abaixo para criar uma URL rastreável para suas campanhas. Os campos marcados com <span class="required-mark">*</span> são obrigatórios.</p>

    <div class="utm-grid">
        <div class="form-group">
            <label class="form-label" for="utm-url">URL do Site <span class="required-mark">*</span></label>
            <input type="url" id="utm-url" placeholder="https://meusite.com/pagina">
        </div>

        <div class="utm-section-label">Parâmetros obrigatórios</div>

        <div class="utm-fields-group">
            <div class="form-group">
                <label class="form-label" for="utm-source">Campaign Source <span class="required-mark">*</span></label>
                <input type="text" id="utm-source" placeholder="google, newsletter, instagram">
                <small class="field-hint">utm_source — identifica o canal de tráfego</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-medium">Campaign Medium <span class="required-mark">*</span></label>
                <input type="text" id="utm-medium" placeholder="cpc, email, social">
                <small class="field-hint">utm_medium — identifica a mídia da campanha</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-campaign">Campaign Name <span class="required-mark">*</span></label>
                <input type="text" id="utm-campaign" placeholder="black_friday, lancamento_2025">
                <small class="field-hint">utm_campaign — nome da campanha</small>
            </div>
        </div>

        <div class="utm-section-label utm-section-label--optional">Parâmetros opcionais</div>

        <div class="utm-fields-group">
            <div class="form-group">
                <label class="form-label" for="utm-term">Campaign Term</label>
                <input type="text" id="utm-term" placeholder="sapatos esportivos">
                <small class="field-hint">utm_term — palavras-chave pagas</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="utm-content">Campaign Content</label>
                <input type="text" id="utm-content" placeholder="banner_topo, link_bio">
                <small class="field-hint">utm_content — diferencia anúncios ou links</small>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top: 1.5rem;">
        <label class="form-label" for="utm-output">URL gerada</label>
        <div class="input-copy-row input-copy-row--tall">
            <textarea
                id="utm-output"
                class="input-readonly"
                readonly
                rows="3"
                placeholder="Preencha os campos obrigatórios para gerar a URL…"
            ></textarea>
            <button id="btn-copy-utm" class="btn btn-secondary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copiar
            </button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que são Parâmetros UTM?</h2>
    <p>UTM (Urchin Tracking Module) são parâmetros adicionados ao final de uma URL para identificar a origem do tráfego no Google Analytics 4 e outras plataformas de analytics. Permitem saber exatamente de qual campanha, canal e fonte veio cada visita ao seu site.</p>

    <h3>Onde e por que usar?</h3>
    <p>Use parâmetros UTM em toda campanha de marketing digital: links em e-mails marketing (<code>utm_medium=email</code>), anúncios pagos no Google Ads (<code>utm_medium=cpc</code>), posts em redes sociais (<code>utm_medium=social</code>), parceiros e afiliados. Sem UTMs, o Google Analytics agrupa essas visitas como "direct" ou "referral", impossibilitando a análise de ROI por campanha.</p>

    <h3>Como funcionar?</h3>
    <p>Preencha a URL de destino e os três campos obrigatórios: <strong>Source</strong> (quem enviou o tráfego, ex: google), <strong>Medium</strong> (o tipo de mídia, ex: cpc) e <strong>Campaign</strong> (o nome da campanha). Os campos Term e Content são opcionais e servem para distinguir anúncios dentro da mesma campanha.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de UTMs?</h3>
        <p>O Gerador de UTMs é uma ferramenta indispensável para profissionais de marketing digital que utilizam Google Analytics 4 para rastrear campanhas. UTM (Urchin Tracking Module) são parâmetros adicionados às URLs que permitem identificar a origem, meio e conteúdo do tráfego. Com uma ferramenta de geração de UTMs, você cria links rastreáveis com apenas alguns cliques, sem risco de erros de digitação.</p>

        <h3>Como usar o Gerador de UTMs?</h3>
        <p>Para utilizar o Gerador de UTMs, insira a URL base, o nome da campanha (utm_campaign), a fonte (utm_source) como "facebook" ou "email", e o meio (utm_medium) como "cpc" ou "organic". Opcionalmente, adicione termo-chave (utm_term) e conteúdo (utm_content) para segmentação mais granular. A ferramenta gera automaticamente a URL completa com todos os parâmetros UTM encodados corretamente.</p>

        <h3>Casos de uso práticos do Gerador de UTMs</h3>
        <p>UTMs são essenciais para qualquer estratégia de marketing baseada em dados. Você pode rastrear performance de anúncios pagos, e-mail marketing, posts em redes sociais e campanhas específicas com precisão. Os dados coletados permitem calcular ROI por canal, otimizar orçamento de publicidade e identificar qual campanha gera melhor retorno, resultando em decisões estratégicas mais informadas.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>No varejo, use sempre o parâmetro <code>utm_content</code> para identificar se o clique veio do preço ou da foto do produto no seu tabloide digital. Em campanhas de Black Friday com múltiplos criativos simultâneos, esse parâmetro revela qual elemento visual realmente converte — e essa informação vale mais do que qualquer teste de suposição.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
