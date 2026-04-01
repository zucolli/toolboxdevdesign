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
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
