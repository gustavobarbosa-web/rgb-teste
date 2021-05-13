<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('public/assets/css/styles.css'); ?>" rel="stylesheet">
    <script defer src="<?= base_url('public/assets/fonts/font-awesome.min.js'); ?>"></script>
    <title><?= $configuracoes->titulo; ?> | Administração</title>
</head>

<body>
    <main class="admin">
        <div>
            <img src="<?= base_url('public/assets/images/medium/' . $configuracoes->logo); ?>" alt="RGB Fast" />
            <h1>Login</h1>
            <form method="post">
                <div class="form-group">
                    <input type="text" name="login" required/>
                    <label>Usuário</label>
                </div>
                <div class="form-group">
                    <input type="password" name="senha" required/>
                    <label>Senha</label>
                </div>
                <button type="submit">Acessar</button>
            </form>
        </div>
    </main>
    <script src="<?= base_url('public/assets/js/scripts.js'); ?>"></script>
</body>

</html>