<div class="card">
    <h1 class="card-title">Gerador de Senhas Fortes</h1>
    <p class="card-description">Gere senhas criptograficamente seguras usando a Web Crypto API. Nenhum dado é enviado ao servidor.</p>

    <div class="pw-output-area" style="margin-top:24px">
        <input type="text" id="pw-result" class="input-readonly pw-result-input" readonly placeholder="Clique em Gerar...">
        <div class="pw-action-row">
            <button class="btn btn-secondary btn-sm" id="pw-copy-btn">Copiar</button>
            <button class="btn btn-primary btn-sm" id="pw-generate-btn">&#x21BA; Gerar Novamente</button>
        </div>
    </div>

    <div class="pw-strength-area">
        <span class="form-label">Força da Senha</span>
        <div class="pw-strength-bar">
            <div class="pw-strength-fill" id="pw-strength-fill"></div>
        </div>
        <span class="pw-strength-label" id="pw-strength-label">—</span>
    </div>

    <div class="pw-controls">
        <div class="form-group">
            <label class="form-label" for="pw-length">Tamanho: <span id="pw-length-val">16</span> caracteres</label>
            <input type="range" id="pw-length" min="8" max="128" value="16">
        </div>

        <div class="pw-checkboxes">
            <label class="bs-inset-label">
                <input type="checkbox" id="pw-uppercase" checked>
                Letras Maiúsculas (A–Z)
            </label>
            <label class="bs-inset-label">
                <input type="checkbox" id="pw-lowercase" checked>
                Letras Minúsculas (a–z)
            </label>
            <label class="bs-inset-label">
                <input type="checkbox" id="pw-numbers" checked>
                Números (0–9)
            </label>
            <label class="bs-inset-label">
                <input type="checkbox" id="pw-symbols" checked>
                Símbolos (!@#$%^&amp;*)
            </label>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Por que usar senhas fortes?</h2>
    <p>Senhas fracas são a principal causa de vazamentos de conta. Uma senha forte combina letras maiúsculas, minúsculas, números e símbolos com comprimento adequado — tornando ataques de força bruta inviáveis computacionalmente.</p>

    <h3>Web Crypto API: aleatoriedade real</h3>
    <p>Esta ferramenta usa <code>window.crypto.getRandomValues()</code> em vez de <code>Math.random()</code>. A diferença é crítica: <code>Math.random()</code> é pseudoaleatório e previsível; a Web Crypto API usa entropia do sistema operacional, garantindo aleatoriedade criptograficamente segura.</p>

    <h3>Como interpretar a força</h3>
    <p><strong>Fraca:</strong> menos de 12 caracteres ou menos de 2 tipos de caracteres. <strong>Média:</strong> 12–15 caracteres com variedade moderada. <strong>Forte:</strong> 16+ caracteres com todos os tipos ativos — ideal para senhas de contas críticas.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Senhas Fortes?</h3>
        <p>O Gerador de Senhas Fortes é uma ferramenta profissional para criar senhas criptograficamente seguras usando a Web Crypto API. Senhas fracas são a vulnerabilidade número 1 em segurança digital. A ferramenta permite configurar comprimento, inclusão de maiúsculas, números e símbolos especiais, garantindo senhas que resistem a ataques de força bruta. Tudo executado 100% no navegador, sem enviar dados ao servidor.</p>

        <h3>Como usar o Gerador de Senhas Fortes?</h3>
        <p>Configure os parâmetros: comprimento mínimo (recomendado 12+ caracteres), incluir MAIÚSCULAS, minúsculas, números e símbolos especiais. Clique em "Gerar Senha" e a ferramenta cria uma senha criptograficamente aleatória conforme os critérios. Você pode gerar múltiplas senhas rapidamente. Copie a senha escolhida e use para criar sua conta, alterar senha ou armazenar em seu gerenciador de senhas.</p>

        <h3>Casos de uso práticos do Gerador de Senhas Fortes</h3>
        <p>Senhas fortes são críticas em qualquer contexto: contas de banco, email, redes sociais, produtos digitais. Hackers usam força bruta contra senhas fracas. Geradores de senha profissional garantem entropia máxima — impossível de ser adivinhada por humanos. Especialistas em cibersegurança recomendam usar geradores de senha e armazenar em gerenciadores (Bitwarden, 1Password) ao invés de reutilizar senhas fracas.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
