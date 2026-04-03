<div class="card">
    <h1 class="card-title">Gerador de UUID / GUID</h1>
    <p class="card-description">Gere UUIDs v4 criptograficamente seguros usando a Web Crypto API nativa do navegador. Nenhum dado é enviado ao servidor.</p>

    <div class="uuid-controls">
        <div class="form-group" style="max-width:160px;">
            <label class="form-label" for="uuid-qty">Quantidade (1–100)</label>
            <input type="number" id="uuid-qty" value="1" min="1" max="100">
        </div>

        <div class="uuid-format-row">
            <span class="form-label">Formato</span>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="uuid-fmt" value="hyphenated" checked>
                    Com hífens
                </label>
                <label class="radio-label">
                    <input type="radio" name="uuid-fmt" value="plain">
                    Sem hífens
                </label>
                <label class="radio-label">
                    <input type="radio" name="uuid-fmt" value="braces">
                    {Com chaves}
                </label>
                <label class="radio-label">
                    <input type="radio" name="uuid-fmt" value="upper">
                    MAIÚSCULAS
                </label>
            </div>
        </div>

        <button class="btn btn-primary" id="uuid-generate-btn" type="button">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.51"/></svg>
            Gerar UUIDs
        </button>
    </div>

    <div class="form-group" id="uuid-result-wrap" hidden>
        <div class="input-copy-row" style="margin-bottom:8px;">
            <label class="form-label" style="margin:0;flex:1;"><span id="uuid-count-label">1 UUID gerado</span></label>
            <button class="btn btn-ghost btn-sm" id="uuid-copy-btn" type="button">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                Copiar
            </button>
        </div>
        <textarea id="uuid-output" class="input-readonly" rows="8" readonly></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é UUID?</h2>
    <p>UUID (<em>Universally Unique Identifier</em>) é um identificador de 128 bits padronizado pela RFC 4122. O formato canônico é <code>xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx</code>, com 32 dígitos hexadecimais agrupados em 5 seções separadas por hífens.</p>

    <h3>UUID v4 e segurança criptográfica</h3>
    <p>Esta ferramenta gera UUIDs versão 4, onde os bits são gerados aleatoriamente (exceto os bits de versão e variante). A geração usa <code>crypto.randomUUID()</code>, disponível em todos os navegadores modernos, que por sua vez usa o gerador de números aleatórios criptograficamente seguro do sistema operacional (CSPRNG). A probabilidade de colisão entre dois UUIDs v4 é astronomicamente baixa: aproximadamente 1 em 2¹²².</p>

    <h3>Diferença entre UUID e GUID</h3>
    <p>GUID (<em>Globally Unique Identifier</em>) é simplesmente o nome que a Microsoft usa para UUIDs no ecossistema Windows/.NET. São tecnicamente idênticos — a única diferença é terminológica.</p>

    <h3>Quando usar UUID como chave primária</h3>
    <p>UUIDs são ideais quando você precisa gerar IDs distribuídos (sem coordenação central), ocultar a quantidade de registros (ao contrário de IDs sequenciais), ou mesclar dados de múltiplos bancos de dados sem conflito de chaves.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
