<?php

use MVC\Controller\AdminController;
use MVC\Controller\CreateProductController;
use MVC\Controller\DeleteProductController;
use MVC\Controller\HomeController;
use MVC\Controller\LoginController;
use MVC\Controller\LogoutController;
use MVC\Controller\UpdateProductController;

return [
    'GET|/' => HomeController::class,
    'GET|/admin' => AdminController::class,
    'GET|/admin/cadastrar' => CreateProductController::class,
    'POST|/admin/cadastrar' => CreateProductController::class,
    'GET|/admin/editar' => UpdateProductController::class,
    'POST|/admin/editar' => UpdateProductController::class,
    'POST|/admin/excluir' => DeleteProductController::class,
    'GET|/login' => LoginController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
];
