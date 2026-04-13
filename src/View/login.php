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
  <link rel="icon" href="img/icone-junior.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Junior Rivoredo - Login</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <img src="/img/logo-junior-horizontal.png" class="logo-admin" alt="logo-junior">
      <h1>Login Admin</h1>
      <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form action="/login" method="post">
        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] === '0'): ?>
          <p
            style="color: crimson; font-weight: bold; background: #ffe6e6; padding: 10px; border-radius: 5px; text-align: center; border: 1px solid crimson;">
            E-mail ou senha inválidos. Tente novamente.</p>
        <?php endif; ?>

        <label for="email">E-mail</label>
        <input name="email" type="email" id="email" placeholder="Digite o seu e-mail" required>

        <label for="password">Senha</label>
        <input name="senha" type="password" id="password" placeholder="Digite a sua senha" required>

        <input type="submit" class="botao-cadastrar" style="background-color: #EBC181; color: #000000;"
          value="Entrar" />
      </form>

    </section>
  </main>
</body>

</html>