<?php
$_artigoData = '2025-07-17';
$_artigoCategoria = 'Design';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">Paleta de Cores por Segmento: Como o Varejo Controla Identidade Visual em Escala</h1>
    <p class="card-description">Com 200 lojas e dezenas de operadores produzindo peças semanalmente, "aquele azul da marca" vira um espectro de 40 tons diferentes. Veja como implementamos design tokens de cor em CSS para uma grande rede de home center — e como a escala de shades resolve o problema de consistência sem travar a criação.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>O Problema de Escala da Identidade Visual</h2>
    <p>Uma grande rede de home center com mais de 200 lojas distribui a produção de materiais de comunicação entre a agência principal, agências regionais, equipes de marketing de loja e fornecedores locais. O manual de marca existe, os valores de cor estão documentados — mas na prática, cada operador interpreta "o azul da marca" de uma forma levemente diferente.</p>
    <p>Em uma auditoria de consistência visual que realizamos, coletamos materiais produzidos nos 6 meses anteriores: banners para redes sociais, encartes digitais, sinalizações de loja, e-mails e materiais de PDV. O tom de azul primário da marca — que no manual estava definido como um único hexadecimal — aparecia em 34 variações distintas nas peças coletadas. Algumas eram variações de menos de 5 pontos de diferença, praticamente imperceptíveis individualmente. No conjunto, criavam uma fragmentação visual clara, especialmente em materiais exibidos lado a lado em lojas ou em feeds de redes sociais.</p>
    <p>O problema não era má vontade dos operadores. Era ausência de um sistema que tornasse o acerto mais fácil que o erro.</p>

    <h2>Gerando Paletas de Variações (Shades e Tints)</h2>
    <p>Identidades visuais de varejo raramente usam apenas a cor primária pura. É necessário uma escala de variações — versões mais claras (tints) e mais escuras (shades) — para criar hierarquia visual sem sair da paleta aprovada. O problema é que sem um gerador padronizado, cada operador cria sua própria "versão mais clara" do azul, gerando — novamente — inconsistência.</p>
    <p>A abordagem que adotamos para a rede de home center foi gerar a escala completa de 11 tons (do 50 ao 950, seguindo a convenção do Tailwind CSS) a partir da cor primária oficial, e documentá-los como design tokens:</p>
    <pre><code>/* Gerado a partir de #1E5FA8 (azul primário da marca) */
:root {
    --color-primary-50:  #EEF4FB;
    --color-primary-100: #D4E5F5;
    --color-primary-200: #A8CAEA;
    --color-primary-300: #7BAFDF;
    --color-primary-400: #4E94D4;
    --color-primary-500: #1E5FA8; /* COR OFICIAL DA MARCA */
    --color-primary-600: #1A5295;
    --color-primary-700: #154282;
    --color-primary-800: #10326F;
    --color-primary-900: #0A225C;
    --color-primary-950: #051245;
}</code></pre>
    <p>Com a escala definida, os operadores têm opções legítimas e aprovadas para criar hierarquia: o fundo de um botão usa <code>--color-primary-500</code>, o estado hover usa <code>--color-primary-600</code>, o fundo de uma seção secundária usa <code>--color-primary-50</code>. Não há necessidade de inventar tons — todos já estão na paleta oficial.</p>

    <h2>CSS Custom Properties como Design Tokens de Cor</h2>
    <p>A implementação como CSS custom properties (variáveis CSS) tem vantagens que vão além da consistência:</p>
    <p><strong>Tema único por marca:</strong> Em projetos com múltiplas marcas da mesma holding, basta trocar as variáveis no <code>:root</code> de cada tema. O código de componentes é idêntico — apenas as cores mudam.</p>
    <p><strong>Dark mode declarativo:</strong> A alternância de paleta para dark mode fica centralizada em um único bloco:</p>
    <pre><code>@media (prefers-color-scheme: dark) {
    :root {
        --color-surface: var(--color-primary-950);
        --color-text-primary: var(--color-primary-50);
        --color-border: var(--color-primary-800);
    }
}</code></pre>
    <p><strong>Rastreabilidade:</strong> Quando um operador usa <code>var(--color-primary-500)</code> em vez de <code>#1E5FA8</code>, o DevTools do navegador mostra o nome do token — facilitando revisões de código e auditorias de conformidade com o manual de marca.</p>

    <h2>Sistema de Nomenclatura de Design Tokens</h2>
    <p>O nome do token é tão importante quanto o valor. Um sistema mal nomeado leva operadores a escolher tokens de forma aleatória, destruindo a intenção semântica da paleta. A convenção que adotamos para redes varejistas:</p>
    <pre><code>/* ESCALA PRIMITIVA (os valores brutos) */
--color-[nome-da-cor]-[peso]
/* Exemplos: --color-primary-500, --color-accent-300, --color-neutral-100 */

/* TOKENS SEMÂNTICOS (o uso intencional) */
--color-[contexto]-[propriedade]
/* Exemplos: */
--color-button-bg: var(--color-primary-500);
--color-button-text: var(--color-neutral-50);
--color-button-hover: var(--color-primary-600);
--color-badge-sale: var(--color-accent-500);
--color-surface-card: var(--color-neutral-100);
--color-text-heading: var(--color-primary-900);
--color-border-input: var(--color-neutral-300);</code></pre>
    <p>Operadores que trabalham com componentes usam apenas os tokens semânticos — eles não precisam saber que <code>--color-button-bg</code> é <code>#1E5FA8</code>. A camada de abstração torna impossível usar a cor errada por acidente: se você quer o fundo de um botão, o token certo é <code>--color-button-bg</code>, e ele aponta para o azul correto da marca.</p>

    <h2>Garantindo Consistência Entre Operadores</h2>
    <p>A implantação técnica do sistema de tokens é apenas metade do trabalho. A outra metade é garantir que os operadores usem os tokens em vez de copiar hexadecimais "de cabeça". As práticas que demonstraram maior eficácia:</p>
    <ol>
        <li><strong>Documentação visual do sistema de tokens</strong> — uma página interna (pode ser simples HTML estático) que exibe cada token com seu nome, valor hexadecimal e exemplos de uso. Mais visual e acessível que uma planilha.</li>
        <li><strong>Paleta no Figma como tokens</strong> — se a equipe usa Figma, vincular os estilos de cor do Figma aos tokens CSS elimina a etapa manual de consulta ao manual.</li>
        <li><strong>Lint de CSS em pipelines de CI/CD</strong> — para equipes com processo de deploy automatizado, ferramentas como Stylelint permitem criar regras que impedem o uso de valores de cor hardcoded (ex: proibir <code>#1E5FA8</code> no código e exigir o uso do token correspondente).</li>
        <li><strong>Revisão de cor como etapa do processo de aprovação</strong> — para times sem CI/CD, incluir na checklist de aprovação de peças digitais a verificação de que apenas tokens aprovados foram usados.</li>
    </ol>

    <h2>Gere Sua Escala com a Ferramenta</h2>
    <p>O <a href="<?= BASE_URL ?>color-palette-generator">Gerador de Paleta de Cores da Toolbox Dev Design</a> cria a escala completa de 11 tons a partir de qualquer cor primária, com código CSS pronto para copiar como custom properties. Para redes varejistas, o fluxo é: inserir a cor oficial da marca → gerar a escala → validar com o time de design → documentar no sistema de tokens do projeto.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">CSS custom properties funcionam em todos os ambientes onde o varejo distribui materiais digitais?</h3>
            <p class="faq-resposta">Para materiais web (e-mails HTML, landing pages, hotsites), as custom properties funcionam em todos os navegadores modernos. A exceção crítica é e-mail: clientes de e-mail como Outlook 2019 e versões anteriores não suportam CSS custom properties. Para templates de e-mail, os valores precisam ser hardcoded. Uma solução comum é usar um pré-processador (Sass ou um script de build) que substitui as variáveis pelos valores finais ao gerar o HTML de e-mail.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como lidar com redes varejistas que têm múltiplas marcas com paletas diferentes?</h3>
            <p class="faq-resposta">O padrão de design tokens escala bem para múltiplas marcas: os nomes dos tokens são idênticos entre marcas, apenas os valores mudam. Cada marca tem seu arquivo de tokens (ex: marca-a.css, marca-b.css) que define as mesmas variáveis semânticas com valores diferentes. Os componentes referenciados em ambas as marcas usam os mesmos nomes de token — trocar de tema significa trocar qual arquivo de tokens está ativo.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Quantos pesos de shade são necessários para uma paleta de varejo funcional?</h3>
            <p class="faq-resposta">Para a maioria dos sistemas de design de varejo, 7 pesos são suficientes: 50, 100, 200, 400, 500 (cor base), 700 e 900. A escala de 11 pesos (50 a 950) é mais completa e fornece mais flexibilidade, mas na prática o varejo usa principalmente a cor base (500), a versão levemente mais escura para hover/active (600-700), a versão muito clara para fundos (50-100) e a versão escura para texto (800-900).</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como garantir que as cores da paleta passem nos testes de contraste WCAG?</h3>
            <p class="faq-resposta">Ao gerar a escala de shades, teste automaticamente os pares de maior uso: texto escuro sobre fundo claro (token 900 sobre token 50) e texto claro sobre fundo escuro (token 50 sobre token 900). O WCAG AA exige contraste mínimo de 4.5:1 para texto normal e 3:1 para texto grande. Para varejo, onde parte do público é idoso ou tem baixa visão, o nível AA é o mínimo aceitável — AAA (7:1) é ideal para informações críticas como preço e validade da oferta.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Para uma rede de home center com mais de 200 lojas, implementamos um sistema de design tokens em CSS que substituiu o "manual de marca em PDF" como referência de cor para toda a cadeia de produção de materiais. O ponto de partida foi identificar as 3 cores primárias da marca e gerar escala completa de 11 tons para cada uma, além de uma paleta de cores neutras e uma cor de alerta para preços e promoções.</p>
    <p>A documentação foi publicada como uma página interna acessível a todos os operadores — agência, equipe de marketing e fornecedores regionais. A página exibia cada token com nome, preview da cor e exemplos de uso correto e incorreto. Além disso, o Figma da marca foi atualizado para vincular os estilos de cor diretamente aos tokens CSS, eliminando a tradução manual entre design e código.</p>
    <p>O resultado medido em 90 dias: nas auditorias periódicas de conformidade visual, a taxa de uso da cor primária correta (#exato da marca) subiu de 61% para 97% das peças auditadas. Os 3% restantes foram casos de materiais impressos onde o fornecedor gráfico não tinha acesso ao sistema digital. A consistência visual nos canais digitais — site, e-mail, redes sociais, displays de loja — atingiu nível de conformidade considerado referência pelo time de marketing da rede.</p>
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
            "name": "CSS custom properties funcionam em todos os ambientes onde o varejo distribui materiais digitais?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Para materiais web, as custom properties funcionam em todos os navegadores modernos. A exceção crítica é e-mail: clientes de e-mail como Outlook 2019 não suportam CSS custom properties. Para templates de e-mail, os valores precisam ser hardcoded ou substituídos por um pré-processador."
            }
        },
        {
            "@type": "Question",
            "name": "Como lidar com redes varejistas que têm múltiplas marcas com paletas diferentes?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "O padrão de design tokens escala bem para múltiplas marcas: os nomes dos tokens são idênticos entre marcas, apenas os valores mudam. Cada marca tem seu arquivo de tokens que define as mesmas variáveis semânticas com valores diferentes."
            }
        },
        {
            "@type": "Question",
            "name": "Quantos pesos de shade são necessários para uma paleta de varejo funcional?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Para a maioria dos sistemas de design de varejo, 7 pesos são suficientes: 50, 100, 200, 400, 500 (cor base), 700 e 900. Na prática o varejo usa principalmente a cor base, a versão levemente mais escura para hover, a versão clara para fundos e a versão escura para texto."
            }
        },
        {
            "@type": "Question",
            "name": "Como garantir que as cores da paleta passem nos testes de contraste WCAG?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Ao gerar a escala de shades, teste os pares de maior uso: texto escuro sobre fundo claro e texto claro sobre fundo escuro. O WCAG AA exige contraste mínimo de 4.5:1 para texto normal. Para varejo, onde parte do público é idoso ou tem baixa visão, o nível AA é o mínimo aceitável."
            }
        }
    ]
}
</script>
