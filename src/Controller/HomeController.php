<?php

namespace MVC\Controller;

use MVC\Repository\ProdutoRepository;
use PDO;

class HomeController implements Controller
{
    private ProdutoRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new ProdutoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $dadosDoce = $this->repository->opcoesDoce();
        $dadosSalgado = $this->repository->opcoesSalgado();

        require_once __DIR__ . '/../View/home-product.php';
    }
}
