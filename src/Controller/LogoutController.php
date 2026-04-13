<?php
declare(strict_types=1);

namespace MVC\Controller;

use PDO;

class LogoutController implements Controller
{
    public function __construct(PDO $pdo)
    {
    }

    public function processaRequisicao(): void
    {
        session_destroy();
        header('Location: /');
    }
}
