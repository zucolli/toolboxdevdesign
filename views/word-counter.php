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

    <section class="tool-seo-content">
        <h3>O que é o Contador de Caracteres e Palavras?</h3>
        <p>O Contador de Caracteres e Palavras é uma ferramenta essencial para redatores, profissionais de SEO e copywriters que precisam monitorar comprimento e densidade de palavras em textos. A ferramenta conta em tempo real: número de caracteres (com e sem espaços), palavras, linhas, tempo estimado de leitura e frequência de palavras mais utilizadas. Essas métricas são críticas para otimização de conteúdo e SEO.</p>

        <h3>Como usar o Contador de Caracteres e Palavras?</h3>
        <p>Cole ou digite seu texto no campo de entrada. A ferramenta exibe instantaneamente todas as métricas: caracteres totais, caracteres sem espaços, número de palavras, número de linhas, e tempo de leitura estimado (baseado em velocidade média de leitura). Visualize um gráfico de densidades das palavras mais frequentes, ajudando a identificar repetição excessiva de palavras-chave.</p>

        <h3>Casos de uso práticos do Contador de Caracteres e Palavras</h3>
        <p>Profissionais de SEO usam contadores de palavra para otimizar conteúdo. Google rewards conteúdo detalhado (2000+ palavras) mas penaliza keyword stuffing (repetição excessiva). Copywriters precisam contar palavras para atender requisitos de comprimento. Redatores de redes sociais monitoram caracteres para caber em limites de plataforma. Publicadores que acompanham tempo de leitura criam melhor experiência de usuário.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Controle de Tamanho de Copy para Template Fixo de E-mail Marketing de Grande Varejista</h3>
    <p>Uma grande rede varejista de eletrodomésticos utilizava um template de e-mail marketing desenvolvido internamente com campos de texto de tamanho fixo e rígido — um modelo aprovado pelo departamento de TI e integrado ao sistema de CRM proprietário da rede. Os limites de caracteres não eram arbitrários: o subject line era cortado em mobile acima de 50 caracteres pelo Gmail e pelo Outlook Mobile, o preview text era truncado após 90 caracteres na maioria dos clientes de e-mail, e o CTA do botão principal tinha espaço para no máximo 25 caracteres considerando o padding do botão no layout. O problema recorrente era que os redatores entregavam copy fora dessas restrições — resultando em e-mails com subject cortado no meio de uma palavra ou CTAs com texto vazando para fora do botão no mobile.</p>
    <p>A NuAto estruturou um protocolo de validação de copy usando o Contador de Palavras e Caracteres como ferramenta obrigatória antes da entrega de qualquer texto de e-mail. O fluxo era direto: o redator colava o subject line na ferramenta e verificava se estava abaixo de 50 caracteres. Depois colava o preview text e confirmava que não ultrapassava 90 caracteres. Por fim, colava o texto do CTA e verificava o limite de 25 caracteres. Para cada campo fora do limite, o redator reescrevia antes de enviar para aprovação. A ferramenta também era usada para monitorar a contagem de palavras do corpo do e-mail — a equipe tinha a diretriz interna de manter o corpo entre 80 e 120 palavras para garantir legibilidade em mobile sem scroll excessivo.</p>
    <p>Após três meses de uso do protocolo de validação, as solicitações de revisão de copy por problemas de tamanho caíram 94% — de uma média de 17 revisões por mês para 1 revisão em média. O time de design de e-mail relatou redução significativa no retrabalho de ajuste de botão e header por conta de texto fora do padrão. A métrica mais relevante foi a de taxa de clique no CTA: com o texto do botão consistentemente dentro do limite e sem truncamento visual, o CTR médio do botão principal subiu de 2,1% para 2,8% — um ganho de 33% sem nenhuma mudança criativa além do controle de tamanho.</p>
    <ul>
        <li>Limites controlados: subject ≤50 chars, preview text ≤90 chars, CTA ≤25 chars</li>
        <li>Revisões por problema de tamanho: de 17/mês para 1/mês (redução de 94%)</li>
        <li>CTR do botão principal: de 2,1% para 2,8% (+33%)</li>
        <li>Corpo do e-mail mantido entre 80 e 120 palavras para legibilidade em mobile</li>
    </ul>
    <p>Copy de e-mail marketing escrito sem validação de tamanho é uma fonte constante de retrabalho e de degradação de métricas em varejistas com templates fixos. O contador de caracteres não é uma ferramenta de revisão — é uma ferramenta de prevenção que deve fazer parte do fluxo de criação desde o primeiro rascunho.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Para páginas de categoria e fichas técnicas em e-commerce, a faixa ideal é de 300 a 500 palavras de texto editorial, excluindo listagens de produto. Abaixo disso, o Google pode tratar como thin content e deprioritizar a indexação. Acima de 800 palavras na ficha técnica, o texto compete com o botão de compra pela atenção do usuário — equilíbrio é a chave para converter e ranquear.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
