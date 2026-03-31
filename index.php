<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);
define('BASE_URL', '/carloszucolli/toolboxdevdesign/');

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

// Remove base path and query string
$path = parse_url($requestUri, PHP_URL_PATH);
$path = str_replace(BASE_URL, '', $path);
$path = trim($path, '/');

$titulo = 'Toolbox Dev Design';
$view   = null;

match ($path) {
    '', 'slug-generator' => (function () use (&$titulo, &$view) {
        $titulo = 'Gerador de Slugs — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/slug-generator.php';
    })(),
    'contrast-checker' => (function () use (&$titulo, &$view) {
        $titulo = 'Calculadora de Contraste WCAG — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/contrast-checker.php';
    })(),
    default => (function () use (&$titulo, &$view) {
        http_response_code(404);
        $titulo = 'Página não encontrada — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/404.php';
    })(),
};

require BASE_PATH . '/includes/header.php';
require BASE_PATH . '/includes/sidebar.php';

if ($view && file_exists($view)) {
    require $view;
} else {
    echo '<div class="card"><h1>404</h1><p>Página não encontrada.</p></div>';
}

require BASE_PATH . '/includes/footer.php';
