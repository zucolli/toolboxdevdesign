<div class="home-wrap">

    <div class="home-hero">
        <h1 class="home-hero-title">33 Ferramentas Gratuitas para Dev &amp; Design</h1>
        <p class="home-hero-desc">Slug generators, hashes, paletas de cores, UTMs e muito mais — tudo no navegador, sem cadastro, 100% gratuito.</p>
    </div>

    <div class="home-editorial">
        <p>A Toolbox Dev Design não é apenas uma coleção de scripts. É o ecossistema de produtividade desenvolvido pela <strong>NuAto Comunicação</strong> para atender as demandas críticas do varejo brasileiro. Nossas ferramentas foram forjadas no dia a dia de quem gerencia a comunicação de <strong>líderes do setor de Home Center, gigantes do Atacarejo e grandes Cooperativas de Consumo</strong> — operações de faturamento bilionário que exigem erro zero em milhares de SKUs semanais e rastreabilidade total em campanhas de alto volume. Todas as ferramentas rodam 100% no seu navegador (<em>client-side</em>), garantindo que seus dados estratégicos nunca saiam da sua máquina. Segurança, velocidade e a expertise de quem vive o varejo na prática.</p>
    </div>

    <div class="home-search-wrap">
        <div class="home-search-inner">
            <svg class="home-search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="search" id="tool-search" placeholder="Buscar ferramenta… (ex: URL, hash, cor, UTM)" autocomplete="off">
        </div>
        <p class="home-no-results" id="home-no-results" hidden>Nenhuma ferramenta encontrada para essa busca.</p>
    </div>

    <!-- ===== Para Desenvolvedores ===== -->
    <section class="home-category" data-category="dev">
        <h2 class="home-category-title">💻 Para Desenvolvedores</h2>
        <div class="tool-grid">

            <a href="<?= BASE_URL ?>slug-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Gerador de Slugs</div>
                    <div class="tool-card-desc">Converta textos em slugs limpos e otimizados para URLs e SEO</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>hash-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Gerador de Hashes</div>
                    <div class="tool-card-desc">Gere hashes Bcrypt e MD5 de forma segura no navegador</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>argon2-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Argon2id</div>
                    <div class="tool-card-desc">Hashes Argon2id, o padrão ouro para segurança de senhas</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>sha512-crc32-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">SHA-512 / CRC32</div>
                    <div class="tool-card-desc">Calcule checksums SHA-512 e CRC32 localmente no browser</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>svg-optimizer" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">SVG Optimizer</div>
                    <div class="tool-card-desc">Reduza SVGs removendo metadados e otimizando paths</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>url-encoder-decoder" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">URL Encoder / Decoder</div>
                    <div class="tool-card-desc">Encode e decode URLs com caracteres especiais em tempo real</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>url-parser" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">URL Parser</div>
                    <div class="tool-card-desc">Desmembre qualquer URL: protocolo, host, path, query e hash</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>json-formatter" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">JSON Formatter</div>
                    <div class="tool-card-desc">Formate, valide e minifique JSON com destaque de erros</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>base64-encoder" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="10" rx="2"/><path d="M6 11h.01M10 11h.01M14 11h4"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Base64 Encoder / Decoder</div>
                    <div class="tool-card-desc">Encode e decode Base64 com suporte completo a UTF-8</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>px-rem-converter" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M9 4v16"/><path d="M4 9h5"/><path d="M4 14h5"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">PX → REM</div>
                    <div class="tool-card-desc">Converta PX para REM e vice-versa com base configurável</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>csv-json" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="16" y2="17"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">CSV ↔ JSON</div>
                    <div class="tool-card-desc">Converta CSV para JSON e JSON para CSV instantaneamente</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>uuid-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="10" rx="2"/><path d="M6 11h.01M10 11h.01M14 11h.01M18 11h.01"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Gerador de UUID</div>
                    <div class="tool-card-desc">Gere até 100 UUIDs v4 criptograficamente seguros de uma vez</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>sql-formatter" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/><path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Formatador de SQL</div>
                    <div class="tool-card-desc">Formate queries SQL com indentação e keywords em maiúsculas</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>password-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/><circle cx="12" cy="16" r="1" fill="currentColor"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Gerador de Senhas</div>
                    <div class="tool-card-desc">Crie senhas fortes com Web Crypto API, 100% client-side</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>my-ip" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Meu IP</div>
                    <div class="tool-card-desc">Descubra seu endereço IP público instantaneamente</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>case-converter" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Case Converter</div>
                    <div class="tool-card-desc">Converta texto para camelCase, snake_case, kebab-case e mais</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>text-cleaner" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><rect x="5" y="10" width="14" height="10" rx="2"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Limpador de Texto</div>
                    <div class="tool-card-desc">Remova espaços extras, linhas vazias e duplicatas de texto</div>
                </div>
            </a>

        </div>
    </section>

    <!-- ===== Para Designers ===== -->
    <section class="home-category" data-category="design">
        <h2 class="home-category-title">🎨 Para Designers</h2>
        <div class="tool-grid">

            <a href="<?= BASE_URL ?>contrast-checker" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 0 20z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Contraste WCAG</div>
                    <div class="tool-card-desc">Verifique acessibilidade de cores com critérios WCAG 2.1 AA/AAA</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>color-palette-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="19" cy="13" r="2.5"/><circle cx="6" cy="13" r="2.5"/><circle cx="10" cy="19.5" r="2.5"/><circle cx="17" cy="19.5" r="2.5"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Color Palette</div>
                    <div class="tool-card-desc">Gere paletas analógica, complementar e triádica a partir de uma cor</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>css-box-shadow" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="13" height="13" rx="2"/><rect x="8" y="8" width="13" height="13" rx="2"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">CSS Box Shadow</div>
                    <div class="tool-card-desc">Crie sombras CSS visualmente com sliders e copie o código</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>css-gradient" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="3"/><line x1="2" y1="12" x2="22" y2="12" stroke-dasharray="3 3"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">CSS Gradient</div>
                    <div class="tool-card-desc">Gradientes lineares e radiais com preview em tempo real</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>image-base64" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Imagem → Base64</div>
                    <div class="tool-card-desc">Converta PNG, JPG e WebP para Data URL Base64 no navegador</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>image-placeholder" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="3" x2="21" y2="21"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Placeholder de Imagem</div>
                    <div class="tool-card-desc">Gere placeholders personalizados com dimensões e cores via Canvas API</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>lorem-ipsum" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" y1="6" x2="3" y2="6"/><line x1="15" y1="12" x2="3" y2="12"/><line x1="17" y1="18" x2="3" y2="18"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Lorem Ipsum</div>
                    <div class="tool-card-desc">Gere texto de preenchimento para mockups e layouts em segundos</div>
                </div>
            </a>

        </div>
    </section>

    <!-- ===== Para Marketing e SEO ===== -->
    <section class="home-category" data-category="marketing">
        <h2 class="home-category-title">🚀 Para Marketing e SEO</h2>
        <div class="tool-grid">

            <a href="<?= BASE_URL ?>utm-builder" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/><line x1="5" y1="12" x2="5" y2="12.01"/><line x1="12" y1="5" x2="12" y2="5.01"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Gerador de UTMs</div>
                    <div class="tool-card-desc">Crie URLs rastreáveis com parâmetros UTM para Google Analytics 4</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>bulk-utm-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/><line x1="5" y1="19" x2="5" y2="19.01"/><line x1="5" y1="5" x2="5" y2="5.01"/><line x1="19" y1="12" x2="19" y2="12.01"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">UTM em Massa</div>
                    <div class="tool-card-desc">Adicione parâmetros UTM a dezenas de URLs de uma só vez</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>copy-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Copy Generator</div>
                    <div class="tool-card-desc">Crie textos persuasivos com fórmulas AIDA, PAS e BAB</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>roi-calculator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">ROI / ROAS</div>
                    <div class="tool-card-desc">Calcule ROI, ROAS e Lucro Líquido de campanhas em tempo real</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>whatsapp-link" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">WhatsApp Link</div>
                    <div class="tool-card-desc">Gere links wa.me com mensagem pré-definida e encode automático</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>ab-test-calculator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Calculadora de Teste A/B</div>
                    <div class="tool-card-desc">Calcule significância estatística com Z-test bicaudal, Z-score e P-value</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>qr-generator" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3"/><path d="M17 17h3v3"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">QR Code</div>
                    <div class="tool-card-desc">Gere QR Codes personalizados e baixe como PNG instantaneamente</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>meta-tags" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Meta Tags SEO</div>
                    <div class="tool-card-desc">Gere meta tags HTML, Open Graph e Twitter Cards automaticamente</div>
                </div>
            </a>

            <a href="<?= BASE_URL ?>word-counter" class="tool-card">
                <div class="tool-card-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <div class="tool-card-body">
                    <div class="tool-card-title">Contador de Palavras</div>
                    <div class="tool-card-desc">Conte caracteres, palavras e tempo de leitura em tempo real</div>
                </div>
            </a>

        </div>
    </section>

</div>

<article class="tool-content" style="margin-top: 48px;">
    <h2>Por que a privacidade 100% Client-Side é o futuro do Marketing Digital?</h2>
    <p>Vivemos uma virada de paradigma no marketing digital. Com o fim gradual dos cookies de terceiros, o endurecimento da <strong>LGPD</strong> no Brasil e o aumento da vigilância regulatória global, o modelo antigo — onde cada clique do usuário era capturado, transmitido e armazenado em dezenas de servidores de terceiros — está com os dias contados.</p>

    <p>A Toolbox Dev Design foi construída com uma premissa que vai na contramão do mercado de ferramentas SaaS: <strong>nenhum dado sensível do usuário toca nossos servidores</strong>. Geradores de hash, senhas, UUIDs, Base64, slugs — tudo acontece no seu navegador, usando as APIs nativas do JavaScript. O dado entra, é processado localmente e o resultado sai. Ponto.</p>

    <h3>O que isso significa na prática?</h3>
    <p>Quando você gera um hash Bcrypt de uma senha usando nossa ferramenta, essa senha nunca sai do seu computador. Quando você converte uma imagem para Base64, ela não passa por um servidor de upload. Quando você formata um JSON com dados de clientes ou estrutura de produto, esses dados ficam exclusivamente no seu navegador. Para equipes de marketing de grandes varejistas que trabalham com dados de CRM, listas de clientes e informações de campanha, essa garantia é crítica — tanto do ponto de vista de segurança quanto de conformidade regulatória.</p>

    <h3>LGPD e o risco das ferramentas online comuns</h3>
    <p>A Lei Geral de Proteção de Dados (Lei 13.709/2018) é clara: o tratamento de dados pessoais exige base legal, finalidade específica e, quando enviado a terceiros, transferência justificada e documentada. Ferramentas online que processam dados no servidor coletam implicitamente tudo que você digita nelas — e raramente você sabe para onde esses dados vão. Uma ferramenta de formatação de JSON que recebe seus dados de produto, preço e estrutura de catálogo para "formatar no servidor" está, tecnicamente, realizando tratamento de dados sem que você tenha ciência ou controle.</p>

    <p>Com processamento client-side, esse risco simplesmente não existe. Não há transmissão, não há tratamento por terceiro, não há log de servidor. A conformidade com a LGPD se torna trivial — porque o dado nunca saiu do seu ambiente.</p>

    <h3>Performance e disponibilidade como consequência</h3>
    <p>Há um benefício colateral que raramente é mencionado: ferramentas client-side são fundamentalmente mais rápidas e mais resilientes. Não dependem de latência de rede, disponibilidade de servidor, limite de requisições por plano ou SLA de terceiro. Você pode usar a Toolbox em uma conexão 3G fraca, em um avião sem Wi-Fi ou em um ambiente corporativo com restrições de firewall — as ferramentas rodam com a mesma performance, porque o "servidor" é o seu próprio hardware.</p>

    <p>Para profissionais de marketing digital e desenvolvimento que precisam de agilidade no dia a dia — gerar um UTM durante uma reunião, formatar um JSON no meio de um deploy, checar contraste de cor antes de aprovar um banner — essa confiabilidade faz diferença real. É tecnologia a serviço do trabalho, sem atrito, sem dependências externas e sem riscos de privacidade.</p>
</article>
