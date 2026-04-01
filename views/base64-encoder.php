<div class="card">
    <h1 class="card-title">Base64 Encoder / Decoder</h1>
    <p class="card-description">Digite texto no quadro da esquerda para codificar, ou Base64 no da direita para decodificar. Suporte completo a UTF-8 e acentuação.</p>

    <div class="encoder-grid">
        <div class="encoder-panel">
            <div class="encoder-panel-header">
                <span class="encoder-panel-title">Texto Original</span>
                <div class="encoder-panel-actions">
                    <button class="btn btn-ghost btn-sm" id="btn-copy-b64-plain" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copiar
                    </button>
                    <button class="btn btn-ghost btn-sm" id="btn-clear-b64-plain" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Limpar
                    </button>
                </div>
            </div>
            <textarea
                id="b64-plain"
                rows="8"
                placeholder="Olá, mundo! Texto com acentuação é suportado."
            ></textarea>
        </div>

        <div class="encoder-divider">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l4 4-4 4"/><path d="M3 7h18"/><path d="M7 21l-4-4 4-4"/><path d="M21 17H3"/></svg>
        </div>

        <div class="encoder-panel">
            <div class="encoder-panel-header">
                <span class="encoder-panel-title">Base64</span>
                <div class="encoder-panel-actions">
                    <button class="btn btn-ghost btn-sm" id="btn-copy-b64-encoded" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copiar
                    </button>
                    <button class="btn btn-ghost btn-sm" id="btn-clear-b64-encoded" type="button">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Limpar
                    </button>
                </div>
            </div>
            <textarea
                id="b64-encoded"
                rows="8"
                placeholder="T2zDoSwgbXVuZG8h"
            ></textarea>
            <p id="b64-decode-error" class="encoder-error" hidden>String Base64 inválida — verifique se há caracteres fora do alfabeto Base64.</p>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é Base64?</h2>
    <p>Base64 é um esquema de codificação binário-para-texto que representa dados binários em formato ASCII, usando 64 caracteres imprimíveis (<code>A–Z</code>, <code>a–z</code>, <code>0–9</code>, <code>+</code>, <code>/</code>). Cada grupo de 3 bytes é representado por 4 caracteres Base64, resultando em um aumento de ~33% no tamanho.</p>

    <h3>Para que serve</h3>
    <p>Amplamente usado para embutir imagens diretamente em CSS ou HTML (<code>data:image/png;base64,…</code>), transmitir dados binários em campos de texto (JSON, XML, e-mail MIME), e codificar credenciais na autenticação HTTP Basic (<code>Authorization: Basic dXNlcjpwYXNz</code>).</p>

    <h3>UTF-8 e acentuação</h3>
    <p>A função nativa <code>btoa()</code> do JavaScript não aceita caracteres fora do Latin-1. Esta ferramenta usa <code>btoa(unescape(encodeURIComponent(str)))</code> para garantir suporte completo a acentos e emojis. Ao decodificar, aplica o processo inverso com <code>decodeURIComponent(escape(atob(str)))</code>.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
