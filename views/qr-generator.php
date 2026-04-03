<script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>

<div class="card">
    <h1 class="card-title">Gerador de QR Code</h1>
    <p class="card-description">Digite texto ou URL para gerar um QR Code instantaneamente. Configure cores e tamanho, e baixe como PNG.</p>

    <div class="form-group">
        <label class="form-label" for="qr-input">Texto ou URL</label>
        <input type="text" id="qr-input" placeholder="https://exemplo.com.br" />
    </div>

    <div class="qr-options">
        <div class="form-group">
            <label class="form-label" for="qr-fg">Cor do QR Code</label>
            <input type="color" id="qr-fg" value="#000000" />
        </div>
        <div class="form-group">
            <label class="form-label" for="qr-bg">Cor de fundo</label>
            <input type="color" id="qr-bg" value="#ffffff" />
        </div>
        <div class="form-group">
            <label class="form-label" for="qr-size">Tamanho (px)</label>
            <input type="number" id="qr-size" value="256" min="64" max="1024" step="8" />
        </div>
    </div>

    <div class="qr-preview-wrap">
        <canvas id="qr-canvas"></canvas>
        <p class="qr-placeholder-text" id="qr-placeholder">Digite algo acima para gerar o QR Code</p>
    </div>

    <div id="qr-actions" style="display:none; margin-top: 16px; text-align: center;">
        <button class="btn btn-primary" id="qr-download">Baixar PNG</button>
    </div>
</div>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>

<article class="tool-content">
    <h2>Como usar o Gerador de QR Code</h2>
    <p>Digite qualquer texto ou URL no campo acima. O QR Code é gerado instantaneamente no navegador — nenhum dado é enviado ao servidor.</p>

    <h3>Personalizando o QR Code</h3>
    <p>Escolha a cor do código e do fundo usando os seletores de cor. O tamanho padrão de 256px é adequado para uso digital; para impressão, recomenda-se 512px ou mais.</p>

    <h3>Baixando o arquivo</h3>
    <p>Clique em "Baixar PNG" para salvar o QR Code como imagem. O arquivo terá exatamente o tamanho configurado em pixels.</p>
</article>

<div class="ad-placeholder">Espaço Reservado · AdSense</div>
