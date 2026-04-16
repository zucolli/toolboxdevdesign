<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);
define('BASE_URL', '/');

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

// Remove base path and query string
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');

$titulo          = 'Toolbox Dev Design';
$pageDescription = 'Toolbox de ferramentas gratuitas para desenvolvedores e designers web.';
$view            = null;
$bodyClass       = '';

// API endpoints (must run before HTML output)
if ($path === 'api/get-ip') {
    header('Content-Type: application/json');
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']
        ?? $_SERVER['HTTP_X_REAL_IP']
        ?? $_SERVER['REMOTE_ADDR']
        ?? 'Desconhecido';
    if (strpos($ip, ',') !== false) {
        $ip = trim(explode(',', $ip)[0]);
    }
    echo json_encode(['ip' => $ip]);
    exit;
}

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
    '' => (function () use (&$titulo, &$pageDescription, &$view, &$bodyClass) {
        $titulo          = 'Toolbox Dev Design — 32 Ferramentas Gratuitas para Dev & Design';
        $pageDescription = '32 ferramentas gratuitas para desenvolvedores, designers e profissionais de marketing. Sem cadastro, 100% no navegador.';
        $view            = BASE_PATH . '/views/home.php';
        $bodyClass       = 'page-home';
    })(),
    'slug-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
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
    'qr-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de QR Code | Toolbox Dev Design';
        $pageDescription = 'Gere QR Codes personalizados com cores e tamanho configuráveis. Baixe como PNG diretamente no navegador — gratuito e sem cadastro.';
        $view            = BASE_PATH . '/views/qr-generator.php';
    })(),
    'meta-tags' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Meta Tags SEO | Toolbox Dev Design';
        $pageDescription = 'Gere meta tags HTML, Open Graph e Twitter Cards automaticamente. Otimize seu site para buscadores e redes sociais em segundos.';
        $view            = BASE_PATH . '/views/meta-tags.php';
    })(),
    'my-ip' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Meu IP — Qual é meu endereço IP? | Toolbox Dev Design';
        $pageDescription = 'Descubra seu endereço IP público instantaneamente. Ferramenta simples, sem cadastro e 100% gratuita.';
        $view            = BASE_PATH . '/views/my-ip.php';
    })(),
    'image-base64' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Conversor de Imagem para Base64 | Toolbox Dev Design';
        $pageDescription = 'Converta qualquer imagem (PNG, JPG, WebP, SVG) para código Base64 Data URL no navegador. Sem upload, sem servidor, 100% privado.';
        $view            = BASE_PATH . '/views/image-base64.php';
    })(),
    'image-placeholder' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de Placeholder de Imagem | Toolbox Dev Design';
        $pageDescription = 'Gere imagens placeholder personalizadas com dimensões, cores e texto configuráveis. Preview em tempo real via Canvas API — gratuito e 100% no navegador.';
        $view            = BASE_PATH . '/views/image-placeholder.php';
    })(),
    'text-cleaner' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Limpador de Texto | Toolbox Dev Design';
        $pageDescription = 'Remova espaços extras, linhas vazias e duplicatas de qualquer texto em tempo real. Ideal para limpar conteúdos copiados de PDFs, e-mails e planilhas.';
        $view            = BASE_PATH . '/views/text-cleaner.php';
    })(),
    'csv-json' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Conversor CSV ↔ JSON | Toolbox Dev Design';
        $pageDescription = 'Converta CSV para JSON e JSON para CSV instantaneamente no navegador. Suporte a campos com vírgulas e aspas, 100% client-side e gratuito.';
        $view            = BASE_PATH . '/views/csv-json.php';
    })(),
    'uuid-generator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Gerador de UUID / GUID | Toolbox Dev Design';
        $pageDescription = 'Gere até 100 UUIDs v4 criptograficamente seguros de uma vez, com Web Crypto API. Suporte a múltiplos formatos: hifenado, sem hífens, com chaves e maiúsculas.';
        $view            = BASE_PATH . '/views/uuid-generator.php';
    })(),
    'sql-formatter' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Formatador de SQL | Toolbox Dev Design';
        $pageDescription = 'Formate e embeleze queries SQL com indentação e palavras-chave em maiúsculas. Suporte a MySQL, PostgreSQL, T-SQL, PL/SQL, BigQuery e mais — 100% no navegador.';
        $view            = BASE_PATH . '/views/sql-formatter.php';
    })(),
    'ab-test-calculator' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Calculadora de Teste A/B | Toolbox Dev Design';
        $pageDescription = 'Calcule a significância estatística do seu teste A/B com Z-test bicaudal. Informe visitantes e conversões de cada grupo e obtenha Z-score, P-value e resultado instantaneamente.';
        $view            = BASE_PATH . '/views/ab-test-calculator.php';
    })(),
    'sobre' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Sobre | Toolbox Dev Design';
        $pageDescription = 'Conheça a Toolbox Dev Design, suíte gratuita de ferramentas para desenvolvedores e designers, criada por Carlos Zucolli e mantida pela NuAto Comunicação.';
        $view            = BASE_PATH . '/views/sobre.php';
    })(),
    'privacidade' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Política de Privacidade | Toolbox Dev Design';
        $pageDescription = 'Política de privacidade da Toolbox Dev Design: uso de cookies, Google Analytics, Google AdSense e conformidade com a LGPD.';
        $view            = BASE_PATH . '/views/privacidade.php';
    })(),
    'termos' => (function () use (&$titulo, &$pageDescription, &$view) {
        $titulo          = 'Termos de Uso | Toolbox Dev Design';
        $pageDescription = 'Termos de uso da Toolbox Dev Design: isenção de garantias e limitação de responsabilidade pelo uso das ferramentas.';
        $view            = BASE_PATH . '/views/termos.php';
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
