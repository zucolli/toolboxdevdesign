<?php
$_seq_tools = [
    // Dev
    ['slug' => 'slug-generator',         'name' => 'Gerador de Slugs',        'group' => 'tools'],
    ['slug' => 'hash-generator',          'name' => 'Gerador de Hashes',       'group' => 'tools'],
    ['slug' => 'argon2-generator',        'name' => 'Argon2id',                'group' => 'tools'],
    ['slug' => 'sha512-crc32-generator',  'name' => 'SHA-512 / CRC32',         'group' => 'tools'],
    ['slug' => 'svg-optimizer',           'name' => 'Otimizador de SVG',       'group' => 'tools'],
    ['slug' => 'url-encoder-decoder',     'name' => 'URL Encoder/Decoder',     'group' => 'tools'],
    ['slug' => 'url-parser',              'name' => 'URL Parser',              'group' => 'tools'],
    ['slug' => 'json-formatter',          'name' => 'JSON Formatter',          'group' => 'tools'],
    ['slug' => 'base64-encoder',          'name' => 'Base64',                  'group' => 'tools'],
    ['slug' => 'px-rem-converter',        'name' => 'PX → REM',                'group' => 'tools'],
    ['slug' => 'csv-json',                'name' => 'CSV ↔ JSON',              'group' => 'tools'],
    ['slug' => 'uuid-generator',          'name' => 'UUID / GUID',             'group' => 'tools'],
    ['slug' => 'sql-formatter',           'name' => 'SQL Formatter',           'group' => 'tools'],
    ['slug' => 'image-base64',            'name' => 'Imagem → Base64',         'group' => 'tools'],
    ['slug' => 'password-generator',      'name' => 'Gerador de Senhas',       'group' => 'tools'],
    // Design
    ['slug' => 'contrast-checker',        'name' => 'Contraste WCAG',          'group' => 'tools'],
    ['slug' => 'color-palette-generator', 'name' => 'Color Palette',           'group' => 'tools'],
    ['slug' => 'css-box-shadow',          'name' => 'CSS Box Shadow',          'group' => 'tools'],
    ['slug' => 'css-gradient',            'name' => 'CSS Gradient',            'group' => 'tools'],
    ['slug' => 'image-placeholder',       'name' => 'Placeholder de Imagem',   'group' => 'tools'],
    // Marketing
    ['slug' => 'utm-builder',             'name' => 'Gerador de UTMs',         'group' => 'tools'],
    ['slug' => 'bulk-utm-generator',      'name' => 'UTM em Massa',            'group' => 'tools'],
    ['slug' => 'roi-calculator',          'name' => 'ROI / ROAS',              'group' => 'tools'],
    ['slug' => 'whatsapp-link',           'name' => 'WhatsApp Link',           'group' => 'tools'],
    ['slug' => 'copy-generator',          'name' => 'Copy Generator',          'group' => 'tools'],
    ['slug' => 'ab-test-calculator',      'name' => 'Calculadora A/B',         'group' => 'tools'],
    // Texto
    ['slug' => 'word-counter',            'name' => 'Contador de Palavras',    'group' => 'tools'],
    ['slug' => 'lorem-ipsum',             'name' => 'Lorem Ipsum',             'group' => 'tools'],
    ['slug' => 'case-converter',          'name' => 'Case Converter',          'group' => 'tools'],
    ['slug' => 'text-cleaner',            'name' => 'Limpador de Texto',       'group' => 'tools'],
    // Rede/SEO
    ['slug' => 'qr-generator',            'name' => 'QR Code',                 'group' => 'tools'],
    ['slug' => 'meta-tags',               'name' => 'Meta Tags SEO',           'group' => 'tools'],
    ['slug' => 'my-ip',                   'name' => 'Meu IP',                  'group' => 'tools'],
];

$_seq_articles = [
    ['slug' => 'artigos/utm-varejo-alto-volume',       'name' => 'UTM para Varejo de Alto Volume',    'group' => 'artigos'],
    ['slug' => 'artigos/matematica-testes-ab',          'name' => 'A Matemática dos Testes A/B',       'group' => 'artigos'],
    ['slug' => 'artigos/privacidade-client-side-lgpd',  'name' => 'Privacidade Client-Side e LGPD',    'group' => 'artigos'],
];

// Determina lista e posição correntes
$_seq_list = null;
$_seq_idx  = null;

foreach ($_seq_tools as $_i => $_item) {
    if ($_item['slug'] === $path) {
        $_seq_list = $_seq_tools;
        $_seq_idx  = $_i;
        break;
    }
}

if ($_seq_list === null) {
    foreach ($_seq_articles as $_i => $_item) {
        if ($_item['slug'] === $path) {
            $_seq_list = $_seq_articles;
            $_seq_idx  = $_i;
            break;
        }
    }
}

if ($_seq_list === null || $_seq_idx === null) return;

$_seq_prev = ($_seq_idx > 0) ? $_seq_list[$_seq_idx - 1] : null;
$_seq_next = ($_seq_idx < count($_seq_list) - 1) ? $_seq_list[$_seq_idx + 1] : null;

if (!$_seq_prev && !$_seq_next) return;

$_seq_hub_url   = $_seq_list[0]['group'] === 'artigos' ? BASE_URL . 'artigos' : BASE_URL . 'ferramentas';
$_seq_hub_label = $_seq_list[0]['group'] === 'artigos' ? 'Base de Conhecimento' : 'Ferramentas';
?>
<nav class="seq-nav" aria-label="Navegação sequencial">
    <div class="seq-nav-inner">
        <?php if ($_seq_prev) : ?>
        <a href="<?= BASE_URL . htmlspecialchars($_seq_prev['slug']) ?>" class="seq-nav-item seq-nav-item--prev">
            <span class="seq-nav-dir">← Anterior</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_seq_prev['name']) ?></span>
        </a>
        <?php else : ?>
        <a href="<?= htmlspecialchars($_seq_hub_url) ?>" class="seq-nav-item seq-nav-item--prev">
            <span class="seq-nav-dir">← Voltar</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_seq_hub_label) ?></span>
        </a>
        <?php endif; ?>

        <?php if ($_seq_next) : ?>
        <a href="<?= BASE_URL . htmlspecialchars($_seq_next['slug']) ?>" class="seq-nav-item seq-nav-item--next">
            <span class="seq-nav-dir">Próximo →</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_seq_next['name']) ?></span>
        </a>
        <?php else : ?>
        <a href="<?= htmlspecialchars($_seq_hub_url) ?>" class="seq-nav-item seq-nav-item--next">
            <span class="seq-nav-dir">Ver todos →</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_seq_hub_label) ?></span>
        </a>
        <?php endif; ?>
    </div>
</nav>
