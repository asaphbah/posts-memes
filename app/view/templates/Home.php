<?php 
    require_once 'C:\xampp\htdocs\posts-memes/app/controller/ControllerHome.php';

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
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid" >
              <a class="navbar-brand" href="#">TARTA</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="?pagina=home">Home</a>
                  <a class="nav-link" href="?pagina=conta">conta</a>
                  <a class="nav-link " href="?pagina=cadastroPost">Post</a>
                </div>
              </div>
              <?php if (isset($_SESSION['email'])): ?>
                    <a href="?pagina=login&sair=sair" class="btn btn-outline-primary btn-sair">Sair</a>

                    <a href="?pagina=conta" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="?pagina=login" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
                    <a href="?pagina=login" class="btn btn-outline-primary btn-sair">Entrar</a>
                <?php endif; ?>
            </div>
          </nav>
          <div class="cont-list-post">
            <ul class="list-post">
              <?php foreach($postagens as $postagem){?>
                <?php $user = $homeController->getConta($postagem['id_usuario'])?>
                <li class="cont-post">
                    <div class="user-post">
                        <figure class="user-post-img">
                            <img src="img/user/<?= $user['foto']?>" alt="">
                        </figure>
                        <p class="user-post-text">
                          <?= $user['codinome']?>
                        </p>
                    </div>
                    <!-- SEM O GOSTEI -->
                    <div class="card">
                        <img src="img/post/<?=$postagem['img']?>" class="card-img-top" alt="">
                      
                        <div class="card-body">
                            <p class="card-text">
                                <?=$postagem['descricao']?>
                            </p>
 <!-- ===================================================VALIDA CURTIDA-->
                            <?php if($homeController->verCurtida($postagem['id'],$usuario['id']) == 0){ ?>
                            <a href="index.php?pagina=home&curti=curtir&id_usuario=<?=$usuario['id'] ?>&id_postagem=<?= $postagem['id']?>" class="btn gostei">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-through-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l.53-.53c-.771-.802-1.328-1.58-1.704-2.32-.798-1.575-.775-2.996-.213-4.092C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182a21.86 21.86 0 0 1-2.685-2.062l-.539.54V14a.5.5 0 0 1-.146.354l-1.5 1.5Zm2.893-4.894A20.419 20.419 0 0 0 8 12.71c2.456-1.666 3.827-3.207 4.489-4.512.679-1.34.607-2.42.215-3.185-.817-1.595-3.087-2.054-4.346-.761L8 4.62l-.358-.368c-1.259-1.293-3.53-.834-4.346.761-.392.766-.464 1.845.215 3.185.323.636.815 1.33 1.519 2.065l1.866-1.867a.5.5 0 1 1 .708.708L5.747 10.96Z"/>
                                </svg>
                            </a>
                            <?php }else{?>
                              <a href="index.php?pagina=home&curti=descurtir&id_usuario=<?=$usuario['id'] ?>&id_postagem=<?= $postagem['id']?>" class="btn desgostei">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
                                </svg>
                            </a>
                            <?php } ?>
                             <!-- ===================================================VALIDA CURTIDA-->
                            <?php $curtida = $homeController->getCurtidas($postagem['id'])?>
                            
                            <span><?= $curtida?></span>
                        </div>
                      </div>
                </li>
                <?php } ?>
            </ul>
          </div>
   