<?php

    require_once 'models/database.php';

    class User 
    {
        //função para encontrar o email do usuário
        public static function findByEmail($email){
            //obter conexão como banco de dados
            $conn = Database::getConnection();
            //prepara consulta sql para buscar usuário pelo email
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");

            $stmt->execute(['email' => $email]);

            //retorno de dados do usuário encontrado como um array associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
            //fetch busca a proxima linha de um resultado(localizou o resultado)
        }

        //cria função que localiza usuário por ID
        public static function find($id){

            //obtem a conexão com o banco de dados
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        //função p/ criar usuário na base de dados
        public static function create($data){
            $conn = Database::getConnection();
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)");

            $stmt->execute($data);
        }
    }

?>