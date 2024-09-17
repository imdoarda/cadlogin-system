<?php

//inclui arquivos de controlador necessários para lidar com diferentes ações
require 'controllers/AuthController.php';// inclui o controlador de autenticação
require 'controllers/UserController.php'; // inclui o controlador de usuários
require 'controllers/DashboardController.php'; //inclui o controlador de dashboard

//cria instâncias dos controladores para utilizar seus métodos
$authController = new AuthController(); // Instancia controlador de autenticação
$userController = new UserController();// Instancia controlador de usuário
$dashboardController = new DashboardController(); // Instancia controlador dashboard

//coleta a ação de URL, se não houver ação definida, usa 'login' como padrão
$action = $_GET['action'] ?? 'login'; //usa operador de coalescência nula (??) para definir 'login' se 'action' não estiver presente

switch($action){
    case 'login':
        $authController->login();// chama o método de longin do controlador de autentificação
}
?>