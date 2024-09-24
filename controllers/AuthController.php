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
        }
    }
}
?>