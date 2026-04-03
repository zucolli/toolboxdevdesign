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
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
