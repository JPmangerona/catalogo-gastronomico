<?php
declare(strict_types=1);

namespace MVC\Controller;

use MVC\Repository\UsuarioRepository;
use PDO;

class LoginController implements Controller
{
    private UsuarioRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new UsuarioRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../View/login.php';
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        $usuario = $this->repository->buscarPorEmail((string) $email);

        $correctPassword = false;
        if ($usuario) {
            $correctPassword = password_verify($senha, $usuario->getSenha());
        }

        if ($usuario && $correctPassword) {
            $_SESSION['logado'] = true;
            header('Location: /admin');
            return;
        }


        header('Location: /login?sucesso=0');
    }
}
