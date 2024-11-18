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

        <!DOCTYPE html>
      <html lang="pt-br">
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
      <title>Cadastre-se</Cadastre-se></title>
      </head>
      <body>
        <div>
            <h2>Cadastro de Usuário</h2>
            <form action="index.php?action=register" method="post">
            <label for="">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="">Senha</label>
            <input type="password" name="senha" id="senha" required>

            <label for="">Perfil:</label>
            <select name="perfil" id="perfil">
                <option value="admin">Admin</option>
                <option value="gestor">Gestor</option>
                <option value="colaborador">Colaborador</option>
            </select>
            <button type="submit">Cadastrar</button>
          </form>
            <a href="index.php?action=login">Voltar ao Login</a>
        </div>
        </body>
        </html>

* Login validação de credenciais.

        <!DOCTYPE html>
      <html lang="pt-br">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
        <title>Login</title>
      </head>
      <body>
      <main>
        <form action="index.php?action=login" method="post">
            <!--cria duas seções diferentes-->
            <section>
                <label for="">Email</label>
                <input type="email" name="email" placeholder="email" required>
            </section>
            <section>
                <label for="">Senha</label>
                <input type="password" name="senha" placeholder="Senha" required>
            </section>
            <button type="submit">Login</button>
        </form>
        <a href="index.php?action=register">Cadastre-se</a>
        </main>
      </body>
      </html>

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

* Função usada para editar usuários:
 
         public static function update($id, $data){
         $conn = Database::getConnection();
         //Prepara a consulta SQL para atualização dos dados do usuário
         $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, perfil = :perfil WHERE id = :id");

         //set = define valores 
        
         $data['id'] = $id;
         $stmt->execute($data);
        }

![editar](https://github.com/user-attachments/assets/961610aa-ca3d-4404-a2ae-5548ab2b02c0)


* Função usada para excluir usuários:
   
           // Função para exclusão de usuário pelo ID
           public static function delete($id) {
          $conn = Database::getConnection();
          $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
          $stmt->execute(["id" => $id]);
          }

![excluir](https://github.com/user-attachments/assets/f64ef388-592a-47d6-bbec-6aea1ade6d13)

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
        * admin - o administrador é capaz de excluir e editar usuários;
        * gestor - o gestor é capaz de editar usuários;
        * colaborador - o colaborador não realiza nenhuma das atividades que os outros dois usuários são capazes de fazer.

# TELAS:

##  ``TELA DE LOGIN:``  

![Captura de tela 2024-11-17 212057](https://github.com/user-attachments/assets/435ccbaf-14ba-4411-8580-1cbc7ba31d28)



##  ``TELA DE CADASTRO:``  

![Captura de tela 2024-11-17 212625](https://github.com/user-attachments/assets/e94fbb1d-4a67-4b13-961c-f06ad7c3d31d)



### ``OPÇÕES DE USUÁRIOS:``  

![Captura de tela 2024-11-17 212635](https://github.com/user-attachments/assets/a869c16f-65fe-41d9-ba63-f855fe402603)




## ``TELA DO ADMINISTRADOR APÓS LOGIN``

![Captura de tela 2024-11-17 212757](https://github.com/user-attachments/assets/20a83a12-b6d9-4185-8f73-0181c8b541b3)



### ``LISTAGEM DE USUÁRIOS PARA ADMINISTRADOR``

![Captura de tela 2024-11-17 212817](https://github.com/user-attachments/assets/055ae892-c304-4605-b246-60be359cd003)



## ``TELA DO GESTOR APÓS LOGIN``

![Captura de tela 2024-11-17 212852](https://github.com/user-attachments/assets/b7af1153-9695-4a32-a128-1643625d3006)



### ``LISTAGEM DE USUÁRIOS PARA GESTOR``

![Captura de tela 2024-11-17 212909](https://github.com/user-attachments/assets/042b8db0-db18-4744-b2b3-fbe0310d026f)



## ``TELA DO USUÁRIO APÓS LOGIN``

![Captura de tela 2024-11-17 212940](https://github.com/user-attachments/assets/74a9b3e2-861e-43ac-9219-55b3a05e6cf8)



## Autores

[<img loading="lazy" src="https://avatars.githubusercontent.com/u/127868962?v=4" width=115><br><sub>Maria Eduarda Mendes</sub>](https://github.com/imdoarda)   
Essa documentação foi feita com o intuito de ajudar a entender o propósito do projeto, como instalá-lo, usar e contribuir.
