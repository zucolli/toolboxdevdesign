<div class="card">
    <h1 class="card-title">Contador de Caracteres e Palavras</h1>
    <p class="card-description">Digite ou cole qualquer texto abaixo. As métricas e a densidade de palavras são atualizadas em tempo real.</p>

    <div class="wc-metrics">
        <div class="wc-metric-card">
            <span class="wc-metric-value" id="wc-chars">0</span>
            <span class="wc-metric-label">Caracteres</span>
        </div>
        <div class="wc-metric-card">
            <span class="wc-metric-value" id="wc-chars-no-space">0</span>
            <span class="wc-metric-label">Sem espaços</span>
        </div>
        <div class="wc-metric-card">
            <span class="wc-metric-value" id="wc-words">0</span>
            <span class="wc-metric-label">Palavras</span>
        </div>
        <div class="wc-metric-card">
            <span class="wc-metric-value" id="wc-lines">0</span>
            <span class="wc-metric-label">Linhas</span>
        </div>
        <div class="wc-metric-card">
            <span class="wc-metric-value" id="wc-read-time">0 seg</span>
            <span class="wc-metric-label">Leitura</span>
        </div>
    </div>

    <div class="form-group" style="margin-top: 20px;">
        <textarea
            id="wc-input"
            rows="10"
            placeholder="Cole ou digite seu texto aqui…"
        ></textarea>
    </div>

    <div class="checksum-block" id="wc-density-block">
        <div class="checksum-block-header">
            <span class="checksum-block-title">Top 5 — Densidade de Palavras</span>
        </div>
        <div class="wc-density-table-wrap">
            <table class="wc-density-table" id="wc-density-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Palavra</th>
                        <th>Ocorrências</th>
                        <th>Densidade</th>
                    </tr>
                </thead>
                <tbody id="wc-density-body">
                    <tr><td colspan="4" class="wc-density-empty">Digite algum texto para ver as palavras mais frequentes.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Como usar o Contador de Palavras</h2>
    <p>Basta colar ou digitar o texto na área acima. As métricas são calculadas instantaneamente no navegador — nenhum dado é enviado ao servidor.</p>

    <h3>Tempo estimado de leitura</h3>
    <p>Calculado com base em uma velocidade média de 200 palavras por minuto, referência utilizada em estudos de legibilidade e plataformas como Medium. Para textos técnicos, a velocidade real costuma ser mais baixa.</p>

    <h3>Densidade de palavras</h3>
    <p>A tabela mostra as 5 palavras mais frequentes, excluindo stopwords comuns do português (artigos, preposições e conjunções). Útil para identificar se uma palavra-chave está sendo usada com a frequência adequada em textos para SEO.</p>

    <h3>Usos comuns</h3>
    <p>Ideal para redatores que precisam respeitar limites de caracteres em meta descriptions (até 160 caracteres), títulos SEO (até 60 caracteres), posts de redes sociais ou campos de formulário com restrição de tamanho.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
