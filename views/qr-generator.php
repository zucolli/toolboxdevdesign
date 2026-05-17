<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>

<div class="card">
    <h1 class="card-title">Gerador de QR Code</h1>
    <p class="card-description">Digite texto ou URL para gerar um QR Code instantaneamente. Configure cores e tamanho, e baixe como PNG.</p>

    <div class="form-group">
        <label class="form-label" for="qr-input">Texto ou URL</label>
        <input type="text" id="qr-input" placeholder="https://exemplo.com.br" />
    </div>

    <div class="qr-options">
        <div class="form-group">
            <label class="form-label" for="qr-fg">Cor do QR Code</label>
            <input type="color" id="qr-fg" value="#000000" />
        </div>
        <div class="form-group">
            <label class="form-label" for="qr-bg">Cor de fundo</label>
            <input type="color" id="qr-bg" value="#ffffff" />
        </div>
        <div class="form-group">
            <label class="form-label" for="qr-size">Tamanho (px)</label>
            <input type="number" id="qr-size" value="256" min="64" max="1024" step="8" />
        </div>
    </div>

    <div class="qr-preview-wrap">
        <canvas id="qr-canvas"></canvas>
        <p class="qr-placeholder-text" id="qr-placeholder">Digite algo acima para gerar o QR Code</p>
    </div>

    <div id="qr-actions" style="display:none; margin-top: 16px; text-align: center;">
        <button class="btn btn-primary" id="qr-download">Baixar PNG</button>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Como usar o Gerador de QR Code</h2>
    <p>Digite qualquer texto ou URL no campo acima. O QR Code é gerado instantaneamente no navegador — nenhum dado é enviado ao servidor.</p>

    <h3>Personalizando o QR Code</h3>
    <p>Escolha a cor do código e do fundo usando os seletores de cor. O tamanho padrão de 256px é adequado para uso digital; para impressão, recomenda-se 512px ou mais.</p>

    <h3>Baixando o arquivo</h3>
    <p>Clique em "Baixar PNG" para salvar o QR Code como imagem. O arquivo terá exatamente o tamanho configurado em pixels.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de QR Code?</h3>
        <p>O Gerador de QR Code é uma ferramenta essencial para estratégias de marketing moderno, logística e conexão entre offline e online. QR Codes permitem que smartphones escaneiem rapidamente e acessem URLs, contatos, WiFi ou informações customizadas. A ferramenta permite gerar QR Codes personalizados com cores customizadas, tamanho configurável, e download direto como PNG de alta qualidade.</p>

        <h3>Como usar o Gerador de QR Code?</h3>
        <p>Digite ou cole a informação que deseja codificar: URL, texto, contato, WiFi ou número de telefone. Customize a cor do QR Code e do fundo usando seletores visuais. Ajuste o tamanho desejado (pequeno para etiquetas, grande para cartazes). Clique em "Gerar QR Code" e visualize o resultado. Baixe como arquivo PNG em alta resolução para imprimir ou compartilhar digitalmente.</p>

        <h3>Casos de uso práticos do Gerador de QR Code</h3>
        <p>QR Codes são utilizados em campanhas de marketing (links para landing pages), embalagens de produto (rastreamento e autenticação), cartões de visita digitais, contatos emergenciais, autenticação multifator, e muito mais. Dados show que campanhas com QR Code têm 30% mais engajamento. Restaurantes usam QR Codes para menus, varejistas para promoções, e empresas para processos. Gerar QR Codes rapidamente é essencial em operações modernas.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: QR Codes com UTM por Filial para 200 Lojas de Grande Rede de Home Center</h3>
    <p>Uma rede de home center com 200 lojas físicas no Brasil decidiu adicionar QR Codes nas etiquetas de prateleira de departamentos de alto ticket — elétrica, hidráulica e revestimentos — para conectar o cliente físico ao conteúdo técnico do site (tutoriais, especificações, comparativos de produto). O desafio operacional era considerável: 200 lojas em 11 estados, cada uma precisando de um QR Code diferente por departamento para que os scans fossem atribuídos corretamente por filial nos relatórios de analytics. Uma solução genérica com um único QR Code para todos faria a iniciativa perder todo o valor analítico.</p>
    <p>A solução foi gerar um QR Code por combinação de loja e departamento, com a URL de destino incluindo parâmetros UTM estruturados: <code>utm_source=qr-prateleira</code>, <code>utm_medium=offline</code>, <code>utm_campaign=conteudo-tecnico</code> e <code>utm_content=loja-SP-001</code> variando por filial. Para cada uma das 200 lojas, foram gerados QR Codes para 4 departamentos, resultando em 800 URLs únicas. O processo de geração foi feito em lotes utilizando a ferramenta: a equipe de marketing preparou uma planilha com os 800 códigos de filial, montou as URLs com o padrão de UTM definido, e gerou os QR Codes de forma sistemática em sequência, exportando cada imagem nomeada com o código da loja.</p>
    <p>Após 60 dias da implantação nas prateleiras, os dados de scan por filial revelaram uma distribuição completamente inesperada: 38% de todos os scans vieram de 12 lojas localizadas em cidades do interior de São Paulo com perfil de obras, enquanto as lojas em grandes centros urbanos geravam menos de 15% do total. Essa informação redirecionou a estratégia de conteúdo do site — a equipe passou a priorizar tutoriais de instalação elétrica e hidráulica para obras residenciais em vez de conteúdo de design de interiores, que era a aposta inicial.</p>
    <ul>
        <li>800 QR Codes únicos gerados (200 lojas × 4 departamentos)</li>
        <li>Parâmetro <code>utm_content=loja-SP-001</code> variando por filial para rastreamento granular</li>
        <li>38% dos scans concentrados em 12 lojas de cidades com perfil de obras</li>
        <li>Reorientação de estratégia de conteúdo baseada em dados reais de scan por filial</li>
    </ul>
    <p>Redes varejistas com operação física em múltiplas filiais que não usam UTMs em QR Codes estão desperdiçando a oportunidade de entender qual PDV gera mais engajamento digital. O dado de scan por loja é tão estratégico quanto o dado de vendas por loja — e hoje é possível capturá-lo com custo operacional próximo de zero.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em tabloides digitais impressos para redes varejistas — encartes de supermercado, materiais de PDV — sempre incorpore UTMs na URL do QR Code antes de gerar. Isso transforma material impresso em dado rastreável: você saberá exatamente quantos clientes escanearam o encarte e o que compraram online depois, conectando o mundo físico ao digital com precisão.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
