<?php
$_artigoData = '2025-06-05';
$_artigoCategoria = 'Desenvolvimento';
?>

<div class="card">
    <div class="article-breadcrumb"><a href="<?= BASE_URL ?>base-de-conhecimento">← Base de Conhecimento</a></div>
    <div class="article-meta">
        <span class="article-categoria"><?= $_artigoCategoria ?></span>
        <time datetime="<?= $_artigoData ?>"><?= date('d \d\e F \d\e Y', strtotime($_artigoData)) ?></time>
    </div>
    <h1 class="card-title">SHA-512 e a Integridade de Catálogo em Operações de Alto Volume de Varejo</h1>
    <p class="card-description">Um campo de preço truncado durante transmissão FTP. Um arquivo de catálogo com 80.000 produtos que passou por todas as verificações de existência e tamanho — mas com dados corrompidos. SHA-512 é a diferença entre importar um catálogo íntegro e publicar preços errados às 00h30.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content editorial-article">

    <h2>A Corrupção Silenciosa que Ninguém Detecta</h2>
    <p>O pipeline era simples e funcionava há três anos: o ERP gerava o feed de catálogo às 23h, um job FTP transferia o arquivo para o servidor do e-commerce, e às 00h30 um script de importação processava o arquivo e atualizava preços, estoque e disponibilidade de 80.000 SKUs. Tudo automatizado, tudo monitorado — o script verificava se o arquivo existia, se tinha mais de zero bytes, e se a importação completava sem erros de sintaxe.</p>
    <p>O problema apareceu numa terça-feira de manhã, quando uma cliente tentou comprar um porcelanato 60x60 que estava com preço de R$ 0,89 no site — o preço correto era R$ 89,90. A análise do arquivo importado mostrou que o campo de preço daquele SKU estava truncado: <code>0.89</code> em vez de <code>89.90</code>. O arquivo completo tinha 847 produtos com campos de preço truncados — todos com valores abaixo de R$ 1,00.</p>
    <p>O que aconteceu: durante a transmissão FTP, um timeout de rede causou reconexão automática. O cliente FTP reconectou e continuou a transferência do ponto onde havia parado — mas o servidor FTP não suportava resume corretamente, o que resultou em sobreposição parcial de dados no meio do arquivo. O arquivo resultante tinha exatamente o tamanho esperado, passava em todas as verificações de integridade de tamanho, e continha JSON sintaticamente válido — mas com valores de preço corrompidos que nenhuma validação de sintaxe detectaria.</p>

    <h2>Como SHA-512 Difere de SHA-256 e MD5 em Uso Prático</h2>
    <p>SHA-512, SHA-256 e MD5 são todos algoritmos de hash criptográfico — eles produzem um digest de tamanho fixo a partir de uma entrada de qualquer tamanho. A diferença prática para verificação de integridade de arquivos:</p>
    <ul>
        <li><strong>MD5 (128 bits, 32 caracteres hex):</strong> rápido, amplamente disponível, mas com colisões demonstradas. Para verificação de integridade de arquivo (não de senha), a questão não são as colisões em si — é que MD5 é considerado confiável para integridade de arquivos em ambientes não adversariais. O problema de segurança do MD5 afeta senhas, não checksums de arquivos. Mas por boa prática, use pelo menos SHA-256.</li>
        <li><strong>SHA-256 (256 bits, 64 caracteres hex):</strong> padrão atual para a maioria dos casos de integridade de arquivo. Colisões computacionalmente inviáveis. Mais lento que MD5 mas negligivelmente em arquivos de alguns MB. Recomendado pelo NIST como padrão mínimo.</li>
        <li><strong>SHA-512 (512 bits, 128 caracteres hex):</strong> maior resistência teórica a ataques futuros (incluindo computação quântica parcial). Em hardware de 64 bits, SHA-512 é frequentemente mais rápido que SHA-256 porque aproveita melhor registradores de 64 bits. Para catálogos de produto e arquivos de dados críticos, SHA-512 é a escolha conservadora e defensivamente mais robusta.</li>
    </ul>
    <p>Para integridade de arquivo em pipeline de dados de varejo — onde o risco não é ataque adversarial mas corrupção acidental —, SHA-256 já é mais do que suficiente. SHA-512 é a escolha para ambientes com requisitos de auditoria formal, onde o hash fica em log permanente e precisa sobreviver a décadas de evolução tecnológica.</p>
    <p>Use o <a href="<?= BASE_URL ?>sha512-crc32-generator">Gerador SHA-512 e CRC32</a> para gerar checksums de arquivos localmente antes de enviá-los, e comparar com o hash recebido na outra ponta da transmissão.</p>

    <h2>Implementando Checksum em Pipeline de Dados ERP → E-commerce</h2>
    <p>O protocolo de integridade que implementamos após o incidente de corrupção:</p>

    <h3>No lado do ERP (geração do arquivo)</h3>
    <ol>
        <li>Gerar o arquivo de catálogo normalmente</li>
        <li>Calcular o SHA-512 do arquivo gerado: <code>sha512sum catalogo_20250605.json</code></li>
        <li>Criar um arquivo de checksum paralelo: <code>catalogo_20250605.json.sha512</code> contendo o hash e o nome do arquivo</li>
        <li>Transferir ambos os arquivos: o JSON e o .sha512</li>
    </ol>

    <h3>No lado do e-commerce (antes da importação)</h3>
    <ol>
        <li>Verificar se ambos os arquivos foram recebidos</li>
        <li>Calcular o SHA-512 do arquivo JSON recebido</li>
        <li>Comparar com o hash no arquivo .sha512</li>
        <li>Se os hashes não coincidem: bloquear a importação, disparar alerta, aguardar retransmissão</li>
        <li>Se coincidem: prosseguir com a importação</li>
    </ol>
    <p>Em PHP, a verificação é uma linha: <code>if (hash_file('sha512', $arquivoRecebido) !== $hashEsperado) { /* bloquear */ }</code></p>

    <h2>CRC32 para Verificação Rápida vs SHA-512 para Auditoria</h2>
    <p>CRC32 é um checksum de 32 bits (8 caracteres hex) — muito mais rápido que SHA-512 mas sem propriedades criptográficas. Ele detecta erros acidentais de transmissão mas não resistiria a modificação intencional de arquivo (um atacante pode fabricar um arquivo diferente com o mesmo CRC32 com esforço razoável).</p>
    <p>A combinação que usamos em produção:</p>
    <ul>
        <li><strong>CRC32 no momento da transferência:</strong> verificação rápida após FTP/SFTP, integrada ao protocolo de transferência. Detecta a maioria dos erros de rede antes de qualquer processamento.</li>
        <li><strong>SHA-512 antes da importação:</strong> verificação completa e criptograficamente segura antes de qualquer mudança no banco de dados de produção. O hash fica em log de auditoria com timestamp.</li>
    </ul>
    <p>CRC32 com 8 caracteres tem probabilidade de colisão acidental de aproximadamente 1 em 4 bilhões — suficientemente baixa para erros de transmissão, insuficiente para contextos de segurança. Use CRC32 como verificação rápida de sanidade e SHA-256/512 para integridade formal.</p>

    <h2>Logging de Hashes para Auditoria de Longo Prazo</h2>
    <p>Em operações de varejo com requisitos regulatórios (Nota Fiscal Eletrônica, SPED, auditoria fiscal), o histórico de importações de catálogo pode ser exigido. Um log de auditoria mínimo por importação:</p>
    <ul>
        <li>Timestamp de início e fim da importação</li>
        <li>Nome do arquivo importado</li>
        <li>Tamanho do arquivo em bytes</li>
        <li>Hash SHA-512 do arquivo</li>
        <li>Número de produtos processados, atualizados, ignorados</li>
        <li>Resultado da importação (sucesso, erro, bloqueado por checksum)</li>
    </ul>
    <p>Com esse log, você pode provar exatamente qual versão do catálogo estava ativa em qualquer momento histórico — e se um preço foi publicado incorretamente por corrupção de arquivo (argumento de defesa em disputas com clientes) ou por dado errado no ERP.</p>

    <section class="faq-section">
        <h2>Perguntas Frequentes</h2>

        <div class="faq-item">
            <h3 class="faq-pergunta">SHA-512 é mais seguro que SHA-256 para verificação de integridade de arquivo?</h3>
            <p class="faq-resposta">Para integridade de arquivo em pipeline de dados — onde o risco é corrupção acidental, não ataque adversarial —, SHA-256 já oferece segurança mais do que adequada. SHA-512 é preferível em contextos de auditoria formal de longo prazo (o hash fica em log por anos ou décadas) e em ambientes que precisam de resistência futura a avanços em computação quântica. Para a maioria dos pipelines de dados de varejo, SHA-256 é suficiente; SHA-512 é a escolha conservadora para sistemas críticos.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">Posso usar MD5 para verificar integridade de arquivos de catálogo?</h3>
            <p class="faq-resposta">Tecnicamente sim — colisões MD5 requerem geração intencional, não acontecem por acidente em transmissão de dados. Mas por boa prática e compatibilidade com políticas de segurança corporativa e auditoria, use pelo menos SHA-256. O custo computacional adicional é negligenciável para arquivos de catálogo (alguns MB), e a conformidade com padrões modernos vale o mínimo esforço adicional.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">O que fazer se o hash do arquivo recebido não bate com o hash esperado?</h3>
            <p class="faq-resposta">Bloquear a importação imediatamente — nunca importar um arquivo com hash divergente. Registrar o evento em log com timestamp e os dois hashes (esperado e recebido). Disparar alerta para o time de operações. Solicitar retransmissão do arquivo original. Se a divergência for recorrente, investigar o protocolo de transferência — timeout de rede, modo ASCII em vez de binário no FTP (que converte quebras de linha), ou corrupção no armazenamento temporário.</p>
        </div>

        <div class="faq-item">
            <h3 class="faq-pergunta">SFTP é mais seguro que FTP para transferência de catálogos?</h3>
            <p class="faq-resposta">Sim, significativamente. FTP transfere dados em texto plano, incluindo credenciais de acesso — qualquer interceptação de rede expõe o arquivo e o login/senha. SFTP (SSH File Transfer Protocol) criptografa toda a sessão. Para transferência de arquivos de catálogo com preços, margens e dados de estoque — informação comercialmente sensível —, SFTP ou FTPS (FTP sobre TLS) são obrigatórios. FTP simples não deve ser usado em ambientes de produção de varejo.</p>
        </div>
    </section>

</article>

<div class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Caso Real: NuAto no Varejo</span>
    </div>
    <p>Em uma grande rede de materiais de construção e home center com e-commerce de 80.000 SKUs, a NuAto foi acionada após um incidente de preços incorretos publicados no site durante a madrugada. A análise do incidente revelou que o arquivo de catálogo havia sofrido corrupção silenciosa durante a transmissão FTP — 847 campos de preço truncados, todos aparecendo como valores abaixo de R$ 1,00. O arquivo havia passado em todas as verificações de existência e tamanho, e a importação completou sem erros de sintaxe.</p>
    <p>A implementação da verificação SHA-512 levou 4 dias — 2 dias de desenvolvimento no lado do ERP (para adicionar a geração do hash e do arquivo .sha512 ao job de exportação), 1 dia no lado do e-commerce (para adicionar a verificação antes da importação), e 1 dia de teste em ambiente de homologação simulando corrupção intencional do arquivo. O investimento total foi de aproximadamente 32 horas de desenvolvimento.</p>
    <p>Nos 14 meses seguintes ao go-live da verificação, o sistema bloqueou 4 importações por hash divergente: 2 causadas por timeout de rede durante FTP, 1 por modo ASCII no cliente FTP (que havia convertido as quebras de linha do arquivo JSON, alterando o conteúdo), e 1 por espaço insuficiente no servidor que havia truncado o arquivo durante a escrita. Sem a verificação de SHA-512, todos os 4 arquivos teriam sido importados — e as consequências de preços errados, estoque inconsistente ou registros de produto truncados teriam sido descobertas horas depois, já em produção, pelo time de atendimento ao cliente.</p>
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
            "name": "SHA-512 é mais seguro que SHA-256 para verificação de integridade de arquivo?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Para integridade de arquivo em pipeline de dados com risco de corrupção acidental, SHA-256 já é suficiente. SHA-512 é preferível em contextos de auditoria formal de longo prazo e em ambientes que precisam de resistência futura a avanços em computação quântica."
            }
        },
        {
            "@type": "Question",
            "name": "Posso usar MD5 para verificar integridade de arquivos de catálogo?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tecnicamente sim, para corrupção acidental. Mas por boa prática, use pelo menos SHA-256. O custo computacional adicional é negligenciável para arquivos de catálogo, e a conformidade com padrões modernos vale o esforço mínimo adicional."
            }
        },
        {
            "@type": "Question",
            "name": "O que fazer se o hash do arquivo recebido não bate com o hash esperado?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Bloquear a importação imediatamente. Registrar o evento em log com timestamp e os dois hashes. Disparar alerta para o time de operações. Solicitar retransmissão do arquivo original. Se a divergência for recorrente, investigar o protocolo de transferência."
            }
        },
        {
            "@type": "Question",
            "name": "SFTP é mais seguro que FTP para transferência de catálogos?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Sim, significativamente. FTP transfere dados em texto plano, incluindo credenciais de acesso. SFTP criptografa toda a sessão. Para transferência de arquivos de catálogo com preços e dados de estoque — informação comercialmente sensível —, SFTP ou FTPS são obrigatórios."
            }
        }
    ]
}
</script>
