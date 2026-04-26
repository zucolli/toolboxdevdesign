<div class="card">
    <h1 class="card-title">URL Parser</h1>
    <p class="card-description">Cole uma URL completa para desmembrá-la em seus componentes instantaneamente.</p>

    <div class="form-group">
        <label class="form-label" for="parser-input">URL Completa</label>
        <input type="url" id="parser-input" placeholder="https://nuato.com:8080/servicos?utm_source=google#contato" autofocus>
    </div>

    <div id="parser-results" hidden>
        <div class="parser-section">
            <span class="parser-section-title">Componentes</span>
            <div class="parser-components">
                <div class="parser-field">
                    <span class="parser-field-label">Protocolo</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-protocol" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-protocol" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Domínio (hostname)</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-hostname" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-hostname" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Porta</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-port" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-port" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Caminho (pathname)</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-pathname" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-pathname" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Hash / Fragmento</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-hash" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-hash" type="button">Copiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="parser-section" id="parser-params-section">
            <span class="parser-section-title">Query Params</span>
            <div id="parser-params" class="parser-params-list"></div>
        </div>
    </div>

    <p id="parser-hint" class="parser-hint">Aguardando uma URL válida…</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um URL Parser?</h2>
    <p>Um URL Parser decompõe uma URL completa em seus componentes individuais conforme a RFC 3986: protocolo (scheme), domínio (hostname), porta, caminho (pathname), query string (parâmetros) e fragmento (hash). Isso facilita a inspeção e o debugging de URLs complexas.</p>

    <h3>Onde e por que usar?</h3>
    <p>Fundamental para desenvolvedores back-end e front-end ao trabalhar com APIs, redirects, configurações de CORS e autenticação OAuth. Útil também para times de marketing e SEO que precisam auditar parâmetros UTM ou entender a estrutura de URLs de e-commerce. Ao integrar sistemas externos, entender cada parte da URL evita erros difíceis de debugar.</p>

    <h3>Como funciona?</h3>
    <p>Cole qualquer URL no campo acima (incluindo o protocolo, ex: <code>https://</code>). A ferramenta usa a API nativa <code>URL</code> do navegador para fazer o parse em tempo real e exibe cada componente em campos separados, com botão de cópia individual. Os query params são listados como pares chave=valor para fácil leitura.</p>

    <section class="tool-seo-content">
        <h3>O que é o URL Parser?</h3>
        <p>O URL Parser é uma ferramenta essencial para desenvolvedores que precisam analisar e compreender a estrutura de URLs complexas. Ela desmembra uma URL em seus componentes constitutivos: protocolo (http/https), host/domínio, caminho (path), parâmetros de query string, fragmento (hash) e porta. Compreender a anatomia de uma URL é fundamental para debugging de APIs, análise de links e trabalho com roteamento web.</p>

        <h3>Como usar o URL Parser?</h3>
        <p>Para usar o URL Parser, copie e cole a URL completa no campo de entrada. A ferramenta analisa instantaneamente a URL e exibe cada componente em seções separadas: protocolo, host, porta, caminho, query parameters (com nomes e valores) e fragmento. É possível visualizar e copiar cada parte individualmente, facilitando extração de dados e debugging de requisições.</p>

        <h3>Casos de uso práticos do URL Parser</h3>
        <p>URLs parser são ferramentas indispensáveis em debugging de aplicações web. Quando uma requisição à API falha, o parser ajuda a identificar rapidamente qual parte da URL está incorreta. Em análise de links, permite extrair domínio, verificar parâmetros de tracking (UTM) ou identificar redirecionamentos. Desenvolvedores Node.js, Python e linguagens web utilizam parsers em suas aplicações diariamente.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Antes de lançar qualquer campanha de mídia paga para grandes varejistas, use o parser para auditar todas as URLs de destino. Uma landing page com parâmetros UTM quebrados ou um redirecionamento inesperado pode desperdiçar dezenas de milhares de reais em verba sem gerar nenhum dado de retorno. Auditoria de URL é a primeira checklist antes de qualquer go-live.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
