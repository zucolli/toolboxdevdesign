<div class="card">
    <h1 class="card-title">Calculadora de ROI e ROAS</h1>
    <p class="card-description">Preencha os valores da sua campanha e veja o ROI, ROAS e Lucro Líquido calculados em tempo real.</p>

    <div class="roi-grid">
        <div class="form-group">
            <label class="form-label" for="roi-investment">Investimento Total (R$) <span class="required-mark">*</span></label>
            <input type="number" id="roi-investment" placeholder="ex: 1000" min="0" step="0.01">
            <small class="field-hint">Total gasto em anúncios, agência, produção, etc.</small>
        </div>
        <div class="form-group">
            <label class="form-label" for="roi-revenue">Receita Gerada (R$) <span class="required-mark">*</span></label>
            <input type="number" id="roi-revenue" placeholder="ex: 5000" min="0" step="0.01">
            <small class="field-hint">Faturamento bruto atribuído à campanha.</small>
        </div>
        <div class="form-group">
            <label class="form-label" for="roi-cost">Custo do Produto/Serviço (R$)</label>
            <input type="number" id="roi-cost" placeholder="ex: 800 (opcional)" min="0" step="0.01">
            <small class="field-hint">CMV ou custo de entrega do serviço (opcional).</small>
        </div>
    </div>

    <div class="roi-results" id="roi-results">
        <div class="roi-result-card" id="roi-card-roas">
            <span class="roi-result-label">ROAS</span>
            <span class="roi-result-value" id="roi-val-roas">—</span>
            <span class="roi-result-sub">Receita por R$1 investido</span>
        </div>
        <div class="roi-result-card" id="roi-card-roi">
            <span class="roi-result-label">ROI</span>
            <span class="roi-result-value" id="roi-val-roi">—</span>
            <span class="roi-result-sub">Retorno sobre investimento</span>
        </div>
        <div class="roi-result-card" id="roi-card-profit">
            <span class="roi-result-label">Lucro Líquido</span>
            <span class="roi-result-value" id="roi-val-profit">—</span>
            <span class="roi-result-sub">Receita − Investimento − Custo</span>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Diferença entre ROI e ROAS</h2>
    <p><strong>ROAS</strong> (Return on Ad Spend) mede quantos reais de receita bruta cada real investido em anúncios gerou. Um ROAS de 5x significa R$5 de receita para cada R$1 gasto em mídia — mas não considera o custo do produto.</p>

    <p><strong>ROI</strong> (Return on Investment) é mais completo: desconta o investimento em marketing <em>e</em> o custo do produto/serviço entregue, revelando o lucro real da operação como percentual. ROI positivo significa que a campanha foi lucrativa.</p>

    <h3>Fórmulas utilizadas</h3>
    <p><code>ROAS = Receita ÷ Investimento</code></p>
    <p><code>ROI = ((Receita − Investimento − Custo) ÷ (Investimento + Custo)) × 100</code></p>
    <p><code>Lucro Líquido = Receita − Investimento − Custo</code></p>

    <h3>Como interpretar</h3>
    <p>Um ROAS abaixo de 1x indica que a campanha nem pagou a mídia. Um ROI negativo significa prejuízo operacional. O ROAS ideal varia por setor — e-commerce de moda costuma exigir ROAS mínimo de 3x, enquanto serviços com alta margem podem ser rentáveis com ROAS de 1,5x.</p>

    <section class="tool-seo-content">
        <h3>O que é o Calculadora de ROI e ROAS?</h3>
        <p>A Calculadora de ROI e ROAS é uma ferramenta profissional para especialistas em marketing que precisam mensurar o retorno de suas campanhas de publicidade. ROI (Return on Investment) e ROAS (Return on Ad Spend) são métricas críticas para avaliar a eficiência de investimentos em marketing. Uma ferramenta que calcula essas métricas instantaneamente permite tomar decisões rápidas sobre alocação de orçamento e otimização de campanhas.</p>

        <h3>Como usar o Calculadora de ROI e ROAS?</h3>
        <p>Para usar a Calculadora, insira o investimento total gasto em publicidade (em reais), a receita gerada pela campanha e opcionalmente o custo do produto. A ferramenta calcula instantaneamente ROI percentual (quanto você ganhou em relação ao investimento), ROAS (quanto você ganhou para cada real gasto) e lucro líquido. Todos os cálculos são em tempo real, permitindo simular diferentes cenários rapidamente.</p>

        <h3>Casos de uso práticos do Calculadora de ROI e ROAS</h3>
        <p>Marketing moderno é data-driven. Proprietários de e-commerce e agências de marketing vivem à base de ROI e ROAS — são as métricas que justificam orçamento e demonstram valor ao negócio. Anúncios que não geram ROAS de pelo menos 3-4x são considerados ineficientes. Profissionais que dominam análise de ROI conseguem alocar orçamento de forma mais inteligente, maximizando lucro e crescimento.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Justificativa de Verba de Mídia Digital para Diretoria de Grande Rede de Atacarejo</h3>
    <p>Uma rede de atacarejo com 12 lojas no interior de São Paulo investia R$ 45.000 mensais em mídia digital distribuídos entre Google Ads, Meta Ads e e-mail marketing sem critério claro de alocação — a divisão havia sido definida empiricamente no primeiro contrato e nunca revisada. A diretoria financeira passou a questionar o retorno do investimento em reunião de board trimestral, exigindo uma apresentação que comparasse ROI e ROAS por canal de forma que diretores sem background em marketing pudessem compreender. O desafio era traduzir métricas de plataforma (impressões, CTR, CPC) em linguagem financeira (receita gerada, custo por real investido, break-even).</p>
    <p>Utilizamos a calculadora de ROI para construir a análise canal a canal com os dados reais dos últimos 90 dias. Para o Google Ads (investimento de R$ 22.000): receita atribuída de R$ 196.000, resultando em ROAS de 8,9× e ROI de 791%. Para Meta Ads (R$ 14.000 investidos): receita de R$ 68.000, ROAS de 4,9× e ROI de 386%. Para e-mail marketing (R$ 9.000 entre plataforma e produção): receita de R$ 112.000, ROAS de 12,4× e ROI de 1.144%. Os cálculos foram apresentados com o ROAS de break-even de cada canal — calculado a partir da margem bruta média de 18% da rede — para mostrar qual canal estava ou não sustentável independente dos números absolutos.</p>
    <p>A apresentação com os dados estruturados pela calculadora resultou na aprovação de aumento de verba de R$ 45.000 para R$ 60.000 mensais, com a diretoria aceitando realocar recursos do Meta para e-mail e Google Ads com base nos números comparativos. A diretora financeira comentou que foi a primeira vez que a apresentação de marketing "falou a língua de uma DRE". O canal de e-mail, que estava sendo questionado por ter o menor número absoluto de cliques, foi reconhecido como o de maior eficiência por real investido.</p>
    <ul>
        <li>Google Ads: ROAS 8,9× — ROI 791%</li>
        <li>Meta Ads: ROAS 4,9× — ROI 386%</li>
        <li>E-mail marketing: ROAS 12,4× — ROI 1.144%</li>
        <li>Resultado: aprovação de aumento de verba de R$ 45k para R$ 60k mensais</li>
    </ul>
    <p>Toda agência que apresenta resultado para diretoria de varejista deve traduzir métricas de plataforma para linguagem financeira. ROI e ROAS calculados com rigor — e comparados ao break-even da margem real do negócio — são a única forma de ter conversas produtivas sobre alocação de budget em reunião de board.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em campanhas para grandes varejistas, o ROAS mínimo aceitável varia por categoria: materiais de construção (margem baixa) exige ROAS de 8× ou mais para ser lucrativo; moda e decoração (margem alta) pode ser positivo com ROAS de 3×. Calcule sempre o ROAS de break-even antes de apresentar resultados — ele é mais honesto do que o ROAS bruto e evita discussões difíceis com o cliente.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
