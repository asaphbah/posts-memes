<?php require_once 'C:\xampp\htdocs\posts-curtidas-login/app/controller/ControllerHome.php';

    session_start();

    // instancia a Controller
    $homeController = new ControllerHome();
    //sistema de curtidas
    if (isset($_GET['curti'])) {
        if ($_GET['curti'] == 'curtir') {
            $homeController->addCurtida($_GET['id_postagem'], $_GET['id_usuario']);
        }else {
            $homeController->deleteCurtida($_GET['id_postagem'], $_GET['id_usuario']);
        }
    }
    // obtém todas as postagens
    $postagens = $homeController->getPostagensAll();
    $usuario = $homeController->getIdUsuario($_SESSION['email']);
    $userPerfil = $homeController->getConta($usuario['id']);

?>  
        <header>
            <nav>
                <a class="ancora" href="index.php?pagina=home">home</a>
                <a class="ancora" href="index.php?pagina=conta">conta</a>
            </nav>

            <?php if (isset($_SESSION['email'])): ?>
               <?php  $userMenu = $homeController->getIdUsuario($_SESSION['email'])?>
              
                <a href="index.php?pagina=login&sair=sair" class="btn-ancora"><button type="submit" class="btn">sair</button></a>

                <a href="index.php?pagina=conta" class="ancora-nav-user">
                    <figure class="nav-user">
                        <img class="nav-img" src="img/user/<?= $userPerfil['foto']?>" alt="">
                    </figure>
                </a>

            <?php else: ?>

                <a href="index.php?pagina=login" class="btn-ancora"><button type="submit" class="btn">Entrar</button></a>

                <a href="index.php?pagina=login" class="ancora-nav-user">
                    <figure class="nav-user">
                        <img class="nav-img" src="img/user/" alt="">
                    </figure>
                </a>

            <?php endif; ?>
        </header>
        <ul class="user-post">
            <!--Inicio do sistema de printar as diversas postagens-->
            <?php foreach($postagens as $postagem){?>
            <li class="cont-post-home">
               <?php $user = $homeController->getConta($postagem['id_usuario'])?>
                <div class="dono-post">
                    <figure class="foto-user">
                        <img class="user-post-foto" src="img/user/<?= $user['foto']?>" alt="">
                    </figure>
                    <p class="text-home"><?= $user['codinome']?></p>
                </div>
                <div class="post">
                    <figure class="cont-img-post">
                        <img class="img-post" src="img/post/<?= $postagem['img']?>" alt="">
                    </figure>
                    <div class="descri-post">
                        <p class="text-post"><?= $postagem['descricao']?></p>
                        <?php $curtida = $homeController->getCurtidas($postagem['id'])?>

                        <!-- Inicio do sistema de curtida-->
                        <?php 
                        $id_postagem = $postagem['id'];
                        ?>
                        <a href="index.php?paginas=home&curti=<?= $homeController->verCurtida($postagem['id'],$usuario['id']) == 1 ? 'descurtir' : 'curtir' ?>&id_postagem=<?= $id_postagem ?>&id_usuario=<?= $usuario['id']?>" style="cursor: pointer;">
                            <img class="img-curtida" src="<?= $homeController->verCurtida($postagem['id'],$usuario['id']) == 1 ? 'img/sistema/curtido.png' : 'img/sistema/curtir.png' ?>">
                        </a>
                        <!-- Fim do sistema de curtida-->
                    </div>
                </div>
            </li> 
            <?php }?>
             <!--Fim do sistema de printar as diversas postagens-->
        </ul>