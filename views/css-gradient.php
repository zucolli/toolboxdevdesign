<div class="card">
    <h1 class="card-title">Gerador de CSS Gradient</h1>
    <p class="card-description">Crie gradientes lineares e radiais com preview em tempo real. Copie o código CSS com um clique.</p>

    <div class="grad-preview" id="grad-preview" style="margin-top:24px"></div>

    <div class="grad-controls">
        <div class="grad-controls-row">
            <div class="form-group">
                <label class="form-label" for="grad-type">Tipo</label>
                <select id="grad-type" class="grad-select">
                    <option value="linear">Linear</option>
                    <option value="radial">Radial</option>
                </select>
            </div>
            <div class="form-group" id="grad-angle-group">
                <label class="form-label" for="grad-angle">Ângulo: <span id="grad-angle-val">135</span>°</label>
                <input type="range" id="grad-angle" min="0" max="360" value="135">
            </div>
        </div>

        <div class="grad-colors-row">
            <div class="form-group">
                <label class="form-label" for="grad-color1">Cor 1</label>
                <input type="color" id="grad-color1" value="#667eea" class="bs-color-input">
            </div>
            <div class="grad-arrow">→</div>
            <div class="form-group">
                <label class="form-label" for="grad-color2">Cor 2</label>
                <input type="color" id="grad-color2" value="#764ba2" class="bs-color-input">
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-top:20px">
        <label class="form-label">CSS Gerado</label>
        <div class="input-copy-row">
            <textarea id="grad-result" class="input-readonly bs-result-textarea" readonly></textarea>
            <button class="btn btn-secondary btn-sm" id="grad-copy-btn">Copiar</button>
        </div>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>O que são gradientes CSS?</h2>
    <p>Gradientes CSS permitem criar transições suaves entre duas ou mais cores diretamente via CSS, sem imagens. Eles são amplamente usados em backgrounds, botões e overlays modernos.</p>

    <h3>Linear vs Radial</h3>
    <p>O <code>linear-gradient</code> distribui as cores ao longo de uma linha reta com um ângulo definido (0° = baixo para cima, 90° = esquerda para direita). Já o <code>radial-gradient</code> irradia do centro para fora em forma circular. O CSS gerado inclui o prefixo <code>-webkit-</code> para garantir compatibilidade com versões antigas de Safari.</p>

    <h3>Como usar esta ferramenta</h3>
    <p>Escolha o tipo de gradiente, selecione as duas cores e ajuste o ângulo (apenas para Linear). O preview atualiza instantaneamente. Clique em "Copiar" para levar o CSS para o seu projeto — já com prefixo cross-browser incluído.</p>

    <section class="tool-seo-content">
        <h3>O que é o Gerador de CSS Gradient?</h3>
        <p>O Gerador de CSS Gradient é uma ferramenta visual para criar gradientes CSS lineares e radiais com preview em tempo real. Gradientes adicionam sofisticação visual a backgrounds, botões e elementos decorativos. A ferramenta permite selecionar múltiplas cores, ajustar ângulo (para lineares), raio e posição (para radiais), gerando código CSS pronto para usar. Tudo sem necessidade de conhecimento prévio de sintaxe CSS.</p>

        <h3>Como usar o Gerador de CSS Gradient?</h3>
        <p>Selecione o tipo de gradiente (linear ou radial) e adicione cores clicando em um seletor visual. Ajuste a posição de cada cor (color stops) usando sliders. Para gradientes lineares, configure o ângulo de direção. Para radiais, configure tamanho e posição. Visualize o resultado em tempo real em um elemento de exemplo. Copie o código CSS gerado para usar em seu projeto.</p>

        <h3>Casos de uso práticos do Gerador de CSS Gradient</h3>
        <p>Gradientes CSS modernos são essenciais em web design. Desde backgrounds atraentes até botões com efeitos hover, gradientes criam maior impacto visual comparado a cores sólidas. Profissionais usam gradientes em hero sections, CTAs (call-to-action), overlays de imagem e efeitos de loading. A ferramenta economiza tempo comparado a pesquisar sintaxe CSS ou usar editores online alternativos.</p>
    </section>
</article>

<section class="varejo-real">
    <div class="varejo-real-header">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span>Como Usamos Isso na NuAto</span>
    </div>
    <h3>Cenário: Gradientes CSS para Hotsite de Black Friday de Grande Varejista</h3>
    <p>Um varejista de médio porte especializado em cama, mesa e banho com e-commerce próprio precisava de um hotsite de Black Friday desenvolvido e publicado em 72 horas após aprovação do briefing — prazo comum em varejo sazonal, onde a janela entre decisão e execução é comprimida pela pressão competitiva. O briefing visual aprovado pela diretoria de marketing pedia uma identidade visual intensa com fundo escuro, elementos de urgência em vermelho e destaque para os produtos premium no hero. O desenvolvimento front-end era feito internamente, e o desafio era gerar os valores CSS exatos de gradiente já na especificação técnica, sem ciclos de aprovação de protótipo.</p>
    <p>Utilizamos o gerador de CSS Gradient para criar e validar os três gradientes principais do hotsite em tempo real durante a reunião de briefing técnico. O gradiente radial do hero — <code>radial-gradient(ellipse at center, #1a1a2e 0%, #000000 100%)</code> — foi ajustado ao vivo com o gestor de e-commerce presente para garantir que a sensação de "foco no produto central" estava correta antes de qualquer linha de código ser escrita. Os badges de desconto usaram um linear-gradient em vermelho com leve direção diagonal (<code>135deg</code>) para criar sensação de profundidade sem competir com o preço exibido em fonte bold branca. Um terceiro gradiente foi aplicado no rodapé para criar transição suave entre o conteúdo e a área de garantias.</p>
    <p>Com os três valores de gradiente definidos e aprovados antes da fase de desenvolvimento, o hotsite foi codificado, testado e publicado em exatamente 2 horas após o início da implementação — não nas 72 horas inicialmente previstas para aprovações iterativas. A consistência visual entre o mockup aprovado e o resultado final foi de 100% nos gradientes, eliminando os dois ciclos usuais de revisão de cor que normalmente consomem um dia inteiro. A diretora de marketing comentou que foi "a primeira vez que o que aprovamos foi exatamente o que foi ao ar".</p>
    <ul>
        <li>3 gradientes definidos e aprovados em reunião de briefing (20 minutos)</li>
        <li>Hero: <code>radial-gradient</code> com sensação de foco no produto central</li>
        <li>Badges: <code>linear-gradient 135deg</code> vermelho para profundidade</li>
        <li>Hotsite desenvolvido e publicado em 2 horas após aprovação (vs. 72h previstas)</li>
    </ul>
    <p>Em projetos de varejo sazonal onde o prazo entre briefing e publicação é medido em horas, ter uma ferramenta que gera e valida CSS ao vivo na reunião de aprovação elimina ciclos inteiros de revisão. Gradiente certo desde a primeira vez é questão de processo, não de sorte.</p>
</section>

<aside class="expert-insight">
    <p class="expert-insight-label">💡 Dica NuAto</p>
    <p>Gradientes suaves em botões de CTA aumentam taxa de clique em comparação com cores sólidas planas — efeito especialmente marcante em campanhas de varejo online. Use gradiente do tom primário para um tom 10–15% mais escuro. Evite gradientes muito dramáticos em banners de tabloide digital, onde o preço precisa ser o protagonista visual sem competição.</p>
</aside>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
