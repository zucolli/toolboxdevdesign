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
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
