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

    <section class="tool-seo-content">
        <h3>O que é o Base64 Encoder / Decoder?</h3>
        <p>O Base64 Encoder / Decoder é uma ferramenta essencial para desenvolvedores que trabalham com codificação de dados. Base64 é um esquema de codificação que converte dados binários em formato texto usando 64 caracteres seguros, permitindo transmissão de dados complexos via texto plano (HTTP, email, JSON). A ferramenta suporta UTF-8 completo com acentuação, fazendo encoding/decoding perfeito de textos em português.</p>

        <h3>Como usar o Base64 Encoder / Decoder?</h3>
        <p>Para usar a ferramenta, digite ou cole o texto que deseja codificar. A ferramenta executa encoding em tempo real, exibindo a versão Base64 no outro campo. Você pode trabalhar em ambas as direções: codificar texto para Base64 ou decodificar Base64 para texto legível. Two-way binding permite editar ambos os campos e ver sincronização automática, ideal para debugging e conversão rápida.</p>

        <h3>Casos de uso práticos do Base64 Encoder / Decoder</h3>
        <p>Base64 é usado para encapsular dados em URLs (Data URIs para imagens), enviar credenciais em requisições HTTP (Authorization header), armazenar dados complexos em cookies, e transmitir ficheiros binários em JSON. Developers de API REST, mobile e backend trabalham com Base64 constantemente. Conhecer e usar um encoder profissional é essencial para qualquer pessoa que trabalhe com integração de sistemas ou transmissão de dados.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Hotsite de Black Friday com Assets Críticos em Ambiente CORS Restritivo</h3>
    <p>Durante a preparação do hotsite de Black Friday de uma grande rede de varejo de eletrodomésticos, enfrentamos um problema técnico inesperado a 48 horas do lançamento: o servidor de produção do cliente operava atrás de um proxy corporativo com política de CORS extremamente restritiva que bloqueava requisições a domínios externos — incluindo o nosso CDN onde estavam hospedados o logo da campanha, o badge de "50% OFF" e os ícones de categorias. Em ambiente de homologação tudo funcionava, mas em produção os assets simplesmente não carregavam, quebrando visualmente toda a identidade da campanha. A janela de Black Friday não permitia reconfigurações de infraestrutura.</p>
    <p>A solução foi converter todos os assets críticos para Base64 e embutir diretamente no HTML e CSS. Usamos este Codificador Base64 para processar cada arquivo: o logo SVG da campanha (12 KB), o badge de desconto em PNG (8 KB), os 6 ícones de categorias em SVG e o padrão de fundo em PNG (22 KB). Cada arquivo foi codificado individualmente, e o resultado foi inserido diretamente nos atributos <code>src</code> das tags <code>&lt;img&gt;</code> e nos <code>background-image</code> do CSS como Data URLs. O processo completo levou 40 minutos para os 9 assets envolvidos.</p>
    <p>O hotsite foi lançado no horário sem nenhum asset quebrado. A campanha gerou R$ 4,2 milhões em vendas no primeiro dia — o melhor resultado de Black Friday da história do cliente até aquele momento. A solução Base64 aumentou o peso da página inicial em cerca de 58 KB, que foi compensado com compressão GZIP no servidor e eliminação de 9 requisições HTTP separadas. O tempo de carregamento em 4G medido pelo PageSpeed ficou em 2,1 segundos, dentro do target estabelecido.</p>
    <p>Para agências que desenvolvem hotsites de campanha para varejistas com infraestruturas corporativas heterogêneas, ter o fluxo de conversão Base64 como recurso disponível é seguro de emergência. Ambientes de produção de grandes redes frequentemente têm restrições de rede que o ambiente de desenvolvimento nunca reproduz fielmente.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Ao criar banners HTML5 para campanhas de display em redes varejistas com ambientes corporativos, embutir logotipos e badges pequenos via Base64 diretamente no HTML elimina dependência de CDN externo. Isso garante que o criativo seja exibido mesmo em redes com política de bloqueio de domínios de terceiros — problema comum em filiais de grandes atacadistas.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
