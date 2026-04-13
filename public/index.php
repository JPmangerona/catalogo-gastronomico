<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MVC\Controller\Controller;

session_start();
session_regenerate_id();

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($pathInfo === null || $pathInfo === '') {
    $pathInfo = '/';
}
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

// Verificação de Segurança (Login)
if (str_starts_with($pathInfo, '/admin') && !isset($_SESSION['logado'])) {
    header('Location: /login');
    exit();
}

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];

    // Conexão com o banco 
    require_once __DIR__ . '/../config/db-connection.php';

    /** @var Controller $controller */
    $controller = new $controllerClass($pdo);
    $controller->processaRequisicao();
} else {
    header("Location: /");
    exit();
}
