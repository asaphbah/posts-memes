<?php
    require_once 'C:\xampp\htdocs\posts-memes/app/module/Login.php';
   // if (session_status() == PHP_SESSION_NONE) {session_start();}

   if (!isset($_SESSION)) {
    session_start();
}
class ControllerLogin {
    private $senha;
    private $email;
    private $valido;

    public function __construct($email, $senha) {
        $this->senha = $senha ?? '';
        $this->email = $email ?? '';
        $this->valido = false;
    }

    public function login() {
        $login = new Login();
        if ($login->validar_login($this->email, $this->senha)) {
            $_SESSION['email'] = $login->getEmail();
            $this->valido = true;
        }
    }

    public function getValido() {
        return $this->valido;
    }
}
?>