<?php 

 require_once 'C:\xampp\htdocs\posts-memes/app/module/Postagem.php';
 require_once 'C:\xampp\htdocs\posts-memes/app/module/Usuario.php';
 require_once 'C:\xampp\htdocs\posts-memes/app/module/Curtidas.php';
 require_once 'C:\xampp\htdocs\posts-memes/app/module/Seguidores.php';
 require_once 'C:\xampp\htdocs\posts-memes/app/controller/Controller.php';
    class ControllerHome extends Controller{
        private $postagem;
        private $curtidas;
        private $seguidores;

        public function __construct()
        {
            parent::__construct();
            $this->curtidas = new Curtidas();
            $this->postagem = new Postagem();
            $this->seguidores = new Seguidores();
        }
        public function deleteCurtida($id_postagem,$id_usuario){
            $this->curtidas->deleteCurtida($id_postagem,$id_usuario);
        }
        public function addCurtida($id_postagem,$id_usuario){
            $this->curtidas->addCurtida($id_postagem,$id_usuario);
        }
        public function verCurtida($id_postagem, $id_usuario){
            return $this->curtidas->verificaCurtida($id_postagem, $id_usuario);
        }
        public function getCurtidas($id_postagem){
            return $this->curtidas->qtdCurtida($id_postagem);
        }
        public function getSeguidores($id_usuario){
            return $this->seguidores->qtdSeguidores($id_usuario);
        }
        public function getPostagensAll(){
            return $this->postagem->getPostagensAll();
        }
        public function postagemUnica($id){
            return $this->postagem->unicaPostagem($id);
        }

    }
?>