<?php
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/config/ConfigDataBase.php';
class Usuario extends Connect{

    private $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarioAll()
    {
        $query = "SELECT * FROM usuario";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function salvaUsuario($nome, $email, $descricao, $senha)
    {
        $query = "INSERT INTO usuario(nome, email, descricao, senha) VALUES (:nome, :email, :descricao, :senha)";
        $stmt = $this->connection->prepare($query);
        $stmt->bimParam(':nome',$nome, PDO::PARAM_STR);
        $stmt->bimParam(':email',$email, PDO::PARAM_STR);
        $stmt->bimParam(':descricao',$descricao, PDO::PARAM_STR);
        $stmt->bimParam(':senha',$senha, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function updateUsuario($id, $nome, $email, $descricao, $senha)
    {
        $query = "UPDATE INTO usuario(nome, email, descricao, senha) VALUES (:nome, :email, :descricao, :senha) WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bimParam(':nome',$nome, PDO::PARAM_STR);
        $stmt->bimParam(':email',$email, PDO::PARAM_STR);
        $stmt->bimParam(':descricao',$descricao, PDO::PARAM_STR);
        $stmt->bimParam(':senha',$senha, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getUsuario($id)
    {
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getIdUsuario($email)
    {
        $query = "SELECT id FROM usuario WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>