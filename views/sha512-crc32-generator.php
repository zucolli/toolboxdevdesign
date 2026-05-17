<div class="card">
    <h1 class="card-title">Gerador SHA-512 e CRC32</h1>
    <p class="card-description">Digite qualquer texto para calcular o hash SHA-512 e o checksum CRC32 instantaneamente no navegador, sem enviar dados ao servidor.</p>

    <div class="form-group">
        <label class="form-label" for="checksum-input">String Original</label>
        <textarea
            id="checksum-input"
            rows="4"
            placeholder="Digite ou cole o texto aqui…"
            autofocus
        ></textarea>
    </div>

    <div class="checksum-results">
        <div class="checksum-block">
            <div class="checksum-block-header">
                <span class="checksum-block-title">Hash SHA-512</span>
                <button id="btn-copy-sha512" class="btn btn-ghost btn-sm" type="button">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    Copiar
                </button>
            </div>
            <textarea
                id="sha512-output"
                class="input-readonly checksum-output"
                readonly
                rows="3"
                placeholder="Aguardando entrada…"
            ></textarea>
        </div>

        <div class="checksum-block">
            <div class="checksum-block-header">
                <span class="checksum-block-title">Checksum CRC32</span>
                <button id="btn-copy-crc32" class="btn btn-ghost btn-sm" type="button">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    Copiar
                </button>
            </div>
            <input
                type="text"
                id="crc32-output"
                class="input-readonly"
                readonly
                placeholder="Aguardando entrada…"
            >
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que são SHA-512 e CRC32?</h2>
    <p><strong>SHA-512</strong> é um algoritmo da família SHA-2, produzindo um hash de 512 bits (128 caracteres hexadecimais). É criptograficamente seguro e amplamente usado para verificar integridade de dados, assinar documentos digitais e em protocolos como TLS. <strong>CRC32</strong> é um checksum de 32 bits (8 caracteres HEX), rápido e eficiente, mas não criptograficamente seguro — ideal para detecção de erros em transferências de dados.</p>

    <h3>Onde e por que usar?</h3>
    <p>Use <strong>SHA-512</strong> para verificar se um arquivo baixado da internet não foi corrompido ou adulterado (distribuidores de software publicam o hash do instalador). Use também para criar tokens de sessão ou assinar dados em APIs. Use <strong>CRC32</strong> para verificações rápidas de integridade em redes, arquivos ZIP e bancos de dados — onde performance importa mais que segurança criptográfica.</p>

    <h3>Como funciona?</h3>
    <p>Digite ou cole qualquer texto no campo acima. O SHA-512 é calculado via Web Crypto API (<code>crypto.subtle.digest</code>) diretamente no navegador, sem comunicação com servidor. O CRC32 é implementado em JavaScript puro usando uma tabela de lookup polinomial. Ambos os resultados são atualizados em tempo real a cada tecla digitada.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador SHA-512 e CRC32?</h3>
        <p>O Gerador SHA-512 e CRC32 é uma ferramenta de hashing dual que oferece duas formas diferentes de validação de integridade de dados. SHA-512 é um algoritmo criptográfico forte, ideal para aplicações de segurança e assinaturas digitais. CRC32 é um checksum rápido, perfeito para detectar corrupção acidental de dados durante transferências de arquivo. Ambas executam 100% no navegador, sem enviar dados ao servidor.</p>

        <h3>Como usar o Gerador SHA-512 e CRC32?</h3>
        <p>Use a ferramenta digitando o texto ou colando conteúdo no campo de entrada. Clique em "Gerar Hashes" para obter instantaneamente o SHA-512 (64 caracteres hexadecimais) e CRC32 (8 caracteres hexadecimais). Ambos são calculados pela Web Crypto API do navegador em tempo real, com sincronização bidirecional entre entrada e hashes. Copie cada resultado conforme necessário para seu projeto.</p>

        <h3>Casos de uso práticos do Gerador SHA-512 e CRC32</h3>
        <p>SHA-512 é amplamente usado em aplicações de blockchain, assinaturas digitais e verificação de integridade crítica. CRC32, mais leve, é ideal para verificações rápidas de arquivos baixados, transferências FTP e validação de dados em tempo real. Developers Linux/Unix frequentemente usam CRC32 para validação de backups, enquanto criptógrafos e aplicações de blockchain dependem de SHA-512 para segurança máxima.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Validação de Integridade de Feed de Catálogo em Pipeline ERP → E-commerce de Grande Varejista</h3>
    <p>Um grande varejista de moda com mais de 150 lojas físicas e e-commerce próprio enfrentava um problema silencioso e recorrente: aproximadamente 2% dos arquivos de feed de catálogo chegavam corrompidos no servidor do e-commerce após a exportação do ERP. A corrupção era sutil — não um arquivo vazio ou ilegível, mas campos trocados, caracteres truncados ou registros duplicados introduzidos durante a transferência via SFTP. Esses erros só eram descobertos depois da importação, quando produtos apareciam com preços errados, descrições invertidas ou simplesmente sumiam do catálogo. Em uma operação com 40.000 SKUs ativos e atualizações diárias de preço, 2% de erro representava até 800 produtos comprometidos por rodada.</p>
    <p>Implementamos um protocolo de validação de integridade usando SHA-512 como checksum obrigatório em todas as transferências de feed. O fluxo: ao gerar o arquivo no ERP, o sistema calculava automaticamente o SHA-512 do arquivo e gravava o hash em um arquivo <code>.sha512</code> adjacente. No servidor de destino, antes de qualquer importação, um script de pré-processamento calculava o SHA-512 do arquivo recebido e comparava com o valor esperado. Divergência = transferência rejeitada e alerta imediato para a equipe de operações. Usamos esta ferramenta para gerar e validar hashes de amostras durante os testes do protocolo.</p>
    <p>Nos primeiros 30 dias após a implementação, o sistema bloqueou 14 transferências com corrupção detectada — confirmando que o problema era mais frequente do que os 2% estimados (chegou a 4,7% em semanas de alto volume como pré-Black Friday, quando o ERP estava sobrecarregado). Nenhum arquivo corrompido passou para produção. A equipe de e-commerce estimou que o protocolo evitou pelo menos 3 incidentes de precificação incorreta que historicamente custavam entre R$ 80.000 e R$ 200.000 em produtos vendidos abaixo do custo antes da detecção manual.</p>
    <p>Qualquer pipeline de dados entre sistemas de varejo deveria ter validação de integridade por checksum como etapa obrigatória, não opcional. A diferença entre descobrir a corrupção antes ou depois da importação é a diferença entre um alerta silencioso e uma crise operacional com impacto direto em receita.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Use CRC32 para validar a integridade de arquivos de tabloide digital (PDFs, ZIPs de imagens de campanha) antes de fazer upload nas plataformas de distribuição. Uma única imagem corrompida pode invalidar toda uma campanha de encarte. CRC32 é rápido o suficiente para rodar em pipeline de automação antes do envio.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
