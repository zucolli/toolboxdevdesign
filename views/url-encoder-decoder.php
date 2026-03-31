<div class="card">
    <h1 class="card-title">URL Encoder / Decoder</h1>
    <p class="card-description">Digite no quadro da esquerda para codificar, ou no da direita para decodificar. A conversão acontece em tempo real.</p>

    <div class="encoder-grid">
        <div class="encoder-panel">
            <div class="encoder-panel-header">
                <span class="encoder-panel-title">Original</span>
                <div class="encoder-panel-actions">
                    <button class="btn btn-ghost btn-sm" id="btn-copy-original" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copiar
                    </button>
                    <button class="btn btn-ghost btn-sm" id="btn-clear-original" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Limpar
                    </button>
                </div>
            </div>
            <textarea
                id="url-original"
                rows="8"
                placeholder="https://nuato.com/?q=ação promocional"
            ></textarea>
        </div>

        <div class="encoder-divider">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4-4 4"/><path d="M3 7h18"/><path d="M7 21l-4-4 4-4"/><path d="M21 17H3"/></svg>
        </div>

        <div class="encoder-panel">
            <div class="encoder-panel-header">
                <span class="encoder-panel-title">Encoded</span>
                <div class="encoder-panel-actions">
                    <button class="btn btn-ghost btn-sm" id="btn-copy-encoded" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copiar
                    </button>
                    <button class="btn btn-ghost btn-sm" id="btn-clear-encoded" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Limpar
                    </button>
                </div>
            </div>
            <textarea
                id="url-encoded"
                rows="8"
                placeholder="https%3A%2F%2Fnuato.com%2F%3Fq%3Da%C3%A7%C3%A3o%20promocional"
            ></textarea>
            <p id="url-decode-error" class="encoder-error" hidden>String inválida — verifique se os % estão completos (ex: %2F).</p>
        </div>
    </div>
</div>
