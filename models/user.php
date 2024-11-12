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

        // Função para listar todas as informações dos usuários no BD
    public static function all() {
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM usuarios");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function update($id, $data){
        $conn = Database::getConnection();
        //Prepara a consulta SQL para atualização dos dados do usuário
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, perfil = :perfil WHERE id = :id");

        //set = define valores 
        
        $data['id'] = $id;
        $stmt->execute($data);
    }
     // Função para exclusão de usuário pelo ID
     public static function delete($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }
}


?>