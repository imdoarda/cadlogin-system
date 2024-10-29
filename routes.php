<?php

//inclui arquivos de controlador necessários para lidar com diferentes ações
require 'controllers/AuthController.php'; // inclui o controlador de autenticação
require 'controllers/UserController.php'; // inclui o controlador de usuários
require 'controllers/DashboardController.php'; //inclui o controlador de dashboard

//cria instâncias dos controladores para utilizar seus métodos
$authController = new AuthController(); // Instancia controlador de autenticação
$userController = new UserController(); // Instancia controlador de usuário
$dashboardController = new DashboardController(); // Instancia controlador dashboard

//coleta a ação de URL, se não houver ação definida, usa 'login' como padrão
$action = $_GET['action'] ?? 'login'; //usa operador de coalescência nula (??) para definir 'login' se 'action' não estiver presente

switch ($action) {
    case "login":
        $authController->login(); // Chama o método de login do controlador de autenticação
        break;
    case "register":
        $userController->register();
        break;
    case "dashboard":
        $dashboardController->index();
        break;
    case "logout":
        $authController->logout();
        break;
    case "list":
        $userController->list();
        break;
    case 'edit':
        $id = $_GET['id'];
        $userController->edit($id);
        break;
    default:
        $authController->login();
        break;
}
