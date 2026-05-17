<div class="card">
    <h1 class="card-title">Meu IP</h1>
    <p class="card-description">Descubra o seu endereço IP público atual.</p>

    <div class="ip-display-wrap">
        <div class="ip-display" id="ip-value">Carregando…</div>
        <p class="ip-label">Seu endereço IP público</p>
    </div>

    <div class="ip-actions">
        <button class="btn btn-primary" id="ip-copy">Copiar IP</button>
        <button class="btn btn-secondary" id="ip-refresh">Atualizar</button>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um endereço IP público?</h2>
    <p>O IP público é o endereço que identifica o seu dispositivo ou roteador na internet. Ele é atribuído pelo seu provedor de internet (ISP) e pode ser dinâmico (muda periodicamente) ou estático (fixo).</p>

    <h3>Como este endereço é obtido</h3>
    <p>A ferramenta faz uma requisição ao servidor PHP desta página, que lê o cabeçalho da solicitação HTTP para obter o IP de origem da conexão. O dado não é armazenado.</p>

    <h3>IP público vs. IP local</h3>
    <p>O endereço exibido aqui é o seu <strong>IP público</strong> — o que a internet vê. Seu IP local (ex.: 192.168.x.x) é o endereço dentro da sua rede doméstica e não é visível externamente.</p>

    <section class="tool-seo-content">
        <h3>O que é o Meu IP?</h3>
        <p>Ferramenta simples e direta que exibe seu endereço IP público instantaneamente. Seu IP público é visível para qualquer site que você acessa e pode ser utilizado para geolocalização, troubleshooting de rede, testes de conectividade e verificação de VPN. A ferramenta detecta seu IP automaticamente consultando um endpoint de API seguro e exibe o resultado sem necessidade de clique.</p>

        <h3>Como usar o Meu IP?</h3>
        <p>Simplesmente acesse a página e seu IP público será exibido automaticamente. Copie o IP ou note o valor. Você pode usar essa ferramenta para verificar: se seu IP mudou, se sua VPN está funcionando (IP deve ser diferente do normal), ou para troubleshooting de conectividade com suporte técnico. Rápido, sem cadastro, 100% gratuito.</p>

        <h3>Casos de uso práticos do Meu IP</h3>
        <p>Profissionais de rede, admins de sistema e usuários de VPN consultam IP público frequentemente. Ao lidar com whitelist de IP, suporte técnico, ou testes de conectividade, saber seu IP público é essencial. Profissionais de segurança e penetration testers usam para mapear IP antes de testes. Qualquer pessoa que trabalha com rede ou IT precisa de acesso rápido a essa informação.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Diagnóstico de Acesso Negado a Portal de Fornecedores com Whitelist de IPs</h3>
    <p>Uma grande rede varejista de alimentos mantinha um portal de fornecedores para gestão de pedidos, notas fiscais e cronogramas de entrega — um sistema crítico para a operação logística das 45 filiais da rede. O portal usava whitelist de IPs como camada adicional de segurança, permitindo acesso apenas de endereços previamente cadastrados. Em uma segunda-feira de manhã, três equipes de fornecedores estratégicos relataram simultaneamente que estavam recebendo erro 403 (Forbidden) ao tentar acessar o portal — justamente no período de fechamento de pedidos mensais, quando o acesso era mais crítico. A equipe de TI do varejista estava sobrecarregada e o atendimento demorava. A NuAto, atuando como agência de comunicação digital da rede, foi acionada para ajudar no diagnóstico antes do chamado de TI ser atendido.</p>
    <p>O protocolo de diagnóstico começou com a etapa mais básica e frequentemente esquecida: verificar qual IP cada fornecedor estava usando naquele momento. Pedimos a cada equipe de fornecedor que acessasse a ferramenta Meu IP e nos informasse o endereço exibido. Em menos de dois minutos, identificamos o problema: todos os três fornecedores com acesso negado haviam migrado para novos planos de internet em seus escritórios — com IPs dinâmicos que haviam mudado desde o cadastro original na whitelist. O IP exibido pela ferramenta não correspondia a nenhum dos IPs registrados no sistema do portal. Dois outros fornecedores sem problemas de acesso usavam IPs fixos contratados especificamente para esse fim.</p>
    <p>Com o diagnóstico confirmado em menos de 10 minutos, a NuAto encaminhou ao gestor de TI do varejista os novos IPs de cada fornecedor para atualização na whitelist — o que foi feito remotamente em menos de 5 minutos. Os três fornecedores passaram a ter acesso normalizado antes do prazo de fechamento de pedidos, evitando um atraso logístico que poderia afetar o abastecimento de 12 filiais naquela semana. O incidente gerou um protocolo interno: todo fornecedor novo passa a ser orientado a contratar IP fixo junto ao provedor antes do cadastro no portal.</p>
    <ul>
        <li>3 fornecedores com acesso negado por mudança de IP dinâmico não comunicada</li>
        <li>Diagnóstico concluído em menos de 10 minutos usando a verificação de IP</li>
        <li>Whitelist atualizada antes do prazo de fechamento de pedidos mensais</li>
        <li>Protocolo criado: novos fornecedores obrigados a contratar IP fixo antes do cadastro</li>
    </ul>
    <p>Agências que atuam como parceiro digital de varejistas com sistemas de acesso restrito por IP devem ter a verificação de IP como primeiro passo de qualquer diagnóstico de acesso negado. A solução para 80% dos chamados de "não consigo acessar o sistema" começa com a pergunta: qual é o seu IP agora?</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Antes de configurar whitelist de IP em plataformas de campanhas, ERPs de clientes varejistas ou painéis de analytics, sempre confirme o IP atual da máquina ou do servidor usando esta ferramenta. Um IP desatualizado na whitelist barra toda a equipe de um acesso crítico exatamente no momento em que mais precisam — como no dia de lançamento de uma campanha.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
