<?php
/**
 * Componente "Leia também" — exibe 2 artigos relevantes por ferramenta.
 * Uso: $relatedTool = 'utm-builder'; include BASE_PATH . '/includes/related-articles.php';
 */

$_kb_articles = [
    [
        'slug'     => 'utm-varejo-alto-volume',
        'title'    => 'Estratégia de UTM para Varejo de Alto Volume',
        'meta'     => '6 min de leitura · Marketing',
        'badge'    => 'marketing',
        'label'    => 'Marketing',
        'tools'    => ['utm-builder', 'bulk-utm-generator'],
    ],
    [
        'slug'     => 'matematica-testes-ab',
        'title'    => 'A Matemática por Trás dos Testes A/B',
        'meta'     => '7 min de leitura · Análise de Dados',
        'badge'    => 'desenvolvimento',
        'label'    => 'Desenvolvimento',
        'tools'    => ['ab-test-calculator'],
    ],
    [
        'slug'     => 'privacidade-client-side-lgpd',
        'title'    => 'Privacidade Client-Side: 100% de Conformidade com a LGPD',
        'meta'     => '6 min de leitura · Privacidade',
        'badge'    => 'privacidade',
        'label'    => 'Privacidade',
        'tools'    => ['hash-generator', 'argon2-generator', 'sha512-crc32-generator', 'password-generator'],
    ],
];

$_related = array_filter($_kb_articles, function ($a) use ($relatedTool) {
    return in_array($relatedTool, $a['tools'], true);
});

// Fallback: se não há match exato, pega os 2 primeiros
if (empty($_related)) {
    $_related = array_slice($_kb_articles, 0, 2);
}

$_related = array_slice(array_values($_related), 0, 2);

if (!empty($_related)) : ?>
<div class="related-articles">
    <p class="related-articles-title">Leia também</p>
    <div class="related-articles-list">
        <?php foreach ($_related as $_art) : ?>
        <a href="<?= BASE_URL ?>artigos/<?= htmlspecialchars($_art['slug']) ?>" class="related-articles-item">
            <span class="related-articles-badge">
                <span class="kb-badge kb-badge--<?= htmlspecialchars($_art['badge']) ?>"><?= htmlspecialchars($_art['label']) ?></span>
            </span>
            <div>
                <p class="related-articles-item-title"><?= htmlspecialchars($_art['title']) ?></p>
                <p class="related-articles-item-meta"><?= htmlspecialchars($_art['meta']) ?></p>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
