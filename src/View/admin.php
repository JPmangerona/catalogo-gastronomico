<?php
// Dados recebidos do ReadProductController: $produtos
?>


<!doctype html>
<html lang="pt-br" style="background-color:#FFFFFF;">

<head>
  <meta charset="UTF-8">
  <meta name="color-scheme" content="light">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-junior.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Junior Rivoredo - Admin</title>
</head>

<body>
  <a href="/logout" class="botao-logout">Sair do Painel</a>
  <main>
    <section class="container-admin-banner">
      <img src="/img/logo-junior-horizontal.png" class="logo-admin" alt="logo-serenatto">
      <h1>Administrador painel</h1>
      <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
    </section>
    <h2>Lista de Produtos</h2>

    <section class="container-table">
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Produto</th>
              <th>Tipo</th>
              <th>Descrição</th>
              <th>Valor</th>
              <th colspan="2">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produtos as $produto): ?>
              <tr>
                <td><?= $produto->getNome() ?></td>
                <td><?= $produto->getTipo() ?></td>
                <td><?= $produto->getDescricao() ?></td>
                <td><?= $produto->getPrecoFormatado() ?></td>
                <td><a class="botao-editar" href="/admin/editar?id=<?= $produto->getId() ?>">Editar</a></td>
                <td>
                  <button class="botao-excluir" data-id="<?= $produto->getId() ?>"
                    onclick="excluirProduto(this)">Excluir</button>
                </td>
              </tr>
            <?php endforeach; ?>


          </tbody>
        </table>
      </div>
      <a class="botao-cadastrar" href="/admin/cadastrar">Cadastrar produto</a>
    </section>
  </main>

  <script>
    function excluirProduto(btn) {
      const id = btn.dataset.id;
      if (!confirm('Tem certeza que deseja excluir este produto?')) return;

      btn.disabled = true;
      btn.textContent = 'Excluindo...';

      const formData = new FormData();
      formData.append('id', id);

      fetch('/admin/excluir', {
        method: 'POST',
        body: formData
      })
        .then(response => {
          if (response.ok || response.redirected) {
            // Remove a linha da tabela sem recarregar
            const row = btn.closest('tr');
            row.style.transition = 'opacity 0.3s';
            row.style.opacity = '0';
            setTimeout(() => row.remove(), 300);
          } else {
            alert('Erro ao excluir o produto.');
            btn.disabled = false;
            btn.textContent = 'Excluir';
          }
        })
        .catch(() => {
          alert('Erro de conexão.');
          btn.disabled = false;
          btn.textContent = 'Excluir';
        });
    }
  </script>
</body>

</html>