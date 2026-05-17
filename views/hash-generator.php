<div class="card">
    <h1 class="card-title">Gerador de Hashes</h1>
    <p class="card-description">Digite uma string e escolha o algoritmo para gerar o hash criptográfico instantaneamente.</p>

    <div class="form-group">
        <label class="form-label" for="hash-input">String original</label>
        <textarea
            id="hash-input"
            rows="3"
            placeholder="Ex: MinhaS3nhaSegura!"
            autofocus
        ></textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Algoritmo</label>
        <div class="radio-group">
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="bcrypt" checked>
                <span>Bcrypt</span>
                <small class="radio-hint">Recomendado para senhas</small>
            </label>
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="md5">
                <span>MD5</span>
                <small class="radio-hint">Checksum rápido</small>
            </label>
            <label class="radio-label">
                <input type="radio" name="hash-algorithm" value="sha256">
                <span>SHA-256</span>
                <small class="radio-hint">Processado no navegador</small>
            </label>
        </div>
    </div>

    <button id="btn-generate-hash" class="btn btn-primary" type="button">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
        Gerar Hash
    </button>

    <div class="form-group" style="margin-top: 1.5rem;">
        <label class="form-label" for="hash-output">Hash gerado</label>
        <div class="input-copy-row">
            <input
                type="text"
                id="hash-output"
                class="input-readonly"
                readonly
                placeholder="O hash aparecerá aqui…"
            >
            <button id="btn-copy-hash" class="btn btn-secondary" type="button">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
                Copiar
            </button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um Hash Criptográfico?</h2>
    <p>Um hash é uma função unidirecional que transforma qualquer entrada em uma string de tamanho fixo. É unidirecional: você não consegue recuperar o texto original a partir do hash. Isso torna hashes ideais para armazenar senhas e verificar integridade de dados.</p>

    <h3>Onde e por que usar?</h3>
    <p><strong>Bcrypt</strong> é o padrão recomendado para armazenar senhas em banco de dados: ele é lento por design (fator de custo configurável), o que dificulta ataques de força bruta. <strong>MD5</strong> é rápido e útil para checksums não críticos, como verificar se um arquivo foi corrompido durante a transferência — nunca para senhas. <strong>SHA-256</strong> é mais seguro que MD5 e usado amplamente em certificados digitais e blockchain.</p>

    <h3>Como funciona?</h3>
    <p>Digite o texto no campo acima, selecione o algoritmo desejado e clique em "Gerar Hash". Bcrypt e MD5 são processados pelo servidor PHP; SHA-256 é calculado diretamente no navegador usando a Web Crypto API, sem enviar dados à rede.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de Hashes?</h3>
        <p>O Gerador de Hashes é uma ferramenta essencial para desenvolvedores e profissionais de segurança que precisam criar hashes criptográficos de dados. Ela suporta múltiplos algoritmos como Bcrypt, MD5 e SHA-256, transformando qualquer texto em uma sequência única e irreversível. Hashes são fundamentais para segurança, sendo usados no armazenamento de senhas, verificação de integridade de arquivos e assinaturas digitais.</p>

        <h3>Como usar o Gerador de Hashes?</h3>
        <p>Para usar o Gerador de Hashes, digite ou cole o texto desejado no campo de entrada. Selecione o algoritmo desejado: Bcrypt para senhas (recomendado por ser resistente a ataques de força bruta), MD5 para checksums rápidos, ou SHA-256 para aplicações de alta segurança. Clique em "Gerar Hash" e o resultado será exibido instantaneamente, pronto para copiar e usar em seu código.</p>

        <h3>Casos de uso práticos do Gerador de Hashes</h3>
        <p>Hashes são aplicados em inúmeros cenários práticos: armazenar senhas em bancos de dados de forma segura, verificar se arquivos foram corrompidos durante download, gerar assinaturas digitais, e identificar duplicatas em grandes conjuntos de dados. Bcrypt é especialmente importante em aplicações web modernas, sendo o padrão recomendado por especialistas em segurança para proteção de credenciais de usuários.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Migração de MD5 para BCrypt em Portal de Fornecedores de Grande Rede de Atacarejo</h3>
    <p>Durante uma auditoria de segurança em um portal B2B de grande rede de atacarejo com mais de 800 fornecedores cadastrados, identificamos que todas as senhas estavam armazenadas como hashes MD5 sem salt — um algoritmo quebrado desde 2004 e trivialmente reversível com tabelas rainbow disponíveis gratuitamente na internet. O portal dava acesso a notas fiscais, pedidos de compra e dados financeiros sensíveis de toda a cadeia de suprimentos. O risco não era hipotético: qualquer vazamento do banco de dados (mesmo por um backup mal protegido) exporia 100% das senhas em minutos.</p>
    <p>O Gerador de Hash foi usado em duas fases. Primeiro, para demonstrar para a diretoria de TI do cliente a diferença real entre os algoritmos: geramos o MD5 de uma senha simples e mostramos que ferramentas online a revertem em segundos; depois geramos o BCrypt cost 12 da mesma senha e explicamos que a reversão levaria anos em hardware dedicado. Segundo, para validar o padrão de hash escolhido (BCrypt cost 12) antes de implementar o script de migração. O processo foi verify-then-rehash: no login, o sistema verificava se o hash existente era MD5 e, se fosse, rehasheava automaticamente para BCrypt após autenticação bem-sucedida.</p>
    <p>A migração transparente levou 47 dias para cobrir 92% da base ativa de fornecedores sem nenhuma notificação de troca de senha. Os 8% restantes (contas inativas) foram forçados a redefinir senha no próximo acesso. Nenhum fornecedor registrou problema durante o processo. O relatório final de auditoria foi apresentado ao conselho da empresa como case de melhoria de segurança proativa, evitando o que poderia ter sido uma multa significativa sob a LGPD em caso de vazamento documentado.</p>
    <p>Agências de marketing que desenvolvem ou mantêm portais B2B para varejistas têm responsabilidade direta sobre a segurança dos dados dos parceiros comerciais do cliente. Implementar BCrypt não é complexidade desnecessária — é o mínimo responsável para qualquer sistema com autenticação por senha em 2025.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Nunca armazene senhas com MD5. Em sistemas corporativos, mesmo que seja apenas um acesso de painel de campanha, o vazamento de um hash MD5 pode comprometer toda a rede em minutos. Use sempre Bcrypt com cost ≥ 12 para qualquer senha que precise ser verificada servidor a servidor — o custo computacional extra é a proteção contra força bruta.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
