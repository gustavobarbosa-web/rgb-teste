<footer>
    <section class="sobre">
        <img src="<?= base_url('public/assets/images/medium/'.$configuracoes->rodape_imagem); ?>" alt="Sobre" />
        <div>
            <h3><?= $configuracoes->rodape_titulo; ?></h3>
            <p><?= nl2br($configuracoes->rodape_texto); ?></p>
        </div>
        <div>
            <h3>Acesse Também:</h3>
            <ul>
                <li>
                    <img src="<?= base_url('public/assets/images/icons/facebook.jpg'); ?>" alt="Facebook" />
                    <p><a href="https://<?= $configuracoes->facebook; ?>"><?= $configuracoes->facebook; ?></a></p>
                </li>
                <li>
                    <img src="<?= base_url('public/assets/images/icons/twitter.jpg'); ?>" alt="Twitter" />
                    <p><a href="https://<?= $configuracoes->twitter; ?>"><?= $configuracoes->twitter; ?></a></p>
                </li>
                <li>
                    <img src="<?= base_url('public/assets/images/icons/flickr.jpg'); ?>" alt="Flickr" />
                    <p><a href="https://<?= $configuracoes->flickr; ?>"><?= $configuracoes->flickr; ?></a></p>
                </li>
            </ul>
        </div>
        <img src="<?= base_url('public/assets/images/shadow.png'); ?>" alt="sombra" class="sombra" />
    </section>
    <section class="copyright">
        <p><?= $configuracoes->rodape_copyright; ?> - © <?= date("Y"); ?></p>
        <div>
            <p>Linha Fast | </p><img src="<?= base_url('public/assets/images/medium/'.$configuracoes->rodape_creditos); ?>" alt="Créditos" />
        </div>
    </section>
</footer>
</div>
<script src="<?= base_url('public/assets/js/scripts.js'); ?>"></script>
</body>

</html>