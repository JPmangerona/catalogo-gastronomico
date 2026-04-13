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
  <title>Junior Rivoredo - Editar Produto</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <img src="/img/logo-junior-horizontal.png" class="logo-admin" alt="logo-junior">
      <h1>Editar Produto</h1>
      <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form method="post" enctype="multipart/form-data">

        <label for="nome">Nome</label>
        <?php if (isset($_GET['erro_nome']) && $_GET['erro_nome'] === '1'): ?>
          <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Nome muito grande (máximo 100
            caracteres)</p>
        <?php endif; ?>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto"
          value="<?= $produto->getNome() ?>" required>

        <div class="container-radio">

          <div>
            <label for="doce">Doce</label>
            <input type="radio" id="doce" name="tipo" value="Doce" <?= $produto->getTipo() == "Doce" ? "checked" : "" ?>>
          </div>
          <div>
            <label for="salgado">Salgado</label>
            <input type="radio" id="salgado" name="tipo" value="Salgado" <?= $produto->getTipo() == "Salgado" ? "checked" : "" ?>>
          </div>
        </div>

        <label for="descricao">Descrição</label>
        <?php if (isset($_GET['erro_descricao']) && $_GET['erro_descricao'] === '1'): ?>
          <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Descrição muito longa (máximo
            200 caracteres)</p>
        <?php endif; ?>
        <input type="text" name="descricao" id="descricao" value="<?= $produto->getDescricao() ?>"
          placeholder="Digite uma descrição" required>

        <label for="preco">Preço</label>
        <?php if (isset($_GET['erro_preco']) && $_GET['erro_preco'] === '1'): ?>
          <p style="color: crimson; font-weight: bold; font-size: 14px; margin-bottom: 5px;">Valor inválido(máximo 6
            caracteres)</p>
        <?php endif; ?>
        <input type="text" name="preco" id="preco" value="<?= number_format($produto->getPreco(), 2, ',', '.') ?>"
          placeholder="Digite o preço" required>

        <p style="color:#EBC181; margin: 5px 0 3px; font-size: 16px; font-weight: bold;">Imagem atual:</p>
        <img id="imagem-preview" src="<?= $produto->getImagemDiretorio() ?>" alt="Imagem atual do produto"
          style="width:160px; height:160px; object-fit:cover; border-radius:8px; border:2px solid #EBC181; margin-bottom:5px;">

        <label>Envie uma nova imagem do produto</label>
        <label for="imagem" class="btn-escolher">Escolher arquivo</label>
        <input type="file" name="imagem" accept="image/*" id="imagem" style="display: none;">
        <span id="file-name" style="font-size: 14px; color: #EBC181; display: block; margin-bottom: 5px;"></span>

        <script>
          document.getElementById('imagem').addEventListener('change', function (e) {
            var fileNameSpan = document.getElementById('file-name');
            var imgPreview = document.getElementById('imagem-preview');

            if (this.files && this.files.length > 0) {
              fileNameSpan.textContent = this.files[0].name;
              imgPreview.src = URL.createObjectURL(this.files[0]);
            } else {
              fileNameSpan.textContent = '';
            }
          });
        </script>

        <input type="hidden" name="id" value="<?= $produto->getId() ?>">
        <input type="submit" name="editar" class="botao-cadastrar"
          style="margin-top: 0; background-color: #2d4dc2; color: #FFFFFF;" value="Editar produto" />
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