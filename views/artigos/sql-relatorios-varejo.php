<?php
$_artigoData = '2025-07-31';
$_artigoCategoria = 'Desenvolvimento';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">SQL e Data-Driven Marketing: Relatórios Que Orientam Verba no Varejo de Alto Volume</h1>
    <p class="card-description">Queries SQL escritas por analistas diferentes ao longo de anos, sem padrão, sem documentação, impossíveis de auditar. Veja como a implantação de um padrão de formatação SQL transformou os relatórios de performance de campanha de uma rede de atacarejo — e as queries que todo time de marketing de varejo deveria ter.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>O Custo da Query Ilegível</h2>
    <p>Em uma consultoria de dados para uma grande rede de atacarejo, encontramos um repositório de queries SQL que ninguém na equipe atual conseguia explicar completamente. Eram 47 queries de relatório, produzidas por ao menos 5 analistas diferentes ao longo de 3 anos, sem padronização de formatação, sem comentários, sem documentação de propósito.</p>
    <p>Algumas usavam keywords em minúsculas, outras em maiúsculas. Algumas indentavam com 2 espaços, outras com tab, outras não indentavam. Aliases de tabela eram letras únicas (<code>a</code>, <code>b</code>, <code>c</code>) sem relação com o nome da tabela — <code>a.valor_total</code> em uma join de 4 tabelas era indecifrável sem rastrear de onde <code>a</code> vinha. Subconsultas eram aninhadas em sequência sem breaks de linha.</p>
    <p>O problema real: toda vez que um relatório precisava ser modificado para uma nova campanha ou período, o analista responsável passava entre 45 minutos e 3 horas apenas entendendo a query existente antes de poder alterá-la. Considerando que a equipe rodava entre 8 e 15 relatórios de campanha por semana, o tempo desperdiçado em interpretação de código ilegível era considerável — e o risco de erro na modificação era alto.</p>

    <h2>Padrão de Formatação SQL para Legibilidade</h2>
    <p>O padrão que implantamos, inspirado nas convenções do SQL Style Guide de Simon Holywell e adaptado para o contexto de dados de varejo:</p>
    <pre><code>-- Relatório: Conversão por Canal — Campanha Black Friday 2024
-- Criado por: Equipe Analytics | Atualizado: 2024-11-30
-- Propósito: Performance de aquisição por canal de mídia paga

SELECT
    sessao.utm_source         AS canal,
    sessao.utm_medium         AS medio,
    sessao.utm_campaign       AS campanha,
    COUNT(DISTINCT sessao.id) AS total_sessoes,
    COUNT(DISTINCT pedido.id) AS total_pedidos,
    SUM(pedido.valor_total)   AS receita_total,
    ROUND(
        COUNT(DISTINCT pedido.id) * 100.0 /
        NULLIF(COUNT(DISTINCT sessao.id), 0),
        2
    )                         AS taxa_conversao_pct

FROM sessoes AS sessao
LEFT JOIN pedidos AS pedido
    ON pedido.sessao_id = sessao.id
    AND pedido.status NOT IN ('cancelado', 'estornado')

WHERE
    sessao.data_hora >= '2024-11-28 00:00:00'
    AND sessao.data_hora <  '2024-12-02 00:00:00'
    AND sessao.utm_campaign LIKE 'black-friday%'

GROUP BY
    sessao.utm_source,
    sessao.utm_medium,
    sessao.utm_campaign

ORDER BY
    receita_total DESC;</code></pre>
    <p>As regras fundamentais do padrão: keywords SQL em maiúsculas, aliases descritivos (o nome da tabela, não uma letra), alinhamento de AS nas colunas do SELECT para facilitar leitura vertical, comentário de cabeçalho com propósito e autor, cada cláusula em linha própria.</p>

    <h2>Queries Essenciais para Marketing de Varejo</h2>

    <h3>Conversão por Canal de Aquisição</h3>
    <p>A query acima é o ponto de partida. Para campanhas de varejo de alto volume, adicione a coluna de ROAS (Return on Ad Spend) quando a tabela de custos de mídia estiver disponível:</p>
    <pre><code>ROUND(
    SUM(pedido.valor_total) / NULLIF(SUM(custo.valor_investido), 0),
    2
) AS roas</code></pre>

    <h3>LTV de Cliente por Segmento</h3>
    <pre><code>-- LTV médio por segmento de cliente — últimos 12 meses
SELECT
    cliente.segmento,
    COUNT(DISTINCT cliente.id)              AS total_clientes,
    COUNT(DISTINCT pedido.id)               AS total_pedidos,
    ROUND(AVG(pedido.valor_total), 2)       AS ticket_medio,
    ROUND(SUM(pedido.valor_total)
          / COUNT(DISTINCT cliente.id), 2)  AS ltv_medio_12m,
    ROUND(COUNT(DISTINCT pedido.id) * 1.0
          / COUNT(DISTINCT cliente.id), 1)  AS frequencia_compra

FROM clientes AS cliente
INNER JOIN pedidos AS pedido
    ON pedido.cliente_id = cliente.id
    AND pedido.status = 'entregue'
    AND pedido.data_pedido >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)

GROUP BY
    cliente.segmento

ORDER BY
    ltv_medio_12m DESC;</code></pre>

    <h3>Performance por Categoria de Produto em Campanhas</h3>
    <pre><code>-- Quais categorias convertem melhor em cada canal de campanha
SELECT
    campanha.utm_source        AS canal,
    produto.categoria_nivel_1  AS categoria,
    COUNT(DISTINCT item.id)    AS itens_vendidos,
    SUM(item.quantidade)       AS unidades_totais,
    SUM(item.valor_total)      AS receita_categoria,
    ROUND(
        SUM(item.valor_total) * 100.0 /
        SUM(SUM(item.valor_total)) OVER (PARTITION BY campanha.utm_source),
        1
    )                          AS pct_receita_no_canal

FROM sessoes AS campanha
INNER JOIN pedidos AS pedido
    ON pedido.sessao_id = campanha.id
    AND pedido.status NOT IN ('cancelado', 'estornado')
INNER JOIN itens_pedido AS item
    ON item.pedido_id = pedido.id
INNER JOIN produtos AS produto
    ON produto.id = item.produto_id

WHERE
    campanha.data_hora >= '2024-11-28'
    AND campanha.utm_campaign LIKE 'black-friday%'

GROUP BY
    campanha.utm_source,
    produto.categoria_nivel_1

ORDER BY
    canal, receita_categoria DESC;</code></pre>

    <h2>Por Que SQL Supera Planilhas na Análise de Varejo de Alto Volume</h2>
    <p>A pergunta mais comum quando implantamos padrões SQL em equipes de marketing de varejo é: por que não usar planilhas? A resposta tem três dimensões:</p>
    <p><strong>Volume:</strong> Uma rede de atacarejo com 300 lojas pode gerar 50.000 a 200.000 transações por dia. Planilhas Excel têm limite de 1,04 milhão de linhas — o que representa menos de 6 dias de dados em volumes altos. SQL processa bilhões de registros sem limite prático de memória local.</p>
    <p><strong>Reprodutibilidade:</strong> Uma query SQL é exatamente reproduzível — executar a mesma query amanhã com os mesmos filtros produz o mesmo resultado (para dados históricos). Uma análise em planilha depende de processos manuais de atualização, cópia e filtro, com risco de erro humano a cada iteração.</p>
    <p><strong>Auditabilidade:</strong> Uma query SQL bem formatada documenta a lógica de negócio — quais status de pedido são excluídos, qual é o período exato, como os segmentos são definidos. Uma planilha com filtros aplicados e linhas ocultas raramente preserva essa rastreabilidade.</p>

    <h2>Documente Queries com Comentários Inline</h2>
    <p>O padrão mínimo de documentação que exigimos em todas as queries de relatório de varejo: cabeçalho com propósito, autor e data; comentário inline em joins ou filtros não-óbvios; e comentário de alerta quando há uma regra de negócio específica do cliente codificada na query.</p>
    <pre><code>-- ATENÇÃO: Status 'reservado' conta como venda confirmada
-- para fins de meta (alinhado com diretoria comercial em 2024-03-15)
WHERE pedido.status IN ('entregue', 'em_transito', 'reservado')</code></pre>

    <h2>Formate Suas Queries com a Ferramenta</h2>
    <p>O <a href="<?= BASE_URL ?>sql-formatter">SQL Formatter da Toolbox Dev Design</a> aplica automaticamente o padrão de formatação descrito neste artigo: keywords maiúsculas, indentação consistente, um campo por linha no SELECT. Cole qualquer query — por mais comprimida que esteja — e obtenha a versão formatada e legível em segundos.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">Qual banco de dados é mais comum em sistemas de varejo brasileiro?</h3>
            <p class="faq-resposta">MySQL e Microsoft SQL Server dominam os ERPs de varejo no Brasil — sistemas como Totvs, Senior e Oracle Retail geralmente usam um desses como backend. PostgreSQL é comum em startups de varejo e fintechs de cashback. A sintaxe das queries de relatório é quase idêntica entre os três para as operações de análise mais comuns (SELECT, JOIN, GROUP BY, window functions). As principais diferenças aparecem em funções de data: DATE_SUB no MySQL, DATEADD no SQL Server, DATE_TRUNC no PostgreSQL.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como evitar que uma query pesada trave o banco de dados de produção?</h3>
            <p class="faq-resposta">Nunca execute queries analíticas pesadas diretamente no banco de produção de um varejista de alto volume. As opções: 1) réplica de leitura (read replica) — a maioria dos ERPs modernos oferece; 2) data warehouse separado (Google BigQuery, Amazon Redshift, Snowflake) para análises — dados sincronizados via ETL; 3) janela de execução fora do horário de pico (madrugada). Para verificações rápidas e pontuais, adicione LIMIT na query para evitar varreduras de tabela completa acidentais.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como calcular o LTV de cliente quando existem devoluções e cancelamentos?</h3>
            <p class="faq-resposta">A abordagem mais precisa para varejo é usar apenas pedidos com status final positivo (entregue, concluído) e deduzir o valor de devoluções processadas. Em SQL, isso se traduz em um LEFT JOIN com a tabela de devoluções e subtração dos valores correspondentes. Para redes com alta taxa de cancelamento (como e-commerce de eletrônicos no período de troca pós-feriado), o LTV calculado sem excluir cancelamentos superestima o valor real do cliente em 15% a 40%.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">O SQL Formatter pode ser usado para queries de BigQuery ou DuckDB?</h3>
            <p class="faq-resposta">Sim — a formatação de SQL padrão (ANSI SQL) é compatível com BigQuery, DuckDB, Snowflake e a maioria dos dialetos modernos. O formatador aplica regras de indentação e capitalização de keywords que são válidas em todos esses ambientes. Sintaxes específicas de dialeto (como QUALIFY no BigQuery ou UNNEST em arrays) são preservadas sem modificação, apenas formatadas para legibilidade.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em uma rede de atacarejo com centenas de lojas, o time de analytics tinha acumulado um portfólio de 47 queries SQL ao longo de 3 anos, produzidas por diferentes analistas sem nenhum padrão estabelecido. A rotatividade da equipe significava que boa parte do conhecimento sobre o que cada query fazia estava na cabeça de pessoas que haviam saído. Quando o time atual precisava adaptar uma query de campanha para um novo período ou segmento, o processo de entendimento da lógica existente tomava mais tempo que a própria modificação.</p>
    <p>Implantamos um padrão de formatação e documentação em duas etapas. Primeiro, as 47 queries existentes foram reformatadas com o padrão descrito neste artigo — keywords maiúsculas, aliases descritivos, cabeçalhos de documentação, comentários inline em regras de negócio não-óbvias. O trabalho de reformatação pura levou 3 dias de um analista sênior. Segundo, o padrão foi documentado em um guia interno de 2 páginas e incluído no processo de code review de todas as queries novas.</p>
    <p>O resultado medido em 60 dias: o tempo médio de adaptação de uma query existente para um novo relatório caiu de 85 minutos para 22 minutos. A taxa de erro em modificações — queries que retornavam resultados incorretos por misinterpretação da lógica original — caiu de 23% para 4%. Mais importante: a equipe passou a construir um repertório compartilhado de queries reutilizáveis, reduzindo a duplicação de esforço. Uma query de conversão por canal bem documentada passou a ser base para 11 relatórios derivados em 6 meses.</p>
</div>

<?php require BASE_PATH . '/views/artigos/_autor-box.php'; ?>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Qual banco de dados é mais comum em sistemas de varejo brasileiro?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "MySQL e Microsoft SQL Server dominam os ERPs de varejo no Brasil — sistemas como Totvs, Senior e Oracle Retail geralmente usam um desses como backend. PostgreSQL é comum em startups de varejo e fintechs de cashback."
            }
        },
        {
            "@type": "Question",
            "name": "Como evitar que uma query pesada trave o banco de dados de produção?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Nunca execute queries analíticas pesadas diretamente no banco de produção de um varejista de alto volume. As opções incluem: réplica de leitura, data warehouse separado para análises, ou janela de execução fora do horário de pico."
            }
        },
        {
            "@type": "Question",
            "name": "Como calcular o LTV de cliente quando existem devoluções e cancelamentos?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "A abordagem mais precisa para varejo é usar apenas pedidos com status final positivo e deduzir o valor de devoluções processadas. Para redes com alta taxa de cancelamento, o LTV calculado sem excluir cancelamentos superestima o valor real do cliente em 15% a 40%."
            }
        },
        {
            "@type": "Question",
            "name": "O SQL Formatter pode ser usado para queries de BigQuery ou DuckDB?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Sim — a formatação de SQL padrão ANSI é compatível com BigQuery, DuckDB, Snowflake e a maioria dos dialetos modernos. Sintaxes específicas de dialeto são preservadas sem modificação, apenas formatadas para legibilidade."
            }
        }
    ]
}
</script>
