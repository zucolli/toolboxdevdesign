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

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Geração de Senhas Iniciais para 800+ Fornecedores em Portal B2B de Grande Rede de Atacarejo</h3>
    <p>No mesmo projeto de migração de hashes do portal de fornecedores da grande rede de atacarejo, enfrentamos um desafio operacional paralelo: gerar e distribuir senhas iniciais para 847 fornecedores que nunca haviam acessado o novo portal B2B. O portal dava acesso a pedidos de compra, notas fiscais e dados de contrato — informações comercialmente sensíveis. O processo anterior de criação de senhas era desastroso: a equipe de TI do cliente usava variações de <code>Fornecedor@2024</code> com o nome do fornecedor concatenado, o que tornava as senhas previsíveis e facilmente guessáveis por qualquer concorrente ou funcionário desonesto que conhecesse o padrão.</p>
    <p>Usamos o Gerador de Senha para estabelecer o novo padrão: senhas de 16 caracteres com obrigatoriedade de letras maiúsculas, minúsculas, números e símbolos (<code>!@#$%^&*</code>). Geramos as 847 senhas individualmente — nunca em lote — para garantir que cada fornecedor tivesse uma senha completamente única sem nenhum padrão identificável. As senhas geradas foram armazenadas temporariamente em planilha criptografada com AES-256 antes da distribuição. O protocolo de distribuição utilizou e-mail com TLS obrigatório: a senha era enviada em e-mail separado do link de primeiro acesso, com validade de 48 horas e obrigatoriedade de troca no primeiro login.</p>
    <p>A distribuição levou 3 dias úteis e 100% dos fornecedores ativos (791 dos 847 — os 56 restantes tinham cadastro desatualizado) acessaram o portal e trocaram a senha dentro do prazo. O relatório de auditoria pós-implantação não identificou nenhuma tentativa bem-sucedida de acesso não autorizado nos primeiros 6 meses. A equipe de TI do cliente adotou o protocolo de geração via ferramenta como padrão permanente para novos cadastros, eliminando o padrão previsível anterior.</p>
    <p>Para qualquer portal B2B de varejo com acesso a dados comerciais sensíveis, a qualidade da senha inicial é tão crítica quanto a do hash que a armazena. Senhas fracas distribuídas em massa são uma vulnerabilidade sistêmica que pode comprometer toda a cadeia de suprimentos — não apenas um fornecedor individual.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em agências que gerenciam múltiplas contas de clientes varejistas, senhas compartilhadas são o principal vetor de risco. Gere uma senha única de 24+ caracteres para cada integração de plataforma (Google Ads, Meta, RD Station) e armazene em cofre de senhas. Jamais reutilize senhas entre clientes — o comprometimento de uma conta pode se propagar para toda a carteira.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
