<?php
/**
 * Contextual navigation: category-based prev/next + cross-content related links.
 * - Tool pages: related articles + prev/next within same category
 * - Article pages: related tools (hardcoded in view) + prev/next within articles
 */

$_ctx_categories = [
    'dev' => [
        'label' => 'Dev',
        'tools' => [
            ['slug' => 'slug-generator',        'name' => 'Gerador de Slugs'],
            ['slug' => 'hash-generator',         'name' => 'Gerador de Hashes'],
            ['slug' => 'argon2-generator',       'name' => 'Argon2id'],
            ['slug' => 'sha512-crc32-generator', 'name' => 'SHA-512 / CRC32'],
            ['slug' => 'svg-optimizer',          'name' => 'Otimizador de SVG'],
            ['slug' => 'url-encoder-decoder',    'name' => 'URL Encoder/Decoder'],
            ['slug' => 'url-parser',             'name' => 'URL Parser'],
            ['slug' => 'json-formatter',         'name' => 'JSON Formatter'],
            ['slug' => 'base64-encoder',         'name' => 'Base64'],
            ['slug' => 'px-rem-converter',       'name' => 'PX → REM'],
            ['slug' => 'csv-json',               'name' => 'CSV ↔ JSON'],
            ['slug' => 'uuid-generator',         'name' => 'UUID / GUID'],
            ['slug' => 'sql-formatter',          'name' => 'SQL Formatter'],
            ['slug' => 'image-base64',           'name' => 'Imagem → Base64'],
            ['slug' => 'password-generator',     'name' => 'Gerador de Senhas'],
        ],
    ],
    'design' => [
        'label' => 'Design',
        'tools' => [
            ['slug' => 'contrast-checker',        'name' => 'Contraste WCAG'],
            ['slug' => 'color-palette-generator', 'name' => 'Color Palette'],
            ['slug' => 'css-box-shadow',          'name' => 'CSS Box Shadow'],
            ['slug' => 'css-gradient',            'name' => 'CSS Gradient'],
            ['slug' => 'image-placeholder',       'name' => 'Placeholder de Imagem'],
        ],
    ],
    'marketing' => [
        'label' => 'Marketing',
        'tools' => [
            ['slug' => 'utm-builder',         'name' => 'Gerador de UTMs'],
            ['slug' => 'bulk-utm-generator',  'name' => 'UTM em Massa'],
            ['slug' => 'roi-calculator',      'name' => 'ROI / ROAS'],
            ['slug' => 'whatsapp-link',       'name' => 'WhatsApp Link'],
            ['slug' => 'copy-generator',      'name' => 'Copy Generator'],
            ['slug' => 'ab-test-calculator',  'name' => 'Calculadora A/B'],
        ],
    ],
    'texto' => [
        'label' => 'Texto',
        'tools' => [
            ['slug' => 'word-counter',  'name' => 'Contador de Palavras'],
            ['slug' => 'lorem-ipsum',   'name' => 'Lorem Ipsum'],
            ['slug' => 'case-converter','name' => 'Case Converter'],
            ['slug' => 'text-cleaner',  'name' => 'Limpador de Texto'],
        ],
    ],
    'rede' => [
        'label' => 'Rede / SEO',
        'tools' => [
            ['slug' => 'qr-generator', 'name' => 'QR Code'],
            ['slug' => 'meta-tags',    'name' => 'Meta Tags SEO'],
            ['slug' => 'my-ip',        'name' => 'Meu IP'],
        ],
    ],
];

$_ctx_articles = [
    ['slug' => 'artigos/utm-varejo-alto-volume',      'name' => 'UTM para Varejo de Alto Volume'],
    ['slug' => 'artigos/matematica-testes-ab',         'name' => 'A Matemática dos Testes A/B'],
    ['slug' => 'artigos/privacidade-client-side-lgpd', 'name' => 'Privacidade Client-Side e LGPD'],
];

$_ctx_is_tool    = false;
$_ctx_is_article = false;
$_ctx_cat_key    = null;
$_ctx_cat_list   = [];
$_ctx_idx        = null;
$_ctx_hub_url    = '';
$_ctx_hub_label  = '';

// Detect tool
foreach ($_ctx_categories as $_cat_key => $_cat) {
    foreach ($_cat['tools'] as $_ti => $_tool) {
        if ($_tool['slug'] === $path) {
            $_ctx_is_tool  = true;
            $_ctx_cat_key  = $_cat_key;
            $_ctx_cat_list = $_cat['tools'];
            $_ctx_idx      = $_ti;
            break 2;
        }
    }
}

// Detect article
if (!$_ctx_is_tool) {
    foreach ($_ctx_articles as $_ai => $_art) {
        if ($_art['slug'] === $path) {
            $_ctx_is_article = true;
            $_ctx_cat_list   = $_ctx_articles;
            $_ctx_idx        = $_ai;
            break;
        }
    }
}

if (!$_ctx_is_tool && !$_ctx_is_article) return;

$_ctx_prev = $_ctx_idx > 0 ? $_ctx_cat_list[$_ctx_idx - 1] : null;
$_ctx_next = $_ctx_idx < count($_ctx_cat_list) - 1 ? $_ctx_cat_list[$_ctx_idx + 1] : null;

if ($_ctx_is_tool) {
    $_ctx_hub_url   = BASE_URL . 'ferramentas';
    $_ctx_hub_label = 'Ferramentas';
} else {
    $_ctx_hub_url   = BASE_URL . 'artigos';
    $_ctx_hub_label = 'Base de Conhecimento';
}
?>
<div class="contextual-nav">

<?php if ($_ctx_is_tool) : ?>
<?php $relatedTool = $path; require BASE_PATH . '/includes/related-articles.php'; ?>
<?php endif; ?>

<nav class="seq-nav" aria-label="Navegação sequencial">
    <div class="seq-nav-inner">
        <?php if ($_ctx_prev) : ?>
        <a href="<?= BASE_URL . htmlspecialchars($_ctx_prev['slug']) ?>" class="seq-nav-item seq-nav-item--prev">
            <span class="seq-nav-dir">← Anterior</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_ctx_prev['name']) ?></span>
        </a>
        <?php else : ?>
        <a href="<?= htmlspecialchars($_ctx_hub_url) ?>" class="seq-nav-item seq-nav-item--prev">
            <span class="seq-nav-dir">← Voltar</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_ctx_hub_label) ?></span>
        </a>
        <?php endif; ?>

        <?php if ($_ctx_next) : ?>
        <a href="<?= BASE_URL . htmlspecialchars($_ctx_next['slug']) ?>" class="seq-nav-item seq-nav-item--next">
            <span class="seq-nav-dir">Próximo →</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_ctx_next['name']) ?></span>
        </a>
        <?php else : ?>
        <a href="<?= htmlspecialchars($_ctx_hub_url) ?>" class="seq-nav-item seq-nav-item--next">
            <span class="seq-nav-dir">Ver todos →</span>
            <span class="seq-nav-title"><?= htmlspecialchars($_ctx_hub_label) ?></span>
        </a>
        <?php endif; ?>
    </div>
</nav>

</div><!-- /.contextual-nav -->
