<?php 
    require_once 'C:\xampp\htdocs\posts-memes/app/config/ConfigDataBase.php';
class Comissao extends Connect{

    private $id;

    public function __construct()
    {
        parent::__construct();
    }
    public function getComissaoCliente($id_cliente){
        $query = "SELECT * FROM comissao WHERE id_cliente = :id_cliente";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getComissaoArtista($id_artits){
        $query = "SELECT * FROM comissao WHERE id_artista = :id_artists";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id_artists', $id_artits, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aceitaComissao($id, $id_cliente, $id_artista){
        $query = "UPDATE comissao SET validado = true WHERE id_cliente = :id_cliente AND id_artista = :id_artista AND id = :id;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':id_artista', $id_artista, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function recusaComissao($id, $id_cliente,$id_artista){
        $query = "UPDATE comissao SET validado = false WHERE id_cliente = :id_cliente AND id_artista = :id_artista AND id = :id;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':id_artista', $id_artista, PDO::PARAM_INT);
        $stmt->execute();
    }  
}
?>