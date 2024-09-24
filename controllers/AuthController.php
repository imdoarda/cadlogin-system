<?php
//requer o arquivo user que contem o model user com as funções de manipulação de dados de usuários
require_once 'models/user.php';

class AuthController
{
    // função responsável processo de login
    public function login()//faz conexão c/ banco de dados
    {
        //verifica se a requisição http é do tipo POST, ou seja, se o formulário foi enviado
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //obter os valores do formulário
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            //chama o método do model para encontrar o usuário pelo email
            $user = User::findByEmail($email);

            if($user && password_verify($senha, $user['senha'])){//verifica se a senha corresponde a um hash
                session_start(); //armazena na sessão o ID do usuário que está logado e seu perfil
                $SESSION['usuario_id'] = $user ['id'];
                $_SESSION['perfil'] = $user['perfil'];
                header('');

            }
        }
    }
}
?>