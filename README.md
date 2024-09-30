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
* Login e Logout com validação de credenciais.
* Gestão de sessão para controle de acesso.
* Painel de controle para visualização e edição de usuários.
* Proteção de rotas com base no perfil do usuário.
* Servidor Apache ou com suporte a PHP.
* Banco de dados MySQL.
  ## Tabelas codificadas no banco de dados:

## Tecnologias Utilizadas

* 	``MySQL``
*   ``PHP 8.2``
*   ``HTML 5``
*   ``CSS3``
*   ``GIT HUB``
*   ``APACHE``
*   ``XAMPP``

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
