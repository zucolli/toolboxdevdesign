<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo ?? 'Toolbox Dev Design') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription ?? 'Toolbox de ferramentas gratuitas para desenvolvedores e designers web.') ?>">
    <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHJlY3Qgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiByeD0iNiIgZmlsbD0iIzAwNzBmMyIvPjx0ZXh0IHg9IjE2IiB5PSIyMiIgZm9udC1zaXplPSIxNiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZmlsbD0iI2ZmZiIgZm9udC1mYW1pbHk9Im1vbm9zcGFjZSIgZm9udC13ZWlnaHQ9ImJvbGQiPiZ7fTwvdGV4dD48L3N2Zz4=">
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
    <a href="<?= BASE_URL ?>" class="topbar-logo">Toolbox Dev Design</a>
</header>

<div class="layout">
