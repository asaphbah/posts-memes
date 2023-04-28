<?php
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Postagem.php';
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Usuario.php';
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Comissao.php';
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Curtidas.php';
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Seguidores.php';
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/controller/Controller.php';
    // inicia os objetos

    class ControllerConta extends Controller{
        private $comissao;
        private $postagem;
        private $seguidores;
        private $curtidas;

        public function __construct()
        {
            parent::__construct();
            $this->seguidores = new Seguidores( );
            $this->curtidas = new Curtidas();
            $this->postagem = new Postagem();
            $this->comissao = new Comissao();
        }
        public function getCurtidas($id_postagem){
            return $this->curtidas->qtdCurtida($id_postagem);
        }
        public function getSeguidores($id_usuario){
            return $this->seguidores->qtdSeguidores($id_usuario);
        }
        public function getPostagensUsuario($id){   
            return $this->postagem->getPostagensUsuario($id);
        }
        public function getComissaoUsuario($id, $tipo_usuario){
            if($tipo_usuario == 'artista') {
                return $this->comissao->getComissaoArtista($id);
            }else if($tipo_usuario == 'cliente'){
                return $this->comissao->getComissaoCliente($id);
            }else {
                return 'erro em encontrar as comissoes';
            }

        }
        public function postagemUnica($id){
            return $this->postagem->unicaPostagem($id);
        }



    } 
?>