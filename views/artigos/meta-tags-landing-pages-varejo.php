<?php
$_artigoData = '2025-06-26';
$_artigoCategoria = 'SEO';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">Meta Tags em Landing Pages de Promoção: SEO com Data de Validade no Varejo</h1>
    <p class="card-description">Páginas de promoção indexadas depois que a oferta expirou são armadilhas de SEO que custam reputação e frustram clientes. Veja como estruturar meta tags, noindex estratégico e Open Graph para campanhas temporárias de grande rede varejista sem contaminar o domínio principal.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>O Problema do Google Que Não Esquece</h2>
    <p>O Google indexa páginas com eficiência impressionante — mas raramente as remove com a mesma velocidade. Para uma grande rede de home center com centenas de lojas e campanhas semanais, isso cria um problema persistente: páginas de "50% OFF na categoria Ferramentas — Válido Até Domingo" continuam aparecendo nos resultados de busca semanas e até meses após o fim da promoção.</p>
    <p>O usuário pesquisa "ferramentas com desconto home center", encontra a página da campanha passada, clica animado — e vê a oferta expirada ou, pior, um erro 404. O bounce rate dispara. A taxa de conversão dessas sessões é zero. E o Google interpreta esse comportamento negativo como sinal de qualidade ruim da página, potencialmente prejudicando outras URLs do mesmo domínio.</p>
    <p>Em auditorias que realizamos para redes varejistas de médio e grande porte, é comum encontrar entre 40 e 120 páginas de promoção indexadas com conteúdo expirado. O problema raramente é de desenvolvimento — é de ausência de estratégia de meta tags para páginas temporárias.</p>

    <h2>noindex para Páginas Temporárias vs Canonical para Permanentes</h2>
    <p>A primeira decisão estratégica é classificar cada landing page de campanha em uma de duas categorias:</p>
    <p><strong>Páginas verdadeiramente temporárias</strong> são aquelas criadas especificamente para uma campanha pontual e que não terão uso após o encerramento. Exemplos: hotsite de Black Friday, página da "Semana do Cliente", landing de liquidação de estoque de uma categoria específica. Para essas páginas, a estratégia correta é <code>noindex</code> desde a publicação:</p>
    <pre><code>&lt;meta name="robots" content="noindex, follow"&gt;</code></pre>
    <p>O <code>follow</code> mantido garante que os links internos dentro da página continuem sendo rastreados pelo Google, preservando a transferência de autoridade para o domínio. O <code>noindex</code> impede que a URL apareça nos resultados de busca.</p>
    <p><strong>Páginas permanentes com promoção rotativa</strong> são categorias ou landing pages que existem continuamente mas exibem promoções que mudam. Exemplo: uma página de "Ofertas da Semana" que sempre existe mas com produtos e preços diferentes. Para essas, a estratégia é manter a indexação com canonical apontando para si mesma, e atualizar o conteúdo regularmente para manter a relevância:</p>
    <pre><code>&lt;link rel="canonical" href="https://loja.com.br/ofertas-da-semana"&gt;</code></pre>
    <p>A distinção é crucial. Aplicar noindex em páginas permanentes desperdiça oportunidade de ranqueamento. Não aplicar noindex em páginas temporárias cria o problema de indexação contaminada descrito acima.</p>

    <h2>Open Graph para WhatsApp: Por Que o Varejo Precisa Disso Mais que Ninguém</h2>
    <p>O compartilhamento de ofertas via WhatsApp é parte central do comportamento de compra no varejo brasileiro. Quando um cliente encontra uma boa oferta, ele compartilha com a família, o grupo de amigos, o grupo de condomínio. Esse compartilhamento orgânico é publicidade gratuita — mas depende de um preview de link bem configurado.</p>
    <p>As meta tags Open Graph controlam como o link aparece quando compartilhado no WhatsApp, Facebook, Instagram Stories e Telegram:</p>
    <pre><code>&lt;meta property="og:title" content="Furadeira Bosch 750W — 40% OFF · Só Até Domingo"&gt;
&lt;meta property="og:description" content="De R$ 349 por R$ 209. Frete grátis para compras acima de R$ 299. Válido para SP, RJ e MG."&gt;
&lt;meta property="og:image" content="https://loja.com.br/img/campanha/furadeira-bosch-og.jpg"&gt;
&lt;meta property="og:image:width" content="1200"&gt;
&lt;meta property="og:image:height" content="630"&gt;
&lt;meta property="og:url" content="https://loja.com.br/ofertas/furadeira-bosch-750w"&gt;
&lt;meta property="og:type" content="product"&gt;</code></pre>
    <p>O tamanho ideal da imagem og:image para WhatsApp é 1200×630px (proporção 1.91:1). Imagens menores que 300×157px não são exibidas como preview no WhatsApp. O título deve ter no máximo 60 caracteres para não ser truncado. A descrição, no máximo 160 caracteres.</p>
    <p>Para campanhas de varejo, incluir o preço e a urgência (até quando) diretamente no og:title aumenta significativamente a taxa de clique no compartilhamento orgânico.</p>

    <h2>Twitter Card e Outras Plataformas</h2>
    <p>Mesmo que o varejo brasileiro não concentre sua estratégia no X (ex-Twitter), as meta tags Twitter Card são lidas por outras plataformas como LinkedIn e alguns agregadores de notícias. O padrão mínimo para campanhas:</p>
    <pre><code>&lt;meta name="twitter:card" content="summary_large_image"&gt;
&lt;meta name="twitter:title" content="Furadeira Bosch 750W — 40% OFF"&gt;
&lt;meta name="twitter:description" content="De R$ 349 por R$ 209. Frete grátis acima de R$ 299."&gt;
&lt;meta name="twitter:image" content="https://loja.com.br/img/campanha/furadeira-bosch-og.jpg"&gt;</code></pre>
    <p>Quando as meta tags Open Graph estão presentes, muitas plataformas as utilizam como fallback se as Twitter Card não estiverem definidas. Mas definir as duas garante compatibilidade máxima.</p>

    <h2>Meta Robots para Controle de Ciclo de Vida</h2>
    <p>Para campanhas com data de encerramento conhecida, é possível criar um sistema automatizado de alternância de meta robots. Uma abordagem simples em PHP:</p>
    <pre><code>&lt;?php
$data_fim_campanha = strtotime('2025-07-15');
$robots = time() &gt; $data_fim_campanha ? 'noindex, nofollow' : 'index, follow';
?&gt;
&lt;meta name="robots" content="&lt;?= $robots ?&gt;"&gt;</code></pre>
    <p>Após o encerramento da campanha, a página automaticamente passa a ser noindex, e o Googlebot, na próxima visita, remove a URL do índice sem necessidade de intervenção manual. Combinado com um redirecionamento 301 para a categoria permanente, isso garante que o usuário que ainda acessar a URL expirada seja enviado para conteúdo relevante.</p>

    <h2>Como Usar a Ferramenta de Meta Tags</h2>
    <p>O <a href="<?= BASE_URL ?>meta-tags">Gerador de Meta Tags da Toolbox Dev Design</a> permite criar o bloco completo de meta tags — incluindo Open Graph e Twitter Card — de forma visual, com preview em tempo real de como o link aparecerá no WhatsApp e Facebook. Para campanhas varejistas, o fluxo recomendado é: gerar as tags no momento da criação da landing page, copiar o bloco completo para o template e ajustar apenas o conteúdo específico de cada campanha futura.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">Quanto tempo o Google leva para remover uma página noindex do índice?</h3>
            <p class="faq-resposta">Varia entre alguns dias e algumas semanas, dependendo da frequência com que o Googlebot rastreia o domínio. Domínios de varejo com alto volume de conteúdo novo costumam ser rastreados com frequência maior. Para forçar a remoção mais rápida, use o Google Search Console > Remoções para solicitar a exclusão temporária da URL enquanto aguarda a atualização natural do índice.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Devo usar noindex ou simplesmente deletar a página após a promoção?</h3>
            <p class="faq-resposta">Depende do volume de links externos e internos que a página acumulou. Se a página tem links de outros sites ou foi amplamente compartilhada, deletá-la gera erro 404, que desperdiça a autoridade acumulada. O ideal é redirecionar (301) para a categoria permanente e manter o noindex na URL original por algumas semanas. Se a página não tem links externos relevantes, a deleção com 410 (Gone) sinaliza ao Google que a remoção é definitiva e acelera a exclusão do índice.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">O preço no og:title do WhatsApp precisa ser atualizado quando muda?</h3>
            <p class="faq-resposta">Sim, mas o WhatsApp faz cache do preview por tempo variável. Se o preço muda durante a campanha, o preview antigo pode aparecer por até 72 horas para links já compartilhados. A solução é usar URLs diferentes para cada variação de preço (ou período) — assim o novo link gera um novo preview sem dependência do cache anterior. O Facebook Debug Tool (developers.facebook.com/tools/debug) permite forçar a atualização do cache para um URL específico.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Landing pages de promoção precisam de sitemap.xml?</h3>
            <p class="faq-resposta">Páginas com noindex não devem constar no sitemap.xml — incluí-las cria inconsistência entre o que você diz ao Google (indexe isso) via sitemap e o que você diz via meta robots (não indexe isso). Para páginas temporárias com noindex, mantenha-as fora do sitemap. Para páginas permanentes com promoção rotativa, inclua no sitemap com a data de última modificação atualizada sempre que o conteúdo mudar.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em auditoria de SEO para uma grande rede de home center, identificamos 87 URLs de campanhas passadas ainda indexadas pelo Google — algumas com mais de 14 meses desde o encerramento da promoção. O Google Search Console mostrava cliques ativos nessas páginas, com taxa de rejeição superior a 94%. Usuários chegavam esperando a oferta e encontravam a página desatualizada ou um produto sem desconto.</p>
    <p>A análise de impacto revelou que essas páginas acumulavam 1.200 a 1.800 cliques mensais de usuários que saíam imediatamente sem nenhuma conversão. Mais grave: algumas URLs ranqueavam em posições 3 a 7 para termos como "[produto] desconto [marca]", competindo diretamente com as páginas de campanha ativas e dividindo tráfego valioso.</p>
    <p>Implementamos um protocolo de dois eixos: para campanhas futuras, inserimos a lógica de alternância automática de meta robots baseada em data de encerramento, além de Open Graph completo para maximizar compartilhamento no WhatsApp. Para o acervo histórico, aplicamos redirecionamentos 301 em lote para as categorias permanentes correspondentes. Em 45 dias, o Google Search Console mostrou remoção de 73 das 87 URLs problemáticas. O tráfego orgânico qualificado das categorias permanentes aumentou 18% no mesmo período — parte dele recuperado das URLs que antes fragmentavam o ranqueamento.</p>
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
            "name": "Quanto tempo o Google leva para remover uma página noindex do índice?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Varia entre alguns dias e algumas semanas, dependendo da frequência com que o Googlebot rastreia o domínio. Para forçar a remoção mais rápida, use o Google Search Console > Remoções para solicitar a exclusão temporária da URL enquanto aguarda a atualização natural do índice."
            }
        },
        {
            "@type": "Question",
            "name": "Devo usar noindex ou simplesmente deletar a página após a promoção?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Depende do volume de links externos e internos que a página acumulou. Se a página tem links de outros sites ou foi amplamente compartilhada, deletá-la gera erro 404, que desperdiça a autoridade acumulada. O ideal é redirecionar (301) para a categoria permanente e manter o noindex na URL original por algumas semanas."
            }
        },
        {
            "@type": "Question",
            "name": "O preço no og:title do WhatsApp precisa ser atualizado quando muda?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Sim, mas o WhatsApp faz cache do preview por tempo variável. Se o preço muda durante a campanha, o preview antigo pode aparecer por até 72 horas para links já compartilhados. A solução é usar URLs diferentes para cada variação de preço ou período."
            }
        },
        {
            "@type": "Question",
            "name": "Landing pages de promoção precisam de sitemap.xml?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Páginas com noindex não devem constar no sitemap.xml — incluí-las cria inconsistência entre o que você diz ao Google via sitemap e o que você diz via meta robots. Para páginas temporárias com noindex, mantenha-as fora do sitemap."
            }
        }
    ]
}
</script>
