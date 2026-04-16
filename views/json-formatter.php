<div class="card">
    <h1 class="card-title">Formatador e Validador de JSON</h1>
    <p class="card-description">Cole seu JSON no campo da esquerda e clique em <strong>Formatar</strong> ou <strong>Minificar</strong>. Erros de sintaxe são exibidos com a linha indicada.</p>

    <div class="json-grid">
        <div class="form-group">
            <label class="form-label" for="json-input">JSON Original</label>
            <textarea id="json-input" class="json-textarea" placeholder='{"chave": "valor", "numero": 42}'></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="json-output">Resultado</label>
            <textarea id="json-output" class="json-textarea input-readonly" readonly placeholder="O resultado aparecerá aqui…"></textarea>
        </div>
    </div>

    <div class="json-actions">
        <button id="btn-json-format" class="btn btn-primary" type="button">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
            Formatar
        </button>
        <button id="btn-json-minify" class="btn btn-secondary" type="button">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            Minificar
        </button>
        <button id="btn-json-copy" class="btn btn-secondary" type="button">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            Copiar
        </button>
        <button id="btn-json-clear" class="btn btn-ghost" type="button">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            Limpar
        </button>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é o Formatador de JSON?</h2>
    <p>O JSON (JavaScript Object Notation) é o formato de troca de dados mais usado em APIs e aplicações web. Minificado, ele é difícil de ler — esta ferramenta formata com indentação de 2 espaços para facilitar a leitura e depuração.</p>

    <h3>Como usar</h3>
    <p>Cole seu JSON no campo da esquerda e clique em <strong>Formatar</strong> para aplicar indentação legível, ou em <strong>Minificar</strong> para compactar e reduzir o tamanho. Se o JSON tiver erros de sintaxe, a mensagem de erro aparecerá à direita indicando a posição do problema.</p>

    <h3>Validação de erros</h3>
    <p>A validação usa <code>JSON.parse()</code> nativo do navegador — o mesmo motor que qualquer API JavaScript usa. Erros comuns incluem aspas simples no lugar de duplas, vírgula após o último item, e chaves/colchetes não fechados.</p>

    <section class="tool-seo-content">
        <h3>O que é o Formatador e Validador de JSON?</h3>
        <p>O Formatador e Validador de JSON é uma ferramenta essencial para desenvolvedores que trabalham com APIs, bancos de dados NoSQL e configurações em JSON. JSON é o formato padrão para troca de dados na web, e um JSON malformado pode quebrar aplicações inteiras. A ferramenta formata automaticamente JSON não formatado, detecta erros de sintaxe e oferece minificação para otimização. Tudo executado 100% no navegador, sem enviar dados ao servidor.</p>

        <h3>Como usar o Formatador e Validador de JSON?</h3>
        <p>Cole ou digite seu JSON no campo de entrada. A ferramenta valida instantaneamente: se houver erros de sintaxe, indica exatamente em qual linha. Você pode então formate o JSON com indentação clara ou minificá-lo para reduzir tamanho. A visualização lado-a-lado permite ver original e formatado simultaneamente. Copie o resultado e use em sua aplicação, API ou arquivo de configuração.</p>

        <h3>Casos de uso práticos do Formatador e Validador de JSON</h3>
        <p>Developers trabalham com JSON constantemente: respondendo APIs REST, configurando aplicações, manipulando dados em MongoDB ou Firebase, e gerenciando arquivos package.json, tsconfig.json e package-lock.json. Um JSON inválido em produção pode causar downtime. Profissionais usam validadores de JSON para depurar APIs, verificar integridade de dados e validar arquivos de configuração antes do deploy.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
