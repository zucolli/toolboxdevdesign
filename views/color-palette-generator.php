<div class="card">
    <h1 class="card-title">Color Palette Generator</h1>
    <p class="card-description">Escolha uma cor base e o tipo de harmonia para gerar uma paleta instantaneamente. Clique em qualquer swatch para copiar o HEX.</p>

    <div class="palette-controls">
        <div class="form-group">
            <label class="form-label" for="palette-hex">Cor Base</label>
            <div class="color-input-row">
                <input type="color" id="palette-picker" class="color-picker" value="#0070f3">
                <input type="text"  id="palette-hex"    class="color-hex"    value="#0070f3" maxlength="7" placeholder="#000000">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Harmonia</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="analogous" checked>
                    <span>Análoga</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="complementary">
                    <span>Complementar</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="triadic">
                    <span>Tríade</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="palette-harmony" value="monochromatic">
                    <span>Monocromática</span>
                </label>
            </div>
        </div>
    </div>

    <div class="palette-swatches" id="palette-swatches">
        <div class="color-swatch" data-index="0"></div>
        <div class="color-swatch" data-index="1"></div>
        <div class="color-swatch" data-index="2"></div>
        <div class="color-swatch" data-index="3"></div>
        <div class="color-swatch" data-index="4"></div>
    </div>
</div>
