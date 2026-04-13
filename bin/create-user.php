<?php
declare(strict_types=1);

// Carrega a conexão com o banco ($pdo)
require_once __DIR__ . '/../config/db-connection.php';

if ($argc < 3) {
    echo "Uso: php create-user.php <email> <senha>" . PHP_EOL;
    exit(1);
}

$email = $argv[1];
$password = $argv[2];

// Seguindo a lógica do curso: PASSWORD_ARGON2ID
// O PHP usará o algoritmo Argon2id para criar um hash seguro.
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO usuarios (email, senha) VALUES (?, ?);';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $email);
$statement->bindValue(2, $hash);

if ($statement->execute()) {
    echo "Usuário $email criado com sucesso!" . PHP_EOL;
} else {
    echo "Erro ao criar usuário." . PHP_EOL;
}
