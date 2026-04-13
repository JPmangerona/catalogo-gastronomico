<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icone-junior.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Junior Rivoredo - Cadastrar Produto</title>
</head>

<body>
    <main>
        <section class="container-admin-banner">
            <img src="/img/logo-junior-horizontal.png" class="logo-admin" alt="/logo-junior">
            <h1>Cadastro de Produtos</h1>
            <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form method="post" enctype="multipart/form-data">

                <label for="nome">Nome</label>
                <?php if (isset($_GET['erro_nome']) && $_GET['erro_nome'] === '1'): ?>
                    <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Nome muito grande
                        (máximo 100 caracteres)</p>
                <?php endif; ?>
                <input name="nome" type="text" id="nome" placeholder="Digite o nome do produto" required>
                <div class="container-radio">
                    <div>
                        <label for="doce">Doce</label>
                        <input type="radio" id="doce" name="tipo" value="Doce" checked>
                    </div>
                    <div>
                        <label for="salgado">Salgado</label>
                        <input type="radio" id="salgado" name="tipo" value="Salgado">
                    </div>
                </div>
                <label for="descricao">Descrição</label>
                <?php if (isset($_GET['erro_descricao']) && $_GET['erro_descricao'] === '1'): ?>
                    <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Descrição muito longa
                        (máximo 200 caracteres)</p>
                <?php endif; ?>
                <input name="descricao" type="text" id="descricao" placeholder="Digite uma descrição" required>

                <label for="preco">Preço</label>
                <?php if (isset($_GET['erro_preco']) && $_GET['erro_preco'] === '1'): ?>
                    <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Valor inválido(máximo
                        6 caracteres)</p>
                <?php endif; ?>
                <input name="preco" type="text" id="preco" placeholder="Digite o preço" required>

                <label>Envie uma imagem do produto</label>
                <?php if (isset($_GET['erro_imagem']) && $_GET['erro_imagem'] === '1'): ?>
                    <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Erro ao processar
                        imagem. Verifique o tamanho (máx 2MB) ou formato.</p>
                <?php endif; ?>
                <label for="imagem" class="btn-escolher">Escolher arquivo</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" style="display: none;"
                    onchange="document.getElementById('file-name').textContent = this.files.length > 0 ? this.files[0].name : ''">
                <span id="file-name"
                    style="font-size: 14px; color: #EBC181; display: block; margin-bottom: 5px;"></span>

                <input name="cadastro" type="submit" class="botao-cadastrar" style="margin-top: 0;"
                    value="Cadastrar produto" />
            </form>

        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"
        integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/index.js"></script>
</body>

</html>