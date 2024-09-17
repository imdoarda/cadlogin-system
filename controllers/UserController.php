<?php

class UserController{

    public function register(){
        //verifica se a requisição HTTP é do tipo POST(se o formulário foi enviado)
        if($_SERVER['REQUEST_METHOD'] == 'POST'){//pega informação do servidor em tempo de execução
            //coleta os dados enviados pelo formulário e organiza em um array
            $data = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), //criptografa a senha
                'perfil' => $_POST['perfil']
            ];
            //chama o método create do model User para criar o novo usuário no BD
            User::create($data);
            header('Location: index.php');
        } else{
            include 'views/register.php';
        }
        
    }
}

?>