<?php

namespace MVC\Controller;

use MVC\Repository\ProdutoRepository;
use PDO;

class AdminController implements Controller
{
    private ProdutoRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new ProdutoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $produtos = $this->repository->buscarTodos();
        require_once __DIR__ . '/../View/admin.php';
    }
}
