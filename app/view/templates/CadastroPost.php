<?php

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
                  <a class="nav-link active " aria-current="page" href="?pagina=cadastroPost">Post</a>
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
<form class="form-padrao"  action="" method="">
    </label>
    <label class="label-cadastro" for="">
        Imagem post
        <input class="input-padrao" type="file" name="img-post">
    </label>
    <label class="label-cadastro" for="descri">Descrição do post
        <textarea class="input-padrao" name="descricao-post" cols="30" rows="10">
        
        </textarea>
    </label>
    <button class="btn btn-padrao">Enviar</button>
</form>