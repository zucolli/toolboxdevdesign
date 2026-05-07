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
            ['slug' => 'ferramentas/slug-generator',        'name' => 'Gerador de Slugs'],
            ['slug' => 'ferramentas/hash-generator',         'name' => 'Gerador de Hashes'],
            ['slug' => 'ferramentas/argon2-generator',       'name' => 'Argon2id'],
            ['slug' => 'ferramentas/sha512-crc32-generator', 'name' => 'SHA-512 / CRC32'],
            ['slug' => 'ferramentas/svg-optimizer',          'name' => 'Otimizador de SVG'],
            ['slug' => 'ferramentas/url-encoder-decoder',    'name' => 'URL Encoder/Decoder'],
            ['slug' => 'ferramentas/url-parser',             'name' => 'URL Parser'],
            ['slug' => 'ferramentas/json-formatter',         'name' => 'JSON Formatter'],
            ['slug' => 'ferramentas/base64-encoder',         'name' => 'Base64'],
            ['slug' => 'ferramentas/px-rem-converter',       'name' => 'PX → REM'],
            ['slug' => 'ferramentas/csv-json',               'name' => 'CSV ↔ JSON'],
            ['slug' => 'ferramentas/uuid-generator',         'name' => 'UUID / GUID'],
            ['slug' => 'ferramentas/sql-formatter',          'name' => 'SQL Formatter'],
            ['slug' => 'ferramentas/image-base64',           'name' => 'Imagem → Base64'],
            ['slug' => 'ferramentas/password-generator',     'name' => 'Gerador de Senhas'],
        ],
    ],
    'design' => [
        'label' => 'Design',
        'tools' => [
            ['slug' => 'ferramentas/contrast-checker',        'name' => 'Contraste WCAG'],
            ['slug' => 'ferramentas/color-palette-generator', 'name' => 'Color Palette'],
            ['slug' => 'ferramentas/css-box-shadow',          'name' => 'CSS Box Shadow'],
            ['slug' => 'ferramentas/css-gradient',            'name' => 'CSS Gradient'],
            ['slug' => 'ferramentas/image-placeholder',       'name' => 'Placeholder de Imagem'],
        ],
    ],
    'marketing' => [
        'label' => 'Marketing',
        'tools' => [
            ['slug' => 'ferramentas/utm-builder',         'name' => 'Gerador de UTMs'],
            ['slug' => 'ferramentas/bulk-utm-generator',  'name' => 'UTM em Massa'],
            ['slug' => 'ferramentas/roi-calculator',      'name' => 'ROI / ROAS'],
            ['slug' => 'ferramentas/whatsapp-link',       'name' => 'WhatsApp Link'],
            ['slug' => 'ferramentas/copy-generator',      'name' => 'Copy Generator'],
            ['slug' => 'ferramentas/ab-test-calculator',  'name' => 'Calculadora A/B'],
        ],
    ],
    'texto' => [
        'label' => 'Texto',
        'tools' => [
            ['slug' => 'ferramentas/word-counter',  'name' => 'Contador de Palavras'],
            ['slug' => 'ferramentas/lorem-ipsum',   'name' => 'Lorem Ipsum'],
            ['slug' => 'ferramentas/case-converter','name' => 'Case Converter'],
            ['slug' => 'ferramentas/text-cleaner',  'name' => 'Limpador de Texto'],
        ],
    ],
    'rede' => [
        'label' => 'Rede / SEO',
        'tools' => [
            ['slug' => 'ferramentas/qr-generator', 'name' => 'QR Code'],
            ['slug' => 'ferramentas/meta-tags',    'name' => 'Meta Tags SEO'],
            ['slug' => 'ferramentas/my-ip',        'name' => 'Meu IP'],
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
