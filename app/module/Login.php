<?php
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/config/ConfigDataBase.php';

class Login extends Connect {
    private $validado;
    private $email;

    public function __construct() {
        parent::__construct();
    }

    public function validar_login($email, $senha) {
        $query = "SELECT email FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->validado = true;
            $this->email = $result['email'];
            return true;
        } else {
            $this->validado = false;
            return false;
        }
    }

    public function getValidade() {
        return $this->validado;
    }

    public function getEmail() {
        return $this->email;;
    }
}
?>