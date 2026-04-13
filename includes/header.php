<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo ?? 'Toolbox Dev Design') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription ?? 'Toolbox de ferramentas gratuitas para desenvolvedores e designers web.') ?>">
    <link rel="canonical" href="<?= 'https://toolboxdevdesign.com.br' . htmlspecialchars(strtok($_SERVER['REQUEST_URI'] ?? '/', '?')) ?>">
    <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHJlY3Qgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiByeD0iNyIgZmlsbD0iIzBmMTcyYSIvPjxyZWN0IHg9IjQiIHk9IjEwIiB3aWR0aD0iNyIgaGVpZ2h0PSIxMiIgcng9IjIiIGZpbGw9IiMwMGE2ZmYiLz48cmVjdCB4PSIxMi41IiB5PSIxMCIgd2lkdGg9IjciIGhlaWdodD0iMTIiIHJ4PSIyIiBmaWxsPSIjMDBkNDg0Ii8+PHJlY3QgeD0iMjEiIHk9IjEwIiB3aWR0aD0iNyIgaGVpZ2h0PSIxMiIgcng9IjIiIGZpbGw9IiNmZjZhMDAiLz48L3N2Zz4=">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4547393612131472" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9MYNQKBS0J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-9MYNQKBS0J');
    </script>
</head>
<body<?= isset($bodyClass) && $bodyClass !== '' ? ' class="' . htmlspecialchars($bodyClass) . '"' : '' ?>>


<header class="topbar">
    <a href="<?= BASE_URL ?>" class="topbar-logo">
        <span class="logo-icons">
            <span class="logo-icon logo-icon--toolbox">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18" fill="none">
                    <path d="M7 8V6a3 3 0 0 1 6 0v2" stroke="#00a6ff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="2" y="8" width="16" height="10" rx="2" fill="#00a6ff" fill-opacity="0.18" stroke="#00a6ff" stroke-width="1.8"/>
                    <line x1="2" y1="13" x2="18" y2="13" stroke="#00a6ff" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="logo-icon logo-icon--dev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18" fill="none">
                    <path d="M6.5 6.5L2.5 10l4 3.5" stroke="#00d484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.5 6.5L17.5 10l-4 3.5" stroke="#00d484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.5 4.5l-3 11" stroke="#00d484" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="logo-icon logo-icon--design">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="18" height="18" fill="none">
                    <path d="M13.5 2.5l4 4L7 17H3v-4L13.5 2.5z" fill="#ff6a00" fill-opacity="0.18" stroke="#ff6a00" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M10.5 5.5l4 4" stroke="#ff6a00" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </span>
        </span>
        <span class="logo-text">Toolbox Dev Design</span>
    </a>
</header>

<div class="layout">
