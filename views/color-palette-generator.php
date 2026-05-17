<div class="card">
    <h1 class="card-title">Color Palette Generator</h1>
    <p class="card-description">Escolha uma cor base e o tipo de harmonia para gerar uma paleta instantaneamente. Clique em qualquer swatch para copiar o HEX.</p>

    <div class="palette-controls">
        <div class="form-group">
            <label class="form-label" for="palette-hex">Cor Base</label>
            <div class="color-input-row">
                <input type="color" id="palette-picker" class="color-picker" value="#0070f3">
                <input type="text"  id="palette-hex"    class="color-hex"    value="#0070f3" maxlength="7" placeholder="#000000">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Harmonia</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="analogous" checked>
                    <span>Análoga</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="complementary">
                    <span>Complementar</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="triadic">
                    <span>Tríade</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="monochromatic">
                    <span>Monocromática</span>
                </label>
            </div>
        </div>
    </div>

    <div class="palette-swatches" id="palette-swatches">
        <div class="color-swatch" data-index="0"></div>
        <div class="color-swatch" data-index="1"></div>
        <div class="color-swatch" data-index="2"></div>
        <div class="color-swatch" data-index="3"></div>
        <div class="color-swatch" data-index="4"></div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é uma Paleta de Cores Harmoniosa?</h2>
    <p>Uma paleta de cores harmoniosa é um conjunto de cores que funcionam bem juntas, seguindo princípios da teoria das cores. Cada tipo de harmonia cria uma relação diferente entre as cores no círculo cromático (color wheel), resultando em diferentes sensações visuais.</p>

    <h3>Onde e por que usar?</h3>
    <p>Use este gerador para criar identidades visuais, definir paletas de UI/UX, escolher combinações para campanhas de marketing ou explorar opções de branding. <strong>Análoga</strong>: cores adjacentes, sensação de harmonia e fluxo (ideal para fundos e interfaces suaves). <strong>Complementar</strong>: cores opostas no círculo, alto contraste (ideal para CTAs e destaques). <strong>Tríade</strong>: três cores igualmente espaçadas, vibrante e equilibrado. <strong>Monocromática</strong>: variações de luminosidade de uma única cor, elegante e coeso.</p>

    <h3>Como funciona?</h3>
    <p>Escolha uma cor base com o seletor ou digitando o código HEX, selecione o tipo de harmonia e a paleta de 5 cores é gerada instantaneamente. Clique em qualquer swatch para copiar o código HEX para a área de transferência.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Paleta de Cores?</h3>
        <p>O Gerador de Paleta de Cores é uma ferramenta poderosa para designers, desenvolvedores web e profissionais de criatividade que precisam gerar combinações de cores harmoniosas. A partir de uma cor base, a ferramenta gera automaticamente paletas utilizando teorias de design consolidadas como harmonia analógica, cores complementares, triádicas e monocromáticas. Usar paletas harmônicas melhora significativamente a coesão visual de qualquer projeto.</p>

        <h3>Como usar o Gerador de Paleta de Cores?</h3>
        <p>Para usar o Gerador, insira a cor base usando um seletor visual ou código hexadecimal. Escolha o tipo de harmonia desejado: analógica (cores vizinhas), complementar (cores opostas), triádica (três cores equidistantes) ou monocromática (variações da mesma cor). A ferramenta gera instantaneamente a paleta completa com todos os códigos hexadecimais, RGB e nomes de cores, prontos para copiar e usar.</p>

        <h3>Casos de uso práticos do Gerador de Paleta de Cores</h3>
        <p>Paletas de cores bem escolhidas são fundamentais em web design, branding e interfaces gráficas. Um designer profissional utiliza harmonia de cores para evocar emoções, guiar atenção do usuário e criar identidades visuais memoráveis. Seja para design de website, logotipo, aplicativo ou material de marketing, uma paleta coerente e harmoniosa diferencia projetos amadores de profissionais.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Sistema de Design Tokens de Cor para Rede de Home Center com 200+ Lojas</h3>
    <p>Um líder nacional em home center com mais de 200 lojas e 15 fornecedores de material gráfico simultâneos nos contratou para resolver um problema crônico de inconsistência visual: cada operador — interno ou externo — usava valores aproximados de cor. A cor laranja da marca aparecia como <code>#FF6B00</code>, <code>#FF6600</code>, <code>#FA6400</code> e <code>#F56500</code> em materiais diferentes produzidos no mesmo mês. Em impressão offset, essa variação resultava em materiais visivelmente diferentes entre si quando colocados lado a lado na mesma loja — tabloides, banners de gôndola, faixas de preço e uniforme dos funcionários com laranjas diferentes. O comitê de marca havia reprovado 23% dos materiais na última campanha por inconsistência cromática.</p>
    <p>Usamos o Gerador de Paleta para criar o sistema de design tokens oficial da rede. A partir da cor primária aprovada em pantone (convertida para HEX), geramos as variações completas: 5 tons da cor primária (do mais claro ao mais escuro), paleta complementar para elementos de destaque, paleta neutra para textos e fundos, e cores semânticas para preço (verde), promoção (vermelho) e novidade (azul). Cada cor do sistema foi nomeada como CSS custom property (<code>--brand-primary</code>, <code>--brand-primary-dark</code>, <code>--price-color</code>, etc.) e documentada com seu HEX, RGB e o ratio de contraste em relação ao fundo padrão.</p>
    <p>O sistema de design tokens foi entregue como documento de 12 páginas com amostras visuais de cada cor e exemplos de uso correto e incorreto. Todos os 15 fornecedores de material gráfico receberam o documento com assinatura de aceite. Nas quatro campanhas seguintes, a taxa de reprovação de materiais por inconsistência cromática caiu de 23% para 3%. O tempo de aprovação de materiais gráficos caiu 40% porque os operadores pararam de enviar versões com variações para "testar qual o cliente prefere".</p>
    <p>Para redes varejistas com múltiplos pontos de produção gráfica, um sistema de paleta documentado em tokens é o investimento de menor custo e maior retorno em gestão de marca. Cores são a primeira percepção que o cliente tem de consistência — e inconsistência visual corrói confiança silenciosamente.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Ao criar paletas para campanhas sazonais (Black Friday, Natal, Dia das Mães), gere variações complementares da cor-âncora da marca em vez de paletas genéricas. Manter a identidade cromática do cliente com ajustes de saturação e brilho acelera aprovação dos materiais — especialmente em redes com comitês de identidade visual rígidos como grandes varejistas de home center.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
