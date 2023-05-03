<?php
  require_once 'C:\xampp\htdocs\posts-memes/app/controller/ControllerLogin.php';



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
     <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid" >
              <a class="navbar-brand" href="#">TARTA</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link" href="?pagina=home">Home</a>
                  <a class="nav-link" href="?pagina=conta">conta</a>
                  <a class="nav-link " href="?pagina=cadastraPost">Post</a>
                </div>
              </div>
              <button type="button" class="btn btn-outline-primary btn-sair">Sair</button>
            <button type="button" class="btn btn-outline-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </button>
            </div>
          </nav>
        <form class="form-padrao" action="" method="post">
                <h1 class="login-h1">LOGIN</h1>
                <div class="login">
                  <div class="row mb-3">
                      <label for="inputEmail3" class="label-padrao col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="input-padrao form-control" >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputPassword3" class="label-padrao col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="senha" class="input-padrao form-control" >
                      </div>
                </div>
                <button class="btn btn-padrao" type="submit">ENTRAR</button>
                    <a href="?pagina=cadastro">cadastrar</a>
            </div>
        </form>