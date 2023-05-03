<?php
    require_once 'C:\xampp\htdocs/posts-memes/app/config/ConfigDataBase.php';
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