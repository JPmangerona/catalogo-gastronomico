<?php
declare(strict_types=1);

namespace MVC\Repository;

use MVC\Model\Usuario;
use PDO;

class UsuarioRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarPorEmail(string $email): ?Usuario
    {
        $sql = 'SELECT * FROM usuarios WHERE email = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        if ($dados === false) {
            return null;
        }

        return new Usuario(
            (int) $dados['id'],
            $dados['email'],
            $dados['senha']
        );
    }
}
