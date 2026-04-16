<div class="card">
    <h1 class="card-title">Limpador de Texto</h1>
    <p class="card-description">Cole o texto, selecione as operações de limpeza desejadas e o resultado aparece instantaneamente. 100% no navegador, sem envio de dados.</p>

    <div class="tc-options">
        <label class="radio-label">
            <input type="checkbox" id="tc-extra-spaces" checked>
            Remover espaços extras
        </label>
        <label class="radio-label">
            <input type="checkbox" id="tc-empty-lines" checked>
            Remover linhas vazias
        </label>
        <label class="radio-label">
            <input type="checkbox" id="tc-duplicate-lines">
            Remover linhas duplicadas
        </label>
        <label class="radio-label">
            <input type="checkbox" id="tc-trim-lines">
            Remover espaços no início/fim de cada linha
        </label>
    </div>

    <div class="tc-columns">
        <div class="form-group tc-col">
            <label class="form-label" for="tc-input">Texto original</label>
            <textarea id="tc-input" rows="12" placeholder="Cole o texto aqui…"></textarea>
        </div>
        <div class="form-group tc-col">
            <div class="input-copy-row" style="margin-bottom:8px;">
                <label class="form-label" style="margin:0;flex:1;">Texto limpo</label>
                <button class="btn btn-ghost btn-sm" id="tc-copy-btn" type="button">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    Copiar
                </button>
            </div>
            <textarea id="tc-output" class="input-readonly" rows="12" readonly placeholder="O texto limpo aparecerá aqui…"></textarea>
        </div>
    </div>

    <div class="tc-stats" id="tc-stats" hidden>
        <span id="tc-stat-original"></span>
        <span id="tc-stat-cleaned"></span>
        <span id="tc-stat-removed"></span>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Para que serve o Limpador de Texto?</h2>
    <p>Textos copiados de PDFs, e-mails, planilhas ou sites frequentemente vêm com espaços duplos, quebras de linha desnecessárias e linhas em branco que atrapalham formatação e processamento posterior. Esta ferramenta resolve isso automaticamente.</p>

    <h3>Operações disponíveis</h3>
    <p><strong>Remover espaços extras</strong> — substitui sequências de dois ou mais espaços por um único espaço (<code>/ +/g → ' '</code>). <strong>Remover linhas vazias</strong> — elimina linhas que contêm apenas espaços ou são completamente vazias, usando <code>/^\s*[\r\n]/gm</code>. <strong>Remover linhas duplicadas</strong> — mantém apenas a primeira ocorrência de cada linha via <code>Set</code>. <strong>Remover espaços no início/fim de cada linha</strong> — aplica <code>trim()</code> em cada linha individualmente.</p>

    <h3>Casos de uso comuns</h3>
    <p>Limpeza de textos copiados de PDFs escaneados, normalização de dados antes de importar para planilhas ou bancos de dados, preparação de conteúdo para sistemas de IA, e remoção de duplicatas em listas copiadas de e-mails ou planilhas.</p>

    <section class="tool-seo-content">
        <h3>O que é o Limpador de Texto?</h3>
        <p>O Limpador de Texto é uma ferramenta essencial para profissionais que recebem textos de fontes variadas (PDFs, e-mails, planilhas, páginas web) que frequentemente contêm formatação, espaços extras, linhas vazias e duplicatas. A ferramenta remove automaticamente esses "detritos" de forma eficiente, deixando apenas o texto limpo e bem formatado pronto para reuso. Ideal para limpeza de dados e normalização de conteúdo.</p>

        <h3>Como usar o Limpador de Texto?</h3>
        <p>Cole o texto desejado no campo de entrada. Selecione as operações de limpeza desejadas: remover espaços extras, remover linhas vazias, remover caracteres de controle, converter para minúsculas ou MAIÚSCULAS. Ou use "Limpeza automática" para aplicar todas as operações de uma vez. Visualize o resultado em tempo real. Copie o texto limpo para usar em documentos, bancos de dados ou aplicações.</p>

        <h3>Casos de uso práticos do Limpador de Texto</h3>
        <p>Profissionais de dados usam limpadores de texto para normalizar datasets antes de análise. Redatores usam para limpar textos copiados de PDFs ou sites. Equipes de suporte usam para padronizar logs e mensagens. Desenvolvedores usam para processar input de usuários. Qualquer pessoa que trabalha com volume grande de texto precisa de uma ferramenta que automatize limpeza e formatação.</p>
    </section>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
