<nav class="sidebar">
    <div class="sidebar-section">
        <span class="sidebar-label">Ferramentas</span>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL ?>slug-generator" class="nav-link <?= ($path === '' || $path === 'slug-generator') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    Gerador de Slugs
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>contrast-checker" class="nav-link <?= ($path === 'contrast-checker') ? 'active' : '' ?>">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 0 20z"/></svg>
                    Contraste WCAG
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
        <span class="sidebar-label">Marketing</span>
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
        </ul>
    </div>

</nav>

<main class="content">
