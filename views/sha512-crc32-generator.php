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
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
