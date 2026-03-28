'use strict';

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
