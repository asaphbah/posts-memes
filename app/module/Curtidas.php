<?php
    require_once 'C:\xampp\htdocs\posts-memes/app/config/ConfigDataBase.php';

    class Curtidas extends Connect{

        public function __construct()
        {
            parent::__construct();
        }
        public function addCurtida($id_postagem, $id_usuario) {
            $query = "INSERT INTO curtidas (id_usuario, id_postagem) VALUES (:id_usuario, :id_postagem)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_postagem', $id_postagem, PDO::PARAM_INT);
            $stmt->execute();
        }
        public function deleteCurtida($id_postagem, $id_usuario){
            $query = "DELETE FROM curtidas WHERE id_postagem = :id_postagem AND id_usuario = :id_usuario";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_postagem', $id_postagem, PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
        }
        public function qtdCurtida($id_postagem){
            $query = "SELECT COUNT(*) AS num_curtidas FROM curtidas WHERE id_postagem = :id_postagem";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_postagem', $id_postagem, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['num_curtidas'];
        }
        public function verificaCurtida($id_postagem, $id_usuario){
            $query = "SELECT COUNT(*) AS verifica FROM curtidas WHERE id_postagem = :id_postagem AND id_usuario = :id_usuario";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_postagem', $id_postagem, PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['verifica'];
        }
    }
?>