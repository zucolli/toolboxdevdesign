<?php
$_artigoData = '2025-05-22';
$_artigoCategoria = 'Segurança';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">Argon2id em Apps de Fidelidade: Por Que o Padrão de Segurança Importa no Varejo</h1>
    <p class="card-description">Dois milhões de membros, pontuação em compras, resgate de cashback. A decisão arquitetural entre BCrypt e Argon2id para autenticação não é acadêmica — é a diferença entre um sistema que resiste a ataques de GPU moderna e um que não resiste.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>A Decisão Arquitetural que Importa no Lançamento</h2>
    <p>Quando um app de fidelidade de grande cooperativa de consumo estava em desenvolvimento, a escolha do algoritmo de hash de senha chegou como uma pergunta técnica na reunião de arquitetura: BCrypt (já usado em outros sistemas da cooperativa) ou Argon2id (recomendação mais recente do OWASP)? A resposta dependia de entender o modelo de ameaça específico de um app com 2 milhões de membros e dados de cashback acumulado.</p>
    <p>A questão central não era qual algoritmo era "mais difícil de quebrar" em teoria — era qual algoritmo manteria senhas protegidas por mais tempo se o banco de dados fosse comprometido e os hashes vazassem. Para isso, a análise tinha que considerar o hardware que um atacante real usaria: não CPU comum, mas GPUs de alto desempenho ou ASICs especializados em computação de hash.</p>
    <p>BCrypt é resistente a CPU mas tem limitações em paralelismo de memória — um atacante com farm de GPUs consegue escalar ataques com custo linear. Argon2id tem parâmetro de uso de memória: o algoritmo aloca e usa ativamente um bloco de memória durante o cálculo, o que faz com que cada tentativa de hash consuma memória real — algo que GPUs têm em quantidade limitada comparado à sua capacidade de processamento paralelo. A escolha foi Argon2id.</p>

    <h2>Diferença entre BCrypt, scrypt e Argon2id</h2>
    <p>Os três algoritmos foram projetados para armazenamento de senhas, mas com ênfases diferentes:</p>

    <h3>BCrypt (1999)</h3>
    <p>Work factor baseado em iterações de CPU. O cost factor dobra o tempo de processamento a cada unidade. Sem parâmetro de memória — um atacante com hardware paralelo consegue escalar ataques de forma eficiente porque cada instância de BCrypt usa apenas CPU, sem pressão de memória. Amplamente suportado em todas as linguagens e frameworks. Limite de senha de 72 bytes (caracteres além do 72º são ignorados).</p>

    <h3>scrypt (2009)</h3>
    <p>Introduziu o parâmetro de memória (N), tornando ataques com hardware paralelo mais caros — você precisa de memória real para cada thread de ataque. Mais complexo de configurar corretamente do que BCrypt. Menos suportado em linguagens e frameworks do que BCrypt e Argon2id. Ainda uma boa escolha, mas foi essencialmente superado pelo Argon2id em termos de recomendação atual.</p>

    <h3>Argon2id (2015, vencedor do Password Hashing Competition)</h3>
    <p>Combina dois modos do Argon2: o modo "d" (resistente a ataques de GPU por uso intensivo de memória) e o modo "i" (resistente a ataques de side-channel). O modo "id" oferece proteção em ambas as frentes. Três parâmetros configuráveis: memória (m), iterações (t), e paralelismo (p). É a recomendação do OWASP desde 2019 para novas aplicações.</p>

    <h2>Configuração de Parâmetros Argon2id para Varejo</h2>
    <p>A configuração recomendada pelo OWASP como ponto de partida: <code>m=65536</code> (64MB de memória), <code>t=3</code> (3 iterações), <code>p=4</code> (4 threads paralelas). Essa configuração leva aproximadamente 300-500ms em hardware de servidor moderno — similar ao BCrypt cost=12, com proteção adicional contra ataques de GPU.</p>
    <p>Para o app de fidelidade com 2 milhões de membros, os parâmetros foram ajustados considerando o hardware do servidor de autenticação:</p>
    <ul>
        <li><strong>m=131072 (128MB):</strong> dobro do mínimo recomendado pelo OWASP. Em um servidor com 8GB de RAM, isso limita a 64 instâncias simultâneas de verificação de senha — mais do que suficiente para o pico de logins.</li>
        <li><strong>t=3:</strong> número de iterações. Aumentar t linearmente aumenta o tempo sem aumentar o uso de memória. Para maior proteção com mesmo uso de RAM, prefira aumentar t antes de aumentar m.</li>
        <li><strong>p=2:</strong> paralelismo reduzido para 2 em vez de 4, porque o servidor de autenticação era compartilhado com outros serviços. Isso limitava o custo de CPU por operação de login.</li>
    </ul>
    <p>Use o <a href="<?= BASE_URL ?>argon2-generator">Gerador Argon2id</a> para gerar hashes com os parâmetros configurados e verificar senhas existentes. A ferramenta exibe o hash completo no formato Argon2id com todos os parâmetros embutidos na string de resultado.</p>

    <h2>Por Que Argon2id é Recomendado pelo OWASP desde 2019</h2>
    <p>O Password Hashing Competition, concluído em 2015, avaliou algoritmos de hash de senha ao longo de 4 anos com participação de pesquisadores de criptografia do mundo todo. O Argon2 foi escolhido como vencedor em três categorias distintas: resistência a hardware customizado (GPU/FPGA/ASIC), resistência a side-channel timing attacks, e configurabilidade para diferentes perfis de hardware.</p>
    <p>O OWASP incorporou a recomendação do Argon2id em seu Authentication Cheat Sheet em 2019 e a mantém como primeira recomendação em 2025. BCrypt permanece como alternativa aceitável — especialmente em sistemas legados onde a troca teria custo alto — mas novos sistemas não têm razão técnica para escolher BCrypt em vez de Argon2id.</p>
    <p>A ressalva prática: Argon2id requer PHP 7.2+ com a extensão libsodium habilitada, ou PHP 7.4+ para o suporte nativo via <code>password_hash($senha, PASSWORD_ARGON2ID)</code>. Em ambientes com PHP 5.x ou sem a extensão, BCrypt com cost adequado é a alternativa segura.</p>

    <h2>Impacto em Autenticação de 2 Milhões de Usuários</h2>
    <p>O pico de autenticação do app de fidelidade ocorria toda sexta-feira à noite — dia de acúmulo de pontos de compras da semana e consulta de saldo para o final de semana. O pico era de aproximadamente 8.000 logins por hora, ou 133 logins por minuto.</p>
    <p>Com Argon2id a 400ms por verificação, 133 logins por minuto requer 133 × 0,4s / 60s = 0,89 instâncias de verificação simultâneas em média. Com p=2 (2 threads por verificação), o servidor de autenticação usava ~2 threads em média no pico — completamente dentro da capacidade de um servidor modesto.</p>
    <p>O que realmente impacta a performance não é o algoritmo de hash — é a ausência de cache de sessão. Com tokens de sessão de 24 horas e refresh token de 30 dias, a maioria das requisições de usuários ativos nunca chega à camada de Argon2id. O custo computacional fica concentrado em logins reais, não em validações de sessão.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">Preciso migrar do BCrypt para Argon2id se meu sistema já está em produção?</h3>
            <p class="faq-resposta">Não necessariamente. BCrypt bem configurado (cost >= 12, ajustado para levar pelo menos 1 segundo no servidor) continua sendo uma proteção sólida. A migração para Argon2id faz mais sentido em novos sistemas ou em redesign completo de autenticação. Se a principal ameaça do seu sistema é ataque de GPU massivo (cenário de vazamento de banco de dados de grande escala), a migração gradual via verify-then-rehash vale o investimento. Para a maioria dos sistemas de varejo mid-market, BCrypt atualizado é suficiente.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Qual o limite de tamanho de senha com Argon2id?</h3>
            <p class="faq-resposta">Argon2id não tem limite de tamanho de senha — diferente do BCrypt que ignora caracteres após o 72º byte. Senhas longas funcionam completamente e contribuem para a segurança. Em aplicações de varejo com público amplo (apps de fidelidade, e-commerce), vale comunicar ao usuário que senhas longas são suportadas e encorajadas, mas limitar o máximo em 128 ou 256 caracteres para evitar ataques de DoS por senhas de megabytes.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Como verificar se os parâmetros Argon2id estão adequados para meu hardware?</h3>
            <p class="faq-resposta">Meça o tempo real de execução no servidor de produção (não no laptop de desenvolvimento). O OWASP recomenda que a operação leve pelo menos 1 segundo — se estiver abaixo disso, aumente m ou t. Se estiver acima de 2 segundos em condições de carga normal, reduza os parâmetros ou escale o servidor de autenticação. Reavalie a cada 18 meses conforme o hardware do servidor é atualizado.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Argon2id funciona com PHP nativo ou precisa de extensão?</h3>
            <p class="faq-resposta">PHP 7.4 e superior suportam Argon2id nativamente via password_hash($senha, PASSWORD_ARGON2ID, ['memory_cost' => 65536, 'time_cost' => 3, 'threads' => 4]). Para PHP 7.2-7.3, a extensão libsodium é necessária. Versões anteriores não suportam Argon2id nativamente. Confirme a presença da constante PASSWORD_ARGON2ID antes de usar — se não existir, a função lançará um erro silencioso e usará o algoritmo padrão.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em uma das maiores cooperativas de consumo da América Latina, o desenvolvimento de um app de fidelidade nativo (iOS e Android) para 2 milhões de membros colocou a decisão de algoritmo de hash de senha no centro de uma reunião de arquitetura que durou três horas. Do lado da cooperativa, o argumento por BCrypt era a familiaridade da equipe interna e a presença do algoritmo em outros sistemas. Do lado da NuAto, o argumento por Argon2id era a resistência a ataques de hardware paralelo — fator que se tornava cada vez mais relevante conforme o custo de GPU para aluguel em cloud caía.</p>
    <p>O fator decisivo foi uma simulação de custo de ataque. Considerando os parâmetros de um servidor AWS g5.xlarge (GPU NVIDIA A10G, disponível por aproximadamente US$ 1,00/hora em 2024), calculamos quanto custaria quebrar 1% da base de senhas em um cenário de vazamento — 20.000 contas. Com BCrypt cost=12: aproximadamente 47 dias de GPU, custo estimado de US$ 1.100. Com Argon2id m=131072: o mesmo ataque exigiria memória que a GPU não possui de forma econômica — o equivalente precisaria de um cluster de memória especializado, elevando o custo estimado para US$ 180.000 ou mais. A decisão pelo Argon2id foi unânime.</p>
    <p>A implementação levou 3 semanas de desenvolvimento, incluindo os testes de carga no ambiente de homologação para calibrar os parâmetros ao hardware de produção. O resultado final: m=131072, t=3, p=2, com tempo médio de verificação de 420ms no servidor de autenticação dedicado. Em dois anos de operação, o app processou mais de 14 milhões de autenticações sem um único incidente de segurança relacionado ao mecanismo de hash.</p>
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
            "name": "Preciso migrar do BCrypt para Argon2id se meu sistema já está em produção?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Não necessariamente. BCrypt bem configurado (cost >= 12) continua sendo uma proteção sólida. A migração para Argon2id faz mais sentido em novos sistemas ou em redesign completo de autenticação. Se a principal ameaça é ataque de GPU massivo, a migração gradual via verify-then-rehash vale o investimento."
            }
        },
        {
            "@type": "Question",
            "name": "Qual o limite de tamanho de senha com Argon2id?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Argon2id não tem limite de tamanho de senha — diferente do BCrypt que ignora caracteres após o 72º byte. Em aplicações de varejo com público amplo, vale limitar o máximo em 128 ou 256 caracteres para evitar ataques de DoS por senhas de megabytes."
            }
        },
        {
            "@type": "Question",
            "name": "Como verificar se os parâmetros Argon2id estão adequados para meu hardware?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Meça o tempo real de execução no servidor de produção. O OWASP recomenda que a operação leve pelo menos 1 segundo. Se estiver abaixo disso, aumente m ou t. Reavalie a cada 18 meses conforme o hardware do servidor é atualizado."
            }
        },
        {
            "@type": "Question",
            "name": "Argon2id funciona com PHP nativo ou precisa de extensão?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "PHP 7.4 e superior suportam Argon2id nativamente via password_hash() com a constante PASSWORD_ARGON2ID. Para PHP 7.2-7.3, a extensão libsodium é necessária. Confirme a presença da constante PASSWORD_ARGON2ID antes de usar."
            }
        }
    ]
}
</script>
