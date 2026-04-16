<div class="card">
    <h1 class="card-title">Calculadora de Teste A/B</h1>
    <p class="card-description">Calcule a significância estatística do seu teste A/B. Informe visitantes e conversões de cada grupo e escolha o nível de confiança desejado.</p>

    <div class="ab-groups">
        <div class="ab-group">
            <h3 class="ab-group-title">Controle (A)</h3>
            <div class="form-group">
                <label class="form-label" for="ab-visitors-ctrl">Visitantes</label>
                <input type="number" id="ab-visitors-ctrl" placeholder="ex: 5000" min="0" step="1">
            </div>
            <div class="form-group">
                <label class="form-label" for="ab-conv-ctrl">Conversões</label>
                <input type="number" id="ab-conv-ctrl" placeholder="ex: 150" min="0" step="1">
            </div>
        </div>
        <div class="ab-group">
            <h3 class="ab-group-title">Variação (B)</h3>
            <div class="form-group">
                <label class="form-label" for="ab-visitors-var">Visitantes</label>
                <input type="number" id="ab-visitors-var" placeholder="ex: 5000" min="0" step="1">
            </div>
            <div class="form-group">
                <label class="form-label" for="ab-conv-var">Conversões</label>
                <input type="number" id="ab-conv-var" placeholder="ex: 200" min="0" step="1">
            </div>
        </div>
    </div>

    <div class="form-group ab-confidence-row">
        <label class="form-label" for="ab-confidence">Nível de Confiança</label>
        <select id="ab-confidence" class="lorem-select">
            <option value="0.90">90%</option>
            <option value="0.95" selected>95%</option>
            <option value="0.99">99%</option>
        </select>
        <small class="field-hint">Probabilidade de que o resultado não seja por acaso.</small>
    </div>

    <div id="ab-error" class="ab-error" aria-live="polite"></div>

    <button class="btn btn-primary" id="btn-ab-calc">Calcular Significância</button>

    <div class="ab-results" id="ab-results">
        <div class="roi-result-card">
            <span class="roi-result-label">Taxa de Conversão (A)</span>
            <span class="roi-result-value" id="ab-val-cra">—</span>
            <span class="roi-result-sub">Controle</span>
        </div>
        <div class="roi-result-card">
            <span class="roi-result-label">Taxa de Conversão (B)</span>
            <span class="roi-result-value" id="ab-val-crb">—</span>
            <span class="roi-result-sub">Variação</span>
        </div>
        <div class="roi-result-card">
            <span class="roi-result-label">Z-score</span>
            <span class="roi-result-value" id="ab-val-z">—</span>
            <span class="roi-result-sub">Desvios padrão da média</span>
        </div>
        <div class="roi-result-card">
            <span class="roi-result-label">P-value</span>
            <span class="roi-result-value" id="ab-val-p">—</span>
            <span class="roi-result-sub">Probabilidade do acaso</span>
        </div>
    </div>

    <div class="ab-verdict" id="ab-verdict">
        <span id="ab-verdict-text"></span>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um Teste A/B?</h2>
    <p>Um teste A/B (ou split test) compara duas versões de uma página, anúncio ou e-mail para determinar qual performa melhor. O grupo <strong>Controle (A)</strong> recebe a versão original e o grupo <strong>Variação (B)</strong> recebe a versão modificada.</p>

    <h3>Significância Estatística</h3>
    <p>Um resultado é estatisticamente significativo quando a diferença observada entre os grupos é improvável de ter ocorrido por acaso. O <strong>Nível de Confiança</strong> (90%, 95%, 99%) indica a certeza exigida: com 95% de confiança, há apenas 5% de chance de que o resultado seja ruído aleatório.</p>

    <h3>Fórmulas utilizadas (Z-test bicaudal)</h3>
    <p><code>CR = Conversões ÷ Visitantes</code></p>
    <p><code>Pp = (Conv_A + Conv_B) ÷ (Visit_A + Visit_B)</code></p>
    <p><code>SEp = √(Pp × (1 − Pp) × (1/n₁ + 1/n₂))</code></p>
    <p><code>Z = (CR_B − CR_A) ÷ SEp</code></p>
    <p><code>P-value = 2 × (1 − Φ(|Z|))</code></p>

    <h3>Como interpretar o resultado</h3>
    <p>Se o P-value for menor que o nível de significância (α = 1 − confiança), o teste é considerado estatisticamente significativo e a diferença entre os grupos é real. Caso contrário, não há evidência suficiente para concluir que a variação é melhor — colete mais dados.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
