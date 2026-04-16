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

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Hashes?</h3>
        <p>O Gerador de Hashes é uma ferramenta essencial para desenvolvedores e profissionais de segurança que precisam criar hashes criptográficos de dados. Ela suporta múltiplos algoritmos como Bcrypt, MD5 e SHA-256, transformando qualquer texto em uma sequência única e irreversível. Hashes são fundamentais para segurança, sendo usados no armazenamento de senhas, verificação de integridade de arquivos e assinaturas digitais.</p>

        <h3>Como usar o Gerador de Hashes?</h3>
        <p>Para usar o Gerador de Hashes, digite ou cole o texto desejado no campo de entrada. Selecione o algoritmo desejado: Bcrypt para senhas (recomendado por ser resistente a ataques de força bruta), MD5 para checksums rápidos, ou SHA-256 para aplicações de alta segurança. Clique em "Gerar Hash" e o resultado será exibido instantaneamente, pronto para copiar e usar em seu código.</p>

        <h3>Casos de uso práticos do Gerador de Hashes</h3>
        <p>Hashes são aplicados em inúmeros cenários práticos: armazenar senhas em bancos de dados de forma segura, verificar se arquivos foram corrompidos durante download, gerar assinaturas digitais, e identificar duplicatas em grandes conjuntos de dados. Bcrypt é especialmente importante em aplicações web modernas, sendo o padrão recomendado por especialistas em segurança para proteção de credenciais de usuários.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
