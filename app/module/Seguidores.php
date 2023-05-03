<?php
    require_once 'C:\xampp\htdocs\posts-memes/app/config/ConfigDataBase.php';

    class Seguidores extends Connect{

        public function __construct()
        {
            parent::__construct();
        }
        public function setSeguidor($id_seguido, $id_seguidores){
            $query = "INSERT INTO seguidores (id_seguidores, id_seguido) VALUES (:id_seguidores, :id_seguido)";
            $stmt = $this->connection->prepare($query);
            $stmt->binParam(':id_seguidores', $id_seguidores, PDO::PARAM_STR);
            $stmt->binParam(':id_seguido', $id_seguido, PDO::PARAM_INT);
            $stmt->execute();
        }
        public function deleteSeguidor($id_seguido, $id_seguidores){
            $query = "DELETE FROM seguidores WHERE id_seguidores = :id_seguidores, id_seguido = :id_seguido";
            $stmt = $this->connection->prepare($query);
            $stmt->binParam(':id_seguidores', $id_seguidores, PDO::PARAM_STR);
            $stmt->binParam(':id_seguido', $id_seguido, PDO::PARAM_INT);
            $stmt->execute();
        }
        public function qtdSeguidores($id_seguido){
            $query = "SELECT COUNT(*) AS num_seguidores FROM seguidores WHERE id_seguido = :id_seguido";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_seguido', $id_seguido, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['num_seguidores'];
        }
    }

?>