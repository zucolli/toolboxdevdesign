<div class="card">
    <h1 class="card-title">Gerador de UTM em Massa</h1>
    <p class="card-description">Cole várias URLs de uma vez, defina os parâmetros globais e gere todos os links rastreáveis em um clique.</p>

    <div class="form-group">
        <label class="form-label" for="bulk-utm-source">UTM Source <span class="required-mark">*</span></label>
        <input type="text" id="bulk-utm-source" placeholder="google, facebook, newsletter…">
    </div>

    <div class="form-group">
        <label class="form-label" for="bulk-utm-medium">UTM Medium <span class="required-mark">*</span></label>
        <input type="text" id="bulk-utm-medium" placeholder="cpc, email, organic…">
    </div>

    <div class="form-group">
        <label class="form-label" for="bulk-utm-campaign">UTM Campaign <span class="required-mark">*</span></label>
        <input type="text" id="bulk-utm-campaign" placeholder="black-friday-2025, lancamento-curso…">
    </div>

    <div class="bulk-utm-optional-row">
        <div class="form-group">
            <label class="form-label" for="bulk-utm-content">UTM Content <span class="field-hint-inline">(opcional)</span></label>
            <input type="text" id="bulk-utm-content" placeholder="banner-topo, cta-rodape…">
        </div>
        <div class="form-group">
            <label class="form-label" for="bulk-utm-term">UTM Term <span class="field-hint-inline">(opcional)</span></label>
            <input type="text" id="bulk-utm-term" placeholder="palavra-chave, remarketing…">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="bulk-utm-input">URLs de entrada <span class="required-mark">*</span></label>
        <textarea id="bulk-utm-input" rows="6" placeholder="https://digitallps.com.br/
https://nuato.com.br/contato
https://meusite.com.br/produto/camiseta"></textarea>
        <small class="field-hint">Uma URL por linha. URLs malformadas são ignoradas e reportadas.</small>
    </div>

    <div>
        <button id="btn-bulk-utm-generate" class="btn btn-primary" type="button">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            Gerar UTMs em Massa
        </button>
    </div>

    <div class="form-group" id="bulk-utm-output-group" style="margin-top:1.5rem; display:none;">
        <label class="form-label" for="bulk-utm-output">Links Gerados</label>
        <div class="input-copy-row input-copy-row--tall">
            <textarea id="bulk-utm-output" class="input-readonly" readonly rows="8"></textarea>
            <button id="btn-bulk-utm-copy" class="btn btn-secondary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                Copiar Todos
            </button>
        </div>
        <small id="bulk-utm-summary" class="field-hint"></small>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é o Gerador de UTM em Massa?</h2>
    <p>Esta ferramenta permite adicionar parâmetros UTM a dezenas de URLs de uma só vez. Em vez de construir cada link manualmente, você define Source, Medium e Campaign uma única vez e cola todas as suas URLs — o gerador aplica os parâmetros a cada linha automaticamente.</p>

    <h3>Quando usar</h3>
    <p>Ideal para campanhas de e-mail marketing com múltiplos CTAs, lançamentos de produtos com várias páginas de destino, ou relatórios de tráfego no GA4 onde você precisa rastrear diferentes pontos de entrada de uma mesma campanha.</p>

    <h3>Como funciona</h3>
    <p>Preencha os campos obrigatórios (Source, Medium, Campaign) e cole suas URLs no campo de entrada. URLs que já possuem query string recebem os parâmetros via <code>&amp;</code>; URLs sem query string recebem via <code>?</code>. Linhas em branco e URLs malformadas são descartadas e contabilizadas no resumo.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de UTM em Massa?</h3>
        <p>O Gerador de UTM em Massa é uma ferramenta que economiza horas de trabalho manual para profissionais de marketing que gerenciam múltiplas campanhas. Ao invés de gerar UTMs uma por uma, você pode adicionar parâmetros UTM a dezenas de URLs simultaneamente. Isso é especialmente útil em campanhas de e-mail marketing, redes de afiliados e estratégias de tráfego pago onde você precisa rastrear múltiplos destinos.</p>

        <h3>Como usar o Gerador de UTM em Massa?</h3>
        <p>Use a ferramenta listando múltiplas URLs (uma por linha) e configurando os parâmetros UTM: source (origem), medium (meio) e campaign (campanha). Opcionalmente, adicione term e content para segmentação granular. Clique em "Gerar" e a ferramenta retorna todas as URLs com UTM adicionados e codificados corretamente. Você pode copiar o resultado completo ou baixar como arquivo de texto.</p>

        <h3>Casos de uso práticos do Gerador de UTM em Massa</h3>
        <p>Campanha de e-mail marketing com 50 destinos diferentes exigiria 50 UTMs feitos manualmente — tarefa chata e propensa a erros. Profissionais de marketing usam geradores de UTM em massa para agilizar workflow, reduzir tempo de setup e garantir consistência nos parâmetros. Analytics de campanhas grandes é impossível sem UTMs, então essa ferramenta é crítica para qualquer operação de marketing escalada.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
