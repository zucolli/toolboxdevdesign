<div class="card">
    <h1 class="card-title">Conversor de Maiúsculas / Minúsculas</h1>
    <p class="card-description">Cole o texto de entrada, selecione um formato e o resultado aparece instantaneamente. Suporte a acentuação e caracteres especiais do português.</p>

    <div class="form-group">
        <label class="form-label" for="cc-input">Texto de entrada</label>
        <textarea id="cc-input" rows="6" placeholder="Digite ou cole seu texto aqui…"></textarea>
    </div>

    <div class="cc-actions">
        <button class="btn btn-secondary cc-btn" data-mode="upper" type="button">UPPERCASE</button>
        <button class="btn btn-secondary cc-btn" data-mode="lower" type="button">lowercase</button>
        <button class="btn btn-secondary cc-btn" data-mode="capitalize" type="button">Capitalize Case</button>
        <button class="btn btn-secondary cc-btn" data-mode="sentence" type="button">Sentence case</button>
        <button class="btn btn-secondary cc-btn" data-mode="camel" type="button">camelCase</button>
        <button class="btn btn-secondary cc-btn" data-mode="pascal" type="button">PascalCase</button>
        <button class="btn btn-secondary cc-btn" data-mode="snake" type="button">snake_case</button>
        <button class="btn btn-secondary cc-btn" data-mode="kebab" type="button">kebab-case</button>
        <button class="btn btn-secondary cc-btn" data-mode="constant" type="button">CONSTANT_CASE</button>
        <button class="btn btn-secondary cc-btn" data-mode="dot" type="button">dot.case</button>
    </div>

    <div class="form-group" style="margin-top: 20px;" id="cc-result-wrap" hidden>
        <div class="input-copy-row" style="margin-bottom: 8px;">
            <label class="form-label" style="margin:0;flex:1;">Resultado — <span id="cc-mode-label"></span></label>
            <button class="btn btn-ghost btn-sm" id="cc-copy-btn" type="button">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                Copiar
            </button>
        </div>
        <textarea id="cc-output" class="input-readonly" rows="6" readonly></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Conversor de Case para Texto e Código</h2>
    <p>Esta ferramenta converte qualquer texto nos formatos mais utilizados em desenvolvimento de software e redação digital, 100% no navegador sem envio de dados.</p>

    <h3>Formatos disponíveis</h3>
    <p><strong>UPPERCASE / lowercase</strong> — conversão direta de todos os caracteres. <strong>Capitalize Case</strong> capitaliza a primeira letra de cada palavra. <strong>Sentence case</strong> capitaliza apenas o início de cada frase. <strong>camelCase</strong> e <strong>PascalCase</strong> são usados em nomes de variáveis e classes em JavaScript, Java e C#. <strong>snake_case</strong> é padrão em Python e bancos de dados SQL. <strong>kebab-case</strong> é utilizado em slugs de URL e propriedades CSS. <strong>CONSTANT_CASE</strong> segue a convenção para constantes em C, Java e outras linguagens. <strong>dot.case</strong> é comum em configurações e chaves de tradução (i18n).</p>

    <h3>Acentuação e caracteres especiais</h3>
    <p>Nos formatos de código (camelCase, snake_case, kebab-case etc.), acentos e caracteres especiais são removidos e substituídos por equivalentes ASCII. Nos formatos de texto (UPPERCASE, Capitalize etc.) a acentuação é preservada usando os métodos nativos <code>toUpperCase()</code> e <code>toLowerCase()</code> do JavaScript, que respeitam o Unicode.</p>

    <section class="tool-seo-content">
        <h3>O que é o Conversor de Maiúsculas e Minúsculas?</h3>
        <p>O Conversor de Maiúsculas e Minúsculas é uma ferramenta versátil para desenvolvedores, redatores e profissionais de dados que precisam converter texto entre diferentes formatações. A ferramenta suporta múltiplos formatos: UPPERCASE, lowercase, Title Case, camelCase, snake_case, kebab-case, PascalCase e dot.case. Conversão em tempo real permite visualizar resultados instantaneamente enquanto digita.</p>

        <h3>Como usar o Conversor de Maiúsculas e Minúsculas?</h3>
        <p>Cole ou digite o texto no campo de entrada. Selecione o formato desejado nos botões disponíveis. A ferramenta converte e exibe instantaneamente o resultado no campo de saída. Suporte completo a acentuação e caracteres especiais do português. Copie qualquer resultado e use em seu código, documento ou texto. Conversão é caso-sensível: entrada lowercase diferencia de UPPERCASE.</p>

        <h3>Casos de uso práticos do Conversor de Maiúsculas e Minúsculas</h3>
        <p>Desenvolvedores usam conversores constantemente: snake_case para variáveis em Python/SQL, camelCase em JavaScript, PascalCase em nomes de classes, UPPERCASE em constantes. Redatores usam conversão para padronizar Título de Seções ou criar nomes de arquivos. Profissionais de dados usam para normalizar valores em datasets. Ter uma ferramenta que converte entre todos os formatos economiza tempo e evita erros manuais.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Padronização de Nomenclatura de Campanhas em Múltiplos Canais de Grande Rede Varejista</h3>
    <p>Uma grande rede varejista com operação em seis estados rodava campanhas simultâneas em Google Ads, Meta Ads, e-mail marketing e tabloide digital para a mesma data sazonal — Dia das Mães — com nomenclatura completamente inconsistente entre canais. O Google Ads nomeava a campanha como "Black Friday" na plataforma, o Meta Ads usava "black friday", a planilha de controle de tabloide registrava "BLACK FRIDAY" e o sistema de e-mail marketing tinha "Dia das Maes 2024". Quando o analista de dados tentou consolidar os resultados no GA4 para apresentar o ROI total da data comemorativa, encontrou quatro linhas separadas de fonte de dados que representavam a mesma campanha — impossibilitando qualquer análise de performance consolidada sem limpeza manual.</p>
    <p>A NuAto criou um protocolo de nomenclatura de campanha a partir de um padrão definido em documento interno e implementado com o Case Converter como ferramenta de aplicação prática. A regra estabelecida foi: <strong>kebab-case para parâmetros UTM</strong> (ex: <code>dia-das-maes-2024</code>) e <strong>Title Case para nomes de campanha nas plataformas</strong> (ex: <code>Dia Das Maes 2024</code>) — consistente entre Google Ads, Meta Ads e sistema de e-mail. Para a migração das campanhas existentes, o analista de mídia converteu todos os nomes usando o Case Converter, campo por campo, evitando erros de digitação na conversão manual. A ferramenta foi especialmente útil nos nomes de UTM, onde um hífen no lugar errado gera uma linha separada no relatório.</p>
    <p>Após três meses de uso do protocolo de nomenclatura padronizada, os relatórios de atribuição no GA4 passaram a consolidar corretamente por campanha — eliminando completamente as linhas duplicadas que antes somavam 18% do total de linhas no relatório de aquisição. A equipe de análise de dados reduziu em 4 horas semanais o tempo dedicado a limpeza e normalização de dados de campanha, tempo que passou a ser investido em análise efetiva. A diretoria passou a receber relatórios de performance de data comemorativa consolidados em uma página, em vez de quatro planilhas separadas por canal.</p>
    <ul>
        <li>Protocolo definido: kebab-case para UTMs, Title Case para plataformas de mídia</li>
        <li>18% de linhas duplicadas no GA4 eliminadas após padronização</li>
        <li>Redução de 4 horas semanais no tempo de limpeza de dados</li>
        <li>Relatório de ROI por data comemorativa consolidado em uma única visão</li>
    </ul>
    <p>A fragmentação de dados por inconsistência de nomenclatura de campanha é um problema silencioso que corrói a qualidade analítica de qualquer operação de varejo multicanal. A padronização de caixa é o passo zero de qualquer estratégia de dados — e implementá-la com uma ferramenta que converte com precisão elimina o erro humano que sempre acompanha conversões manuais.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em feeds de produto para Google Merchant Center, títulos em <em>Title Case</em> têm CTR comprovadamente maior do que em UPPERCASE ou minúsculas. Padronize nomes de produto antes de subir o feed — especialmente em catálogos de materiais de construção onde SKUs chegam do ERP em caixa alta e precisam ser humanizados para converter em buscas orgânicas.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
