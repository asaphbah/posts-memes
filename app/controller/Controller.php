<?php 

require_once 'C:\xampp\htdocs\posts-memes/app/module/Usuario.php';
 class Controller{

        private $usuario;  

    public function __construct()
    {
        $this->usuario = new Usuario();

    }
    public function getIdUsuario($email){
        return $this->usuario->getIdUsuario($email);
    }
    public function getConta($id){
        return $this->usuario->getUsuario($id);
    }

 }
?>
	