<?php 
    require_once 'C:\xampp\htdocs\posts-memes/app/config/ConfigDataBase.php';
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
    public function adcionaImg($foto){

    }

}
?>