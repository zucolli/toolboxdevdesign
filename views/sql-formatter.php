<script src="https://unpkg.com/sql-formatter@4.0.2/dist/sql-formatter.min.js"></script>

<div class="card">
    <h1 class="card-title">Formatador de SQL</h1>
    <p class="card-description">Cole o SQL minificado ou mal formatado, escolha o dialeto e obtenha o código identado e legível instantaneamente. 100% no navegador.</p>

    <div class="sf-top-bar">
        <div class="form-group" style="margin:0;flex:1;max-width:220px;">
            <label class="form-label" for="sf-dialect">Dialeto SQL</label>
            <select id="sf-dialect">
                <option value="sql">SQL padrão</option>
                <option value="mysql">MySQL</option>
                <option value="postgresql">PostgreSQL</option>
                <option value="bigquery">BigQuery</option>
                <option value="db2">DB2</option>
                <option value="mariadb">MariaDB</option>
                <option value="n1ql">N1QL (Couchbase)</option>
                <option value="plsql">PL/SQL (Oracle)</option>
                <option value="redshift">Amazon Redshift</option>
                <option value="spark">Spark SQL</option>
                <option value="tsql">T-SQL (SQL Server)</option>
            </select>
        </div>

        <div class="form-group" style="margin:0;flex:0 0 auto;">
            <label class="form-label" for="sf-indent">Indentação</label>
            <select id="sf-indent">
                <option value="    ">4 espaços</option>
                <option value="  ">2 espaços</option>
                <option value="&#9;">Tab</option>
            </select>
        </div>

        <div class="form-group" style="margin:0;flex:0 0 auto;align-self:flex-end;">
            <label class="radio-label">
                <input type="checkbox" id="sf-uppercase" checked>
                Palavras-chave em MAIÚSCULAS
            </label>
        </div>
    </div>

    <div class="sf-columns">
        <div class="form-group sf-col">
            <div class="input-copy-row" style="margin-bottom:8px;">
                <label class="form-label" style="margin:0;flex:1;">SQL original</label>
                <button class="btn btn-ghost btn-sm" id="sf-clear-btn" type="button">Limpar</button>
            </div>
            <textarea id="sf-input" rows="14" placeholder="Cole o SQL aqui…&#10;&#10;Exemplo:&#10;select u.id,u.name,o.total from users u inner join orders o on u.id=o.user_id where o.total>100 order by o.total desc"></textarea>
        </div>

        <div class="form-group sf-col">
            <div class="input-copy-row" style="margin-bottom:8px;">
                <label class="form-label" style="margin:0;flex:1;">SQL formatado</label>
                <button class="btn btn-ghost btn-sm" id="sf-copy-btn" type="button">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    Copiar
                </button>
            </div>
            <textarea id="sf-output" class="input-readonly" rows="14" readonly placeholder="O SQL formatado aparecerá aqui…"></textarea>
        </div>
    </div>

    <div class="sf-error" id="sf-error" hidden></div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Por que formatar SQL?</h2>
    <p>SQL gerado por ORMs, copiado de logs ou escrito rapidamente costuma estar em uma linha só, sem indentação. Um SQL bem formatado facilita revisão de código, depuração de queries complexas, e comunicação entre membros da equipe.</p>

    <h3>Dialetos suportados</h3>
    <p>A biblioteca <strong>sql-formatter</strong> suporta os principais dialetos: SQL padrão ANSI, MySQL, PostgreSQL, T-SQL (SQL Server), PL/SQL (Oracle), BigQuery, MariaDB, Redshift e Spark SQL. Cada dialeto tem palavras-chave e funções específicas que são reconhecidas corretamente.</p>

    <h3>Opções de formatação</h3>
    <p><strong>Indentação</strong> — escolha entre 2 espaços, 4 espaços ou tab para se alinhar ao estilo do seu projeto. <strong>Palavras-chave em maiúsculas</strong> — convenção amplamente adotada que diferencia visualmente os comandos SQL dos identificadores e valores.</p>

    <section class="tool-seo-content">
        <h3>O que é o Formatador de SQL?</h3>
        <p>O Formatador de SQL é uma ferramenta essencial para desenvolvedores backend, DBAs e analistas que escrevem queries SQL. SQL mal formatado é difícil de ler, depurar e manter. A ferramenta formata automaticamente queries com indentação apropriada, palavras-chave em maiúsculas, alinhamento de cláusulas e quebras de linha. Suporta múltiplos dialetos: MySQL, PostgreSQL, T-SQL, PL/SQL, BigQuery e SQLite.</p>

        <h3>Como usar o Formatador de SQL?</h3>
        <p>Cole sua query SQL no campo de entrada. Selecione o dialeto do seu banco de dados se desejar (ou deixe em auto-detect). Clique em "Formatar" e a query é embelezada com indentação clara, keywords em UPPERCASE, e cláusulas alinhadas. Você pode also minificar para compactar queries e reduzir tamanho. Copie o resultado formatado para seu editor SQL ou aplicação.</p>

        <h3>Casos de uso práticos do Formatador de SQL</h3>
        <p>Queries SQL complexas com múltiplas JOINs, CTEs e WHEREs são praticamente ilegíveis sem formatação apropriada. Equipes de desenvolvimento usam formatadores para padronizar estilo de código. Performance debugging é mais fácil com queries bem formatadas. Analysts que compartilham queries com colegas enviam formatadas para legibilidade. Qualquer profissional que trabalha com SQL regularmente beneficia dessa ferramenta.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
