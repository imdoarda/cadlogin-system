<?php

class DashboardController
{
    // Inicia uma sessão para verificar se o usuário está autenticado
    public function index() {
        session_start();

        if (!isset($_SESSION["usuario_id"])) {
            header("Location: index.php");
            exit;  // Garante que o script seja interrompido após o redirecionameto
        }

        // Se o usuário estiver autenticado, será incluída a View "dashboard.php" que exibe o painel de controle da aplicação
        include "views/dashboard.php";
    }
}

?>