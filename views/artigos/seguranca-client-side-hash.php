<div class="article-wrap">

    <header class="article-header">
        <p class="article-eyebrow">Segurança &amp; Privacidade</p>
        <h1 class="article-title">Segurança Client-Side: Por Que Desenvolvedores Sêniores Não Usam Geradores de Hash que Processam no Servidor</h1>
        <div class="article-meta">
            <span>por <strong>Carlos Zucolli</strong> · NuAto Comunicação</span>
            <span class="article-meta-sep">|</span>
            <span>7 min de leitura</span>
            <span class="article-meta-sep">|</span>
            <span>Segurança</span>
        </div>
    </header>

    <div class="article-body">

        <p>Existe uma classe de ferramentas online que, na superfície, parece inofensiva: geradores de hash, verificadores de integridade, calculadoras de checksum. Você cola um texto ou uma senha, clica em "Gerar", recebe o hash. O problema não está no resultado — está em onde o cálculo acontece.</p>

        <p>Quando uma ferramenta de hash processa seu input em um servidor remoto, ela necessariamente recebe o dado original antes de retornar o hash. Para textos triviais — um slug de URL, um título de artigo — isso é irrelevante. Para qualquer dado que contenha informação sensível, é um vetor de exposição que a maioria dos desenvolvedores não considera até que seja tarde demais.</p>

        <h2>O Modelo de Ameaça que Ninguém Explica</h2>

        <p>Desenvolvedores experientes pensam em termos de superfície de ataque. Uma superfície de ataque é o conjunto de pontos onde um adversário pode tentar inserir, extrair ou manipular dados em um sistema. Cada vez que um dado sensível trafega pela rede — mesmo por HTTPS — ele passa por mais pontos de exposição potencial:</p>

        <ul>
            <li>O servidor da ferramenta (que pode ser comprometido, ou cujo operador pode ter acesso aos logs)</li>
            <li>Infraestrutura de CDN entre o cliente e o servidor</li>
            <li>Qualquer middleware de inspeção de pacotes na rede corporativa do usuário</li>
            <li>Logs de requisição no servidor (que frequentemente armazenam o body da requisição em modo debug)</li>
        </ul>

        <p>HTTPS protege o dado em trânsito entre o cliente e o servidor da ferramenta. Não protege o dado depois que ele chega ao servidor. E não há como um usuário externo verificar o que o operador da ferramenta faz com o que recebe.</p>

        <h2>A Web Crypto API: Hash no Navegador sem Concessão de Performance</h2>

        <p>A objeção mais comum a ferramentas client-side é performance: "JavaScript é lento demais para criptografia". Essa objeção era válida em 2010. Em 2025, ela está factualmente errada.</p>

        <p>A <strong>Web Crypto API</strong> — disponível em todos os navegadores modernos desde 2014, com suporte completo desde 2017 — expõe operações criptográficas implementadas em código nativo do browser, não em JavaScript puro. A função <code>crypto.subtle.digest()</code> executa SHA-256, SHA-384 e SHA-512 usando as instruções de hardware do processador (SHA-NI em CPUs Intel/AMD modernas, equivalente em ARM), com throughput comparável a implementações em C.</p>

        <p>Na prática, um hash SHA-256 de uma string de 1KB executa em menos de 1 milissegundo no Chrome em um laptop de gama média de 2022. A latência de rede para uma requisição a um servidor remoto — mesmo em conexão de fibra — é de 20 a 100 milissegundos. A ferramenta client-side é ordens de magnitude mais rápida, não mais lenta.</p>

        <h2>O Que Pode e o Que Não Pode Ser Feito Client-Side</h2>

        <p>Nem todos os algoritmos de hash são implementáveis no browser com Web Crypto API. É importante entender as fronteiras:</p>

        <h3>Disponível nativamente via Web Crypto</h3>
        <ul>
            <li><strong>SHA-256</strong> — padrão atual para integridade de arquivos, assinaturas digitais e a maioria dos protocolos modernos</li>
            <li><strong>SHA-384 / SHA-512</strong> — variantes de maior segurança da família SHA-2, recomendadas para dados de alta sensibilidade</li>
            <li><strong>SHA-1</strong> — disponível, mas considere depreciado para qualquer uso de segurança</li>
        </ul>

        <h3>Não disponível via Web Crypto — requer servidor ou biblioteca JS</h3>
        <ul>
            <li><strong>MD5</strong> — excluído da Web Crypto por ser considerado inseguro para uso criptográfico (mas ainda usado para checksums não-criptográficos)</li>
            <li><strong>Bcrypt</strong> — algoritmo de hash de senhas com fator de custo adaptativo. Não existe implementação nativa no browser; requer servidor PHP/Node ou biblioteca JavaScript (que por sua vez simula as operações em JS puro, com performance reduzida)</li>
            <li><strong>Argon2</strong> — vencedor da Password Hashing Competition, recomendado atual para hash de senhas. Não há implementação Web Crypto; requer backend</li>
            <li><strong>scrypt</strong> — alternativa ao bcrypt, sem suporte nativo em browsers</li>
        </ul>

        <p>A distinção crítica: <strong>hashes de propósito geral</strong> (SHA-256, SHA-512) são seguros client-side com Web Crypto. <strong>Hashes de senhas</strong> (bcrypt, Argon2) requerem backend — e quando esse backend é seu próprio servidor (que você controla e audita), não um serviço de terceiro aleatório na internet, a superfície de ataque é gerenciável.</p>

        <h2>Por Que Isso Importa para Times de Desenvolvimento</h2>

        <p>O cenário mais comum de exposição inadvertida não é um desenvolvedor mal-intencionado. É o processo de onboarding de um desenvolvedor júnior que não conhece alternativas seguras e simplesmente googla "gerar hash SHA-256 online" quando precisa verificar um checksum durante um debug. Ele não vai usar a ferramenta para dados críticos — ou pelo menos não tem essa intenção. Mas o hábito se instala, e em algum momento um dado que não deveria trafegar para fora do ambiente corporativo vai trafegar.</p>

        <p>Times sérios documentam explicitamente em seus guias de engenharia quais categorias de ferramentas externas são aceitáveis e quais não são. Ferramentas de hash que processam server-side geralmente entram na categoria "não aceitável para qualquer input que possa conter PII ou credenciais".</p>

        <h2>O Padrão de Implementação com Web Crypto API</h2>

        <p>Para desenvolvedores que precisam implementar hash client-side em seus próprios projetos, o padrão com Web Crypto API é direto:</p>

        <pre><code>async function sha256(message) {
    const msgBuffer = new TextEncoder().encode(message);
    const hashBuffer = await crypto.subtle.digest('SHA-256', msgBuffer);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
}</code></pre>

        <p>A função é assíncrona (retorna uma Promise), opera inteiramente na memória do browser sem qualquer comunicação de rede, e usa a implementação nativa do motor JavaScript — não uma biblioteca de terceiros que você precisaria auditar. O Gerador de Hashes desta coleção usa exatamente esse padrão para SHA-256.</p>

        <p>Para MD5 e Bcrypt, onde Web Crypto não está disponível, a alternativa segura é um endpoint em seu próprio servidor — controlado, auditável e isolado do ambiente de produção — não uma ferramenta pública de terceiro.</p>

        <aside class="article-related">
            <h3 class="article-related-title">Ferramentas relacionadas</h3>
            <div class="article-related-tools">
                <a href="/ferramentas/hash-generator" class="article-related-tool">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
                    <span>Gerador de Hashes (SHA-256 client-side)</span>
                </a>
                <a href="/ferramentas/argon2-generator" class="article-related-tool">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>Gerador Argon2id</span>
                </a>
                <a href="/ferramentas/sha512-crc32-generator" class="article-related-tool">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    <span>SHA-512 / CRC32</span>
                </a>
            </div>
        </aside>

    </div>

</div>
