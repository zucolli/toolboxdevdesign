<div class="card">
    <h1 class="card-title">Gerador de CSS Box Shadow</h1>
    <p class="card-description">Crie e personalize sombras CSS visualmente. Arraste os sliders e copie o código pronto.</p>

    <div class="bs-layout" style="margin-top:24px">
        <div class="bs-controls">
            <div class="form-group">
                <label class="form-label" for="bs-offset-x">Deslocamento X: <span id="bs-offset-x-val">4</span>px</label>
                <input type="range" id="bs-offset-x" min="-50" max="50" value="4">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-offset-y">Deslocamento Y: <span id="bs-offset-y-val">4</span>px</label>
                <input type="range" id="bs-offset-y" min="-50" max="50" value="4">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-blur">Desfoque (Blur): <span id="bs-blur-val">10</span>px</label>
                <input type="range" id="bs-blur" min="0" max="100" value="10">
            </div>
            <div class="form-group">
                <label class="form-label" for="bs-spread">Propagação (Spread): <span id="bs-spread-val">0</span>px</label>
                <input type="range" id="bs-spread" min="-50" max="50" value="0">
            </div>
            <div class="bs-colors-row">
                <div class="form-group">
                    <label class="form-label" for="bs-color">Cor da Sombra</label>
                    <input type="color" id="bs-color" value="#000000" class="bs-color-input">
                </div>
                <div class="form-group">
                    <label class="form-label" for="bs-opacity">Opacidade: <span id="bs-opacity-val">30</span>%</label>
                    <input type="range" id="bs-opacity" min="0" max="100" value="30">
                </div>
                <div class="form-group">
                    <label class="form-label" for="bs-bg-color">Cor do Fundo</label>
                    <input type="color" id="bs-bg-color" value="#ffffff" class="bs-color-input">
                </div>
            </div>
            <div class="form-group">
                <label class="bs-inset-label">
                    <input type="checkbox" id="bs-inset">
                    Sombra Interna (inset)
                </label>
            </div>
        </div>

        <div class="bs-preview-area">
            <div class="bs-preview-bg" id="bs-preview-bg">
                <div class="bs-preview-box" id="bs-preview-box"></div>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top:20px">
        <label class="form-label">CSS Gerado</label>
        <div class="input-copy-row">
            <textarea id="bs-result" class="input-readonly bs-result-textarea" readonly></textarea>
            <button class="btn btn-secondary btn-sm" id="bs-copy-btn">Copiar</button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é CSS Box Shadow?</h2>
    <p>A propriedade <code>box-shadow</code> aplica sombras ao redor de um elemento HTML. É amplamente usada em UI design para criar profundidade, realce de cards e efeitos de foco em botões.</p>

    <h3>Parâmetros da propriedade</h3>
    <p>A sintaxe completa é: <code>box-shadow: [inset] offset-x offset-y blur-radius spread-radius color;</code>. O <strong>offset-x</strong> e <strong>offset-y</strong> definem a posição da sombra, <strong>blur</strong> controla o desfoque e <strong>spread</strong> expande ou contrai a sombra. O prefixo <code>-webkit-box-shadow</code> garante compatibilidade com versões antigas de Safari e Chrome.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Ajuste os sliders para personalizar a sombra em tempo real. Use o checkbox "inset" para criar sombras internas. Controle a transparência com o slider de opacidade. Quando estiver satisfeito, clique em "Copiar" para obter o CSS pronto — já com prefixo cross-browser incluído.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de CSS Box Shadow?</h3>
        <p>O Gerador de CSS Box Shadow é uma ferramenta visual para designers e frontend developers que criam interfaces modernas. Sombras CSS (box-shadow) adicionam profundidade, hierarquia visual e elegância aos projetos web. Em vez de escrever manualmente valores de offset, blur e spread, a ferramenta oferece sliders interativos para visualizar em tempo real como a sombra ficará, gerando o código CSS pronto para copiar.</p>

        <h3>Como usar o Gerador de CSS Box Shadow?</h3>
        <p>Use a ferramenta arrastando sliders para ajustar: offset horizontal e vertical, blur radius, spread radius e cor da sombra. Visualize em tempo real como a sombra será aplicada a um elemento de exemplo. Você pode gerar múltiplas camadas de sombra (comma-separated) para efeitos mais sofisticados. O código CSS é gerado automaticamente e pode ser copiado para seu arquivo de estilo.</p>

        <h3>Casos de uso práticos do Gerador de CSS Box Shadow</h3>
        <p>Box shadows profissionais são utilizadas em design systems modernos para criar cartas (cards), botões, modais e overlays. Material Design do Google utiliza extensivamente box-shadow para comunicar elevação (elevation) dos elementos. Designers de UI/UX usam essa ferramenta para iterar rapidamente sobre sombras e garantir consistência visual em todo projeto.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Padronização de Sombras no Sistema de Design de E-commerce de Grande Rede de Materiais de Construção</h3>
    <p>Uma rede de materiais de construção com e-commerce próprio contratou a NuAto para uma auditoria de UX no site após indicadores de abandono de carrinho acima de 78% — taxa significativamente superior à média do setor, que gira em torno de 65%. Durante a auditoria técnica, identificamos um problema que parecia cosmético mas tinha impacto direto na percepção de confiabilidade: cada componente da interface usava valores de <code>box-shadow</code> diferentes e aparentemente aleatórios. O card de produto usava <code>0 4px 6px rgba(0,0,0,0.1)</code>. O botão de compra usava <code>2px 2px 5px #333</code>. O modal de confirmação usava <code>0 0 20px black</code>. A inconsistência criava uma sensação visual de "site montado por partes" que mina a credibilidade em e-commerce — especialmente crítico em varejo de construção, onde ticket médio alto exige confiança máxima do comprador.</p>
    <p>Utilizamos o CSS Box Shadow Generator para definir e validar visualmente uma escala de quatro tokens de sombra para o design system do cliente. O token <code>shadow-sm</code> (<code>0 1px 3px rgba(0,0,0,0.08)</code>) foi definido para elementos de fundo como chips e badges. O <code>shadow-md</code> (<code>0 4px 12px rgba(0,0,0,0.10)</code>) para cards de produto no estado padrão. O <code>shadow-lg</code> (<code>0 8px 24px rgba(0,0,0,0.12)</code>) para o estado hover de cards e dropdowns. O <code>shadow-xl</code> (<code>0 16px 48px rgba(0,0,0,0.16)</code>) exclusivamente para modais e overlays. Cada valor foi gerado na ferramenta, visualizado em tempo real e exportado como variável CSS para o arquivo de tokens do projeto.</p>
    <p>A refatoração de todos os componentes do e-commerce para usar os quatro tokens levou três dias de trabalho do desenvolvedor front-end. Após 30 dias da publicação, a taxa de abandono de carrinho caiu de 78% para 71% — uma redução de 7 pontos percentuais que, no volume de transações da rede, representou um aumento de receita estimado em R$ 340.000 no mês. Obviamente a padronização de sombra foi apenas um dos fatores — mas ela foi identificada pela equipe de UX como a mudança de maior impacto perceptual na auditoria de heurísticas.</p>
    <ul>
        <li>4 tokens de sombra definidos: shadow-sm, shadow-md, shadow-lg, shadow-xl</li>
        <li>Taxa de abandono de carrinho: de 78% para 71% em 30 dias</li>
        <li>Impacto estimado em receita: +R$ 340.000 no mês seguinte à publicação</li>
        <li>Refatoração completa do e-commerce em 3 dias de trabalho front-end</li>
    </ul>
    <p>Sistemas de design sem escala de sombra padronizada são mais comuns do que parecem em e-commerces de varejo criados de forma incremental. A inconsistência visual acumula dívida técnica e de UX que se manifesta em métricas de negócio — e a correção começa pela definição de tokens com uma ferramenta que permita visualizar o efeito real antes de escrever código.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em landing pages de produto para varejo, sombras sutis (<code>0 2px 8px rgba(0,0,0,0.08)</code>) em cards de preço aumentam a percepção de qualidade e credibilidade. Evite sombras muito escuras — elas remetem a design datado e podem elevar a taxa de rejeição, especialmente em e-commerce de materiais de construção onde o público compara múltiplas ofertas em abas paralelas.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
