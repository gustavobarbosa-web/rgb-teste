<main>
    <section class="galeria">
        <div class="selected">
            <img src="#" alt="Imagem" />
            <p></p>
            <button type="button" onclick="closeModal()">X</button>
        </div>
        <ul>
            <?php foreach ($imagens as $imagem) { ?>
                <li onclick="openModal('<?= base_url('public/assets/images/large/' . $imagem->imagem); ?>', '<?= $imagem->desc_longa; ?>')">
                    <div class="image" style="background-image: url('<?= base_url('public/assets/images/thumb/' . $imagem->imagem); ?>');"></div>
                    <p><?= $imagem->desc_curta; ?></p>
                    <div class="border"></div>
                </li>
            <?php } ?>
        </ul>
    </section>
</main>