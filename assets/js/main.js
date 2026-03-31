'use strict';

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
        const original = btn.textContent;
        btn.textContent = 'Copiado!';
        btn.classList.add('btn-success');
        setTimeout(() => {
            btn.textContent = original;
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
            const hexSpan = swatch.querySelector('.swatch-hex');
            if (!hexSpan) return;
            const original = hexSpan.textContent;
            hexSpan.textContent = 'Copiado!';
            setTimeout(() => { hexSpan.textContent = original; }, 1500);
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

// Aguarda o SVGO carregar e habilita o botão
function waitForSvgo() {
    if (!btnOptimize) return;
    if (typeof svgo !== 'undefined') return; // já carregou antes do main.js

    btnOptimize.disabled    = true;
    btnOptimize.textContent = 'Carregando SVGO…';

    const svgoScript = document.getElementById('svgo-script');
    if (!svgoScript) return;

    svgoScript.addEventListener('load', () => {
        btnOptimize.disabled    = false;
        btnOptimize.innerHTML   = `<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Otimizar SVG`;
    });

    svgoScript.addEventListener('error', () => {
        btnOptimize.textContent = 'Falha ao carregar SVGO';
        svgShowError('Não foi possível carregar o SVGO do CDN. Verifique sua conexão e recarregue a página.');
    });
}

waitForSvgo();

function runOptimize() {
    if (!svgInput || !svgOutput || !svgOutputCol) return;

    const raw = svgInput.value.trim();
    if (!raw) { svgShowError('Cole ou carregue um SVG antes de otimizar.'); return; }
    if (!raw.includes('<svg')) { svgShowError('O conteúdo não parece ser um SVG válido.'); return; }
    svgClearError();

    let result;
    try {
        result = svgo.optimize(raw, { multipass: true });
    } catch (e) {
        svgShowError('Erro ao otimizar: ' + e.message);
        return;
    }

    const optimized   = result.data;
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
