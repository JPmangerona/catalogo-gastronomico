<?php
// Dados recebidos do ReadProductController: $dadosDoce, $dadosSalgado
?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-junior.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Junior Rivoredo - Menu</title>
</head>

<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="/img/logo-junior.png" class="logo" alt="logo-junior">
            </div>
        </section>
        <h2>Menu Digital</h2>
        <section class="container-doce">
            <div class="container-doce-titulo">
                <h3>Opções Doces</h3>
                <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-doce-produtos">
                <?php foreach ($dadosDoce as $doce): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $doce->getImagemDiretorio() ?>">
                        </div>
                        <p><?= $doce->getNome() ?></p>
                        <p><?= $doce->getDescricao() ?></p>
                        <p><?= $doce->getPrecoFormatado() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-salgado">
            <div class="container-salgado-titulo">
                <h3>Opções Salgadas</h3>
                <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-salgado-produtos">
                <?php foreach ($dadosSalgado as $salgado): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $salgado->getImagemDiretorio() ?>">
                        </div>
                        <p><?= $salgado->getNome() ?></p>
                        <p><?= $salgado->getDescricao() ?></p>
                        <p><?= $salgado->getPrecoFormatado() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>

</html>