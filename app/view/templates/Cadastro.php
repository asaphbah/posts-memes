<?php require_once 'C:\xampp\htdocs\posts-memes/app/controller/ControllerCadastro.php';

?>
<form class="form-padrao"  action="" method="post">
    <label class="label-cadastro" for="">
        nome
        <input class="input-padrao" required type="text" name="nome">
    </label>
    <label class="label-cadastro" for="">
        email
        <input class="input-padrao"  required type="email" name="email">
    </label>
    <label class="label-cadastro" for="">
        codinome
        <input class="input-padrao"  required type="text" name="codinome">
    </label>
    <label class="label-cadastro" for="">
        senha
        <input class="input-padrao"  required type="password" name="senha">
    </label>
    <label class="label-cadastro" for="">
        foto de usuario
        <input class="input-padrao" type="file" name="img">
    </label>
    <label class="label-cadastro" for="descri">descrição
        <textarea class="input-padrao" name="descricao" cols="30" rows="10">
        
        </textarea>
    </label>
    <button class="btn btn-padrao" type="submit">CADASTRAR</button>
</form>