<?php 
   require_once 'C:\xampp\htdocs\posts-memes/app/module/Insert.php';

    class ControllerCadastro{

        private $cadastro;
        //---------------//

    public function __construct()
    {
        $this->cadastro = new Insert(); // Instancia um novo objeto da classe Usuario
    }
    public function Verifica($nome,$email,$senha,$descricao,$codinome, $foto){

     
    }
    public function fotoInsere($foto){
       
        
    }
    public function insert($nome, $email, $senha, $descricao, $foto, $codinome){
        
    }
}
?>