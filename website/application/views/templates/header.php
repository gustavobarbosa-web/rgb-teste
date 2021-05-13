<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('public/assets/css/styles.css'); ?>" rel="stylesheet">
    <script defer src="<?= base_url('public/assets/fonts/font-awesome.min.js'); ?>"></script>
    <title><?= $configuracoes->titulo; ?></title>
</head>

<body>
    <div id="main-wrapper">
        <header>
            <img src="<?= base_url('public/assets/images/medium/' . $configuracoes->logo); ?>" alt="RGB Fast" />
            <div>
                <p class="info"><i class="fas fa-phone-alt"></i><span><?= $configuracoes->telefone_ddd; ?></span><?= $configuracoes->telefone_numero; ?></p>
                <button class="abrirMenu" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
                <ul>
                    <li class="head">
                        <p>Menu</p>
                        <button onclick="toggleMenu()">X</button>
                    </li>
                    <li>
                        <a href="#">Página 1</a>
                    </li>
                    <li>
                        <a href="#">Página 2</a>
                    </li>
                    <li>
                        <a href="#">Página 3</a>
                    </li>
                    <li>
                        <a href="#">Página 4</a>
                    </li>
                    <li>
                        <a href="#">Página 5</a>
                    </li>
                    <li>
                        <a href="#">Página 6</a>
                    </li>
                    <li>
                        <a href="#">Página 7</a>
                    </li>
                </ul>
            </div>
        </header>