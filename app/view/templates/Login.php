<?php
  require_once 'C:\xampp\htdocs\posts-curtidas-login/app/controller/ControllerLogin.php';



  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['sair'])) {
     $_SESSION['email'] = 'vazio';
    }

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) || isset($_POST['senha']) ) {
        $controllerLogin = new ControllerLogin($_POST['email'],$_POST['senha']);
    $controllerLogin->Login();
    if ($controllerLogin->getValido()) {
        header('Location:index.php?pagina=conta');
        exit;
    } else {
        header('Location:index.php?pagina=login&erro=erro');
    }
    }
}
/*<?php if(isset($erro)): ?><p><?php echo $erro; ?></p><?php endif; ?>*/
?>
   <form class="login-form" method="post" action="">
        <label for="email">
            <h2>Email</h2>
            <input type="email" name="email" id="email">
        </label>
        <label for="">
            <h2>Senha</h2>
            <input type="password" name="senha" id="senha">
        </label>
        <button type="submit" class="btn">Logar</button>
        <a href="index.php?pagina=cadastro">cadastrar-se</a>
   </form>