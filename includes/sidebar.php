<nav class="sidebar">
    <div class="sidebar-section">
        <button class="sidebar-label" data-key="ferramentas">
            Ferramentas
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>slug-generator" class="nav-link <?= ($path === 'slug-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    Gerador de Slugs
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>hash-generator" class="nav-link <?= ($path === 'hash-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    Gerador de Hashes
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>argon2-generator" class="nav-link <?= ($path === 'argon2-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Argon2id
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>sha512-crc32-generator" class="nav-link <?= ($path === 'sha512-crc32-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    SHA-512 / CRC32
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>svg-optimizer" class="nav-link <?= ($path === 'svg-optimizer') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    SVG Optimizer
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>contrast-checker" class="nav-link <?= ($path === 'contrast-checker') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 0 20z"/></svg>
                    Contraste WCAG
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>url-encoder-decoder" class="nav-link <?= ($path === 'url-encoder-decoder') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    URL Encoder/Decoder
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>url-parser" class="nav-link <?= ($path === 'url-parser') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    URL Parser
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>color-palette-generator" class="nav-link <?= ($path === 'color-palette-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="19" cy="13" r="2.5"/><circle cx="6" cy="13" r="2.5"/><circle cx="10" cy="19.5" r="2.5"/><circle cx="17" cy="19.5" r="2.5"/></svg>
                    Color Palette
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>json-formatter" class="nav-link <?= ($path === 'json-formatter') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                    JSON Formatter
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>base64-encoder" class="nav-link <?= ($path === 'base64-encoder') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="10" rx="2"/><path d="M6 11h.01M10 11h.01M14 11h4"/></svg>
                    Base64
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>px-rem-converter" class="nav-link <?= ($path === 'px-rem-converter') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M9 4v16"/><path d="M4 9h5"/><path d="M4 14h5"/></svg>
                    PX → REM
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="texto">
            Texto
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>word-counter" class="nav-link <?= ($path === 'word-counter') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    Contador de Palavras
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>lorem-ipsum" class="nav-link <?= ($path === 'lorem-ipsum') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" y1="6" x2="3" y2="6"/><line x1="15" y1="12" x2="3" y2="12"/><line x1="17" y1="18" x2="3" y2="18"/></svg>
                    Lorem Ipsum
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>case-converter" class="nav-link <?= ($path === 'case-converter') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                    Case Converter
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>text-cleaner" class="nav-link <?= ($path === 'text-cleaner') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><rect x="5" y="10" width="14" height="10" rx="2"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
                    Limpador de Texto
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="dados">
            Dados
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>csv-json" class="nav-link <?= ($path === 'csv-json') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="16" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    CSV ↔ JSON
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>uuid-generator" class="nav-link <?= ($path === 'uuid-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="10" rx="2"/><path d="M6 11h.01M10 11h.01M14 11h.01M18 11h.01"/></svg>
                    UUID / GUID
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>sql-formatter" class="nav-link <?= ($path === 'sql-formatter') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/><path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"/></svg>
                    SQL Formatter
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="imagens">
            Imagens
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>image-base64" class="nav-link <?= ($path === 'image-base64') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    Imagem → Base64
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>image-placeholder" class="nav-link <?= ($path === 'image-placeholder') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="3" x2="21" y2="21"/></svg>
                    Placeholder
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="design">
            Design
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>css-box-shadow" class="nav-link <?= ($path === 'css-box-shadow') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="13" height="13" rx="2"/><rect x="8" y="8" width="13" height="13" rx="2"/></svg>
                    CSS Box Shadow
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>css-gradient" class="nav-link <?= ($path === 'css-gradient') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="3"/><line x1="2" y1="12" x2="22" y2="12" stroke-dasharray="3 3"/></svg>
                    CSS Gradient
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="seguranca">
            Segurança
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>password-generator" class="nav-link <?= ($path === 'password-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/><circle cx="12" cy="16" r="1" fill="currentColor"/></svg>
                    Gerador de Senhas
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="rede">
            Rede &amp; SEO
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>qr-generator" class="nav-link <?= ($path === 'qr-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="3" height="3"/><rect x="18" y="18" width="3" height="3"/><rect x="14" y="18" width="3" height="3" fill="none" stroke="none"/><path d="M14 14h3v3"/><path d="M17 17h3v3"/></svg>
                    QR Code
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>meta-tags" class="nav-link <?= ($path === 'meta-tags') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                    Meta Tags SEO
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>my-ip" class="nav-link <?= ($path === 'my-ip') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    Meu IP
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-section">
        <button class="sidebar-label" data-key="marketing">
            Marketing
            <svg class="sidebar-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>roi-calculator" class="nav-link <?= ($path === 'roi-calculator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    ROI / ROAS
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>whatsapp-link" class="nav-link <?= ($path === 'whatsapp-link') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    WhatsApp Link
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>bulk-utm-generator" class="nav-link <?= ($path === 'bulk-utm-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/><line x1="5" y1="19" x2="5" y2="19.01"/><line x1="5" y1="5" x2="5" y2="5.01"/><line x1="19" y1="12" x2="19" y2="12.01"/></svg>
                    UTM em Massa
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>utm-builder" class="nav-link <?= ($path === 'utm-builder') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/><line x1="5" y1="12" x2="5" y2="12.01"/><line x1="12" y1="5" x2="12" y2="5.01"/></svg>
                    Gerador de UTMs
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>copy-generator" class="nav-link <?= ($path === 'copy-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    Copy Generator
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>ab-test-calculator" class="nav-link <?= ($path === 'ab-test-calculator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    Calculadora A/B
                </a>
            </li>
        </ul>
    </div>

</nav>

<main class="content">
