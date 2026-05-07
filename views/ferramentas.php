<?php
$_tools = [
    // Dev
    ['slug' => 'slug-generator',         'name' => 'Gerador de Slugs',        'desc' => 'Converta texto em slugs limpos para URLs e SEO.',                          'cat' => 'dev'],
    ['slug' => 'hash-generator',          'name' => 'Gerador de Hashes',       'desc' => 'Bcrypt, MD5 e SHA-256, 100% no navegador.',                               'cat' => 'dev'],
    ['slug' => 'argon2-generator',        'name' => 'Argon2id',                'desc' => 'Gere e verifique hashes Argon2id via backend PHP seguro.',                 'cat' => 'dev'],
    ['slug' => 'sha512-crc32-generator',  'name' => 'SHA-512 / CRC32',         'desc' => 'Calcule checksums para verificação de integridade de arquivos.',           'cat' => 'dev'],
    ['slug' => 'svg-optimizer',           'name' => 'Otimizador de SVG',       'desc' => 'Reduza SVGs removendo metadados e otimizando paths.',                     'cat' => 'dev'],
    ['slug' => 'url-encoder-decoder',     'name' => 'URL Encoder/Decoder',     'desc' => 'Encode e decode URLs com caracteres especiais em tempo real.',            'cat' => 'dev'],
    ['slug' => 'url-parser',              'name' => 'URL Parser',              'desc' => 'Desmembre qualquer URL em protocolo, host, path, params e hash.',         'cat' => 'dev'],
    ['slug' => 'json-formatter',          'name' => 'JSON Formatter',          'desc' => 'Formate, valide e minifique JSON com detecção de erros.',                  'cat' => 'dev'],
    ['slug' => 'base64-encoder',          'name' => 'Base64',                  'desc' => 'Encode e decode strings e arquivos em Base64.',                           'cat' => 'dev'],
    ['slug' => 'px-rem-converter',        'name' => 'PX → REM',                'desc' => 'Converta pixels para rem com base configurável.',                         'cat' => 'dev'],
    ['slug' => 'csv-json',                'name' => 'CSV ↔ JSON',              'desc' => 'Converta planilhas CSV em objetos JSON e vice-versa.',                     'cat' => 'dev'],
    ['slug' => 'uuid-generator',          'name' => 'UUID / GUID',             'desc' => 'Gere identificadores únicos v4 para seus sistemas.',                      'cat' => 'dev'],
    ['slug' => 'sql-formatter',           'name' => 'SQL Formatter',           'desc' => 'Formate queries SQL com suporte a MySQL, PostgreSQL, BigQuery e mais.',   'cat' => 'dev'],
    ['slug' => 'image-base64',            'name' => 'Imagem → Base64',         'desc' => 'Converta imagens em strings Base64 para embed em HTML/CSS.',              'cat' => 'dev'],
    ['slug' => 'password-generator',      'name' => 'Gerador de Senhas',       'desc' => 'Gere senhas fortes e aleatórias com critérios configuráveis.',            'cat' => 'dev'],
    // Design
    ['slug' => 'contrast-checker',        'name' => 'Contraste WCAG',          'desc' => 'Verifique contraste WCAG 2.1 AA/AAA para acessibilidade.',                'cat' => 'design'],
    ['slug' => 'color-palette-generator', 'name' => 'Color Palette',           'desc' => 'Gere paletas analógica, complementar, triádica e monocromática.',        'cat' => 'design'],
    ['slug' => 'css-box-shadow',          'name' => 'CSS Box Shadow',          'desc' => 'Construa box-shadows com preview em tempo real.',                         'cat' => 'design'],
    ['slug' => 'css-gradient',            'name' => 'CSS Gradient',            'desc' => 'Crie gradientes CSS lineares e radiais visualmente.',                     'cat' => 'design'],
    ['slug' => 'image-placeholder',       'name' => 'Placeholder de Imagem',   'desc' => 'Gere imagens placeholder SVG com dimensão e cor personalizáveis.',       'cat' => 'design'],
    // Marketing
    ['slug' => 'utm-builder',             'name' => 'Gerador de UTMs',         'desc' => 'Crie URLs rastreáveis com parâmetros UTM para GA4.',                     'cat' => 'marketing'],
    ['slug' => 'bulk-utm-generator',      'name' => 'UTM em Massa',            'desc' => 'Adicione UTMs a dezenas de URLs de uma vez.',                            'cat' => 'marketing'],
    ['slug' => 'roi-calculator',          'name' => 'ROI / ROAS',              'desc' => 'Calcule retorno sobre investimento e ROAS de campanhas.',                 'cat' => 'marketing'],
    ['slug' => 'whatsapp-link',           'name' => 'WhatsApp Link',           'desc' => 'Gere links wa.me com mensagem pré-definida e encode automático.',        'cat' => 'marketing'],
    ['slug' => 'copy-generator',          'name' => 'Copy Generator',          'desc' => 'Crie copies persuasivas com fórmulas AIDA, PAS e BAB.',                  'cat' => 'marketing'],
    ['slug' => 'ab-test-calculator',      'name' => 'Calculadora A/B',         'desc' => 'Calcule significância estatística de testes A/B com Z-test.',            'cat' => 'marketing'],
    // Texto
    ['slug' => 'word-counter',            'name' => 'Contador de Palavras',    'desc' => 'Conte palavras, caracteres, parágrafos e tempo de leitura.',              'cat' => 'texto'],
    ['slug' => 'lorem-ipsum',             'name' => 'Lorem Ipsum',             'desc' => 'Gere texto de preenchimento por parágrafos, palavras ou caracteres.',    'cat' => 'texto'],
    ['slug' => 'case-converter',          'name' => 'Case Converter',          'desc' => 'Converta texto entre camelCase, PascalCase, snake_case e mais.',         'cat' => 'texto'],
    ['slug' => 'text-cleaner',            'name' => 'Limpador de Texto',       'desc' => 'Remova formatação, espaços duplicados e caracteres indesejados.',        'cat' => 'texto'],
    // Rede/SEO
    ['slug' => 'qr-generator',            'name' => 'QR Code',                 'desc' => 'Gere QR Codes para URLs, textos e links de qualquer tipo.',              'cat' => 'rede'],
    ['slug' => 'meta-tags',               'name' => 'Meta Tags SEO',           'desc' => 'Gere meta tags Open Graph, Twitter Card e SEO básico.',                  'cat' => 'rede'],
    ['slug' => 'my-ip',                   'name' => 'Meu IP',                  'desc' => 'Descubra seu endereço IP público com informações de conexão.',           'cat' => 'rede'],
];

$_cat_labels = [
    'dev'       => 'Dev',
    'design'    => 'Design',
    'marketing' => 'Marketing',
    'texto'     => 'Texto',
    'rede'      => 'Rede / SEO',
];
?>
<div class="kb-wrap kb-wrap--index">

    <header class="kb-hero">
        <h1 class="kb-hero-title">Ferramentas</h1>
        <p class="kb-hero-desc">33 ferramentas gratuitas para desenvolvedores, designers e profissionais de marketing — sem cadastro, 100% no navegador.</p>
        <div class="kb-search-wrap">
            <svg class="kb-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" id="kb-search" class="kb-search-input" placeholder="Buscar ferramenta…" autocomplete="off">
        </div>
    </header>

    <nav class="kb-filter" aria-label="Filtrar por categoria">
        <button class="kb-filter-btn active" data-filter="todos">Todos</button>
        <button class="kb-filter-btn" data-filter="dev">Dev</button>
        <button class="kb-filter-btn" data-filter="design">Design</button>
        <button class="kb-filter-btn" data-filter="marketing">Marketing</button>
        <button class="kb-filter-btn" data-filter="texto">Texto</button>
        <button class="kb-filter-btn" data-filter="rede">Rede / SEO</button>
    </nav>

    <div class="kb-grid tool-grid" id="kb-grid">
        <?php foreach ($_tools as $_t) : ?>
        <a href="<?= BASE_URL . 'ferramentas/' . htmlspecialchars($_t['slug']) ?>" class="kb-card tool-card" data-category="<?= htmlspecialchars($_t['cat']) ?>" data-title="<?= htmlspecialchars($_t['name']) ?>">
            <span class="kb-badge kb-badge--<?= htmlspecialchars($_t['cat']) ?>"><?= htmlspecialchars($_cat_labels[$_t['cat']]) ?></span>
            <h2 class="kb-card-title"><?= htmlspecialchars($_t['name']) ?></h2>
            <p class="kb-card-desc"><?= htmlspecialchars($_t['desc']) ?></p>
        </a>
        <?php endforeach; ?>
    </div>

    <p class="kb-empty" id="kb-empty" style="display:none;">Nenhuma ferramenta encontrada.</p>

</div>
