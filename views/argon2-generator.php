<div class="card">
    <h1 class="card-title">Gerador e Verificador Argon2id</h1>
    <p class="card-description">Argon2id é o padrão ouro atual para hash de senhas. Gere hashes seguros e verifique senhas diretamente pelo backend PHP.</p>

    <div class="argon2-grid">

        <!-- Bloco: Gerar -->
        <div class="argon2-block">
            <span class="argon2-block-title">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Gerar Hash
            </span>

            <div class="form-group">
                <label class="form-label" for="argon2-password">Senha</label>
                <input type="text" id="argon2-password" placeholder="Digite a senha a ser hasheada" autocomplete="off">
            </div>

            <button id="btn-argon2-generate" class="btn btn-primary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Gerar Argon2id
            </button>

            <div class="form-group" style="margin-top:1.25rem;">
                <label class="form-label" for="argon2-hash-output">Hash gerado</label>
                <div class="input-copy-row">
                    <input type="text" id="argon2-hash-output" class="input-readonly" readonly placeholder="$argon2id$v=19$…">
                    <button id="btn-copy-argon2" class="btn btn-secondary" type="button">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copiar
                    </button>
                </div>
            </div>
        </div>

        <!-- Bloco: Verificar -->
        <div class="argon2-block">
            <span class="argon2-block-title">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                Verificar Hash
            </span>

            <div class="form-group">
                <label class="form-label" for="verify-password">Senha</label>
                <input type="text" id="verify-password" placeholder="Digite a senha a verificar" autocomplete="off">
            </div>

            <div class="form-group">
                <label class="form-label" for="verify-hash">Hash Argon2id</label>
                <input type="text" id="verify-hash" placeholder="$argon2id$v=19$…">
            </div>

            <button id="btn-argon2-verify" class="btn btn-primary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                Verificar
            </button>

            <div id="argon2-verify-result" class="argon2-alert"></div>
        </div>

    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é Argon2id?</h2>
    <p>Argon2id é o algoritmo vencedor da Password Hashing Competition (2015) e é hoje o padrão recomendado pelo OWASP para armazenamento seguro de senhas. Combina resistência a ataques de GPU (Argon2d) e resistência a ataques de side-channel (Argon2i), sendo a variante híbrida mais equilibrada para uso geral.</p>

    <h3>Onde e por que usar?</h3>
    <p>Use Argon2id sempre que precisar armazenar senhas de usuários em banco de dados. Diferente de MD5 ou SHA-256 (algoritmos rápidos, facilmente quebráveis por GPUs modernas), o Argon2id é intencionalmente lento e exige muita memória RAM, tornando ataques de força bruta proibitivamente caros. É suportado nativamente pelo PHP 7.2+ via <code>password_hash()</code> com <code>PASSWORD_ARGON2ID</code>.</p>

    <h3>Como funciona?</h3>
    <p>Na aba "Gerar Hash": insira a senha e clique em "Gerar Argon2id". O hash é criado no servidor PHP e retornado via API — nunca armazenado. Na aba "Verificar Hash": insira a senha em texto claro e o hash armazenado; o servidor verifica a correspondência usando <code>password_verify()</code> sem precisar conhecer a senha original.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador Argon2id?</h3>
        <p>O Gerador Argon2id é uma ferramenta profissional para desenvolvedores que desejam implementar o padrão ouro atual em segurança de senhas. Argon2id é o algoritmo vencedor da competição Password Hashing Competition de 2015, sendo recomendado por especialistas em segurança como substituinte superior ao Bcrypt para armazenamento de senhas. Ele é resistente a ataques de GPU e oferece proteção superior contra força bruta.</p>

        <h3>Como usar o Gerador Argon2id?</h3>
        <p>Para usar o Gerador Argon2id, digite ou cole a senha desejada no campo de entrada. Clique em "Gerar Hash" e o algoritmo Argon2id (executado pelo backend PHP) gera um hash seguro com salt aleatório. A ferramenta também oferece verificação de hash: insira a senha original e o hash anterior para confirmar se correspondem. Cada hash é único mesmo para a mesma senha.</p>

        <h3>Casos de uso práticos do Gerador Argon2id</h3>
        <p>Argon2id é recomendado por organizações de segurança como OWASP e NIST para novas aplicações. É particularmente eficaz contra ataques de força bruta porque consome memória significativa e tempo de processamento. Projetos Node.js, Python, PHP e Java modernos adotam Argon2 como padrão. Implementar Argon2id em sua aplicação web demonstra compromisso sério com segurança de dados de usuários.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Escolha de Algoritmo de Hash para App de Fidelidade de Cooperativa com 2 Milhões de Membros</h3>
    <p>Uma cooperativa de consumo com faturamento anual na casa dos bilhões de reais nos contratou para especificar a arquitetura de segurança do seu novo aplicativo de fidelidade. O app teria 2 milhões de membros ativos, com acesso a pontos acumulados, histórico de compras e benefícios exclusivos. A diretoria de tecnologia estava dividida entre BCrypt (pela popularidade) e Argon2id (pelo padrão mais recente). A decisão não era trivial: com uma base desse tamanho, o algoritmo escolhido impactaria diretamente a escalabilidade dos servidores de autenticação e o nível de proteção contra ataques futuros com hardware especializado.</p>
    <p>Usamos o Gerador Argon2id para testar diferentes configurações de parâmetros no ambiente de produção antes de tomar a decisão. O ponto central do argumento técnico foi a resistência a ataques de hardware: BCrypt é eficiente em CPUs mas pode ser paralelizado em GPUs e FPGAs com hardware relativamente acessível. Argon2id com configuração de memória alta (64 MB por hash) torna ataques em GPU dramaticamente mais caros porque cada tentativa exige a alocação de memória completa — inviabilizando o paralelismo massivo. Testamos os tempos de resposta com os parâmetros recomendados pelo OWASP: <code>memory_cost=65536</code>, <code>time_cost=3</code>, <code>threads=4</code>, garantindo tempo de hash abaixo de 500ms por operação nos servidores de produção.</p>
    <p>A recomendação final foi Argon2id com os parâmetros validados aqui. O app foi lançado seis meses depois com zero incidentes de segurança no primeiro ano de operação. O relatório de penetration testing contratado pela cooperativa classificou a implementação de autenticação como "sem vulnerabilidades identificáveis" — o único módulo que recebeu essa classificação. A decisão de usar Argon2id em vez de BCrypt foi citada explicitamente pelo time de pentest como diferencial positivo.</p>
    <p>Para qualquer sistema de fidelidade varejista com base acima de 500 mil usuários, a escolha do algoritmo de hash deve ser documentada e justificada tecnicamente — não apenas seguida por convenção. O custo computacional extra do Argon2id é desprezível comparado ao custo de um vazamento de dados em escala de milhões de usuários.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em sistemas de cupom ou cashback para grandes redes varejistas, onde tokens são gerados por lote, o Argon2id garante que mesmo com acesso ao banco de dados, o atacante não consiga reverter os tokens em tempo hábil. Para campanhas de alto volume com prêmios de alto valor, a segurança do token é tão crítica quanto a segurança do produto.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
