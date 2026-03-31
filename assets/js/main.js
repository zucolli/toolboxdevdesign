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
    const bgHex   = document.getElementById('color-bg-hex')?.value.trim();
    const textHex = document.getElementById('color-text-hex')?.value.trim();
    const preview = document.getElementById('contrast-preview');
    const sample  = document.getElementById('preview-sample');
    const ratioEl = document.getElementById('contrast-ratio');

    if (!preview || !sample || !ratioEl) return;

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

    hex.addEventListener('input', () => {
        const val = hex.value.trim();
        if (/^#[0-9a-fA-F]{6}$/.test(val)) {
            picker.value = val;
        }
        updateContrast();
    });
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

if (btnCopy && outputSlug) {
    btnCopy.addEventListener('click', () => {
        const slug = outputSlug.value;
        if (!slug) return;

        navigator.clipboard.writeText(slug).then(() => {
            const original = btnCopy.textContent;
            btnCopy.textContent = 'Copiado!';
            btnCopy.classList.add('btn-success');
            setTimeout(() => {
                btnCopy.textContent = original;
                btnCopy.classList.remove('btn-success');
            }, 2000);
        }).catch(() => {
            // Fallback para ambientes sem HTTPS
            outputSlug.select();
            document.execCommand('copy');
        });
    });
}
