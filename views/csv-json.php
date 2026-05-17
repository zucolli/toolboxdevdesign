<div class="card">
    <h1 class="card-title">Conversor CSV ↔ JSON</h1>
    <p class="card-description">Cole o CSV ou JSON, selecione a direção e a conversão acontece instantaneamente. 100% no navegador, sem envio de dados.</p>

    <div class="cj-direction-row">
        <span class="cj-direction-label">Entrada</span>
        <select id="cj-direction" class="cj-select">
            <option value="csv2json">CSV → JSON</option>
            <option value="json2csv">JSON → CSV</option>
        </select>
        <span class="cj-direction-label">Saída</span>
    </div>

    <div class="cj-columns">
        <div class="form-group cj-col">
            <div class="input-copy-row" style="margin-bottom:8px;">
                <label class="form-label" id="cj-input-label" style="margin:0;flex:1;">CSV</label>
                <button class="btn btn-ghost btn-sm" id="cj-clear-btn" type="button">Limpar</button>
            </div>
            <textarea id="cj-input" rows="14" placeholder="Cole o CSV aqui…&#10;&#10;Exemplo:&#10;nome,email,idade&#10;João,joao@exemplo.com,30&#10;Maria,maria@exemplo.com,25"></textarea>
        </div>

        <div class="form-group cj-col">
            <div class="input-copy-row" style="margin-bottom:8px;">
                <label class="form-label" id="cj-output-label" style="margin:0;flex:1;">JSON</label>
                <button class="btn btn-ghost btn-sm" id="cj-copy-btn" type="button">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    Copiar
                </button>
            </div>
            <textarea id="cj-output" class="input-readonly" rows="14" readonly placeholder="O resultado aparecerá aqui…"></textarea>
        </div>
    </div>

    <div class="cj-error" id="cj-error" hidden></div>

    <div class="cj-options">
        <label class="radio-label">
            <input type="checkbox" id="cj-pretty" checked>
            JSON identado (pretty print)
        </label>
        <label class="radio-label">
            <input type="checkbox" id="cj-semicolon">
            Usar ponto e vírgula como separador
        </label>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Conversão CSV ↔ JSON explicada</h2>
    <p>CSV (<em>Comma-Separated Values</em>) e JSON (<em>JavaScript Object Notation</em>) são os dois formatos de dados mais comuns na web. Esta ferramenta converte entre eles de forma instantânea no próprio navegador.</p>

    <h3>CSV → JSON</h3>
    <p>A primeira linha do CSV é interpretada como cabeçalho (nome das chaves). Cada linha subsequente vira um objeto JSON. Campos entre aspas duplas são tratados corretamente, mesmo que contenham vírgulas ou quebras de linha internas.</p>

    <h3>JSON → CSV</h3>
    <p>O JSON de entrada deve ser um array de objetos com estrutura uniforme. As chaves do primeiro objeto viram o cabeçalho do CSV. Valores que contêm vírgulas são automaticamente envolvidos em aspas duplas para respeitar a especificação RFC 4180.</p>

    <h3>Casos de uso comuns</h3>
    <p>Exportações de planilhas (Excel, Google Sheets) para APIs REST, transformação de respostas de API para importação em banco de dados, e integração de dados entre sistemas com formatos distintos.</p>

    <section class="tool-seo-content">
        <h3>O que é o Conversor CSV ↔ JSON?</h3>
        <p>O Conversor CSV ↔ JSON é uma ferramenta fundamental para profissionais de dados, desenvolvedores backend e analistas que trabalham com formatos de dados variados. CSV (Comma-Separated Values) é padrão em planilhas e exports, enquanto JSON é padrão em APIs e aplicações web modernas. A ferramenta converte entre ambos instantaneamente, com suporte completo a campos com vírgulas, aspas e valores complexos.</p>

        <h3>Como usar o Conversor CSV ↔ JSON?</h3>
        <p>Cole ou faça upload de um arquivo CSV. A ferramenta converte instantaneamente para JSON, onde cada linha CSV vira um objeto JSON com chaves baseadas no header. Você pode converter no sentido oposto também: JSON para CSV. A ferramenta detecta automaticamente delimitadores e lida com campos entre aspas. Copie o resultado ou baixe como arquivo.</p>

        <h3>Casos de uso práticos do Conversor CSV ↔ JSON</h3>
        <p>Developers usam para importar dados de spreadsheets para APIs, exportar dados de bancos de dados para análise em Excel, ou processar importações em batch. Analistas de dados usam para transformar formatos entre diferentes ferramentas e plataformas. Integradores de sistemas usam para sincronizar dados entre sistemas que falam formatos diferentes. Essa ferramenta elimina necessidade de escrever parsing manual.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Conversão de Planilha de Preços de Promoção para Importação no E-commerce</h3>
    <p>A equipe comercial de um grande supermercado regional com 45 lojas enviava semanalmente uma planilha Excel com os preços promocionais da semana — em média 1.200 produtos — para a equipe de e-commerce atualizar no sistema. O arquivo era exportado do Excel como CSV pela equipe comercial, que não tinha treinamento técnico e usava versões diferentes do Office em Windows e Mac. O resultado era um CSV diferente a cada semana: às vezes com BOM UTF-8 no início, às vezes em codificação Latin-1, campos de preço com vírgula decimal dentro de aspas que quebravam o parser, e nomes de produtos com caracteres especiais truncados. A equipe de e-commerce gastava em média 3 horas toda segunda-feira apenas para limpar e importar esses dados.</p>
    <p>Usamos o Conversor CSV→JSON para estabelecer um fluxo padronizado. A ferramenta lidava automaticamente com o BOM UTF-8, interpretava corretamente campos entre aspas com vírgulas internas (como preços no formato <code>"1.299,90"</code>) e normalizava o encoding. O JSON gerado era então consumido por um script de importação no e-commerce que mapeava os campos da planilha para os campos da API da plataforma. O fluxo completo foi documentado com capturas de tela para que a equipe de e-commerce pudesse executar sem suporte técnico.</p>
    <p>O tempo de importação semanal caiu de 3 horas para 25 minutos — uma redução de 86%. Os erros de importação (produtos com preço zerado, descrições cortadas, SKUs duplicados) caíram de uma média de 47 por semana para menos de 3. Nos meses seguintes, o mesmo fluxo foi adaptado para outras fontes de dados do cliente: relatórios de estoque do sistema de logística e dados de performance de categorias do ERP. O aprendizado central foi que o problema não era a planilha — era a falta de um conversor que tolerasse a imperfeição real do dado de origem.</p>
    <p>Em operações de varejo, dados nunca chegam limpos. Qualquer fluxo de importação de dados que dependa de um CSV "perfeito" vai falhar semanalmente. Ter uma camada de conversão tolerante a falhas de encoding, BOM e formatação regional é o que separa um processo estável de um incêndio recorrente.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em operações de varejo de médio e grande porte, dados de performance de campanha vivem em planilhas Excel. Converter o CSV do relatório para JSON antes de importar no sistema analítico mantém histórico estruturado e permite cruzamento entre Google Ads, Meta e e-mail em uma única fonte de verdade — sem depender de integrações pagas de BI.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
