<?php
$artigosMeta = require BASE_PATH . '/includes/artigos-meta.php';
?>

<div class="card">
    <h1 class="card-title">Base de Conhecimento</h1>
    <p class="card-description">Estudos de caso e artigos técnicos escritos por especialistas em varejo e marketing digital. Conteúdo baseado em 30 anos de prática em grandes redes do comércio brasileiro.</p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<section class="bc-intro tool-content">
    <p>Esta Base de Conhecimento reúne o aprendizado acumulado por <a href="<?= BASE_URL ?>carlos-zucolli">Carlos Zucolli</a> e a equipe da <strong>NuAto Comunicação</strong> ao longo de 30 anos gerenciando a comunicação e a tecnologia de gigantes do varejo brasileiro. Cada artigo parte de um problema real — enfrentado em produção, com verba real e resultado auditável — e traduz a solução para quem trabalha no dia a dia de desenvolvimento, marketing digital ou operações de varejo.</p>
    <p>Os artigos cobrem desde parâmetros UTM em tabloides digitais e segurança em portais de fornecedor até SEO para catálogos de alto volume e WCAG em encartes — sempre com dados, exemplos e o contexto que apenas quem vive o varejo na prática conhece.</p>
</section>

<div class="bc-filters">
    <?php
    $categorias = array_unique(array_column($artigosMeta, 'categoria'));
    sort($categorias);
    ?>
    <button class="bc-filter-btn bc-filter-active" data-filter="all">Todos</button>
    <?php foreach ($categorias as $cat): ?>
    <button class="bc-filter-btn" data-filter="<?= htmlspecialchars(strtolower(str_replace([' ', '&'], ['-', ''], $cat))) ?>"><?= htmlspecialchars($cat) ?></button>
    <?php endforeach; ?>
</div>

<div class="bc-grid">
    <?php foreach ($artigosMeta as $slug => $artigo):
        $catKey = strtolower(str_replace([' ', '&'], ['-', ''], $artigo['categoria']));
        $dataFormatada = date('d/m/Y', strtotime($artigo['data']));
        $temFerramenta = !empty($artigo['ferramenta']);
    ?>
    <article class="bc-card" data-categoria="<?= htmlspecialchars($catKey) ?>">
        <div class="bc-card-categoria"><?= htmlspecialchars($artigo['categoria']) ?></div>
        <h2 class="bc-card-titulo">
            <a href="<?= BASE_URL ?>artigos/<?= htmlspecialchars($slug) ?>"><?= htmlspecialchars($artigo['titulo']) ?></a>
        </h2>
        <p class="bc-card-desc"><?= htmlspecialchars($artigo['desc']) ?></p>
        <div class="bc-card-footer">
            <time class="bc-card-data" datetime="<?= htmlspecialchars($artigo['data']) ?>"><?= $dataFormatada ?></time>
            <?php if ($temFerramenta): ?>
            <a href="<?= BASE_URL . htmlspecialchars($artigo['ferramenta_url']) ?>" class="bc-card-tool-link">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                <?= htmlspecialchars($artigo['ferramenta']) ?>
            </a>
            <?php endif; ?>
        </div>
        <a href="<?= BASE_URL ?>artigos/<?= htmlspecialchars($slug) ?>" class="bc-card-cta">Ler artigo →</a>
    </article>
    <?php endforeach; ?>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<aside class="expert-insight">
    <p class="expert-insight-label">Sobre o Autor</p>
    <p>Os artigos desta Base de Conhecimento são escritos por <strong>Carlos Zucolli</strong>, especialista com 30 anos de experiência em varejo e marketing digital. Sócio da NuAto Comunicação, Carlos já coordenou campanhas para gigantes do Atacarejo, Home Center e Cooperativas de Consumo com faturamento bilionário.</p>
    <a href="<?= BASE_URL ?>carlos-zucolli" style="display:inline-block;margin-top:8px;font-weight:600;color:var(--color-primary);">Ver perfil completo →</a>
</aside>
