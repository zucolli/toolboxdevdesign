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

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Substituição de IDs Sequenciais por UUIDs em Sistema de Cupons de Cashback</h3>
    <p>Uma cooperativa de consumo com faturamento bilionário lançou um programa de cashback digital com cupons individuais enviados por SMS para os 800.000 membros da base ativa. Os cupons eram gerados com IDs sequenciais no formato <code>CASH-2024-001</code>, <code>CASH-2024-002</code>... até <code>CASH-2024-800000</code>. Em menos de 72 horas após o lançamento, a equipe de segurança identificou tentativas de uso de cupons nunca enviados — usuários simplesmente incrementando o número do cupom para tentar resgatar benefícios de outros membros. Em 3 dias, foram bloqueadas 4.200 tentativas de fraude por adivinhação de ID, e pelo menos 180 resgates fraudulentos haviam sido processados antes da detecção, gerando um prejuízo direto de R$ 27.000 em cashback indevido.</p>
    <p>A correção emergencial foi substituir todos os IDs por UUIDs v4 gerados criptograficamente. Usamos este Gerador de UUID para validar o formato e gerar amostras para os testes de integração antes de implementar a mudança em produção. O UUID v4 tem 122 bits de aleatoriedade — a probabilidade de adivinhar um UUID válido é estatisticamente equivalente a zero para qualquer atacante prático. A migração incluiu invalidar todos os 800.000 cupons originais e reenviar novos por SMS em lotes de 50.000 ao longo de 16 horas, evitando sobrecarga no gateway de SMS.</p>
    <p>Após a migração, as tentativas de fraude por adivinhação caíram para zero em 48 horas. O sistema de monitoramento que havia capturado os ataques continuou ativo e, nos 6 meses seguintes, não registrou nenhuma tentativa bem-sucedida de adivinhação de cupom. O custo técnico da migração (desenvolvimento, SMS de reenvio, operação) foi de aproximadamente R$ 45.000 — menos do que o prejuízo teria sido se a vulnerabilidade continuasse ativa por mais 3 semanas.</p>
    <p>Sistemas de cupom, voucher e cashback são alvos primários de fraude em varejo. Usar IDs sequenciais em qualquer identificador que tenha valor monetário associado é uma vulnerabilidade crítica que não requer sofisticação técnica para explorar — qualquer usuário com um loop de browser pode fazê-lo. UUID v4 é o mínimo de proteção aceitável.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em sistemas de cupom ou sorteio para campanhas de varejo, gere UUIDs v4 para cada participante em vez de IDs sequenciais. IDs sequenciais são previsíveis: um usuário mal-intencionado pode tentar <code>cupom_1001</code>, <code>cupom_1002</code> e assim por diante. UUIDs criptograficamente gerados tornam força bruta inviável mesmo em campanhas de milhões de participantes.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
