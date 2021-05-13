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
        <h1>Galeria <a href="<?= base_url('admin/cadastro'); ?>">Adicionar +</a></h1>
        <table>
            <thead>
                <tr>
                    <td>Imagem</td>
                    <td>Descrição</td>
                    <td>Controle</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imagens as $imagem) { ?>
                    <tr>
                        <td><img src="<?= base_url('public/assets/images/thumb/' . $imagem->imagem); ?>" alt="" /></td>
                        <td><?= $imagem->desc_curta; ?></td>
                        <td><a href="<?= base_url("/admin/remove/?id=" . $imagem->id); ?>" class="remove" onclick="return confirm('Remover item?')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </content>
</main>