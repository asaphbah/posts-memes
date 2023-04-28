<?php 
    require_once 'C:\xampp\htdocs\posts-curtidas-login/app/controller/ControllerConta.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    // Instancia a controller
    $contaController = new ControllerConta();
    // Obtém o ID do usuário a ser exibido
    $id_usuario = $contaController->getIdUsuario($_SESSION['email']); // Substitua pelo ID do usuário

    // Obtém informações do usuário
    $usuario = $contaController->getConta($id_usuario['id']);
    $nome_usuario = $usuario['nome'];
    $codinome_usuario = $usuario['codinome'];
    $email_usuario = $usuario['email'];
    $descricao_usuario = $usuario['descricao'];
    $foto_usuario = $usuario['foto'];

    // Obtém as postagens do usuário
    $postagens_usuario = $contaController->getPostagensUsuario($id_usuario['id']);
    $numero_seguidores = $contaController->getSeguidores($id_usuario['id']);
?>
 <header>
            <nav>
                <a class="ancora" href="index.php?pagina=home">home</a>
                <a class="ancora" href="index.php?pagina=conta">conta</a>
            </nav>

            <?php if (isset($_SESSION['email'])): ?>

                <a href="index.php?pagina=login&sair=sair" class="btn-ancora"><button type="submit" class="btn">sair</button></a>


            <?php else: ?>

                <a href="index.php?pagina=login" class="btn-ancora"><button type="submit" class="btn">Entrar</button></a>

            <?php endif; ?>
        </header>
        <div class="user">
            <figure class="user-photo">
                <img src="img/user/<?= $foto_usuario?>" alt="" srcset="">
                <h1 class="user-h1"><?= $codinome_usuario?></h1>
                <h2 class="user-h2">seguidores:<?= $numero_seguidores?></h2>
            </figure>
            <ul class="user-bio">
                <li class="user-dado"><?= $nome_usuario?></li>
                <li class="user-dado"><?= $email_usuario?></li>
                <li class="user-dado"><?= $descricao_usuario?></li>
            </ul>
        </div>
        <ul class="user-post">
            <?php foreach($postagens_usuario as $postagem){?>
            <li class="cont-post">
                <div class="post">
                    <figure class="cont-img-post">
                        <img class="img-post" src="img/post/<?= $postagem['img']?>" alt="">
                    </figure>
                    <div class="descri-post">
                        <p class="text-post"><?= $postagem['descricao']?></p>
                        <?php $curtida = $contaController->getCurtidas($postagem['id'])?>
                        <span class="curtida">CURTIDAS:<?=$curtida?></span>
                    </div>
                </div>
            </li> 
            <?php }?>
        </ul>