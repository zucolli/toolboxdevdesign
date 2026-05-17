<?php
$_artigoData = '2025-05-08';
$_artigoCategoria = 'Desenvolvimento';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">JSON em Feeds de Produto: Integração Sem Erros em Redes de Varejo</h1>
    <p class="card-description">Um campo malformado em um feed JSON de 50.000 produtos pode derrubar toda a integração com o Google Shopping — e manter 50 mil SKUs invisíveis por horas. Este artigo mostra como validar, depurar e monitorar feeds JSON de produto em operações de varejo de alto volume.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>Quando Um Campo Derruba 50.000 Produtos</h2>
    <p>O feed JSON é gerado pelo ERP às 23h, processado pelo Google Merchant Center às 00h30, e qualquer erro de sintaxe faz o Merchant Center rejeitar o arquivo inteiro — não o produto com erro, o arquivo inteiro. São 50.000 produtos fora do Google Shopping até o próximo ciclo de processamento, 24 horas depois.</p>
    <p>Foi exatamente isso que aconteceu em uma das integrações que gerenciamos para um grande varejista brasileiro. O campo <code>description</code> de um produto de categoria "Decoração" continha uma aspa dupla literal não escapada — o nome do produto era algo como <code>Espelho "Veneza" 60x80</code>, e a pessoa que cadastrou no ERP usou aspas tipográficas que, ao serem exportadas como UTF-8, quebravam a estrutura JSON.</p>
    <p>O feed ficou fora por 11 horas — das 00h30 até o time de desenvolvimento identificar e corrigir o problema às 11h40 do dia seguinte. Nenhum alerta automático foi disparado porque o sistema de monitoramento verificava apenas se o arquivo havia sido enviado, não se havia sido aceito. Aquelas 11 horas de invisibilidade custaram uma estimativa de 8.400 impressões perdidas no Google Shopping durante o horário de pico matinal.</p>

    <h2>Campos Obrigatórios do Google Shopping Feed</h2>
    <p>O Google Merchant Center tem requisitos específicos para feeds de produto. Os campos obrigatórios para feed estruturado em JSON ou XML:</p>
    <ul>
        <li><strong>id</strong> — identificador único do produto. Use o SKU do ERP. Nunca use IDs sequenciais que podem se repetir após migração de sistema.</li>
        <li><strong>title</strong> — nome do produto. Máximo 150 caracteres. Evite caracteres especiais, aspas e simbolos promocionais ("PROMOÇÃO!", "MELHOR PREÇO") — o Merchant Center penaliza títulos com linguagem promocional.</li>
        <li><strong>description</strong> — descrição do produto. Máximo 5.000 caracteres. Texto plano — sem HTML, sem markdown. Aspas dentro da descrição devem ser escapadas (<code>\"</code>) ou substituídas por aspas tipográficas Unicode.</li>
        <li><strong>link</strong> — URL da página do produto. Deve corresponder exatamente à URL indexada, incluindo protocolo (https) e sem redirecionamentos.</li>
        <li><strong>image_link</strong> — URL da imagem principal. Mínimo 100×100 px para produtos não-moda; mínimo 250×250 px recomendado. HTTPS obrigatório.</li>
        <li><strong>price</strong> — preço no formato <code>99.90 BRL</code>. Ponto como separador decimal, espaço antes da moeda. NUNCA vírgula como separador decimal.</li>
        <li><strong>availability</strong> — <code>in_stock</code>, <code>out_of_stock</code> ou <code>preorder</code>. Produto marcado como <code>in_stock</code> com estoque zero causa penalidade de qualidade no Merchant Center.</li>
    </ul>

    <h2>Caracteres que Quebram JSON em Feeds de Varejo</h2>
    <p>Feeds gerados por ERPs de varejo têm padrões específicos de quebra. Os ofensores mais comuns em catálogos brasileiros:</p>
    <ul>
        <li><strong>Aspas duplas não escapadas:</strong> produto com nome <code>Perfil "T" 3m</code> quebra qualquer parser JSON. Escape: <code>Perfil \"T\" 3m</code> ou substitua por aspas simples.</li>
        <li><strong>Caracteres de controle:</strong> tabs (<code>\t</code>) e quebras de linha (<code>\n</code>, <code>\r</code>) inseridos em campos de texto pelo sistema de cadastro. Comum em campos de descrição copiados de PDF ou Word. Um <code>\r\n</code> literal dentro de uma string JSON é inválido e quebra silenciosamente em alguns parsers.</li>
        <li><strong>BOM (Byte Order Mark):</strong> arquivos exportados pelo Excel com codificação UTF-8 com BOM incluem os bytes <code>EF BB BF</code> no início do arquivo. O parser JSON rejeita o arquivo por "caractere inesperado antes de {". Remova o BOM na exportação ou no pré-processamento.</li>
        <li><strong>Barra invertida não escapada:</strong> campos de dimensão como "30cm × 20cm × 15cm" viram problemas quando o ×  é substituído por <code>\x</code> por algum sistema intermediário. Barra invertida em JSON é caractere de escape — precisa ser escapada como <code>\\</code>.</li>
        <li><strong>Encoding misto:</strong> um campo em UTF-8 e outro em ISO-8859-1 no mesmo arquivo é o tipo de bug que só aparece em produtos com cedilha ou ã — e que se manifesta apenas para parte do catálogo, tornando o diagnóstico difícil.</li>
    </ul>

    <h2>Formatação de Preço: O Campo que Mais Causa Rejeição</h2>
    <p>O campo de preço no Google Shopping Feed tem formato rigoroso: <code>99.90 BRL</code>. Ponto decimal, espaço, código ISO de moeda. Sem vírgula, sem R$, sem formatação de moeda local.</p>
    <p>ERPs brasileiros exportam preço como <code>99,90</code> — com vírgula decimal, padrão local. O feed que usa esse formato é rejeitado. A transformação precisa acontecer no pipeline de exportação, não manualmente.</p>
    <p>Outro problema comum: preços com 4 casas decimais por arredondamento de ponto flutuante. O ERP exporta <code>99.9000000000001</code> porque a representação interna de 99,90 em ponto flutuante tem esse comportamento. O Google Merchant Center aceita até 2 casas decimais — qualquer coisa além disso pode ser rejeitado dependendo da versão do parser.</p>
    <p>Use o <a href="<?= BASE_URL ?>json-formatter">Formatador e Validador JSON</a> para verificar a estrutura do seu feed antes de submetê-lo ao Merchant Center. Cole um exemplo do feed e o validador identifica imediatamente erros de sintaxe, campos malformados e caracteres inválidos.</p>

    <h2>Validação de Feed Antes do Envio ao Merchant Center</h2>
    <p>O processo de validação que implementamos para feeds de alto volume:</p>
    <ol>
        <li><strong>Validação sintática:</strong> parse completo do JSON antes de qualquer outra verificação. Se o JSON não é válido, nada mais adianta. Ferramentas: <code>jq .</code> no terminal, ou o validador online desta toolbox.</li>
        <li><strong>Validação de campos obrigatórios:</strong> verificar se todos os produtos têm os 7 campos obrigatórios presentes e não-nulos. Um produto com <code>"price": null</code> é tecnicamente JSON válido mas semanticamente inválido para o feed.</li>
        <li><strong>Validação de formato de preço:</strong> regex <code>/^\d+\.\d{2} [A-Z]{3}$/</code> para verificar todos os valores de preço.</li>
        <li><strong>Validação de URL:</strong> amostra de 5% das URLs de produto e imagem para verificar se retornam 200. URLs que retornam 404 ou 301 causam penalidade de qualidade.</li>
        <li><strong>Alerta de tamanho:</strong> comparar o número de produtos no feed atual com a média dos últimos 7 feeds. Uma variação de mais de 5% para baixo é sinal de que produtos foram excluídos por erro.</li>
    </ol>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">JSON ou XML para feed do Google Shopping?</h3>
            <p class="faq-resposta">O Google Shopping aceita ambos — XML (formato original), texto tabulado, e JSON via Content API. Para novos projetos, JSON via Content API é preferível: permite atualizações incrementais (atualizar apenas um produto sem reenviar o feed inteiro), tem melhor suporte a lotes, e erros são retornados por produto individualmente em vez de rejeitar o arquivo inteiro. Para operações legacy com ERPs que exportam arquivo plano, XML ou TSV ainda são mais simples de implementar.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Com que frequência devo atualizar o feed de produtos?</h3>
            <p class="faq-resposta">Para preços e estoque: idealmente em tempo real via Content API, ou no mínimo diariamente. Preços desatualizados no feed levam a penalidade de "preço incompatível" no Merchant Center — quando o preço na página do produto difere do preço no feed, o Google pode suspender o produto. Para atributos como título, descrição e imagem, uma atualização diária é suficiente.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como monitorar automaticamente se o feed foi aceito pelo Merchant Center?</h3>
            <p class="faq-resposta">Use a API do Google Merchant Center para verificar o status do feed após cada upload. O endpoint "datafeedstatuses" retorna o número de produtos aprovados, reprovados e com aviso. Configure um alerta se o número de produtos aprovados cair mais de 3% em relação ao feed anterior — isso detecta regressões silenciosas antes de impactarem o desempenho de campanhas.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">O que fazer com produtos que têm variações (cor, tamanho)?</h3>
            <p class="faq-resposta">Use os campos item_group_id para agrupar variações. Cada variação é um produto separado no feed, mas todas compartilham o mesmo item_group_id. O Google consolida as variações na exibição do Shopping e usa os dados de performance de todas as variações para ranquear o grupo. Sem item_group_id, variações de cor e tamanho competem entre si no leilão — o que divide o orçamento sem necessidade.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em um projeto de integração de e-commerce para um grande varejista brasileiro com 50.000 SKUs ativos, a NuAto assumiu a gestão técnica do feed do Google Shopping após um incidente de rejeição em massa — 100% do catálogo suspenso por erro de formato de preço. O ERP havia sido atualizado e a nova versão de exportação começou a incluir o símbolo "R$" nos campos de preço, o que o Merchant Center rejeitou silenciosamente por 6 dias antes de alguém perceber a queda nas impressões.</p>
    <p>A primeira medida foi implementar um pipeline de validação automático entre a geração do feed (23h) e o envio ao Merchant Center (00h30). O pipeline fazia parse completo do JSON, validava o formato de todos os 50.000 campos de preço com regex, e enviava um e-mail de confirmação com o número de produtos válidos e qualquer anomalia detectada. Se o número de produtos válidos fosse menos de 95% do total do feed, o envio era bloqueado e um alerta era disparado para o time de desenvolvimento.</p>
    <p>Em 8 meses de operação com o pipeline de validação ativo, foram detectados e bloqueados 7 feeds com problemas antes de chegarem ao Merchant Center: 3 por erro de preço (vírgula decimal), 2 por campo de descrição com caracteres de controle, 1 por BOM no início do arquivo, e 1 por queda de mais de 10% no número de produtos (um bug de exportação que havia truncado o feed). Estimativa de impressões salvas: mais de 140.000 no período.</p>
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
            "name": "JSON ou XML para feed do Google Shopping?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "O Google Shopping aceita ambos. Para novos projetos, JSON via Content API é preferível: permite atualizações incrementais, tem melhor suporte a lotes, e erros são retornados por produto individualmente em vez de rejeitar o arquivo inteiro."
            }
        },
        {
            "@type": "Question",
            "name": "Com que frequência devo atualizar o feed de produtos?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Para preços e estoque: idealmente em tempo real via Content API, ou no mínimo diariamente. Preços desatualizados levam a penalidade de 'preço incompatível' no Merchant Center. Para atributos como título, descrição e imagem, uma atualização diária é suficiente."
            }
        },
        {
            "@type": "Question",
            "name": "Como monitorar automaticamente se o feed foi aceito pelo Merchant Center?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Use a API do Google Merchant Center para verificar o status do feed após cada upload. O endpoint 'datafeedstatuses' retorna o número de produtos aprovados, reprovados e com aviso. Configure um alerta se o número de produtos aprovados cair mais de 3% em relação ao feed anterior."
            }
        },
        {
            "@type": "Question",
            "name": "O que fazer com produtos que têm variações (cor, tamanho)?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Use os campos item_group_id para agrupar variações. Cada variação é um produto separado no feed, mas todas compartilham o mesmo item_group_id. Sem item_group_id, variações de cor e tamanho competem entre si no leilão — o que divide o orçamento sem necessidade."
            }
        }
    ]
}
</script>
