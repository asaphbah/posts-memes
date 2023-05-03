<?php
require_once 'C:\xampp\htdocs\posts-memes/app/config/ConfigDataBase.php';

class Insert extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUsuario($nome, $email, $senha, $descricao, $foto, $codinome)
    {
        $query = "INSERT INTO usuario(nome, email, descricao, senha, foto, codinome) VALUES (:nome, :email, :descricao, :senha, :foto, :codinome)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
        $stmt->bindParam(':codinome', $codinome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertPostagem($id_usuario, $texto, $img)
    {
        $query = "INSERT INTO postagem(id_usuario , texto, img) VALUES (:id_usuario, :texto,:img)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);
        $stmt->bindParam(':img', $img, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletePostagem($id)
    {
        $query = "DELETE FROM postagem WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function uploadUsuario($id, $nome, $email, $senha, $descricao)
    {
        $query = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, descricao = :descricao WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function validaEmail($email){
        $query = "SELECT email FROM usuario WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($result); 
    }
    public function validaCodinome($codinome){
        $query = "SELECT codinome FROM usuario WHERE codinome = :codinome";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':codinome', $codinome, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($result); 
    }
}