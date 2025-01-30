<?php require_once("./sessao.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Alterar Pefil</title>
</head>
<body>
<?php require_once('./conexao/view_user.php')?>
    <div class="main_mainuser">
        <h1>Alterar Pefil</h1>
        <form action="./conexao/alterar_perfilbd.php" method="post" enctype="multipart/form-data" class="form-user">

            <a href="./config_user.php" class="voltar_alteruser"><</a>

            <h2>Escolha uma foto</h2>

            <input type="hidden" name="id" id="id" value="<?=$retorno["id_user"]?>">

            <label for="foto" class="foto_user">
                <input type="file" name="foto" id="foto" class="foto_input">
                <span class="foto_imagem">
                     <?php require_once("./JS/imagem.php");?>
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
                <input type="text" name="user" id="user" value="<?= $retorno["apelido_user"]?>" required>
                <span></span>
                <label for="nome">Username</label>
            </div>
            <div class="textfield">
                <input type="text" name="about" id="about" value="<?=$retorno["sobre_user"]?>" required>
                <span></span>
                <label for="nome">Sobre</label>
            </div>
            <input type="submit" value="Confirmar">
        </form>
    </div>
</body>
</html>