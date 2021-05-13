<main class="controle">
    <aside>
        <ul>
            <li>
                <a href="<?= base_url('admin'); ?>" class="active">Galeria</a>
            </li>
            <li>
                <a href="<?= base_url('admin/configuracoes'); ?>">Configurações</a>
            </li>
            <li>
                <a href="<?= base_url('admin/logout'); ?>">Sair</a>
            </li>
        </ul>
    </aside>
    <content>
        <h1>Nova imagem</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="imagem" required />
                <label>Imagem</label>
            </div>
            <div class="form-group">
                <input type="text" name="desc_curta" required />
                <label>Descrição curta</label>
            </div>
            <div class="form-group">
                <input type="text" name="desc_longa" required />
                <label>Descrição longa</label>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </content>
</main>