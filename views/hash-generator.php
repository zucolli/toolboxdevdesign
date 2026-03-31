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
