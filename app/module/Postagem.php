<?php 
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/config/ConfigDataBase.php';
class Postagem extends Connect{

    private $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getPostagensAll()
    {
        $query = "SELECT * FROM postagem";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvaPostagem($img, $descricao, $id_usuario)
    {
        $query = "INSERT INTO postagem (img, descricao, id_usuario) VALUES (:img, :descricao, :id_usuario)";
        $stmt = $this->connection->prepare($query);
        $stmt->binParam(':img', $img, PDO::PARAM_STR);
        $stmt->binParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->binParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function removePostagem($id)
    {
        $query = "DELETE FROM postagem WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function unicaPostagem($id)
    {
        $query = "SELECT postagem WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getPostagensUsuario($id){
        $query = "SELECT * FROM postagem WHERE id_usuario = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>