<?php

namespace MVC\Controller;

use MVC\Repository\ProdutoRepository;
use PDO;

class DeleteProductController implements Controller
{
    private ProdutoRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new ProdutoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($id === null || $id === false) {
            header('Location: /admin?sucesso=0');
            return;
        }

        $this->repository->deletar($id);
        header("Location: /admin?sucesso=1");
        exit();
    }
}
