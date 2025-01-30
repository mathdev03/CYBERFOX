<?php require_once("sessao.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Exclusão</title>
</head>
<body>
    <div class="main_mainuser">
        <?php require_once("$menu")?>
        <form action="./conexao/excluirbd.php" method="post" >
            <a href="./config_user.php" class="voltar_alteruser"><</a>
            <h1>Exclusão</h1>
            <h2>Informações</h2>
            <input type="hidden" id="id" name="id" value="<?= $retorno["id_user"]?>">
            <img src="./img_perfil/<?=$retorno["foto_user"]?>" class="delete_user"> 
            <p>Nome: <?=$retorno["nome_user"]?></p>
            <p>Username: <?=$retorno["apelido_user"]?></p>
            <p>Email: <?= $retorno["email_user"]?></p>
            <input type="submit" value="Excluir" class="excluir_user">
        </form>
    </div>
</body>
</html>