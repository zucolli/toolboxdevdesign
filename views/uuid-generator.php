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

    <section class="tool-seo-content">
        <h3>O que é o Gerador de UUID / GUID?</h3>
        <p>O Gerador de UUID / GUID é uma ferramenta profissional para desenvolvedores que precisam gerar identificadores únicos criptograficamente seguros. UUIDs (Universally Unique Identifiers) ou GUIDs (Globally Unique Identifiers) são usados como chaves primárias em bancos de dados, IDs de sessão, rastreamento de transações e muito mais. A ferramenta gera até 100 UUIDs v4 simultaneamente com Web Crypto API.</p>

        <h3>Como usar o Gerador de UUID / GUID?</h3>
        <p>Clique em "Gerar UUID" para criar um ou vários UUIDs. Configure formato desejado: hifenado (padrão: 550e8400-e29b-41d4-a716-446655440000), sem hífens, com chaves ou MAIÚSCULAS. Você pode gerar múltiplas UUIDs em uma operação. A ferramenta utiliza Web Crypto API para garantir aleatoriedade criptográfica. Copie UUIDs individuais ou a lista completa.</p>

        <h3>Casos de uso práticos do Gerador de UUID / GUID</h3>
        <p>Developers Node.js, Python, Java e outras linguagens usam UUIDs como padrão para IDs de recurso em APIs REST. Bancos de dados modernos suportam UUID nativo. Sistemas distribuídos precisam de UUIDs para garantir unicidade sem coordenação central. Sessões de usuário, rastreamento de pedidos, logs e qualquer forma de identificação única beneficiam de UUIDs gerados criptograficamente.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em sistemas de cupom ou sorteio para campanhas de varejo, gere UUIDs v4 para cada participante em vez de IDs sequenciais. IDs sequenciais são previsíveis: um usuário mal-intencionado pode tentar <code>cupom_1001</code>, <code>cupom_1002</code> e assim por diante. UUIDs criptograficamente gerados tornam força bruta inviável mesmo em campanhas de milhões de participantes.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
