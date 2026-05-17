<?php
$_artigoData = '2025-05-15';
$_artigoCategoria = 'Segurança';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">BCrypt em Portais de Fornecedor: Segurança Real em Integrações B2B de Varejo</h1>
    <p class="card-description">Um portal de fornecedores com 800 empresas cadastradas, acesso a precificação confidencial e notas fiscais — protegido por MD5 sem salt. Este artigo mostra como a auditoria revelou o problema e como a migração para BCrypt foi feita sem invalidar nenhuma senha existente.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>MD5 em 2024: O Risco que Você Não Vê no Dashboard</h2>
    <p>O portal de fornecedores tinha sido desenvolvido em 2017 por uma equipe interna que não tinha segurança como prioridade — o foco era funcionalidade. Funcionou. Os fornecedores usavam, os pedidos de compra circulavam, as notas fiscais eram carregadas. Sete anos depois, o sistema ainda estava em produção, com 800+ fornecedores ativos, e ninguém havia revisado o mecanismo de autenticação.</p>
    <p>A descoberta veio durante uma auditoria de segurança solicitada pelo cliente como pré-requisito para uma certificação ISO 27001. A query era direta: <code>SELECT senha FROM usuarios LIMIT 10</code>. As senhas eram hashes de 32 caracteres hexadecimais — MD5 puro, sem salt. Uma busca rápida em tabelas rainbow online encontrou 7 das 10 senhas em menos de 8 segundos.</p>
    <p>O que tornava o risco concreto: o portal dava acesso a tabelas de preço de custo de produtos — informação que, nas mãos de um concorrente, valia muito. Um fornecedor mal-intencionado com acesso à conta de outro fornecedor podia ver toda a estrutura de margem da rede. MD5 sem salt não é um risco teórico — é uma vulnerabilidade que qualquer pessoa com um laptop e 15 minutos consegue explorar.</p>

    <h2>Por Que MD5 é Inadequado para Armazenamento de Senhas</h2>
    <p>MD5 foi projetado para verificação de integridade de arquivos — não para proteção de senhas. Três problemas fundamentais o tornam inadequado para autenticação:</p>
    <ul>
        <li><strong>Velocidade:</strong> MD5 é extremamente rápido — uma GPU moderna processa bilhões de hashes MD5 por segundo. Isso é ótimo para verificar um arquivo de 10GB, mas péssimo para senhas: um ataque de força bruta processa todos os candidatos a uma velocidade que torna senhas de até 8 caracteres trivialmente quebráveis em horas.</li>
        <li><strong>Rainbow tables:</strong> tabelas pré-computadas de hash→senha para as senhas mais comuns já estão disponíveis publicamente. "123456" em MD5 é <code>e10adc3949ba59abbe56e057f20f883e</code> — qualquer tabela rainbow tem esse mapeamento. Sem salt, qualquer senha fraca é imediatamente identificável.</li>
        <li><strong>Colisões:</strong> colisões em MD5 foram demonstradas em 2004. Embora colisões de senha sejam raras na prática, a existência de colisões computáveis é uma falha arquitetural que elimina MD5 de qualquer uso criptográfico sério.</li>
    </ul>
    <p>Salt resolve parcialmente o problema de rainbow tables — um salt aleatório por usuário garante que o mesmo hash não aparece para dois usuários com a mesma senha. Mas salt não resolve o problema de velocidade: com sal, o atacante ainda processa bilhões de hashes por segundo, só precisa fazer isso individualmente para cada conta em vez de em lote.</p>

    <h2>Como BCrypt com Cost=12 Funciona</h2>
    <p>BCrypt foi projetado em 1999 especificamente para armazenamento de senhas. Seu diferencial é o work factor (custo): um parâmetro que controla quantas iterações o algoritmo executa. Cost 10 executa 2¹⁰ = 1.024 iterações. Cost 12 executa 2¹² = 4.096 iterações. Cost 14 executa 2¹⁴ = 16.384 iterações.</p>
    <p>Na prática, BCrypt com cost=12 leva aproximadamente 250-400ms para gerar um hash em hardware moderno. Para um usuário legítimo fazendo login, isso é imperceptível. Para um atacante tentando 1 bilhão de senhas, 300ms por tentativa significa que a força bruta levaria séculos — não horas.</p>
    <p>O hash BCrypt inclui o salt embutido na própria string de resultado: <code>$2y$12$[22 chars de salt][31 chars de hash]</code>. Você não precisa armazenar o salt separadamente — o hash BCrypt é auto-suficiente para verificação.</p>
    <p>Use o <a href="<?= BASE_URL ?>hash-generator">Gerador de Hash</a> para gerar hashes BCrypt com cost configurável e entender a estrutura do resultado antes de implementar em produção.</p>

    <h2>Migração Segura: Verify-Then-Rehash</h2>
    <p>O desafio de migrar um banco de senhas MD5 para BCrypt é que você não tem acesso às senhas em texto plano — só aos hashes. Não dá para simplesmente fazer hash de hash. A solução é a técnica verify-then-rehash, que migra as senhas gradualmente sem interromper o serviço e sem invalidar nenhuma conta existente.</p>
    <p>O fluxo no momento do login:</p>
    <ol>
        <li>Usuário submete senha em texto plano</li>
        <li>Sistema verifica se o hash armazenado começa com <code>$2y$</code> (BCrypt) ou tem 32 caracteres (MD5)</li>
        <li>Se MD5: calcula <code>md5($senhaDigitada)</code> e compara com o hash armazenado</li>
        <li>Se a senha está correta: imediatamente gera <code>password_hash($senhaDigitada, PASSWORD_BCRYPT, ['cost' => 12])</code> e atualiza o banco</li>
        <li>Se BCrypt: usa <code>password_verify($senhaDigitada, $hashArmazenado)</code> diretamente</li>
    </ol>
    <p>Com esse padrão, cada usuário que faz login migra automaticamente para BCrypt. Usuários que não fazem login permanecem com MD5 — mas após 90 dias, você pode forçar reset de senha para os que ainda não migraram. Em um portal B2B com 800 fornecedores ativos, a migração completa levou 47 dias com esse método passivo.</p>

    <h2>Performance de BCrypt em Alto Volume de Autenticações</h2>
    <p>BCrypt com cost=12 leva ~300ms por verificação. Em uma aplicação com 1.000 logins simultâneos, isso significa 1.000 threads bloqueadas por 300ms — o que pode ser um problema de capacidade dependendo da arquitetura.</p>
    <p>Para portais B2B com picos de autenticação previsíveis (como o horário de abertura comercial às 8h), a solução é combinar BCrypt com um mecanismo de sessão robusto. Autentique com BCrypt uma vez, emita um token de sessão com validade de 8 horas, e as requisições subsequentes validam o token (operação de microsegundos) — não reautenticam com BCrypt.</p>
    <p>O portal de fornecedores em questão tinha pico de 40 logins simultâneos — bem abaixo do limiar onde BCrypt se torna problema de performance. Para operações com dezenas de milhares de logins por hora, o Argon2id oferece melhor controle de paralelismo e consumo de memória.</p>

    <h2>Quando Usar Cost > 12</h2>
    <p>A recomendação do OWASP é ajustar o custo do BCrypt para que a operação leve pelo menos 1 segundo no hardware do servidor de produção. Se com cost=12 a operação leva 250ms, tente cost=13 (~500ms) ou cost=14 (~1s). Reavalie a configuração a cada 2 anos — hardware fica mais rápido, e o que levava 1 segundo em 2020 pode levar 100ms em 2026.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">BCrypt ou Argon2id para novos projetos?</h3>
            <p class="faq-resposta">Para novos projetos sem restrição de biblioteca, Argon2id é a recomendação atual do OWASP desde 2019. BCrypt é uma escolha sólida e amplamente suportada — mas Argon2id oferece parâmetros de memória e paralelismo que o tornam mais resistente a ataques de hardware especializado (GPUs e ASICs). BCrypt é a escolha conservadora e segura; Argon2id é a escolha moderna e defensivamente mais robusta.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">SHA-256 com salt é suficiente para senhas?</h3>
            <p class="faq-resposta">Não. SHA-256, mesmo com salt, é muito rápido — e a velocidade é o inimigo do armazenamento seguro de senhas. Uma GPU moderna processa centenas de milhões de SHA-256 por segundo. O salt impede ataques de rainbow table, mas não desacelera ataques de força bruta. Use sempre algoritmos projetados para senhas: BCrypt, Argon2id, ou scrypt.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como saber se minha aplicação está usando BCrypt ou MD5?</h3>
            <p class="faq-resposta">Consulte diretamente o banco de dados. Hashes BCrypt têm formato $2y$XX$ no início e 60 caracteres no total. Hashes MD5 têm 32 caracteres hexadecimais. Hashes SHA-1 têm 40 caracteres. Se você vê qualquer coisa diferente do padrão BCrypt ou Argon2id, a aplicação precisa ser migrada.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">É necessário forçar troca de senha após migrar para BCrypt?</h3>
            <p class="faq-resposta">Não é tecnicamente necessário se a migração foi feita com verify-then-rehash — as senhas continuam válidas e são migradas automaticamente no próximo login. Mas é uma boa prática de segurança comunicar aos usuários que uma atualização de segurança foi realizada e encorajar a troca de senha, especialmente em portais com acesso a dados sensíveis. Forçar troca imediata é recomendado se houver suspeita de vazamento dos hashes MD5.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em uma grande rede de atacarejo com centenas de lojas no estado de São Paulo, a NuAto conduziu uma auditoria de segurança no portal de fornecedores B2B — sistema que concentrava acesso a contratos de fornecimento, tabelas de preço de custo e notas fiscais eletrônicas de mais de 800 empresas fornecedoras. A auditoria foi motivada por uma exigência de seguro cibernético, não por um incidente — o que, em retrospecto, foi uma sorte.</p>
    <p>A descoberta foi imediata: as senhas estavam armazenadas em MD5 sem salt, e o campo de senha no banco de dados não tinha nenhuma restrição de acesso além da autenticação de aplicação. Qualquer desenvolvedor com acesso ao banco de dados de produção — e havia quatro com esse acesso — podia trivialmente reverter as senhas da maioria dos fornecedores usando tabelas rainbow públicas. O plano de remediação priorizou três ações simultâneas: bloqueio de acesso direto ao banco por desenvolvedores (acesso via role específica com auditoria), implementação do verify-then-rehash em produção, e notificação dos fornecedores de que uma atualização de segurança havia sido realizada.</p>
    <p>A migração via verify-then-rehash durou 47 dias para cobrir 94% dos usuários ativos. Os 6% restantes — fornecedores que não haviam feito login no período — receberam e-mail de reset forçado. O custo total da remediação foi estimado em 120 horas de desenvolvimento e 3 horas de comunicação. O custo hipotético de um vazamento de dados com as tabelas de preço de custo da rede — informação estratégica de alto valor competitivo — seria de ordem de magnitude maior, sem considerar as implicações da LGPD.</p>
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
            "name": "BCrypt ou Argon2id para novos projetos?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Para novos projetos sem restrição de biblioteca, Argon2id é a recomendação atual do OWASP desde 2019. BCrypt é uma escolha sólida e amplamente suportada, mas Argon2id oferece parâmetros de memória e paralelismo que o tornam mais resistente a ataques de hardware especializado."
            }
        },
        {
            "@type": "Question",
            "name": "SHA-256 com salt é suficiente para senhas?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Não. SHA-256, mesmo com salt, é muito rápido — uma GPU moderna processa centenas de milhões de SHA-256 por segundo. O salt impede ataques de rainbow table, mas não desacelera ataques de força bruta. Use sempre algoritmos projetados para senhas: BCrypt, Argon2id, ou scrypt."
            }
        },
        {
            "@type": "Question",
            "name": "Como saber se minha aplicação está usando BCrypt ou MD5?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Consulte diretamente o banco de dados. Hashes BCrypt têm formato $2y$XX$ no início e 60 caracteres no total. Hashes MD5 têm 32 caracteres hexadecimais. Se você vê qualquer coisa diferente do padrão BCrypt ou Argon2id, a aplicação precisa ser migrada."
            }
        },
        {
            "@type": "Question",
            "name": "É necessário forçar troca de senha após migrar para BCrypt?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Não é tecnicamente necessário se a migração foi feita com verify-then-rehash. Mas é uma boa prática comunicar aos usuários que uma atualização de segurança foi realizada e encorajar a troca de senha. Forçar troca imediata é recomendado se houver suspeita de vazamento dos hashes MD5."
            }
        }
    ]
}
</script>
