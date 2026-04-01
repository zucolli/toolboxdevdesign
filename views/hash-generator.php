<div class="card">
    <h1 class="card-title">Gerador de Hashes</h1>
    <p class="card-description">Digite uma string e escolha o algoritmo para gerar o hash criptográfico instantaneamente.</p>

    <div class="form-group">
        <label class="form-label" for="hash-input">String original</label>
        <textarea
            id="hash-input"
            rows="3"
            placeholder="Ex: MinhaS3nhaSegura!"
            autofocus
        ></textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Algoritmo</label>
        <div class="radio-group">
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="bcrypt" checked>
                <span>Bcrypt</span>
                <small class="radio-hint">Recomendado para senhas</small>
            </label>
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="md5">
                <span>MD5</span>
                <small class="radio-hint">Checksum rápido</small>
            </label>
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="sha256">
                <span>SHA-256</span>
                <small class="radio-hint">Processado no navegador</small>
            </label>
        </div>
    </div>

    <button id="btn-generate-hash" class="btn btn-primary" type="button">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
        Gerar Hash
    </button>

    <div class="form-group" style="margin-top: 1.5rem;">
        <label class="form-label" for="hash-output">Hash gerado</label>
        <div class="input-copy-row">
            <input
                type="text"
                id="hash-output"
                class="input-readonly"
                readonly
                placeholder="O hash aparecerá aqui…"
            >
            <button id="btn-copy-hash" class="btn btn-secondary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copiar
            </button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um Hash Criptográfico?</h2>
    <p>Um hash é uma função unidirecional que transforma qualquer entrada em uma string de tamanho fixo. É unidirecional: você não consegue recuperar o texto original a partir do hash. Isso torna hashes ideais para armazenar senhas e verificar integridade de dados.</p>

    <h3>Onde e por que usar?</h3>
    <p><strong>Bcrypt</strong> é o padrão recomendado para armazenar senhas em banco de dados: ele é lento por design (fator de custo configurável), o que dificulta ataques de força bruta. <strong>MD5</strong> é rápido e útil para checksums não críticos, como verificar se um arquivo foi corrompido durante a transferência — nunca para senhas. <strong>SHA-256</strong> é mais seguro que MD5 e usado amplamente em certificados digitais e blockchain.</p>

    <h3>Como funciona?</h3>
    <p>Digite o texto no campo acima, selecione o algoritmo desejado e clique em "Gerar Hash". Bcrypt e MD5 são processados pelo servidor PHP; SHA-256 é calculado diretamente no navegador usando a Web Crypto API, sem enviar dados à rede.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
