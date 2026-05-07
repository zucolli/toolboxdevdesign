<?php
$_bc_labels = [
    'ferramentas'                      => 'Ferramentas',
    'artigos'                          => 'Base de Conhecimento',
    'utm-varejo-alto-volume'           => 'UTM para Varejo',
    'matematica-testes-ab'             => 'Testes A/B',
    'privacidade-client-side-lgpd'     => 'Privacidade e LGPD',
    'psicologia-cores-varejo'          => 'Psicologia das Cores',
    'seguranca-client-side-hash'       => 'Segurança Client-Side',
    'seo-ecommerce-construcao-urls'    => 'SEO E-commerce Construção',
    'atribuicao-vendas-ga4-utm'        => 'Atribuição GA4 e UTM',
    'acessibilidade-wcag-negocio'      => 'WCAG como Negócio',
    'varejo-phygital-integracao-pdv'   => 'Varejo Phygital',
    'core-web-vitals-varejo'           => 'Core Web Vitals',
    'sobre'                            => 'Sobre',
    'privacidade'                      => 'Política de Privacidade',
    'termos'                           => 'Termos de Uso',
    'slug-generator'                   => 'Gerador de Slugs',
    'hash-generator'                   => 'Gerador de Hashes',
    'argon2-generator'                 => 'Argon2id',
    'sha512-crc32-generator'           => 'SHA-512 / CRC32',
    'svg-optimizer'                    => 'Otimizador de SVG',
    'contrast-checker'                 => 'Contraste WCAG',
    'url-encoder-decoder'              => 'URL Encoder/Decoder',
    'url-parser'                       => 'URL Parser',
    'color-palette-generator'          => 'Color Palette',
    'json-formatter'                   => 'JSON Formatter',
    'base64-encoder'                   => 'Base64',
    'px-rem-converter'                 => 'PX → REM',
    'csv-json'                         => 'CSV ↔ JSON',
    'uuid-generator'                   => 'UUID / GUID',
    'sql-formatter'                    => 'SQL Formatter',
    'image-base64'                     => 'Imagem → Base64',
    'image-placeholder'                => 'Placeholder de Imagem',
    'css-box-shadow'                   => 'CSS Box Shadow',
    'css-gradient'                     => 'CSS Gradient',
    'password-generator'               => 'Gerador de Senhas',
    'qr-generator'                     => 'QR Code',
    'meta-tags'                        => 'Meta Tags SEO',
    'my-ip'                            => 'Meu IP',
    'roi-calculator'                   => 'ROI / ROAS',
    'whatsapp-link'                    => 'WhatsApp Link',
    'bulk-utm-generator'               => 'UTM em Massa',
    'utm-builder'                      => 'Gerador de UTMs',
    'copy-generator'                   => 'Copy Generator',
    'ab-test-calculator'               => 'Calculadora A/B',
    'word-counter'                     => 'Contador de Palavras',
    'lorem-ipsum'                      => 'Lorem Ipsum',
    'case-converter'                   => 'Case Converter',
    'text-cleaner'                     => 'Limpador de Texto',
];

$_bc_segments = array_values(array_filter(explode('/', $path)));
if (empty($_bc_segments)) return;

$_bc_crumbs = [['label' => 'Início', 'url' => BASE_URL, 'active' => false]];

$_bc_accum = '';

foreach ($_bc_segments as $_i => $_seg) {
    $_bc_accum .= ($_bc_accum ? '/' : '') . $_seg;
    $_bc_crumbs[] = [
        'label'  => $_bc_labels[$_seg] ?? ucwords(str_replace('-', ' ', $_seg)),
        'url'    => BASE_URL . $_bc_accum,
        'active' => ($_i === count($_bc_segments) - 1),
    ];
}
?>
<nav class="breadcrumb" aria-label="Breadcrumb">
    <?php foreach ($_bc_crumbs as $_idx => $_crumb) : ?>
        <?php if ($_idx > 0) : ?><span class="breadcrumb-sep" aria-hidden="true">/</span><?php endif; ?>
        <?php if ($_crumb['active']) : ?>
            <span class="breadcrumb-item breadcrumb-item--current" aria-current="page"><?= htmlspecialchars($_crumb['label']) ?></span>
        <?php else : ?>
            <a href="<?= htmlspecialchars($_crumb['url']) ?>" class="breadcrumb-item"><?= htmlspecialchars($_crumb['label']) ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
