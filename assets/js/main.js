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
