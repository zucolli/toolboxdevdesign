<div class="card">
    <h1 class="card-title">Gerador de Meta Tags</h1>
    <p class="card-description">Preencha os campos abaixo para gerar automaticamente as meta tags HTML padrão, Open Graph e Twitter Cards.</p>

    <div class="form-group">
        <label class="form-label" for="mt-title">Título da Página</label>
        <input type="text" id="mt-title" placeholder="Ex: Toolbox Dev Design — Ferramentas para devs" maxlength="70" />
        <span class="field-hint" id="mt-title-count">0/70 caracteres</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-description">Descrição</label>
        <textarea id="mt-description" rows="3" placeholder="Ex: Ferramentas gratuitas para desenvolvedores e designers web." maxlength="160"></textarea>
        <span class="field-hint" id="mt-desc-count">0/160 caracteres</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-url">URL Canônica</label>
        <input type="url" id="mt-url" placeholder="https://seusite.com.br/pagina" />
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-image">URL da Imagem (Open Graph)</label>
        <input type="url" id="mt-image" placeholder="https://seusite.com.br/og-image.jpg" />
        <span class="field-hint">Recomendado: 1200 × 630 px</span>
    </div>

    <div class="form-group">
        <label class="form-label" for="mt-author">Autor</label>
        <input type="text" id="mt-author" placeholder="Nome do autor ou empresa" />
    </div>

    <div class="checksum-block" style="margin-top: 16px;">
        <div class="checksum-block-header">
            <span class="checksum-block-title">Código HTML gerado</span>
            <button class="btn btn-sm btn-secondary" id="mt-copy">Copiar HTML</button>
        </div>
        <textarea class="input-readonly mt-output" id="mt-output" rows="18" readonly placeholder="Preencha os campos acima para gerar as meta tags…"></textarea>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Como usar o Gerador de Meta Tags</h2>
    <p>Preencha os campos e o código HTML é atualizado em tempo real. Copie e cole diretamente na seção <code>&lt;head&gt;</code> do seu site.</p>

    <h3>Tags geradas</h3>
    <p>O gerador produz três conjuntos de tags: <strong>meta tags padrão</strong> (title, description, author, canonical), <strong>Open Graph</strong> (og:title, og:description, og:image, og:url) para redes sociais como Facebook e LinkedIn, e <strong>Twitter Cards</strong> (twitter:card, twitter:title, twitter:description, twitter:image) para compartilhamentos no X/Twitter.</p>

    <h3>Boas práticas</h3>
    <p>O título ideal tem entre 50–60 caracteres e a descrição entre 120–160 caracteres para evitar truncamento nos resultados de busca. A imagem Open Graph deve ter proporção 1.91:1 (ex: 1200×630 px) para exibição ideal em compartilhamentos sociais.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
