  # Sistema de Cadastro e Login (CadLogin-System)

Este é um sistema básico de autenticação de usuários, desenvolvido em PHP, que inclui funcionalidades de login, registro e gerenciamento de usuários com controle de acesso baseado em papéis (admin, gestor, colaborador). Ele foi projetado para servir como exemplo de CRUD (Create, Read, Update, Delete) e pode ser utilizado para aprender ou implementar pequenos projetos.

## Funcionalidades

* Cadastro de usuários com diferentes perfis (Admin, Gestor, Colaborador).
* Login e Logout com validação de credenciais.
* Gestão de sessão para controle de acesso.
* Painel de controle para visualização e edição de usuários.
* Proteção de rotas com base no perfil do usuário.
* Instalação
* Requisitos:
* Servidor Apache ou Nginx com suporte a PHP.
* Banco de dados MySQL.

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


Essa documentação foi feita com o intuito de ajudar a entender o propósito do projeto, como instalá-lo, usar e contribuir.
