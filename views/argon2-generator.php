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
