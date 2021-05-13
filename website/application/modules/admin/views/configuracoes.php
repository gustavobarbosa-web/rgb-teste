<main class="controle">
    <aside>
        <ul>
            <li>
                <a href="<?= base_url('admin'); ?>">Galeria</a>
            </li>
            <li>
                <a href="<?= base_url('admin/configuracoes'); ?>" class="active">Configurações</a>
            </li>
            <li>
                <a href="<?= base_url('admin/logout'); ?>">Sair</a>
            </li>
        </ul>
    </aside>
    <content>
        <h1>Configurações</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="titulo" value="<?= $configuracoes->titulo; ?>" required />
                <label>Título</label>
            </div>
            <div class="form-group">
                <img src="<?= base_url('public/assets/images/medium/' . $configuracoes->logo); ?>" alt="" />
                <input type="file" name="logo" />
                <label>Logo</label>
            </div>
            <div class="form-group">
                <input type="text" name="telefone_ddd" value="<?= $configuracoes->telefone_ddd; ?>" required />
                <label>Telefone (DDD)</label>
            </div>
            <div class="form-group">
                <input type="text" name="telefone_numero" value="<?= $configuracoes->telefone_numero; ?>" required />
                <label>Telefone (Número)</label>
            </div>
            <div class="form-group">
                <img src="<?= base_url('public/assets/images/medium/' . $configuracoes->rodape_imagem); ?>" alt="" />
                <input type="file" name="rodape_imagem" />
                <label>Imagem do rodapé</label>
            </div>
            <div class="form-group">
                <input type="text" name="rodape_titulo" value="<?= $configuracoes->rodape_titulo; ?>" required />
                <label>Título do rodapé</label>
            </div>
            <div class="form-group">
                <input type="text" name="rodape_texto" value="<?= $configuracoes->rodape_texto; ?>" required />
                <label>Texto do rodapé</label>
            </div>
            <div class="form-group">
                <input type="text" name="rodape_copyright" value="<?= $configuracoes->rodape_copyright; ?>" required />
                <label>Texto do copyright</label>
            </div>
            <div class="form-group">
                <img src="<?= base_url('public/assets/images/medium/' . $configuracoes->rodape_creditos); ?>" alt="" />
                <input type="file" name="rodape_creditos" />
                <label>Imagem de crédito</label>
            </div>
            <div class="form-group">
                <input type="text" name="facebook" value="<?= $configuracoes->facebook; ?>" required />
                <label>Facebook</label>
            </div>
            <div class="form-group">
                <input type="text" name="twitter" value="<?= $configuracoes->twitter; ?>" required />
                <label>Twitter</label>
            </div>
            <div class="form-group">
                <input type="text" name="flickr" value="<?= $configuracoes->flickr; ?>" required />
                <label>Flickr</label>
            </div>
            <button type="submit">Atualizar</button>
        </form>
    </content>
</main>