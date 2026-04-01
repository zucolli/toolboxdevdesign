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
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
