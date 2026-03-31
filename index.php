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

// API endpoint: generate-hash (must run before HTML output)
if ($path === 'api/generate-hash') {
    header('Content-Type: application/json');
    $body      = (string) file_get_contents('php://input');
    $data      = json_decode($body, true);
    $string    = isset($data['string']) ? (string) $data['string'] : '';
    $algorithm = isset($data['algorithm']) ? (string) $data['algorithm'] : '';

    $hash = match ($algorithm) {
        'bcrypt' => password_hash($string, PASSWORD_BCRYPT, ['cost' => 12]),
        'md5'    => md5($string),
        default  => null,
    };

    if ($hash === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Algoritmo inválido.']);
    } else {
        echo json_encode(['hash' => $hash]);
    }
    exit;
}

match ($path) {
    '', 'slug-generator' => (function () use (&$titulo, &$view) {
        $titulo = 'Gerador de Slugs — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/slug-generator.php';
    })(),
    'contrast-checker' => (function () use (&$titulo, &$view) {
        $titulo = 'Calculadora de Contraste WCAG — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/contrast-checker.php';
    })(),
    'hash-generator' => (function () use (&$titulo, &$view) {
        $titulo = 'Gerador de Hashes — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/hash-generator.php';
    })(),
    'utm-builder' => (function () use (&$titulo, &$view) {
        $titulo = 'Gerador de UTMs — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/utm-builder.php';
    })(),
    'url-encoder-decoder' => (function () use (&$titulo, &$view) {
        $titulo = 'URL Encoder/Decoder — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/url-encoder-decoder.php';
    })(),
    'color-palette-generator' => (function () use (&$titulo, &$view) {
        $titulo = 'Color Palette Generator — Toolbox Dev Design';
        $view   = BASE_PATH . '/views/color-palette-generator.php';
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
