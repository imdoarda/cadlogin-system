  # Sistema de Cadastro e Login (CadLogin-System)

# ÍNDICE:
* [Introdução](#introdu%C3%A7%C3%A3o)
* [Funcionalidades](#funcionalidades)
* [Tecnologias Utilizadas](#tecnologias-utilizadas)
* [Estrutura de Arquivos](#estrutura-de-arquivos)
* [Passo a Passo](#passo-a-passo-para-uso)
* [Telas](#telas)
* [Autores](#autores)  

## Introdução 
Este é um sistema básico de autenticação de usuários, desenvolvido em PHP, que inclui funcionalidades de login, registro e gerenciamento de usuários com controle de acesso baseado em papéis (admin, gestor, colaborador). Ele foi projetado para servir como exemplo de CRUD (Create, Read, Update, Delete) e pode ser utilizado para aprender ou implementar pequenos projetos.

## Funcionalidades

* Cadastro de usuários com diferentes perfis (Admin, Gestor, Colaborador).
  ![image](https://github.com/user-attachments/assets/75746251-e3f2-4229-a1b1-988a8b0908dc)

* Login e Logout com validação de credenciais.
  ![image](https://github.com/user-attachments/assets/2e7a9128-06de-4c9a-bd09-50bd0472c190)

* Gestão de sessão para controle de acesso.
  
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

                  header('Location: index.php?action=dashboard');

                }else{
                    echo "Email ou senha incorretos";
                }
                }else{
                include 'views/login.php';
                }
                }
                }
                ?>
  

* Mudança de rotas com base no perfil do usuário.
  
          <?php

          //inclui arquivos de controlador necessários para lidar com diferentes ações
          require 'controllers/AuthController.php'; // inclui o controlador de autenticação
          require 'controllers/UserController.php'; // inclui o controlador de usuários
          //require 'controllers/DashboardController.php'; //inclui o controlador de dashboard

          //cria instâncias dos controladores para utilizar seus métodos
          $authController = new AuthController(); // Instancia controlador de autenticação
          $userController = new UserController(); // Instancia controlador de usuário
          //$dashboardController = new DashboardController(); // Instancia controlador dashboard

          //coleta a ação de URL, se não houver ação definida, usa 'login' como padrão
          $action = $_GET['action'] ?? 'login'; //usa operador de coalescência nula (??) para definir 'login' se 'action' não estiver presente

          switch ($action) {
          case 'login':
           $authController->login(); // chama o método de longin do controlador de autentificação
          break;
          case 'register':
          $userController->register();
          break;
          default:
          $authController->login();
          break;
          }
* Servidor Apache com suporte a PHP.
 ![image](https://github.com/user-attachments/assets/d12d6ef5-f00a-461f-8494-30f0244e947c)

* Banco de dados MySQL.
   ``Tabelas codificadas no banco de dados:``
  
        CREATE DATABASE sistema_usuarios;
 
        USE sistema_usuarios;
 
        CREATE TABLE usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            senha VARCHAR(255) NOT NULL,
            perfil ENUM('admin', 'gestor', 'colaborador') NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ');

## Tecnologias Utilizadas

* 	``MySQL 5.2.0``
*   ``PHP 7.4.30``
*   ``HTML 5``
*   ``CSS3``
*   ``GIT HUB``
*   ``APACHE 2.4.54``
*   ``XAMPP 3.3.0``

## Estrutura de Arquivos

* controllers/: Contém as regras de negócio e lógica de controle das funcionalidades (login, logout, registro, etc.).
* models/: Gerencia a interação com o banco de dados, com funções para manipulação de usuários e outras tabelas.
* views/: Responsável pelo front-end, com os arquivos de visualização (HTML/PHP).
* auth.php: Arquivo de configuração do banco de dados e lógica de autenticação.
* routes.php: Define as rotas do sistema para navegação entre as páginas.
* database.sql: Arquivo SQL com a estrutura do banco de dados necessária para o sistema.
  
## Passo a passo para uso

``I- ``Para registrar um novo usuário, acesse a página de cadastro e preencha os campos.
``II- ``Após o cadastro, faça login com suas credenciais.  
``III- ``Dependendo do perfil de usuário (admin, gestor, colaborador), você terá acesso a diferentes funcionalidades no painel.

# TELAS:

##  ``TELA DE LOGIN:``
![Captura de tela 2024-09-30 113820](https://github.com/user-attachments/assets/681d6167-c185-4198-a93b-2c833816d2fe)



##  ``TELA DE CADASTRO:``
![Captura de tela 2024-09-30 113839](https://github.com/user-attachments/assets/126364ce-1898-485d-93d7-7aeac46ab1af)


### ``OPÇÕES DE USUÁRIOS:``  
![image](https://github.com/user-attachments/assets/96c25e9b-54fb-484e-8a99-8d3e421ec3d4)



## Autores

[<img loading="lazy" src="https://avatars.githubusercontent.com/u/127868962?v=4" width=115><br><sub>Maria Eduarda Mendes</sub>](https://github.com/imdoarda) - Essa documentação foi feita com o intuito de ajudar a entender o propósito do projeto, como instalá-lo, usar e contribuir.
