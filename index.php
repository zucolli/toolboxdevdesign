<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);
define('BASE_URL', '/carloszucolli/toolboxdevdesign/');

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

// Remove base path and query string
$path = parse_url($requestUri, PHP_URL_PATH);
$path = str_replace(BASE_URL, '', $path);
$path = trim($path, '/');

$titulo          = 'Toolbox Dev Design';
$pageDescription = 'Toolbox de ferramentas gratuitas para desenvolvedores e designers web.';
$view            = null;

// API endpoints (must run before HTML output)
if ($path === 'api/generate-argon2') {
    header('Content-Type: application/json');
    $body = (string) file_get_contents('php://input');
    $data = json_decode($body, true);
    $password = isset($data['password']) ? (string) $data['password'] : '';
    if ($password === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Senha não pode ser vazia.']);
        exit;
    }
    try {
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        echo json_encode(['hash' => $hash]);
    } catch (\Throwable $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao gerar hash.']);
    }
    exit;
}

if ($path === 'api/verify-argon2') {
    header('Content-Type: application/json');
    $body     = (string) file_get_contents('php://input');
    $data     = json_decode($body, true);
    $password = isset($data['password']) ? (string) $data['password'] : '';
    $hash     = isset($data['hash'])     ? (string) $data['hash']     : '';
    if ($password === '' || $hash === '') {
        http_response_code(400);
        echo json_encode(['error' => 'Senha e hash são obrigatórios.']);
        exit;
    }
    echo json_encode(['match' => password_verify($password, $hash)]);
    exit;
}

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
    '', 'slug-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Slugs | Toolbox Dev Design';
        $pageDescription = 'Converta qualquer texto em slugs limpos e otimizados para URLs e SEO instantaneamente. Ideal para CMS, WordPress e e-commerce.';
        $view            = BASE_PATH . '/views/slug-generator.php';
    })(),
    'contrast-checker' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Calculadora de Contraste WCAG | Toolbox Dev Design';
        $pageDescription = 'Verifique se suas cores passam nos critérios de acessibilidade WCAG 2.1 AA e AAA. Essencial para UI design inclusivo.';
        $view            = BASE_PATH . '/views/contrast-checker.php';
    })(),
    'hash-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Hashes | Toolbox Dev Design';
        $pageDescription = 'Gere hashes Bcrypt, MD5 e SHA-256 de forma segura diretamente no navegador, sem enviar dados ao servidor.';
        $view            = BASE_PATH . '/views/hash-generator.php';
    })(),
    'utm-builder' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de UTMs | Toolbox Dev Design';
        $pageDescription = 'Crie URLs rastreáveis com parâmetros UTM para suas campanhas no Google Analytics 4. Simples, rápido e gratuito.';
        $view            = BASE_PATH . '/views/utm-builder.php';
    })(),
    'url-encoder-decoder' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'URL Encoder / Decoder | Toolbox Dev Design';
        $pageDescription = 'Encode e decode URLs com caracteres especiais em tempo real. Perfeito para depurar APIs REST e query strings.';
        $view            = BASE_PATH . '/views/url-encoder-decoder.php';
    })(),
    'color-palette-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Paleta de Cores | Toolbox Dev Design';
        $pageDescription = 'Gere paletas de cores harmoniosas — analógica, complementar, triádica e monocromática — a partir de uma cor base.';
        $view            = BASE_PATH . '/views/color-palette-generator.php';
    })(),
    'url-parser' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'URL Parser | Toolbox Dev Design';
        $pageDescription = 'Desmembre qualquer URL em seus componentes: protocolo, host, path, query params e hash. Ótimo para debugging.';
        $view            = BASE_PATH . '/views/url-parser.php';
    })(),
    'argon2-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador Argon2id | Toolbox Dev Design';
        $pageDescription = 'Gere e verifique hashes Argon2id, o padrão ouro atual para segurança de senhas, via backend PHP.';
        $view            = BASE_PATH . '/views/argon2-generator.php';
    })(),
    'sha512-crc32-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador SHA-512 e CRC32 | Toolbox Dev Design';
        $pageDescription = 'Calcule hashes SHA-512 e checksums CRC32 localmente, sem enviar dados ao servidor. Ideal para verificar integridade de arquivos.';
        $view            = BASE_PATH . '/views/sha512-crc32-generator.php';
    })(),
    'svg-optimizer' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Otimizador de SVG | Toolbox Dev Design';
        $pageDescription = 'Reduza o tamanho de arquivos SVG removendo metadados desnecessários e otimizando paths, 100% no navegador.';
        $view            = BASE_PATH . '/views/svg-optimizer.php';
    })(),
    'copy-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Copy para Ofertas | Toolbox Dev Design';
        $pageDescription = 'Crie textos persuasivos para posts e ofertas usando fórmulas de copywriting (AIDA, PAS, BAB) instantaneamente, sem IA paga.';
        $view            = BASE_PATH . '/views/copy-generator.php';
    })(),
    'json-formatter' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Formatador e Validador de JSON | Toolbox Dev Design';
        $pageDescription = 'Formate, valide e minifique JSON diretamente no navegador. Detecta erros de sintaxe com indicação de linha, 100% client-side e gratuito.';
        $view            = BASE_PATH . '/views/json-formatter.php';
    })(),
    'roi-calculator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Calculadora de ROI e ROAS | Toolbox Dev Design';
        $pageDescription = 'Calcule ROI, ROAS e Lucro Líquido das suas campanhas de marketing em tempo real. Gratuito, sem cadastro, 100% no navegador.';
        $view            = BASE_PATH . '/views/roi-calculator.php';
    })(),
    'whatsapp-link' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Link do WhatsApp | Toolbox Dev Design';
        $pageDescription = 'Crie links wa.me com mensagem pré-definida para o WhatsApp. Encode automático de caracteres especiais e acentos. Gratuito e instantâneo.';
        $view            = BASE_PATH . '/views/whatsapp-link.php';
    })(),
    'bulk-utm-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de UTM em Massa | Toolbox Dev Design';
        $pageDescription = 'Adicione parâmetros UTM a dezenas de URLs de uma vez. Ideal para campanhas de e-mail e tráfego pago com múltiplos destinos. Gratuito e 100% no navegador.';
        $view            = BASE_PATH . '/views/bulk-utm-generator.php';
    })(),
    'base64-encoder' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Base64 Encoder / Decoder | Toolbox Dev Design';
        $pageDescription = 'Encode e decode Base64 com suporte completo a UTF-8 e acentuação. Two-way binding em tempo real, sem enviar dados ao servidor.';
        $view            = BASE_PATH . '/views/base64-encoder.php';
    })(),
    'px-rem-converter' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Conversor PX para REM | Toolbox Dev Design';
        $pageDescription = 'Converta valores de PX para REM e vice-versa em tempo real. Base configurável, ideal para projetos com font-size customizado.';
        $view            = BASE_PATH . '/views/px-rem-converter.php';
    })(),
    'css-box-shadow' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de CSS Box Shadow | Toolbox Dev Design';
        $pageDescription = 'Crie e personalize sombras CSS visualmente com sliders em tempo real. Gere o código box-shadow pronto para copiar e usar no seu projeto.';
        $view            = BASE_PATH . '/views/css-box-shadow.php';
    })(),
    'css-gradient' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de CSS Gradient | Toolbox Dev Design';
        $pageDescription = 'Crie gradientes lineares e radiais com preview em tempo real. Gere o código CSS pronto para copiar — 100% gratuito e no navegador.';
        $view            = BASE_PATH . '/views/css-gradient.php';
    })(),
    'password-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Senhas Fortes | Toolbox Dev Design';
        $pageDescription = 'Gere senhas criptograficamente seguras com a Web Crypto API. Configure comprimento, maiúsculas, números e símbolos. 100% client-side.';
        $view            = BASE_PATH . '/views/password-generator.php';
    })(),
    'word-counter' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Contador de Caracteres e Palavras | Toolbox Dev Design';
        $pageDescription = 'Conte caracteres, palavras, linhas e tempo de leitura em tempo real. Veja a densidade das palavras mais usadas — ideal para SEO e redação. 100% client-side.';
        $view            = BASE_PATH . '/views/word-counter.php';
    })(),
    'lorem-ipsum' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Lorem Ipsum | Toolbox Dev Design';
        $pageDescription = 'Gere texto Lorem Ipsum em parágrafos, palavras, frases ou listas HTML. Configure a quantidade e inclua tags automaticamente. Gratuito e 100% no navegador.';
        $view            = BASE_PATH . '/views/lorem-ipsum.php';
    })(),
    'case-converter' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Conversor de Maiúsculas e Minúsculas | Toolbox Dev Design';
        $pageDescription = 'Converta texto para UPPERCASE, lowercase, camelCase, snake_case, kebab-case e mais formatos. Suporte a acentuação. 100% gratuito e no navegador.';
        $view            = BASE_PATH . '/views/case-converter.php';
    })(),
    default => (function () use (&$titulo, &$pageDescription, &$view) {
        http_response_code(404);
        $titulo          = 'Página não encontrada | Toolbox Dev Design';
        $pageDescription = 'Toolbox de ferramentas gratuitas para desenvolvedores e designers web.';
        $view            = BASE_PATH . '/views/404.php';
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
