<?php require_once("./sessao.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Nickname</title>
</head>
<body>
    <?php require_once('./conexao/view_user.php')?>
    <div class="main mainuser">
        <h1>Seja Bem vindo <?=$retorno["nome_user"]?></h1>
        <form action="./conexao/registro_userbd.php" method="post" enctype="multipart/form-data" class="form-user">

            <h2>Escolha uma foto</h2>

            <input type="hidden" name="id" id="id" value="<?=$retorno["id_user"]?>">

            <label for="foto" class="foto_user">
                <input type="file" name="foto" id="foto" class="foto_input">
                <span class="foto_imagem">
                     <script src="./JS/imagem.js"></script>
                </span>
            </label>

            <?php 
                if(isset($_GET["status"])){
            ?>
            <div class="erro">
                <p>Username já existente</p>
            </div>
            <?php }?>
            <div class="textfield">
                <input type="text" name="user" id="user" required>
                <span></span>
                <label for="nome">Escolha seu username</label>
            </div>
            <input type="submit" value="Confirmar">
        </form>
    </div>
</body>
</html>