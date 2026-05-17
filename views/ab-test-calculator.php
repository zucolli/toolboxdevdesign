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

<section class="tool-seo-content">
    <h3>Por que fazer testes A/B?</h3>
    <p>Testes A/B são fundamentais para otimizar qualquer estratégia digital. Ao invés de fazer suposições, você coleta dados reais sobre o comportamento dos usuários. Uma pequena melhoria de 1% na taxa de conversão pode significar milhares de reais em receita adicional para um site de alto tráfego.</p>

    <h3>Importância da significância estatística</h3>
    <p>Muitas empresas cometem o erro de interromper um teste muito cedo, quando a diferença ainda pode ser resultado do acaso. A significância estatística garante que você só declare vitória quando há evidência suficiente. Um teste não significativo não é um resultado ruim — é apenas um sinal para coletar mais dados ou ajustar a abordagem.</p>

    <h3>Quando usar 90%, 95% ou 99% de confiança?</h3>
    <p><strong>90% de confiança</strong> é adequado para testes rápidos com pouca margem de erro financeiro. <strong>95% de confiança</strong> é o padrão da indústria, balanceando rigor estatístico com praticidade. <strong>99% de confiança</strong> é ideal para decisões críticas onde o risco de um erro é muito alto, como mudanças em produtos core ou processos financeiros.</p>

    <h3>Exemplos práticos</h3>
    <p><strong>Cenário 1:</strong> Um site de e-commerce testa o texto de um botão CTA. Com 5.000 visitantes por grupo e 95% de confiança, ele obtém um resultado significativo com apenas 2% mais cliques. A mudança é implementada globalmente, gerando milhões em receita extra.</p>
    <p><strong>Cenário 2:</strong> Uma SaaS testa uma nova cópia de preço. Após 3.000 visitantes por grupo, o resultado não é significativo (P-value = 0.12). A equipe coleta mais dados antes de fazer qualquer mudança, evitando uma decisão baseada em ruído aleatório.</p>

    <h3>Armadilhas comuns em testes A/B</h3>
    <p><strong>Parar cedo demais:</strong> Interromper o teste assim que um resultado "parece bom" aumenta o risco de falsos positivos. <strong>Testar múltiplas variáveis:</strong> Mudar várias coisas simultaneamente dificulta identificar qual mudança causou o efeito. <strong>Ignorar fatores externos:</strong> Uma campanha de marketing ou sazonalidade pode influenciar os resultados — sempre considere o contexto.</p>
</section>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Teste A/B em E-mail Marketing para Base de 340.000 Clientes de Cooperativa de Consumo</h3>
    <p>Uma cooperativa de consumo com sede no Paraná e base ativa de 340.000 associados cadastrados enviava mensalmente um e-mail com as promoções da semana. Historicamente, a taxa de abertura ficava entre 18% e 22% e o CTR raramente ultrapassava 1,8%. A equipe de marketing acreditava que o criativo era o gargalo, mas não tinha base estatística para justificar mudanças de direção criativa para a diretoria. A agência foi chamada para estruturar a primeira rodada de testes A/B com metodologia rigorosa, em vez de decisões baseadas em preferência pessoal ou intuição.</p>
    <p>Desenhamos dois criativos para o e-mail de ofertas de hortifrutigranjeiros: variante A com foto de produto (imagem técnica do fornecedor sobre fundo branco) e variante B com foto de lifestyle (família preparando refeição com os produtos em cena). Enviamos a variante A para 17.000 contatos e a variante B para outros 17.000 — 10% da base total, estratificados por engajamento histórico para garantir grupos equivalentes. Após 48 horas, coletamos os dados de CTR: A gerou 1.920 cliques em 17.000 envios (11,3% de abertura, 1,04% CTR) e B gerou 2.370 cliques no mesmo volume (11,7% abertura, 1,39% CTR). Antes de declarar B vencedor, usamos a calculadora de A/B para verificar a significância estatística com Z-test — o resultado apontou p-value de 0,012, ou seja, confiança de 98,8% de que a diferença não era ruído amostral.</p>
    <p>Com a significância confirmada, enviamos a variante B para os 306.000 contatos restantes da base. O resultado final foi um CTR de 1,42% contra a média histórica de 1,8% invertida — na prática, um aumento de 23% em relação à performance anterior de mesmo template com foto de produto. O exercício também criou um precedente interno: a diretoria passou a exigir significância estatística calculada em toda proposta de mudança criativa, o que elevou o nível de maturidade analítica da equipe de marketing da cooperativa.</p>
    <ul>
        <li>Base de teste: 34.000 contatos (10% da base, 17k por variante)</li>
        <li>Variante B (lifestyle): CTR 1,39% vs. A (produto): CTR 1,04%</li>
        <li>Significância estatística: p-value 0,012 (confiança de 98,8%)</li>
        <li>Ganho efetivo ao aplicar para 100% da base: +23% em cliques totais</li>
    </ul>
    <p>Agências que atendem varejistas com grandes bases de e-mail precisam institucionalizar o cálculo de significância antes de qualquer declaração de vencedor. Pular essa etapa é arriscado: decisões tomadas com amostras insuficientes ou resultados não significativos geram mudanças criativas equivocadas que custam receita ao cliente.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Nunca tome decisões com menos de 7 dias de teste, pois o comportamento do consumidor de fim de semana é drasticamente diferente do dia de semana. Em varejo, quinta e sexta têm padrões de compra completamente distintos de segunda e terça — encerrar o teste antes de cobrir os dois ciclos invalida a significância estatística.</p>
</aside>
