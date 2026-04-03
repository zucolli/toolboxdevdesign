'use strict';

// ── Toast Notification ─────────────────────────────────────────────────────

window.showToast = function (message, type) {
    type = type || 'success';
    var el = document.createElement('div');
    el.className = 'toast toast-' + type + ' toast-enter';
    el.textContent = message;
    document.body.appendChild(el);
    requestAnimationFrame(function () {
        el.classList.remove('toast-enter');
        el.classList.add('toast-visible');
    });
    setTimeout(function () {
        el.classList.remove('toast-visible');
        el.classList.add('toast-leave');
        el.addEventListener('transitionend', function () { el.remove(); }, { once: true });
    }, 3000);
};

// ── Contrast Checker (WCAG) ────────────────────────────────────────────────

function hexToRgb(hex) {
    const clean = hex.replace('#', '');
    if (clean.length !== 6) return null;
    return {
        r: parseInt(clean.substring(0, 2), 16),
        g: parseInt(clean.substring(2, 4), 16),
        b: parseInt(clean.substring(4, 6), 16),
    };
}

function relativeLuminance({ r, g, b }) {
    const channel = (c) => {
        const s = c / 255;
        return s <= 0.04045 ? s / 12.92 : Math.pow((s + 0.055) / 1.055, 2.4);
    };
    return 0.2126 * channel(r) + 0.7152 * channel(g) + 0.0722 * channel(b);
}

function contrastRatio(l1, l2) {
    const lighter = Math.max(l1, l2);
    const darker  = Math.min(l1, l2);
    return (lighter + 0.05) / (darker + 0.05);
}

function updateContrast() {
    const preview = document.getElementById('contrast-preview');
    const sample  = document.getElementById('preview-sample');
    const ratioEl = document.getElementById('contrast-ratio');

    if (!preview || !sample || !ratioEl) return;

    const bgHex   = (document.getElementById('color-bg-hex')?.value ?? '').trim();
    const textHex = (document.getElementById('color-text-hex')?.value ?? '').trim();

    const rgbBg   = hexToRgb(bgHex);
    const rgbText = hexToRgb(textHex);

    if (!rgbBg || !rgbText) return;

    preview.style.backgroundColor = bgHex;
    sample.style.color             = textHex;

    const lBg   = relativeLuminance(rgbBg);
    const lText = relativeLuminance(rgbText);
    const ratio = contrastRatio(lBg, lText);

    const rounded = Math.round(ratio * 100) / 100;
    ratioEl.textContent = rounded.toFixed(2) + ':1';

    const setBadge = (id, pass) => {
        const el = document.getElementById(id);
        if (!el) return;
        el.textContent  = pass ? 'Pass' : 'Fail';
        el.className    = 'badge ' + (pass ? 'badge-pass' : 'badge-fail');
    };

    setBadge('badge-aa-normal',  ratio >= 4.5);
    setBadge('badge-aa-large',   ratio >= 3.0);
    setBadge('badge-aaa-normal', ratio >= 7.0);
    setBadge('badge-aaa-large',  ratio >= 4.5);
}

function syncColorPair(pickerId, hexId) {
    const picker = document.getElementById(pickerId);
    const hex    = document.getElementById(hexId);
    if (!picker || !hex) return;

    picker.addEventListener('input',  () => { hex.value = picker.value; updateContrast(); });
    picker.addEventListener('change', () => { hex.value = picker.value; updateContrast(); });

    const syncHex = () => {
        const val = hex.value.trim();
        if (/^#[0-9a-fA-F]{6}$/.test(val)) {
            picker.value = val;
        }
        updateContrast();
    };

    hex.addEventListener('input', syncHex);
    hex.addEventListener('paste', () => setTimeout(syncHex, 0));
}

syncColorPair('color-bg-picker',   'color-bg-hex');
syncColorPair('color-text-picker', 'color-text-hex');
updateContrast();

// ── Slug Generator ─────────────────────────────────────────────────────────

function toSlug(text) {
    return text
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')   // remove diacríticos
        .replace(/[^a-z0-9\s-]/g, '')      // remove caracteres especiais
        .trim()
        .replace(/[\s]+/g, '-')            // espaços → hífens
        .replace(/-+/g, '-')               // colapsa hífens duplicados
        .replace(/^-|-$/g, '');            // remove hífens nas pontas
}

const inputText  = document.getElementById('input-text');
const outputSlug = document.getElementById('output-slug');
const btnCopy    = document.getElementById('btn-copy');

if (inputText && outputSlug) {
    inputText.addEventListener('input', () => {
        outputSlug.value = toSlug(inputText.value);
    });
}

function copyToClipboard(btn, getValue) {
    const value = getValue();
    if (!value) return;

    navigator.clipboard.writeText(value).then(() => {
        showToast('Copiado para a área de transferência!');
        btn.classList.add('btn-success');
        setTimeout(() => {
            btn.classList.remove('btn-success');
        }, 2000);
    }).catch(() => {
        const el = document.getElementById('output-slug') || document.getElementById('hash-output');
        if (el) { el.select(); document.execCommand('copy'); }
    });
}

if (btnCopy && outputSlug) {
    btnCopy.addEventListener('click', () => copyToClipboard(btnCopy, () => outputSlug.value));
}

// ── Hash Generator ─────────────────────────────────────────────────────────

const btnGenerate = document.getElementById('btn-generate-hash');
const hashOutput  = document.getElementById('hash-output');
const btnCopyHash = document.getElementById('btn-copy-hash');

async function sha256Hex(str) {
    const encoded = new TextEncoder().encode(str);
    const buffer  = await crypto.subtle.digest('SHA-256', encoded);
    return Array.from(new Uint8Array(buffer))
        .map((b) => b.toString(16).padStart(2, '0'))
        .join('');
}

async function generateHash() {
    if (!btnGenerate || !hashOutput) return;

    const input     = document.getElementById('hash-input');
    const algorithm = document.querySelector('input[name="hash-algorithm"]:checked');
    const string    = input ? input.value : '';
    const algo      = algorithm ? algorithm.value : 'bcrypt';

    if (!string) {
        hashOutput.placeholder = 'Digite uma string antes de gerar o hash.';
        return;
    }

    hashOutput.value = '';
    hashOutput.placeholder = 'Gerando…';
    hashOutput.classList.add('hash-output-loading');
    btnGenerate.disabled = true;

    try {
        let hash = '';

        if (algo === 'sha256') {
            hash = await sha256Hex(string);
        } else {
            const response = await fetch(
                '/carloszucolli/toolboxdevdesign/api/generate-hash',
                {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ string, algorithm: algo }),
                }
            );
            const data = await response.json();
            if (data.error) throw new Error(data.error);
            hash = data.hash;
        }

        hashOutput.value = hash;
        hashOutput.placeholder = '';
    } catch (err) {
        hashOutput.placeholder = 'Erro ao gerar hash. Tente novamente.';
    } finally {
        hashOutput.classList.remove('hash-output-loading');
        btnGenerate.disabled = false;
    }
}

if (btnGenerate) {
    btnGenerate.addEventListener('click', generateHash);
}

if (btnCopyHash && hashOutput) {
    btnCopyHash.addEventListener('click', () => copyToClipboard(btnCopyHash, () => hashOutput.value));
}

// ── UTM Builder ────────────────────────────────────────────────────────────

const utmFields = ['utm-url', 'utm-source', 'utm-medium', 'utm-campaign', 'utm-term', 'utm-content'];
const utmOutput  = document.getElementById('utm-output');
const btnCopyUtm = document.getElementById('btn-copy-utm');

function buildUtmUrl() {
    if (!utmOutput) return;

    const base     = (document.getElementById('utm-url')?.value ?? '').trim();
    const source   = (document.getElementById('utm-source')?.value ?? '').trim();
    const medium   = (document.getElementById('utm-medium')?.value ?? '').trim();
    const campaign = (document.getElementById('utm-campaign')?.value ?? '').trim();
    const term     = (document.getElementById('utm-term')?.value ?? '').trim();
    const content  = (document.getElementById('utm-content')?.value ?? '').trim();

    if (!base || !source || !medium || !campaign) {
        utmOutput.value = '';
        return;
    }

    const params = [
        ['utm_source',   source],
        ['utm_medium',   medium],
        ['utm_campaign', campaign],
        ['utm_term',     term],
        ['utm_content',  content],
    ]
        .filter(([, v]) => v !== '')
        .map(([k, v]) => `${k}=${encodeURIComponent(v)}`)
        .join('&');

    const separator  = base.includes('?') ? '&' : '?';
    utmOutput.value  = base + separator + params;
}

utmFields.forEach((id) => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', buildUtmUrl);
});

if (btnCopyUtm && utmOutput) {
    btnCopyUtm.addEventListener('click', () => copyToClipboard(btnCopyUtm, () => utmOutput.value));
}

// ── URL Encoder / Decoder ──────────────────────────────────────────────────

const urlOriginal   = document.getElementById('url-original');
const urlEncoded    = document.getElementById('url-encoded');
const urlDecodeErr  = document.getElementById('url-decode-error');

// Flag para evitar loop infinito nos listeners bidirecionais
let urlUpdating = false;

if (urlOriginal && urlEncoded) {
    urlOriginal.addEventListener('input', () => {
        if (urlUpdating) return;
        urlUpdating = true;
        urlEncoded.value = encodeURIComponent(urlOriginal.value);
        if (urlDecodeErr) urlDecodeErr.hidden = true;
        urlUpdating = false;
    });

    urlEncoded.addEventListener('input', () => {
        if (urlUpdating) return;
        urlUpdating = true;
        try {
            urlOriginal.value = decodeURIComponent(urlEncoded.value);
            if (urlDecodeErr) urlDecodeErr.hidden = true;
        } catch {
            if (urlDecodeErr) urlDecodeErr.hidden = false;
        }
        urlUpdating = false;
    });
}

const btnCopyOriginal  = document.getElementById('btn-copy-original');
const btnCopyEncoded   = document.getElementById('btn-copy-encoded');
const btnClearOriginal = document.getElementById('btn-clear-original');
const btnClearEncoded  = document.getElementById('btn-clear-encoded');

if (btnCopyOriginal && urlOriginal) {
    btnCopyOriginal.addEventListener('click', () => copyToClipboard(btnCopyOriginal, () => urlOriginal.value));
}
if (btnCopyEncoded && urlEncoded) {
    btnCopyEncoded.addEventListener('click', () => copyToClipboard(btnCopyEncoded, () => urlEncoded.value));
}
if (btnClearOriginal && urlOriginal) {
    btnClearOriginal.addEventListener('click', () => {
        urlOriginal.value = '';
        if (urlEncoded) urlEncoded.value = '';
        if (urlDecodeErr) urlDecodeErr.hidden = true;
    });
}
if (btnClearEncoded && urlEncoded) {
    btnClearEncoded.addEventListener('click', () => {
        urlEncoded.value = '';
        if (urlOriginal) urlOriginal.value = '';
        if (urlDecodeErr) urlDecodeErr.hidden = true;
    });
}

// ── Color Palette Generator ────────────────────────────────────────────────

function hexToHsl(hex) {
    const clean = hex.replace('#', '');
    if (!/^[0-9a-fA-F]{6}$/.test(clean)) return null;
    let r = parseInt(clean.slice(0, 2), 16) / 255;
    let g = parseInt(clean.slice(2, 4), 16) / 255;
    let b = parseInt(clean.slice(4, 6), 16) / 255;

    const max = Math.max(r, g, b);
    const min = Math.min(r, g, b);
    const d   = max - min;
    let h = 0, s = 0;
    const l = (max + min) / 2;

    if (d !== 0) {
        s = d / (1 - Math.abs(2 * l - 1));
        switch (max) {
            case r: h = ((g - b) / d + (g < b ? 6 : 0)) / 6; break;
            case g: h = ((b - r) / d + 2) / 6; break;
            case b: h = ((r - g) / d + 4) / 6; break;
        }
    }
    return { h: h * 360, s: s * 100, l: l * 100 };
}

function hslToHex(h, s, l) {
    h = ((h % 360) + 360) % 360;
    s = Math.max(0, Math.min(100, s)) / 100;
    l = Math.max(0, Math.min(100, l)) / 100;

    const a = s * Math.min(l, 1 - l);
    const f = (n) => {
        const k = (n + h / 30) % 12;
        const v = l - a * Math.max(-1, Math.min(k - 3, 9 - k, 1));
        return Math.round(255 * v).toString(16).padStart(2, '0');
    };
    return `#${f(0)}${f(8)}${f(4)}`;
}

function swatchTextColor(hex) {
    const rgb = hex.replace('#', '');
    const r = parseInt(rgb.slice(0, 2), 16) / 255;
    const g = parseInt(rgb.slice(2, 4), 16) / 255;
    const b = parseInt(rgb.slice(4, 6), 16) / 255;
    const chan = (c) => c <= 0.04045 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4);
    const lum = 0.2126 * chan(r) + 0.7152 * chan(g) + 0.0722 * chan(b);
    return lum > 0.35 ? '#111111' : '#ffffff';
}

function buildPalette(baseHex, harmony) {
    const hsl = hexToHsl(baseHex);
    if (!hsl) return null;
    const { h, s, l } = hsl;

    switch (harmony) {
        case 'analogous':
            return [
                hslToHex(h - 60, s, l),
                hslToHex(h - 30, s, l),
                baseHex,
                hslToHex(h + 30, s, l),
                hslToHex(h + 60, s, l),
            ];
        case 'complementary': {
            const comp = h + 180;
            return [
                hslToHex(h,    s, Math.max(l - 20, 10)),
                hslToHex(h,    s, l),
                hslToHex(h,    s, Math.min(l + 20, 90)),
                hslToHex(comp, s, l),
                hslToHex(comp, s, Math.max(l - 20, 10)),
            ];
        }
        case 'triadic': {
            const t1 = h + 120;
            const t2 = h + 240;
            return [
                hslToHex(h,  s, Math.min(l + 15, 90)),
                baseHex,
                hslToHex(h,  s, Math.max(l - 15, 10)),
                hslToHex(t1, s, l),
                hslToHex(t2, s, l),
            ];
        }
        case 'monochromatic':
            return [20, 40, 60, 80, 90].map((lightness) => hslToHex(h, s, lightness));
        default:
            return null;
    }
}

function renderPalette() {
    const pickerEl  = document.getElementById('palette-picker');
    const hexEl     = document.getElementById('palette-hex');
    const harmonyEl = document.querySelector('input[name="palette-harmony"]:checked');
    if (!pickerEl || !hexEl || !harmonyEl) return;

    const hex     = hexEl.value.trim();
    const harmony = harmonyEl.value;
    const colors  = buildPalette(hex, harmony);
    if (!colors) return;

    document.querySelectorAll('.color-swatch').forEach((swatch, i) => {
        const color     = colors[i];
        const textColor = swatchTextColor(color);
        swatch.style.backgroundColor = color;
        swatch.dataset.hex = color;

        swatch.innerHTML = `
            <span class="swatch-hex" style="color:${textColor}">${color.toUpperCase()}</span>
            <span class="swatch-copy-hint" style="color:${textColor};opacity:0.6">clique para copiar</span>
        `;
    });
}

const palettePicker = document.getElementById('palette-picker');
const paletteHex    = document.getElementById('palette-hex');

if (palettePicker && paletteHex) {
    palettePicker.addEventListener('input', () => {
        paletteHex.value = palettePicker.value;
        renderPalette();
    });

    paletteHex.addEventListener('input', () => {
        const val = paletteHex.value.trim();
        if (/^#[0-9a-fA-F]{6}$/.test(val)) {
            palettePicker.value = val;
        }
        renderPalette();
    });

    document.querySelectorAll('input[name="palette-harmony"]').forEach((radio) => {
        radio.addEventListener('change', renderPalette);
    });

    document.getElementById('palette-swatches')?.addEventListener('click', (e) => {
        const swatch = e.target.closest('.color-swatch');
        if (!swatch) return;
        const hex = swatch.dataset.hex;
        if (!hex) return;

        navigator.clipboard.writeText(hex).then(() => {
            showToast('Cor copiada: ' + hex);
        });
    });

    renderPalette();
}

// ── SVG Optimizer ──────────────────────────────────────────────────────────

const svgDropzone   = document.getElementById('svg-dropzone');
const svgFileInput  = document.getElementById('svg-file-input');
const svgInput      = document.getElementById('svg-input');
const svgOutput     = document.getElementById('svg-output');
const svgOutputCol  = document.getElementById('svg-output-col');
const svgPreview    = document.getElementById('svg-preview');
const svgError      = document.getElementById('svg-error');
const btnOptimize   = document.getElementById('btn-svg-optimize');
const btnCopySvg    = document.getElementById('btn-copy-svg');
const btnDownloadSvg = document.getElementById('btn-download-svg');

function formatBytes(bytes) {
    if (bytes < 1024) return bytes + ' B';
    return (bytes / 1024).toFixed(2) + ' KB';
}

function svgShowError(msg) {
    if (!svgError) return;
    svgError.textContent = msg;
    svgError.hidden = false;
}

function svgClearError() {
    if (svgError) svgError.hidden = true;
}

function optimizeSvg(raw) {
    let s = raw;

    // ── 1. Remove declaração XML, DOCTYPE e comentários ──────────────────
    s = s.replace(/<\?xml[^?]*\?>/gi, '');
    s = s.replace(/<!DOCTYPE[^>[\]]*(?:\[[\s\S]*?\])?\s*>/gi, '');
    s = s.replace(/<!--[\s\S]*?-->/g, '');

    // ── 2. Remove blocos de metadados e namespaces de editores ───────────
    s = s.replace(/<metadata[\s\S]*?<\/metadata>/gi, '');
    s = s.replace(/<rdf:RDF[\s\S]*?<\/rdf:RDF>/gi, '');
    s = s.replace(/<(sodipodi|inkscape):[^\s>]*[^>]*\/>/gi, '');
    s = s.replace(/<(sodipodi|inkscape):[^\s>]*[\s\S]*?<\/(sodipodi|inkscape):[^>]*>/gi, '');
    s = s.replace(/\s+(?:inkscape|sodipodi|dc|cc|rdf|serif|xlink|xml):[a-zA-Z:_-]+=(?:"[^"]*"|'[^']*')/g, '');
    s = s.replace(/\s+(?:xml:space|data-name)=(?:"[^"]*"|'[^']*')/g, '');
    s = s.replace(/\s+xmlns:(?:sodipodi|inkscape|dc|cc|rdf|serif)=(?:"[^"]*"|'[^']*')/g, '');

    // ── 3. Remove IDs não referenciados ───────────────────────────────────
    const referencedIds = new Set();
    for (const m of s.matchAll(/(?:url\(#|href="#|xlink:href="#|\bclip-path="#)([^)"']+)/g)) {
        referencedIds.add(m[1]);
    }
    s = s.replace(/\s+id="([^"]*)"/g, (match, id) => referencedIds.has(id) ? match : '');

    // ── 4. Arredonda coordenadas numéricas para 2 casas decimais ──────────
    // Afeta path d="", pontos, cx/cy/r, width/height com decimais longos
    s = s.replace(/\b(\d+\.\d{3,})/g, (n) => {
        const rounded = parseFloat(n).toFixed(2);
        // Remove zeros à direita: 1.50 → 1.5 | 1.00 → 1
        return rounded.replace(/(\.\d*?)0+$/, '$1').replace(/\.$/, '');
    });

    // ── 5. Comprime dados de path (remove espaços desnecessários) ─────────
    s = s.replace(/\bd="([^"]*)"/g, (_, d) => {
        const compressed = d
            .replace(/\s*([MmZzLlHhVvCcSsQqTtAa])\s*/g, '$1') // sem espaço ao redor de comandos
            .replace(/\s*,\s*/g, ',')                           // normaliza separadores
            .replace(/\s+/g, ' ')                               // colapsa espaços
            .trim();
        return `d="${compressed}"`;
    });

    // ── 6. Remove grupos vazios e colapsa whitespace entre tags ──────────
    s = s.replace(/<g[^>]*>\s*<\/g>/g, '');
    s = s.replace(/>\s{2,}</g, '><');
    s = s.replace(/\s{2,}/g, ' ');

    return s.trim();
}

function runOptimize() {
    if (!svgInput || !svgOutput || !svgOutputCol) return;

    const raw = svgInput.value.trim();
    if (!raw) { svgShowError('Cole ou carregue um SVG antes de otimizar.'); return; }
    if (!raw.includes('<svg')) { svgShowError('O conteúdo não parece ser um SVG válido.'); return; }
    svgClearError();

    let optimized;
    try {
        optimized = optimizeSvg(raw);
    } catch (e) {
        svgShowError('Erro ao otimizar: ' + e.message);
        return;
    }

    const origSize    = new Blob([raw]).size;
    const optSize     = new Blob([optimized]).size;
    const reduction   = origSize > 0 ? Math.round((1 - optSize / origSize) * 100) : 0;

    svgOutput.value = optimized;

    const statOriginal  = document.getElementById('stat-original');
    const statOptimized = document.getElementById('stat-optimized');
    const statReduction = document.getElementById('stat-reduction');
    if (statOriginal)  statOriginal.textContent  = formatBytes(origSize);
    if (statOptimized) statOptimized.textContent = formatBytes(optSize);
    if (statReduction) statReduction.textContent = reduction + '% menor';

    // Preview via Blob URL (mais seguro que innerHTML direto)
    if (svgPreview) {
        const prev = svgPreview.querySelector('img');
        if (prev) URL.revokeObjectURL(prev.src);
        const blob = new Blob([optimized], { type: 'image/svg+xml' });
        const url  = URL.createObjectURL(blob);
        svgPreview.innerHTML = `<img src="${url}" alt="Preview do SVG otimizado">`;
    }

    svgOutputCol.hidden = false;
}

function loadSvgFile(file) {
    if (!file || !file.name.toLowerCase().endsWith('.svg')) {
        svgShowError('Apenas arquivos .svg são aceitos.');
        return;
    }
    svgClearError();
    const reader = new FileReader();
    reader.onload = (e) => {
        if (svgInput) svgInput.value = e.target.result;
    };
    reader.readAsText(file);
}

// Drag & Drop
if (svgDropzone) {
    svgDropzone.addEventListener('click', () => svgFileInput?.click());
    svgDropzone.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') svgFileInput?.click(); });

    svgDropzone.addEventListener('dragover',  (e) => { e.preventDefault(); svgDropzone.classList.add('dropzone-active'); });
    svgDropzone.addEventListener('dragleave', ()  => svgDropzone.classList.remove('dropzone-active'));
    svgDropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        svgDropzone.classList.remove('dropzone-active');
        loadSvgFile(e.dataTransfer.files[0]);
    });
}

if (svgFileInput) {
    svgFileInput.addEventListener('change', () => loadSvgFile(svgFileInput.files[0]));
}

if (btnOptimize)   btnOptimize.addEventListener('click', runOptimize);

if (btnCopySvg && svgOutput) {
    btnCopySvg.addEventListener('click', () => copyToClipboard(btnCopySvg, () => svgOutput.value));
}

if (btnDownloadSvg && svgOutput) {
    btnDownloadSvg.addEventListener('click', () => {
        const content = svgOutput.value;
        if (!content) return;
        const blob = new Blob([content], { type: 'image/svg+xml' });
        const url  = URL.createObjectURL(blob);
        const a    = document.createElement('a');
        a.href     = url;
        a.download = 'optimized.svg';
        a.click();
        URL.revokeObjectURL(url);
    });
}

// ── SHA-512 / CRC32 Generator ──────────────────────────────────────────────

// Tabela CRC32 (IEEE 802.3) gerada uma única vez
const crc32Table = (() => {
    const table = new Uint32Array(256);
    for (let i = 0; i < 256; i++) {
        let c = i;
        for (let j = 0; j < 8; j++) {
            c = (c & 1) ? (0xEDB88320 ^ (c >>> 1)) : (c >>> 1);
        }
        table[i] = c;
    }
    return table;
})();

function calculateCRC32(str) {
    const bytes = new TextEncoder().encode(str);
    let crc = 0xFFFFFFFF;
    for (let i = 0; i < bytes.length; i++) {
        crc = (crc >>> 8) ^ crc32Table[(crc ^ bytes[i]) & 0xFF];
    }
    return ((crc ^ 0xFFFFFFFF) >>> 0).toString(16).padStart(8, '0');
}

async function calculateSHA512(str) {
    const buffer = new TextEncoder().encode(str);
    const digest = await crypto.subtle.digest('SHA-512', buffer);
    return Array.from(new Uint8Array(digest))
        .map((b) => b.toString(16).padStart(2, '0'))
        .join('');
}

const checksumInput  = document.getElementById('checksum-input');
const sha512Output   = document.getElementById('sha512-output');
const crc32Output    = document.getElementById('crc32-output');
const btnCopySha512  = document.getElementById('btn-copy-sha512');
const btnCopyCrc32   = document.getElementById('btn-copy-crc32');

if (checksumInput) {
    checksumInput.addEventListener('input', async () => {
        const text = checksumInput.value;

        if (!text) {
            if (sha512Output) sha512Output.value = '';
            if (crc32Output)  crc32Output.value  = '';
            return;
        }

        if (crc32Output)  crc32Output.value  = calculateCRC32(text);
        if (sha512Output) sha512Output.value  = await calculateSHA512(text);
    });
}

if (btnCopySha512 && sha512Output) {
    btnCopySha512.addEventListener('click', () => copyToClipboard(btnCopySha512, () => sha512Output.value));
}
if (btnCopyCrc32 && crc32Output) {
    btnCopyCrc32.addEventListener('click', () => copyToClipboard(btnCopyCrc32, () => crc32Output.value));
}

// ── Argon2id Generator / Verifier ──────────────────────────────────────────

const btnArgon2Generate  = document.getElementById('btn-argon2-generate');
const btnArgon2Verify    = document.getElementById('btn-argon2-verify');
const argon2HashOutput   = document.getElementById('argon2-hash-output');
const btnCopyArgon2      = document.getElementById('btn-copy-argon2');
const argon2VerifyResult = document.getElementById('argon2-verify-result');

const BASE = '/carloszucolli/toolboxdevdesign/';

if (btnArgon2Generate) {
    btnArgon2Generate.addEventListener('click', async () => {
        const password = (document.getElementById('argon2-password')?.value ?? '').trim();
        if (!password) return;

        argon2HashOutput.value       = '';
        argon2HashOutput.placeholder = 'Gerando…';
        argon2HashOutput.classList.add('hash-output-loading');
        btnArgon2Generate.disabled   = true;

        try {
            const res  = await fetch(BASE + 'api/generate-argon2', {
                method:  'POST',
                headers: { 'Content-Type': 'application/json' },
                body:    JSON.stringify({ password }),
            });
            const data = await res.json();
            if (data.error) throw new Error(data.error);
            argon2HashOutput.value       = data.hash;
            argon2HashOutput.placeholder = '';
        } catch {
            argon2HashOutput.placeholder = 'Erro ao gerar hash.';
        } finally {
            argon2HashOutput.classList.remove('hash-output-loading');
            btnArgon2Generate.disabled = false;
        }
    });
}

if (btnArgon2Verify) {
    btnArgon2Verify.addEventListener('click', async () => {
        const password = (document.getElementById('verify-password')?.value ?? '').trim();
        const hash     = (document.getElementById('verify-hash')?.value ?? '').trim();
        if (!password || !hash || !argon2VerifyResult) return;

        argon2VerifyResult.classList.remove('is-visible');
        btnArgon2Verify.disabled     = true;
        btnArgon2Verify.textContent  = 'Verificando…';

        try {
            const res  = await fetch(BASE + 'api/verify-argon2', {
                method:  'POST',
                headers: { 'Content-Type': 'application/json' },
                body:    JSON.stringify({ password, hash }),
            });
            const data = await res.json();
            if (data.error) throw new Error(data.error);

            argon2VerifyResult.className  = 'argon2-alert ' + (data.match ? 'alert-success' : 'alert-danger');
            argon2VerifyResult.textContent = data.match
                ? '✓ O hash confere com a senha!'
                : '✗ Senha inválida — o hash não confere.';
            requestAnimationFrame(() => argon2VerifyResult.classList.add('is-visible'));
        } catch {
            argon2VerifyResult.className = 'argon2-alert alert-danger';
            argon2VerifyResult.textContent = 'Erro ao verificar. Certifique-se de que o hash é válido.';
            requestAnimationFrame(() => argon2VerifyResult.classList.add('is-visible'));
        } finally {
            btnArgon2Verify.disabled    = false;
            btnArgon2Verify.textContent = 'Verificar';
        }
    });
}

if (btnCopyArgon2 && argon2HashOutput) {
    btnCopyArgon2.addEventListener('click', () => copyToClipboard(btnCopyArgon2, () => argon2HashOutput.value));
}

// ── URL Parser ─────────────────────────────────────────────────────────────

const parserInput         = document.getElementById('parser-input');
const parserResults       = document.getElementById('parser-results');
const parserHint          = document.getElementById('parser-hint');
const parserParamsSection = document.getElementById('parser-params-section');
const parserParamsList    = document.getElementById('parser-params');

function setField(id, value) {
    const el = document.getElementById(id);
    if (el) el.value = value || '';
}

function parseUrl() {
    if (!parserInput) return;
    const raw = parserInput.value.trim();

    if (!raw) {
        parserResults.hidden = true;
        parserHint.hidden    = false;
        parserHint.textContent = 'Aguardando uma URL válida…';
        return;
    }

    try {
        const u = new URL(raw);

        setField('p-protocol', u.protocol);
        setField('p-hostname', u.hostname);
        setField('p-port',     u.port);
        setField('p-pathname', u.pathname);
        setField('p-hash',     u.hash);

        const params = [...u.searchParams];
        if (params.length) {
            parserParamsList.innerHTML = params.map(([key, val]) => `
                <div class="parser-param-row">
                    <span class="param-key">${escHtml(key)}</span>
                    <span class="param-sep">=</span>
                    <span class="param-val">${escHtml(val)}</span>
                </div>
            `).join('');
            parserParamsSection.hidden = false;
        } else {
            parserParamsSection.hidden = true;
        }

        parserResults.hidden = false;
        parserHint.hidden    = true;
    } catch {
        parserResults.hidden = true;
        parserHint.hidden    = false;
        parserHint.textContent = 'URL inválida — certifique-se de incluir o protocolo (https://).';
    }
}

function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

if (parserInput) {
    parserInput.addEventListener('input', parseUrl);
}

// Botões de copiar dinâmicos do parser (delegação no card inteiro)
document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-copy-from]');
    if (!btn) return;
    const source = document.getElementById(btn.dataset.copyFrom);
    if (!source || !source.value) return;
    copyToClipboard(btn, () => source.value);
});

// ── Copy Generator ─────────────────────────────────────────────────────────

(function () {
    const btnGerar   = document.getElementById('btn-gerar-copy');
    const btnCopiar  = document.getElementById('btn-copy-copy');
    const output     = document.getElementById('copy-output');

    if (!btnGerar || !output) return;

    function val(id) {
        return (document.getElementById(id)?.value ?? '').trim();
    }

    function formula() {
        return document.querySelector('input[name="copy-formula"]:checked')?.value ?? 'aida';
    }

    function buildAida(produto, publico, beneficio, problema, oferta) {
        const ofertaLinha = oferta ? `\n\n👉 ${oferta}. Não perca!` : '';
        return `🔥 Atenção, ${publico}!\n\n` +
            `Conheça o ${produto} — feito para quem leva a sério.\n\n` +
            `✅ ${beneficio}.\n\n` +
            `Cansado de sofrer com ${problema}? O ${produto} resolve isso de vez.` +
            ofertaLinha + `\n\nClique no link e garanta o seu agora!`;
    }

    function buildPas(produto, publico, beneficio, problema, oferta) {
        const ofertaLinha = oferta ? ` E ainda: ${oferta}.` : '';
        return `😣 Problema: Cansado de ${problema}?\n\n` +
            `😤 Agitação: Sabemos como é frustrante para ${publico} lidar com isso todo dia. Cada tentativa sem resultado é tempo e energia desperdiçados.\n\n` +
            `💡 Solução: O ${produto} chegou para mudar esse jogo. Com ${beneficio}, você finalmente resolve o problema de uma vez por todas.` +
            ofertaLinha + `\n\n👉 Clique no link da bio e aproveite!`;
    }

    function buildBab(produto, publico, beneficio, problema, oferta) {
        const ofertaLinha = oferta ? `\n\n🎁 ${oferta}. Por tempo limitado!` : '';
        return `⏳ Antes: ${publico} enfrentam ${problema} sem saber por onde começar. A frustração bate toda vez.\n\n` +
            `✨ Depois: Imagine ter ${beneficio} no seu dia a dia — sem dor, sem perda de tempo, com resultados reais.\n\n` +
            `🌉 A ponte: o ${produto} é exatamente isso. A solução que faltava para transformar sua rotina.` +
            ofertaLinha + `\n\n👉 Acesse agora e comece a mudança!`;
    }

    function buildDireta(produto, publico, beneficio, problema, oferta) {
        const ofertaLinha = oferta ? ` | ${oferta}` : '';
        return `${produto} para ${publico}${ofertaLinha}\n\n` +
            `✅ ${beneficio}\n` +
            `❌ Chega de ${problema}\n\n` +
            `👉 Clique no link e compre agora!`;
    }

    btnGerar.addEventListener('click', () => {
        const produto   = val('copy-produto');
        const publico   = val('copy-publico');
        const beneficio = val('copy-beneficio');
        const problema  = val('copy-problema');
        const oferta    = val('copy-oferta');

        if (!produto || !publico || !beneficio || !problema) {
            showToast('Preencha os campos obrigatórios (*).', 'error');
            return;
        }

        const builders = { aida: buildAida, pas: buildPas, bab: buildBab, direta: buildDireta };
        const texto = builders[formula()](produto, publico, beneficio, problema, oferta);
        output.value = texto;
        showToast('Texto gerado com sucesso!');
    });

    if (btnCopiar) {
        btnCopiar.addEventListener('click', () => copyToClipboard(btnCopiar, () => output.value));
    }
})();

/* ============================================================
   Pílulas de Conhecimento
   ============================================================ */
(function () {
    const card    = document.getElementById('knowledge-card');
    const elType  = document.getElementById('knowledge-type');
    const elTitle = document.getElementById('knowledge-title');
    const elBody  = document.getElementById('knowledge-content');
    const btnRand = document.getElementById('btn-random-knowledge');

    if (!card) return;

    let knowledgeData = [];

    function renderItem(item) {
        elType.textContent        = item.type;
        elType.dataset.type       = item.type;
        elTitle.textContent       = item.title;
        elBody.textContent        = item.content;
    }

    function getDayOfYear() {
        const now   = new Date();
        const start = new Date(now.getFullYear(), 0, 0);
        return Math.floor((now - start) / 1000 / 60 / 60 / 24);
    }

    function loadKnowledge() {
        fetch('/carloszucolli/toolboxdevdesign/assets/data/knowledge.json')
            .then(function (res) { return res.json(); })
            .then(function (data) {
                knowledgeData = data;
                const idx = getDayOfYear() % data.length;
                renderItem(data[idx]);
            })
            .catch(function () {
                card.style.display = 'none';
            });
    }

    if (btnRand) {
        btnRand.addEventListener('click', function () {
            if (!knowledgeData.length) return;
            const idx = Math.floor(Math.random() * knowledgeData.length);
            renderItem(knowledgeData[idx]);
        });
    }

    loadKnowledge();
})();

/* ============================================================
   JSON Formatter / Validator
   ============================================================ */
(function () {
    var inputEl  = document.getElementById('json-input');
    var outputEl = document.getElementById('json-output');
    var btnFormat = document.getElementById('btn-json-format');
    var btnMinify = document.getElementById('btn-json-minify');
    var btnCopy   = document.getElementById('btn-json-copy');
    var btnClear  = document.getElementById('btn-json-clear');

    if (!inputEl) return;

    function setOutput(text, isError) {
        outputEl.value = text;
        outputEl.classList.toggle('json-output--error', !!isError);
    }

    function doFormat(indent) {
        var raw = inputEl.value.trim();
        if (!raw) { setOutput(''); return; }
        try {
            var parsed = JSON.parse(raw);
            setOutput(JSON.stringify(parsed, null, indent), false);
        } catch (e) {
            setOutput('Erro de sintaxe: ' + e.message, true);
        }
    }

    btnFormat.addEventListener('click', function () { doFormat(2); });
    btnMinify.addEventListener('click', function () { doFormat(0); });

    btnCopy.addEventListener('click', function () {
        copyToClipboard(btnCopy, function () { return outputEl.value; });
    });

    btnClear.addEventListener('click', function () {
        inputEl.value  = '';
        setOutput('', false);
        inputEl.focus();
    });
})();

/* ============================================================
   ROI / ROAS Calculator
   ============================================================ */
(function () {
    var investEl = document.getElementById('roi-investment');
    var revenueEl = document.getElementById('roi-revenue');
    var costEl   = document.getElementById('roi-cost');
    var valRoas  = document.getElementById('roi-val-roas');
    var valRoi   = document.getElementById('roi-val-roi');
    var valProfit = document.getElementById('roi-val-profit');

    if (!investEl) return;

    var fmtBRL = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });
    var fmtPct = new Intl.NumberFormat('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    function calc() {
        var invest  = parseFloat(investEl.value)  || 0;
        var revenue = parseFloat(revenueEl.value) || 0;
        var cost    = parseFloat(costEl.value)    || 0;

        if (invest <= 0 || revenue <= 0) {
            valRoas.textContent  = '—';
            valRoi.textContent   = '—';
            valProfit.textContent = '—';
            return;
        }

        var roas   = revenue / invest;
        var base   = invest + cost;
        var profit = revenue - invest - cost;
        var roi    = base > 0 ? (profit / base) * 100 : 0;

        valRoas.textContent   = fmtPct.format(roas) + 'x';
        valRoi.textContent    = fmtPct.format(roi) + '%';
        valProfit.textContent = fmtBRL.format(profit);

        document.getElementById('roi-card-roi').classList.toggle('roi-result-card--negative', roi < 0);
        document.getElementById('roi-card-profit').classList.toggle('roi-result-card--negative', profit < 0);
    }

    investEl.addEventListener('input', calc);
    revenueEl.addEventListener('input', calc);
    costEl.addEventListener('input', calc);
})();

/* ============================================================
   WhatsApp Link Generator
   ============================================================ */
(function () {
    var phoneEl  = document.getElementById('wa-phone');
    var msgEl    = document.getElementById('wa-message');
    var outputEl = document.getElementById('wa-output');
    var btnCopy  = document.getElementById('btn-copy-wa');
    var btnTest  = document.getElementById('btn-test-wa');

    if (!phoneEl) return;

    function buildLink() {
        var phone = (phoneEl.value || '').replace(/\D/g, '');
        var msg   = msgEl ? msgEl.value : '';
        if (!phone) return '';
        var url = 'https://wa.me/' + phone;
        if (msg.trim()) url += '?text=' + encodeURIComponent(msg.trim());
        return url;
    }

    function update() {
        var link = buildLink();
        outputEl.value = link;
        btnTest.disabled = !link;
    }

    phoneEl.addEventListener('input', update);
    if (msgEl) msgEl.addEventListener('input', update);

    btnCopy.addEventListener('click', function () {
        copyToClipboard(btnCopy, function () { return outputEl.value; });
    });

    btnTest.addEventListener('click', function () {
        var link = buildLink();
        if (link) window.open(link, '_blank', 'noopener,noreferrer');
    });
})();

/* ============================================================
   Bulk UTM Generator
   ============================================================ */
(function () {
    var sourceEl   = document.getElementById('bulk-utm-source');
    var mediumEl   = document.getElementById('bulk-utm-medium');
    var campaignEl = document.getElementById('bulk-utm-campaign');
    var contentEl  = document.getElementById('bulk-utm-content');
    var termEl     = document.getElementById('bulk-utm-term');
    var inputEl    = document.getElementById('bulk-utm-input');
    var outputEl   = document.getElementById('bulk-utm-output');
    var btnGen     = document.getElementById('btn-bulk-utm-generate');
    var btnCopy    = document.getElementById('btn-bulk-utm-copy');
    var outputGroup = document.getElementById('bulk-utm-output-group');
    var summaryEl  = document.getElementById('bulk-utm-summary');

    if (!btnGen) return;

    btnGen.addEventListener('click', function () {
        var source   = (sourceEl.value || '').trim();
        var medium   = (mediumEl.value || '').trim();
        var campaign = (campaignEl.value || '').trim();
        var content  = (contentEl.value || '').trim();
        var term     = (termEl.value || '').trim();

        if (!source || !medium || !campaign) {
            showToast('Preencha Source, Medium e Campaign antes de gerar.', 'error');
            return;
        }

        var lines = (inputEl.value || '').split('\n');
        var results = [];
        var skipped = 0;

        lines.forEach(function (line) {
            var raw = line.trim();
            if (!raw) return;
            try {
                var url = new URL(raw);
                url.searchParams.set('utm_source', source);
                url.searchParams.set('utm_medium', medium);
                url.searchParams.set('utm_campaign', campaign);
                if (content) url.searchParams.set('utm_content', content);
                if (term)    url.searchParams.set('utm_term', term);
                results.push(url.toString());
            } catch (e) {
                skipped++;
            }
        });

        if (!results.length) {
            showToast('Nenhuma URL válida encontrada.', 'error');
            return;
        }

        outputEl.value = results.join('\n');
        outputGroup.style.display = '';
        var msg = results.length + ' link(s) gerado(s)';
        if (skipped) msg += ' · ' + skipped + ' URL(s) inválida(s) ignorada(s)';
        summaryEl.textContent = msg;
    });

    btnCopy.addEventListener('click', function () {
        copyToClipboard(btnCopy, function () { return outputEl.value; });
    });
})();

/* ============================================================
   Base64 Encoder / Decoder
   ============================================================ */
(function () {
    var plainEl   = document.getElementById('b64-plain');
    var encodedEl = document.getElementById('b64-encoded');
    var errEl     = document.getElementById('b64-decode-error');

    if (!plainEl) return;

    var updating = false;

    plainEl.addEventListener('input', function () {
        if (updating) return;
        updating = true;
        try {
            encodedEl.value = btoa(unescape(encodeURIComponent(plainEl.value)));
            if (errEl) errEl.hidden = true;
        } catch (e) {
            encodedEl.value = '';
        }
        updating = false;
    });

    encodedEl.addEventListener('input', function () {
        if (updating) return;
        updating = true;
        try {
            plainEl.value = decodeURIComponent(escape(atob(encodedEl.value)));
            if (errEl) errEl.hidden = true;
        } catch (e) {
            plainEl.value = '';
            if (errEl) errEl.hidden = false;
        }
        updating = false;
    });

    document.getElementById('btn-copy-b64-plain').addEventListener('click', function () {
        copyToClipboard(this, function () { return plainEl.value; });
    });

    document.getElementById('btn-copy-b64-encoded').addEventListener('click', function () {
        copyToClipboard(this, function () { return encodedEl.value; });
    });

    document.getElementById('btn-clear-b64-plain').addEventListener('click', function () {
        plainEl.value = '';
        encodedEl.value = '';
        if (errEl) errEl.hidden = true;
        plainEl.focus();
    });

    document.getElementById('btn-clear-b64-encoded').addEventListener('click', function () {
        encodedEl.value = '';
        plainEl.value = '';
        if (errEl) errEl.hidden = true;
        encodedEl.focus();
    });
})();

/* ============================================================
   PX ↔ REM Converter
   ============================================================ */
(function () {
    var baseEl      = document.getElementById('px-rem-base');
    var pxInputEl   = document.getElementById('px-rem-px-input');
    var pxResultEl  = document.getElementById('px-rem-px-result');
    var remInputEl  = document.getElementById('px-rem-rem-input');
    var remResultEl = document.getElementById('px-rem-rem-result');

    if (!baseEl) return;

    function getBase() {
        var b = parseFloat(baseEl.value);
        return (b && b > 0) ? b : 16;
    }

    function round(n, decimals) {
        var factor = Math.pow(10, decimals);
        return Math.round(n * factor) / factor;
    }

    pxInputEl.addEventListener('input', function () {
        var px = parseFloat(pxInputEl.value);
        pxResultEl.value = isNaN(px) ? '' : round(px / getBase(), 4);
    });

    remInputEl.addEventListener('input', function () {
        var rem = parseFloat(remInputEl.value);
        remResultEl.value = isNaN(rem) ? '' : round(rem * getBase(), 4);
    });

    baseEl.addEventListener('input', function () {
        if (pxInputEl.value !== '') {
            var px = parseFloat(pxInputEl.value);
            pxResultEl.value = isNaN(px) ? '' : round(px / getBase(), 4);
        }
        if (remInputEl.value !== '') {
            var rem = parseFloat(remInputEl.value);
            remResultEl.value = isNaN(rem) ? '' : round(rem * getBase(), 4);
        }
    });
})();

// ── CSS Box Shadow Generator ──────────────────────────────────────────────────
(function () {
    var offsetX  = document.getElementById('bs-offset-x');
    if (!offsetX) return;

    var offsetY  = document.getElementById('bs-offset-y');
    var blur     = document.getElementById('bs-blur');
    var spread   = document.getElementById('bs-spread');
    var color    = document.getElementById('bs-color');
    var opacity  = document.getElementById('bs-opacity');
    var bgColor  = document.getElementById('bs-bg-color');
    var inset    = document.getElementById('bs-inset');
    var previewBox = document.getElementById('bs-preview-box');
    var previewBg  = document.getElementById('bs-preview-bg');
    var result   = document.getElementById('bs-result');
    var copyBtn  = document.getElementById('bs-copy-btn');

    var valX  = document.getElementById('bs-offset-x-val');
    var valY  = document.getElementById('bs-offset-y-val');
    var valB  = document.getElementById('bs-blur-val');
    var valS  = document.getElementById('bs-spread-val');
    var valO  = document.getElementById('bs-opacity-val');

    function hexToRgb(hex) {
        var r = parseInt(hex.slice(1,3), 16);
        var g = parseInt(hex.slice(3,5), 16);
        var b = parseInt(hex.slice(5,7), 16);
        return { r: r, g: g, b: b };
    }

    function update() {
        valX.textContent = offsetX.value;
        valY.textContent = offsetY.value;
        valB.textContent = blur.value;
        valS.textContent = spread.value;
        valO.textContent = opacity.value;

        var rgb = hexToRgb(color.value);
        var alpha = (parseInt(opacity.value) / 100).toFixed(2);
        var insetStr = inset.checked ? 'inset ' : '';
        var shadowVal = insetStr +
            offsetX.value + 'px ' +
            offsetY.value + 'px ' +
            blur.value + 'px ' +
            spread.value + 'px ' +
            'rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ',' + alpha + ')';

        var css = '-webkit-box-shadow: ' + shadowVal + ';\n' +
                  'box-shadow: ' + shadowVal + ';';

        previewBox.style.boxShadow = shadowVal;
        previewBg.style.backgroundColor = bgColor.value;
        result.value = css;
    }

    [offsetX, offsetY, blur, spread, color, opacity, bgColor, inset].forEach(function (el) {
        el.addEventListener('input', update);
        el.addEventListener('change', update);
    });

    copyBtn.addEventListener('click', function () {
        copyToClipboard(copyBtn, function () { return result.value; });
    });

    update();
})();

// ── CSS Gradient Generator ────────────────────────────────────────────────────
(function () {
    var typeEl   = document.getElementById('grad-type');
    if (!typeEl) return;

    var angleEl  = document.getElementById('grad-angle');
    var angleGroup = document.getElementById('grad-angle-group');
    var angleVal = document.getElementById('grad-angle-val');
    var color1   = document.getElementById('grad-color1');
    var color2   = document.getElementById('grad-color2');
    var preview  = document.getElementById('grad-preview');
    var result   = document.getElementById('grad-result');
    var copyBtn  = document.getElementById('grad-copy-btn');

    function update() {
        angleVal.textContent = angleEl.value;
        var isLinear = typeEl.value === 'linear';
        angleGroup.style.display = isLinear ? '' : 'none';

        var css;
        if (isLinear) {
            var gradVal = 'linear-gradient(' + angleEl.value + 'deg, ' + color1.value + ', ' + color2.value + ')';
            css = 'background: -webkit-' + gradVal + ';\n' +
                  'background: ' + gradVal + ';';
            preview.style.background = gradVal;
        } else {
            var gradVal = 'radial-gradient(circle, ' + color1.value + ', ' + color2.value + ')';
            css = 'background: -webkit-' + gradVal + ';\n' +
                  'background: ' + gradVal + ';';
            preview.style.background = gradVal;
        }
        result.value = css;
    }

    [typeEl, angleEl, color1, color2].forEach(function (el) {
        el.addEventListener('input', update);
        el.addEventListener('change', update);
    });

    copyBtn.addEventListener('click', function () {
        copyToClipboard(copyBtn, function () { return result.value; });
    });

    update();
})();

// ── Password Generator ────────────────────────────────────────────────────────
(function () {
    var lengthEl    = document.getElementById('pw-length');
    if (!lengthEl) return;

    var lengthVal   = document.getElementById('pw-length-val');
    var uppercase   = document.getElementById('pw-uppercase');
    var lowercase   = document.getElementById('pw-lowercase');
    var numbers     = document.getElementById('pw-numbers');
    var symbols     = document.getElementById('pw-symbols');
    var resultEl    = document.getElementById('pw-result');
    var copyBtn     = document.getElementById('pw-copy-btn');
    var generateBtn = document.getElementById('pw-generate-btn');
    var strengthFill  = document.getElementById('pw-strength-fill');
    var strengthLabel = document.getElementById('pw-strength-label');

    var CHARS_UPPER   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var CHARS_LOWER   = 'abcdefghijklmnopqrstuvwxyz';
    var CHARS_NUMBERS = '0123456789';
    var CHARS_SYMBOLS = '!@#$%^&*()-_=+[]{}|;:,.<>?';

    function buildPool() {
        var pool = '';
        if (uppercase.checked) pool += CHARS_UPPER;
        if (lowercase.checked) pool += CHARS_LOWER;
        if (numbers.checked)   pool += CHARS_NUMBERS;
        if (symbols.checked)   pool += CHARS_SYMBOLS;
        return pool;
    }

    function generate() {
        var pool = buildPool();
        if (!pool) {
            resultEl.value = '';
            updateStrength('', 0);
            return;
        }
        var len = parseInt(lengthEl.value, 10);
        var bytes = new Uint32Array(len);
        window.crypto.getRandomValues(bytes);
        var pw = '';
        for (var i = 0; i < len; i++) {
            pw += pool[bytes[i] % pool.length];
        }
        resultEl.value = pw;
        updateStrength(pw, countTypes());
    }

    function countTypes() {
        var n = 0;
        if (uppercase.checked) n++;
        if (lowercase.checked) n++;
        if (numbers.checked)   n++;
        if (symbols.checked)   n++;
        return n;
    }

    function updateStrength(pw, types) {
        var len = pw.length;
        var level = '';
        if (len === 0 || types === 0) {
            level = '';
        } else if (len < 12 || types < 2) {
            level = 'weak';
        } else if (len < 16 || types < 3) {
            level = 'medium';
        } else {
            level = 'strong';
        }

        strengthFill.className = 'pw-strength-fill' + (level ? ' ' + level : '');
        var labels = { weak: 'Fraca', medium: 'Média', strong: 'Forte', '': '—' };
        strengthLabel.textContent = labels[level];
    }

    lengthEl.addEventListener('input', function () {
        lengthVal.textContent = lengthEl.value;
        generate();
    });

    [uppercase, lowercase, numbers, symbols].forEach(function (el) {
        el.addEventListener('change', generate);
    });

    generateBtn.addEventListener('click', generate);

    copyBtn.addEventListener('click', function () {
        copyToClipboard(copyBtn, function () { return resultEl.value; });
    });

    generate();
})();

// ── Word Counter ─────────────────────────────────────────────────────────────
(function () {
    var input = document.getElementById('wc-input');
    if (!input) return;

    var elChars        = document.getElementById('wc-chars');
    var elCharsNoSpace = document.getElementById('wc-chars-no-space');
    var elWords        = document.getElementById('wc-words');
    var elLines        = document.getElementById('wc-lines');
    var elReadTime     = document.getElementById('wc-read-time');
    var elDensityBody  = document.getElementById('wc-density-body');

    var STOPWORDS = new Set([
        'de','a','o','que','e','do','da','em','um','para','com','uma','os','no','se','na',
        'por','mais','as','dos','como','mas','ao','ele','das','tem','à','seu','sua','ou',
        'ser','quando','muito','há','nos','já','está','eu','também','só','pelo','pela',
        'até','isso','ela','entre','era','depois','sem','mesmo','aos','seus','quem',
        'nas','me','esse','eles','estão','você','tinha','foram','essa','num','nem',
        'suas','meu','às','minha','têm','numa','pelos','pelas','qual','nós','lhe',
        'deles','essas','esses','pelas','este','fosse','dele','tu','te','vocês','vos',
        'lhes','meus','minhas','teu','tua','teus','tuas','nosso','nossa','nossos','nossas',
        'dela','delas','esta','estes','estas','aquele','aquela','aqueles','aquelas',
        'isto','aquilo','estou','está','estamos','estão','estive','esteve','estivemos',
        'the','a','an','and','or','but','in','on','at','to','for','of','with','by','is',
        'are','was','were','be','been','have','has','had','do','does','did','will','would'
    ]);

    function update() {
        var text  = input.value;
        var chars = text.length;
        var charsNoSpace = text.replace(/\s/g, '').length;
        var words = text.trim() === '' ? 0 : text.trim().split(/\s+/).filter(function (w) { return w.length > 0; }).length;
        var lines = text === '' ? 1 : text.split('\n').length;
        var readSec = Math.round((words / 200) * 60);
        var readLabel = readSec < 60
            ? (readSec === 0 ? '< 1 seg' : readSec + ' seg')
            : Math.round(readSec / 60) + ' min';

        elChars.textContent        = chars.toLocaleString('pt-BR');
        elCharsNoSpace.textContent = charsNoSpace.toLocaleString('pt-BR');
        elWords.textContent        = words.toLocaleString('pt-BR');
        elLines.textContent        = lines.toLocaleString('pt-BR');
        elReadTime.textContent     = readLabel;

        updateDensity(text, words);
    }

    function updateDensity(text, totalWords) {
        if (totalWords === 0) {
            elDensityBody.innerHTML = '<tr><td colspan="4" class="wc-density-empty">Digite algum texto para ver as palavras mais frequentes.</td></tr>';
            return;
        }
        var raw = text.toLowerCase().replace(/[^a-záàâãéèêíìîóòôõúùûüçñ\s]/gi, ' ').split(/\s+/);
        var freq = {};
        raw.forEach(function (w) {
            if (w.length < 3 || STOPWORDS.has(w)) return;
            freq[w] = (freq[w] || 0) + 1;
        });
        var sorted = Object.keys(freq).sort(function (a, b) { return freq[b] - freq[a]; }).slice(0, 5);
        if (sorted.length === 0) {
            elDensityBody.innerHTML = '<tr><td colspan="4" class="wc-density-empty">Nenhuma palavra relevante encontrada.</td></tr>';
            return;
        }
        var rows = sorted.map(function (w, i) {
            var pct = ((freq[w] / totalWords) * 100).toFixed(1) + '%';
            return '<tr><td>' + (i + 1) + '</td><td>' + w + '</td><td>' + freq[w] + '</td><td>' + pct + '</td></tr>';
        });
        elDensityBody.innerHTML = rows.join('');
    }

    input.addEventListener('input', update);
    update();
})();

// ── Lorem Ipsum Generator ─────────────────────────────────────────────────────
(function () {
    var btnGen   = document.getElementById('lorem-btn');
    if (!btnGen) return;

    var qtyEl    = document.getElementById('lorem-qty');
    var typeEl   = document.getElementById('lorem-type');
    var htmlEl   = document.getElementById('lorem-html-tags');
    var output   = document.getElementById('lorem-output');
    var wrap     = document.getElementById('lorem-result-wrap');
    var copyBtn  = document.getElementById('lorem-copy-btn');

    var WORDS = [
        'lorem','ipsum','dolor','sit','amet','consectetur','adipiscing','elit','sed','do',
        'eiusmod','tempor','incididunt','ut','labore','et','dolore','magna','aliqua',
        'enim','ad','minim','veniam','quis','nostrud','exercitation','ullamco','laboris',
        'nisi','aliquip','ex','ea','commodo','consequat','duis','aute','irure','in',
        'reprehenderit','voluptate','velit','esse','cillum','fugiat','nulla','pariatur',
        'excepteur','sint','occaecat','cupidatat','non','proident','sunt','culpa','qui',
        'officia','deserunt','mollit','anim','id','est','laborum','perspiciatis','unde',
        'omnis','iste','natus','error','accusantium','doloremque','laudantium','totam',
        'rem','aperiam','eaque','ipsa','quae','ab','illo','inventore','veritatis'
    ];

    function shuffle(arr) {
        var a = arr.slice();
        for (var i = a.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var tmp = a[i]; a[i] = a[j]; a[j] = tmp;
        }
        return a;
    }

    function sentence() {
        var len = 8 + Math.floor(Math.random() * 10);
        var w = shuffle(WORDS).slice(0, len);
        w[0] = w[0].charAt(0).toUpperCase() + w[0].slice(1);
        return w.join(' ') + '.';
    }

    function paragraph() {
        var count = 3 + Math.floor(Math.random() * 4);
        var sents = [];
        for (var i = 0; i < count; i++) sents.push(sentence());
        return sents.join(' ');
    }

    function generate() {
        var qty     = Math.max(1, Math.min(100, parseInt(qtyEl.value, 10) || 1));
        var type    = typeEl.value;
        var useHtml = htmlEl.checked;
        var parts   = [];

        if (type === 'paragraphs') {
            for (var i = 0; i < qty; i++) {
                var p = paragraph();
                parts.push(useHtml ? '<p>' + p + '</p>' : p);
            }
            output.value = parts.join(useHtml ? '\n\n' : '\n\n');
        } else if (type === 'sentences') {
            for (var i = 0; i < qty; i++) parts.push(sentence());
            output.value = parts.join(useHtml ? ' ' : ' ');
        } else if (type === 'words') {
            var w = [];
            while (w.length < qty) w = w.concat(shuffle(WORDS));
            output.value = w.slice(0, qty).join(' ');
        } else if (type === 'list') {
            for (var i = 0; i < qty; i++) parts.push(sentence());
            if (useHtml) {
                output.value = '<ul>\n' + parts.map(function (s) { return '  <li>' + s + '</li>'; }).join('\n') + '\n</ul>';
            } else {
                output.value = parts.map(function (s, idx) { return (idx + 1) + '. ' + s; }).join('\n');
            }
        }

        wrap.hidden = false;
    }

    btnGen.addEventListener('click', generate);
    copyBtn.addEventListener('click', function () {
        copyToClipboard(copyBtn, function () { return output.value; });
    });
})();

// ── Case Converter ────────────────────────────────────────────────────────────
(function () {
    var inputEl = document.getElementById('cc-input');
    if (!inputEl) return;

    var outputEl   = document.getElementById('cc-output');
    var resultWrap = document.getElementById('cc-result-wrap');
    var modeLabel  = document.getElementById('cc-mode-label');
    var copyBtn    = document.getElementById('cc-copy-btn');
    var buttons    = document.querySelectorAll('.cc-btn');

    var MODE_LABELS = {
        upper: 'UPPERCASE', lower: 'lowercase', capitalize: 'Capitalize Case',
        sentence: 'Sentence case', camel: 'camelCase', pascal: 'PascalCase',
        snake: 'snake_case', kebab: 'kebab-case', constant: 'CONSTANT_CASE', dot: 'dot.case'
    };

    function removeAccents(str) {
        return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-zA-Z0-9\s]/g, '');
    }

    function toWords(text) {
        return removeAccents(text).trim().split(/[\s\-_./]+/).filter(function (w) { return w.length > 0; });
    }

    function convert(text, mode) {
        switch (mode) {
            case 'upper':      return text.toUpperCase();
            case 'lower':      return text.toLowerCase();
            case 'capitalize': return text.replace(/\b\w/g, function (c) { return c.toUpperCase(); });
            case 'sentence':   return text.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g, function (c) { return c.toUpperCase(); });
            case 'camel': {
                var ws = toWords(text);
                return ws.map(function (w, i) {
                    return i === 0 ? w.toLowerCase() : w.charAt(0).toUpperCase() + w.slice(1).toLowerCase();
                }).join('');
            }
            case 'pascal': {
                return toWords(text).map(function (w) {
                    return w.charAt(0).toUpperCase() + w.slice(1).toLowerCase();
                }).join('');
            }
            case 'snake':    return toWords(text).join('_').toLowerCase();
            case 'kebab':    return toWords(text).join('-').toLowerCase();
            case 'constant': return toWords(text).join('_').toUpperCase();
            case 'dot':      return toWords(text).join('.').toLowerCase();
            default:         return text;
        }
    }

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var mode   = btn.dataset.mode;
            var result = convert(inputEl.value, mode);

            outputEl.value      = result;
            modeLabel.textContent = MODE_LABELS[mode] || mode;
            resultWrap.hidden   = false;

            buttons.forEach(function (b) { b.classList.remove('is-active'); });
            btn.classList.add('is-active');
        });
    });

    copyBtn.addEventListener('click', function () {
        copyToClipboard(copyBtn, function () { return outputEl.value; });
    });
})();

// ── QR Code Generator ────────────────────────────────────────────────────────
(function () {
    var inputEl   = document.getElementById('qr-input');
    var fgEl      = document.getElementById('qr-fg');
    var bgEl      = document.getElementById('qr-bg');
    var sizeEl    = document.getElementById('qr-size');
    var canvas    = document.getElementById('qr-canvas');
    var placeholder = document.getElementById('qr-placeholder');
    var actions   = document.getElementById('qr-actions');
    var downloadBtn = document.getElementById('qr-download');
    if (!inputEl || !canvas) return;

    var qr = null;

    function renderQR() {
        var text = inputEl.value.trim();
        if (!text) {
            canvas.style.display = 'none';
            if (placeholder) placeholder.style.display = '';
            if (actions) actions.style.display = 'none';
            return;
        }
        var size = Math.max(64, Math.min(1024, parseInt(sizeEl.value, 10) || 256));
        if (!qr) {
            qr = new QRious({
                element: canvas,
                value: text,
                size: size,
                foreground: fgEl.value,
                background: bgEl.value,
            });
        } else {
            qr.value      = text;
            qr.size       = size;
            qr.foreground = fgEl.value;
            qr.background = bgEl.value;
        }
        canvas.style.display = 'block';
        if (placeholder) placeholder.style.display = 'none';
        if (actions) actions.style.display = 'block';
    }

    [inputEl, fgEl, bgEl, sizeEl].forEach(function (el) {
        el.addEventListener('input', renderQR);
    });

    if (downloadBtn) {
        downloadBtn.addEventListener('click', function () {
            if (!canvas) return;
            var link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'qrcode.png';
            link.click();
        });
    }
})();

// ── Meta Tags Generator ───────────────────────────────────────────────────────
(function () {
    var titleEl   = document.getElementById('mt-title');
    var descEl    = document.getElementById('mt-description');
    var urlEl     = document.getElementById('mt-url');
    var imageEl   = document.getElementById('mt-image');
    var authorEl  = document.getElementById('mt-author');
    var outputEl  = document.getElementById('mt-output');
    var copyBtn   = document.getElementById('mt-copy');
    var titleCount = document.getElementById('mt-title-count');
    var descCount  = document.getElementById('mt-desc-count');
    if (!titleEl || !outputEl) return;

    function esc(str) {
        return str.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    function build() {
        var title  = titleEl.value.trim();
        var desc   = descEl.value.trim();
        var url    = urlEl.value.trim();
        var image  = imageEl.value.trim();
        var author = authorEl.value.trim();

        if (titleCount) titleCount.textContent = titleEl.value.length + '/70 caracteres';
        if (descCount)  descCount.textContent  = descEl.value.length  + '/160 caracteres';

        if (!title && !desc) { outputEl.value = ''; return; }

        var lines = ['<!-- Meta Tags padrão -->'];
        if (title)  lines.push('<title>' + esc(title) + '</title>');
        if (desc)   lines.push('<meta name="description" content="' + esc(desc) + '" />');
        if (author) lines.push('<meta name="author" content="' + esc(author) + '" />');
        if (url)    lines.push('<link rel="canonical" href="' + esc(url) + '" />');

        lines.push('');
        lines.push('<!-- Open Graph (Facebook, LinkedIn) -->');
        lines.push('<meta property="og:type" content="website" />');
        if (title)  lines.push('<meta property="og:title" content="' + esc(title) + '" />');
        if (desc)   lines.push('<meta property="og:description" content="' + esc(desc) + '" />');
        if (url)    lines.push('<meta property="og:url" content="' + esc(url) + '" />');
        if (image)  lines.push('<meta property="og:image" content="' + esc(image) + '" />');

        lines.push('');
        lines.push('<!-- Twitter Cards -->');
        lines.push('<meta name="twitter:card" content="summary_large_image" />');
        if (title)  lines.push('<meta name="twitter:title" content="' + esc(title) + '" />');
        if (desc)   lines.push('<meta name="twitter:description" content="' + esc(desc) + '" />');
        if (image)  lines.push('<meta name="twitter:image" content="' + esc(image) + '" />');

        outputEl.value = lines.join('\n');
    }

    [titleEl, descEl, urlEl, imageEl, authorEl].forEach(function (el) {
        el.addEventListener('input', build);
    });

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return outputEl.value; });
        });
    }
})();

// ── My IP ─────────────────────────────────────────────────────────────────────
(function () {
    var ipEl      = document.getElementById('ip-value');
    var copyBtn   = document.getElementById('ip-copy');
    var refreshBtn = document.getElementById('ip-refresh');
    if (!ipEl) return;

    function fetchIP() {
        ipEl.textContent = 'Carregando…';
        fetch(BASE + 'api/get-ip', { cache: 'no-store' })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                ipEl.textContent = data.ip || 'Indisponível';
            })
            .catch(function () {
                ipEl.textContent = 'Erro ao obter IP';
            });
    }

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return ipEl.textContent; });
        });
    }
    if (refreshBtn) {
        refreshBtn.addEventListener('click', fetchIP);
    }

    fetchIP();
})();

// ── Sidebar collapsible sections ─────────────────────────────────────────────
(function () {
    document.querySelectorAll('.sidebar-label[data-key]').forEach(function (btn) {
        var key  = 'sidebar-' + btn.dataset.key;
        var list = btn.nextElementSibling;
        if (!list) return;

        if (localStorage.getItem(key) === '0') {
            btn.classList.add('is-collapsed');
            list.classList.add('is-collapsed');
        }

        btn.addEventListener('click', function () {
            var collapsed = btn.classList.toggle('is-collapsed');
            list.classList.toggle('is-collapsed', collapsed);
            localStorage.setItem(key, collapsed ? '0' : '1');
        });
    });
})();

// ── Imagem → Base64 ──────────────────────────────────────────────────────────
(function () {
    var dropzone   = document.getElementById('ib64-dropzone');
    var fileInput  = document.getElementById('ib64-file');
    var previewWrap= document.getElementById('ib64-preview-wrap');
    var previewImg = document.getElementById('ib64-preview-img');
    var meta       = document.getElementById('ib64-meta');
    var resultWrap = document.getElementById('ib64-result-wrap');
    var output     = document.getElementById('ib64-output');
    var copyBtn    = document.getElementById('ib64-copy-btn');
    if (!dropzone) return;

    function processFile(file) {
        if (!file || !file.type.startsWith('image/')) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            var dataUrl = e.target.result;
            previewImg.src = dataUrl;
            previewWrap.removeAttribute('hidden');
            meta.innerHTML =
                '<strong>Nome:</strong> ' + file.name + '<br>' +
                '<strong>Tipo:</strong> ' + file.type + '<br>' +
                '<strong>Tamanho original:</strong> ' + (file.size / 1024).toFixed(1) + ' KB<br>' +
                '<strong>Tamanho Base64:</strong> ' + (dataUrl.length / 1024).toFixed(1) + ' KB';
            output.value = dataUrl;
            resultWrap.removeAttribute('hidden');
        };
        reader.readAsDataURL(file);
    }

    dropzone.addEventListener('click', function (e) {
        if (e.target !== fileInput) fileInput.click();
    });
    fileInput.addEventListener('change', function () {
        processFile(fileInput.files[0]);
    });
    dropzone.addEventListener('dragover', function (e) {
        e.preventDefault();
        dropzone.classList.add('is-over');
    });
    dropzone.addEventListener('dragleave', function () {
        dropzone.classList.remove('is-over');
    });
    dropzone.addEventListener('drop', function (e) {
        e.preventDefault();
        dropzone.classList.remove('is-over');
        processFile(e.dataTransfer.files[0]);
    });

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return output.value; });
        });
    }
})();

// ── Gerador de Placeholder de Imagem ─────────────────────────────────────────
(function () {
    var canvas      = document.getElementById('iph-canvas');
    if (!canvas) return;
    var ctx         = canvas.getContext('2d');
    var wInput      = document.getElementById('iph-width');
    var hInput      = document.getElementById('iph-height');
    var bgInput     = document.getElementById('iph-bg');
    var bgHex       = document.getElementById('iph-bg-hex');
    var fgInput     = document.getElementById('iph-fg');
    var fgHex       = document.getElementById('iph-fg-hex');
    var textInput   = document.getElementById('iph-text');
    var downloadBtn = document.getElementById('iph-download-btn');
    var copyUrlBtn  = document.getElementById('iph-copy-url-btn');

    function clamp(val, min, max) { return Math.min(max, Math.max(min, val)); }

    function render() {
        var w   = clamp(parseInt(wInput.value) || 400, 1, 2000);
        var h   = clamp(parseInt(hInput.value) || 300, 1, 2000);
        var bg  = bgInput.value;
        var fg  = fgInput.value;
        var txt = textInput.value.trim() || (w + ' × ' + h);

        canvas.width  = w;
        canvas.height = h;

        // Background
        ctx.fillStyle = bg;
        ctx.fillRect(0, 0, w, h);

        // Text
        var fontSize = Math.max(12, Math.min(w / 10, h / 5, 48));
        ctx.fillStyle = fg;
        ctx.font = 'bold ' + fontSize + 'px sans-serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(txt, w / 2, h / 2);
    }

    // Sync color picker ↔ hex text
    function syncColor(picker, hexField) {
        picker.addEventListener('input', function () { hexField.value = picker.value; render(); });
        hexField.addEventListener('input', function () {
            if (/^#[0-9a-fA-F]{6}$/.test(hexField.value)) {
                picker.value = hexField.value;
                render();
            }
        });
    }
    syncColor(bgInput, bgHex);
    syncColor(fgInput, fgHex);

    [wInput, hInput, textInput].forEach(function (el) {
        el.addEventListener('input', render);
    });

    downloadBtn.addEventListener('click', function () {
        var w   = parseInt(wInput.value) || 400;
        var h   = parseInt(hInput.value) || 300;
        var a   = document.createElement('a');
        a.download = 'placeholder-' + w + 'x' + h + '.png';
        a.href = canvas.toDataURL('image/png');
        a.click();
    });

    if (copyUrlBtn) {
        copyUrlBtn.addEventListener('click', function () {
            copyToClipboard(copyUrlBtn, function () { return canvas.toDataURL('image/png'); });
        });
    }

    render();
})();

// ── Limpador de Texto ─────────────────────────────────────────────────────────
(function () {
    var input          = document.getElementById('tc-input');
    if (!input) return;
    var output         = document.getElementById('tc-output');
    var copyBtn        = document.getElementById('tc-copy-btn');
    var stats          = document.getElementById('tc-stats');
    var statOriginal   = document.getElementById('tc-stat-original');
    var statCleaned    = document.getElementById('tc-stat-cleaned');
    var statRemoved    = document.getElementById('tc-stat-removed');
    var chkSpaces      = document.getElementById('tc-extra-spaces');
    var chkEmptyLines  = document.getElementById('tc-empty-lines');
    var chkDuplicates  = document.getElementById('tc-duplicate-lines');
    var chkTrimLines   = document.getElementById('tc-trim-lines');

    function clean() {
        var txt = input.value;
        if (!txt) {
            output.value = '';
            stats.setAttribute('hidden', '');
            return;
        }

        if (chkTrimLines.checked) {
            txt = txt.split('\n').map(function (l) { return l.trim(); }).join('\n');
        }
        if (chkSpaces.checked) {
            txt = txt.replace(/ +/g, ' ');
        }
        if (chkEmptyLines.checked) {
            txt = txt.replace(/^\s*[\r\n]/gm, '');
        }
        if (chkDuplicates.checked) {
            txt = Array.from(new Set(txt.split('\n'))).join('\n');
        }

        output.value = txt;

        var origLines    = input.value.split('\n').length;
        var cleanedLines = txt.split('\n').length;
        statOriginal.textContent  = origLines + ' linhas originais';
        statCleaned.textContent   = cleanedLines + ' linhas após limpeza';
        statRemoved.textContent   = Math.max(0, origLines - cleanedLines) + ' removidas';
        stats.removeAttribute('hidden');
    }

    input.addEventListener('input', clean);
    [chkSpaces, chkEmptyLines, chkDuplicates, chkTrimLines].forEach(function (cb) {
        cb.addEventListener('change', clean);
    });

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return output.value; });
        });
    }
})();

// ── CSV ↔ JSON Converter ──────────────────────────────────────────────────────
(function () {
    var inputEl    = document.getElementById('cj-input');
    if (!inputEl) return;
    var outputEl   = document.getElementById('cj-output');
    var direction  = document.getElementById('cj-direction');
    var copyBtn    = document.getElementById('cj-copy-btn');
    var clearBtn   = document.getElementById('cj-clear-btn');
    var errorEl    = document.getElementById('cj-error');
    var prettyChk  = document.getElementById('cj-pretty');
    var semicolonChk = document.getElementById('cj-semicolon');
    var inputLabel = document.getElementById('cj-input-label');
    var outputLabel= document.getElementById('cj-output-label');

    // Minimal RFC-4180 CSV parser
    function parseCSV(str, sep) {
        var rows = [];
        var row  = [];
        var field = '';
        var inQuotes = false;
        for (var i = 0; i < str.length; i++) {
            var ch = str[i];
            if (inQuotes) {
                if (ch === '"') {
                    if (str[i + 1] === '"') { field += '"'; i++; }
                    else { inQuotes = false; }
                } else {
                    field += ch;
                }
            } else {
                if (ch === '"') {
                    inQuotes = true;
                } else if (ch === sep) {
                    row.push(field); field = '';
                } else if (ch === '\n') {
                    row.push(field); field = '';
                    rows.push(row); row = [];
                } else if (ch === '\r') {
                    // skip
                } else {
                    field += ch;
                }
            }
        }
        row.push(field);
        if (row.some(function (f) { return f !== ''; })) rows.push(row);
        return rows;
    }

    function csvToJson(str, sep) {
        var rows = parseCSV(str.trim(), sep);
        if (rows.length < 2) throw new Error('O CSV precisa ter pelo menos um cabeçalho e uma linha de dados.');
        var headers = rows[0];
        return rows.slice(1).map(function (row) {
            var obj = {};
            headers.forEach(function (h, i) { obj[h] = row[i] !== undefined ? row[i] : ''; });
            return obj;
        });
    }

    function jsonToCsv(str, sep) {
        var data = JSON.parse(str);
        if (!Array.isArray(data)) throw new Error('O JSON deve ser um array de objetos.');
        if (data.length === 0) return '';
        var headers = Object.keys(data[0]);
        var escapeField = function (v) {
            var s = v === null || v === undefined ? '' : String(v);
            if (s.indexOf(sep) !== -1 || s.indexOf('"') !== -1 || s.indexOf('\n') !== -1) {
                s = '"' + s.replace(/"/g, '""') + '"';
            }
            return s;
        };
        var lines = [headers.map(escapeField).join(sep)];
        data.forEach(function (row) {
            lines.push(headers.map(function (h) { return escapeField(row[h]); }).join(sep));
        });
        return lines.join('\n');
    }

    function convert() {
        var sep = semicolonChk.checked ? ';' : ',';
        var dir = direction.value;
        var raw = inputEl.value.trim();
        errorEl.setAttribute('hidden', '');
        if (!raw) { outputEl.value = ''; return; }
        try {
            if (dir === 'csv2json') {
                var result = csvToJson(raw, sep);
                outputEl.value = prettyChk.checked
                    ? JSON.stringify(result, null, 2)
                    : JSON.stringify(result);
            } else {
                outputEl.value = jsonToCsv(raw, sep);
            }
        } catch (e) {
            errorEl.textContent = 'Erro: ' + e.message;
            errorEl.removeAttribute('hidden');
            outputEl.value = '';
        }
    }

    function updateLabels() {
        var dir = direction.value;
        inputLabel.textContent  = dir === 'csv2json' ? 'CSV' : 'JSON';
        outputLabel.textContent = dir === 'csv2json' ? 'JSON' : 'CSV';
        inputEl.placeholder = dir === 'csv2json'
            ? 'Cole o CSV aqui…\n\nExemplo:\nnome,email,idade\nJoão,joao@exemplo.com,30'
            : 'Cole o JSON aqui…\n\nExemplo:\n[\n  {"nome":"João","email":"joao@exemplo.com"}\n]';
    }

    direction.addEventListener('change', function () { updateLabels(); convert(); });
    inputEl.addEventListener('input', convert);
    prettyChk.addEventListener('change', convert);
    semicolonChk.addEventListener('change', convert);
    clearBtn.addEventListener('click', function () {
        inputEl.value = ''; outputEl.value = '';
        errorEl.setAttribute('hidden', '');
    });
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return outputEl.value; });
        });
    }
})();

// ── UUID / GUID Generator ─────────────────────────────────────────────────────
(function () {
    var generateBtn = document.getElementById('uuid-generate-btn');
    if (!generateBtn) return;
    var qtyInput    = document.getElementById('uuid-qty');
    var outputEl    = document.getElementById('uuid-output');
    var resultWrap  = document.getElementById('uuid-result-wrap');
    var countLabel  = document.getElementById('uuid-count-label');
    var copyBtn     = document.getElementById('uuid-copy-btn');

    function getFormat() {
        var checked = document.querySelector('input[name="uuid-fmt"]:checked');
        return checked ? checked.value : 'hyphenated';
    }

    function applyFormat(uuid, fmt) {
        switch (fmt) {
            case 'plain':    return uuid.replace(/-/g, '');
            case 'braces':   return '{' + uuid + '}';
            case 'upper':    return uuid.toUpperCase();
            default:         return uuid;
        }
    }

    function generate() {
        var qty = Math.min(100, Math.max(1, parseInt(qtyInput.value) || 1));
        var fmt = getFormat();
        var uuids = [];
        for (var i = 0; i < qty; i++) {
            uuids.push(applyFormat(crypto.randomUUID(), fmt));
        }
        outputEl.value = uuids.join('\n');
        outputEl.rows  = Math.min(qty, 12);
        countLabel.textContent = qty + (qty === 1 ? ' UUID gerado' : ' UUIDs gerados');
        resultWrap.removeAttribute('hidden');
    }

    generateBtn.addEventListener('click', generate);
    document.querySelectorAll('input[name="uuid-fmt"]').forEach(function (r) {
        r.addEventListener('change', function () {
            if (outputEl.value) generate();
        });
    });
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return outputEl.value; });
        });
    }

    // Gera 1 UUID ao carregar
    generate();
})();

// ── SQL Formatter ─────────────────────────────────────────────────────────────
(function () {
    var inputEl   = document.getElementById('sf-input');
    if (!inputEl) return;
    var outputEl  = document.getElementById('sf-output');
    var dialectEl = document.getElementById('sf-dialect');
    var indentEl  = document.getElementById('sf-indent');
    var upperChk  = document.getElementById('sf-uppercase');
    var copyBtn   = document.getElementById('sf-copy-btn');
    var clearBtn  = document.getElementById('sf-clear-btn');
    var errorEl   = document.getElementById('sf-error');

    function format() {
        var sql = inputEl.value.trim();
        errorEl.setAttribute('hidden', '');
        if (!sql) { outputEl.value = ''; return; }

        if (!window.sqlFormatter) {
            errorEl.textContent = 'Biblioteca sql-formatter não carregou. Verifique sua conexão e recarregue a página.';
            errorEl.removeAttribute('hidden');
            return;
        }

        try {
            outputEl.value = window.sqlFormatter.format(sql, {
                language:  dialectEl.value,
                indent:    indentEl.value,
                uppercase: upperChk.checked,
            });
        } catch (e) {
            errorEl.textContent = 'Erro ao formatar: ' + e.message;
            errorEl.removeAttribute('hidden');
            outputEl.value = '';
        }
    }

    inputEl.addEventListener('input', format);
    dialectEl.addEventListener('change', format);
    indentEl.addEventListener('change', format);
    upperChk.addEventListener('change', format);

    clearBtn.addEventListener('click', function () {
        inputEl.value = ''; outputEl.value = '';
        errorEl.setAttribute('hidden', '');
    });
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyToClipboard(copyBtn, function () { return outputEl.value; });
        });
    }
})();
