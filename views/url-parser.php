<div class="card">
    <h1 class="card-title">URL Parser</h1>
    <p class="card-description">Cole uma URL completa para desmembrá-la em seus componentes instantaneamente.</p>

    <div class="form-group">
        <label class="form-label" for="parser-input">URL Completa</label>
        <input type="url" id="parser-input" placeholder="https://nuato.com:8080/servicos?utm_source=google#contato" autofocus>
    </div>

    <div id="parser-results" hidden>
        <div class="parser-section">
            <span class="parser-section-title">Componentes</span>
            <div class="parser-components">
                <div class="parser-field">
                    <span class="parser-field-label">Protocolo</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-protocol" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-protocol" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Domínio (hostname)</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-hostname" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-hostname" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Porta</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-port" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-port" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Caminho (pathname)</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-pathname" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-pathname" type="button">Copiar</button>
                    </div>
                </div>
                <div class="parser-field">
                    <span class="parser-field-label">Hash / Fragmento</span>
                    <div class="input-copy-row">
                        <input type="text" id="p-hash" class="input-readonly" readonly placeholder="—">
                        <button class="btn btn-secondary btn-sm" data-copy-from="p-hash" type="button">Copiar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="parser-section" id="parser-params-section">
            <span class="parser-section-title">Query Params</span>
            <div id="parser-params" class="parser-params-list"></div>
        </div>
    </div>

    <p id="parser-hint" class="parser-hint">Aguardando uma URL válida…</p>
</div>
