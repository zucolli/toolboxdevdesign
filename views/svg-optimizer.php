<div class="card">
    <h1 class="card-title">Otimizador de SVG</h1>
    <p class="card-description">Arraste um arquivo <code>.svg</code>, cole o código ou clique na área abaixo. A otimização acontece 100% no navegador — o servidor não toca no seu arquivo.</p>

    <div class="svg-grid">

        <!-- Coluna Esquerda: Entrada -->
        <div class="svg-col">
            <div
                id="svg-dropzone"
                class="svg-dropzone"
                role="button"
                tabindex="0"
                aria-label="Área de Drag and Drop para SVG"
            >
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                <span class="dropzone-text">Arraste um <strong>.svg</strong> aqui</span>
                <span class="dropzone-sub">ou clique para escolher</span>
                <input type="file" id="svg-file-input" accept=".svg,image/svg+xml" hidden>
            </div>

            <div class="svg-col-divider">
                <span>ou cole o código SVG abaixo</span>
            </div>

            <textarea
                id="svg-input"
                rows="10"
                placeholder="&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; ...&gt;&lt;/svg&gt;"
                spellcheck="false"
            ></textarea>

            <button id="btn-svg-optimize" class="btn btn-primary" type="button" style="margin-top:12px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                Otimizar SVG
            </button>
        </div>

        <!-- Coluna Direita: Saída -->
        <div class="svg-col" id="svg-output-col" hidden>

            <div id="svg-stats" class="svg-stats">
                <div class="svg-stat">
                    <span class="svg-stat-label">Original</span>
                    <span id="stat-original" class="svg-stat-value">—</span>
                </div>
                <div class="svg-stat">
                    <span class="svg-stat-label">Otimizado</span>
                    <span id="stat-optimized" class="svg-stat-value">—</span>
                </div>
                <div class="svg-stat svg-stat--highlight">
                    <span class="svg-stat-label">Redução</span>
                    <span id="stat-reduction" class="svg-stat-value">—</span>
                </div>
            </div>

            <div class="checksum-block" style="margin-bottom:12px;">
                <div class="checksum-block-header">
                    <span class="checksum-block-title">Código Otimizado</span>
                    <div style="display:flex;gap:6px;">
                        <button id="btn-copy-svg" class="btn btn-ghost btn-sm" type="button">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                            Copiar
                        </button>
                        <button id="btn-download-svg" class="btn btn-ghost btn-sm" type="button">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            Baixar SVG
                        </button>
                    </div>
                </div>
                <textarea
                    id="svg-output"
                    class="input-readonly checksum-output"
                    readonly
                    rows="10"
                    spellcheck="false"
                ></textarea>
            </div>

            <div class="svg-preview-block">
                <span class="checksum-block-title" style="display:block;margin-bottom:10px;">Preview</span>
                <div id="svg-preview" class="svg-preview"></div>
            </div>

        </div>
    </div>

    <p id="svg-error" class="svg-error" hidden></p>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que é um Otimizador de SVG?</h2>
    <p>Editores vetoriais como Illustrator, Figma e Inkscape exportam arquivos SVG com muito código desnecessário: metadados do editor, namespaces proprietários, IDs não referenciados, comentários e coordenadas de path com precisão excessiva. Um otimizador remove esse "lixo" sem alterar a aparência visual do ícone ou ilustração.</p>

    <h3>Onde e por que usar?</h3>
    <p>Performance web depende diretamente do tamanho dos assets. SVGs usados inline em HTML ou como <code>img src</code> devem ser os menores possíveis. Um SVG exportado do Figma pode ter 8KB; após otimização, pode cair para 2KB — redução de 75% sem perda visual. Use antes de fazer commit de ícones, ilustrações de landing pages, logos para e-mail marketing ou sprites SVG em design systems.</p>

    <h3>Como funciona?</h3>
    <p>Arraste um arquivo <code>.svg</code>, clique na dropzone para escolher um arquivo, ou cole o código SVG diretamente na textarea. Clique em "Otimizar SVG" para processar. A ferramenta remove metadados de editores, namespaces desnecessários, IDs órfãos (não referenciados em nenhum <code>fill</code>, <code>stroke</code> ou <code>use</code>) e arredonda coordenadas de path para 2 casas decimais. Todo o processamento acontece 100% no navegador.</p>

    <section class="tool-seo-content">
        <h3>O que é o Otimizador de SVG?</h3>
        <p>O Otimizador de SVG é uma ferramenta fundamental para designers e desenvolvedores web que trabalham com gráficos vetoriais. SVGs exportados de ferramentas como Figma, Adobe Illustrator ou Inkscape costumam conter metadados desnecessários, IDs não utilizados, comentários e espaçamento que aumentam o tamanho do arquivo. O otimizador remove automaticamente esses dados redundantes, reduzindo o tamanho do arquivo em até 50%, mantendo a qualidade visual intacta.</p>

        <h3>Como usar o Otimizador de SVG?</h3>
        <p>Para usar o Otimizador de SVG, copie o código SVG completo e cole no campo de entrada, ou faça upload de um arquivo .svg. A ferramenta executa otimização completa no navegador: remove namespaces e metadados de editores, limpa IDs não referenciados, arredonda coordenadas para 2 casas decimais, comprime paths e remove comentários. O SVG otimizado é exibido imediatamente, pronto para copiar e usar.</p>

        <h3>Casos de uso práticos do Otimizador de SVG</h3>
        <p>SVGs otimizadas melhoram significativamente a performance web. Um SVG reduzido carrega mais rápido, consome menos banda e melhora Core Web Vitals. Desenvolvedores Node.js e ferramentas de build como Webpack, Vite e Next.js frequentemente integram otimizadores de SVG na pipeline de desenvolvimento. Para aplicações web que utilizam muitos ícones SVG ou gráficos, otimização é essencial para manter performance aceitável.</p>
    </section>
</article>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Em e-mails de campanha para grandes redes varejistas, ícones e logotipos em SVG otimizados reduzem o peso do e-mail em até 60%. Isso impacta diretamente a taxa de entrega: provedores como Gmail e Outlook penalizam e-mails acima de 100 KB, aumentando a chance de cair no spam — especialmente crítico em disparos para bases de centenas de milhares de contatos.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

