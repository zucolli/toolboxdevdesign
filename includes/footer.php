</main>
<?php require BASE_PATH . '/includes/sidebar-right.php'; ?>
</div><!-- /.layout -->

<footer class="footer">
    <p>&copy; <?= date('Y') ?> Toolbox Dev Design &mdash; Desenvolvido com foco em privacidade e performance por <strong>Carlos Zucolli</strong>.</p>
    <nav class="footer-links">
        <a href="<?= BASE_URL ?>sobre">Conheça a história da Toolbox e a NuAto</a>
        <a href="<?= BASE_URL ?>privacidade">Política de Privacidade</a>
        <a href="<?= BASE_URL ?>termos">Termos de Uso</a>
    </nav>
</footer>

<script src="<?= BASE_URL ?>assets/js/main.js?v=<?= filemtime(BASE_PATH . '/assets/js/main.js') ?>"></script>
</body>
</html>
