<?php

namespace MVC\Controller;

use MVC\Model\Produto;
use MVC\Repository\ProdutoRepository;
use PDO;

class UpdateProductController implements Controller
{
    private ProdutoRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new ProdutoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if ($id === null || $id === false) {
                header('Location: /admin?sucesso=0');
                return;
            }
            $produto = $this->repository->buscar($id);

            if ($produto === null) {
                header('Location: /admin?sucesso=0');
                return;
            }

            require_once __DIR__ . '/../View/update-product.php';
            return;
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);


        $precoRaw = $_POST['preco'] ?? '';
        $precoLimpo = str_replace('.', '', $precoRaw);
        $precoLimpo = str_replace(',', '.', $precoLimpo);
        $preco = filter_var($precoLimpo, FILTER_VALIDATE_FLOAT);

        if ($preco !== false && $preco > 9999.99) {
            header("Location: /admin/editar?id=$id&erro_preco=1");
            return;
        }

        if (strlen($nome) > 100) {
            header("Location: /admin/editar?id=$id&erro_nome=1");
            return;
        }

        if (strlen($descricao) > 200) {
            header("Location: /admin/editar?id=$id&erro_descricao=1");
            return;
        }

        if (!$id || !$nome || !$tipo || !$descricao || $preco === false) {
            header("Location: /admin/editar?id=$id&sucesso=0");
            return;
        }

        $produto = new Produto(
            (int) $id,
            $tipo,
            $nome,
            $descricao,
            (float) $preco
        );

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $nomeImagem = uniqid() . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../../public/img/' . $nomeImagem);
            $produto->setImagem($nomeImagem);
        } else {
            $produtoAntigo = $this->repository->buscar((int) $id);
            $produto->setImagem($produtoAntigo->getImagem());
        }

        $this->repository->atualizar($produto);

        header("Location: /admin?sucesso=1");
    }
}
