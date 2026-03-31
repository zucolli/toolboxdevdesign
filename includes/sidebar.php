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
        </ul>
    </div>

    <div class="sidebar-promo">
        <span class="sidebar-label">Serviços</span>
        <ul class="promo-list">
            <li class="promo-item">Desenvolvimento Web</li>
            <li class="promo-item">Marketing Digital &amp; SEO</li>
            <li class="promo-item">Branding &amp; Design</li>
        </ul>
    </div>
</nav>

<main class="content">
