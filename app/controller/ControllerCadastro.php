<?php 
   require_once 'C:\xampp\htdocs\posts-curtidas-login/app/module/Usuario.php';

    class ControllerCadastro{

        private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }
    public function Verifica($nome,$email,$senha,$descricao){
        if(!preg_match('/^[a-zA-Z0-9_\-]+$/', $nome)) {
            return 'nome invalidado';
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'nome invalidado';
        }else if(!preg_match('/^[a-zA-Z0-9_\-]+$/', $senha) || strlen($senha) < 8){
            return 'senha invalida';
        }else if(!preg_match('/^[a-zA-Z0-9_\-\s]+$/', $descricao)){
            return 'descrição invalida';
        }
        return true;
    }
    public function Insert($nome, $email, $senha, $descricao){
        $this->usuario->salvaUsuario($nome, $email, $senha, $descricao);
    }

    }
?>