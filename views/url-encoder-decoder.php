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

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é URL Encoding?</h2>
    <p>URL Encoding (também chamado de percent-encoding) é o processo de substituir caracteres que não são permitidos em URLs por uma sequência de porcentagem seguida de dois dígitos hexadecimais. Por exemplo, o espaço vira <code>%20</code> e a letra "ç" vira <code>%C3%A7</code>. O padrão é definido pela RFC 3986.</p>

    <h3>Onde e por que usar?</h3>
    <p>Sempre que você precisa incluir texto com caracteres especiais (acentos, símbolos, espaços) em uma URL. Casos comuns: parâmetros de busca em APIs REST (<code>?q=cal%C3%A7a</code>), criação manual de query strings, debugging de requisições HTTP com ferramentas como Postman ou cURL, e construção de links em campanhas de marketing com conteúdo em português.</p>

    <h3>Como funciona?</h3>
    <p>Digite no quadro da esquerda para codificar automaticamente. Digite no quadro da direita para decodificar. A conversão é bidirecional e acontece em tempo real, caractere a caractere. Se uma string encoded estiver malformada (por ex: <code>%2</code> incompleto), uma mensagem de erro aparece abaixo do campo.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
