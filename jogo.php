<?php require_once("./sessao.php")?>
<?php require_once("./conexao/view_jogo.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Game</title>
</head>
<style>
    .corpo_game{
        background-image: url('./img/<?=$dadosgame["foto_jogo"]?>');
        background-size: auto;
    }
</style>
<body class="corpo_game">
    <div class="container loja">
        <?php
        $_SESSION["id_jogo"] = $dadosgame["id_jogo"];
        require_once("./conexao/confirma_jogo.php")?>
        <?php require_once($menu)?>
        <div class="center">
            <img src="./img/<?=$dadosgame["foto_jogo"]?>" style="width: 50em;
                margin-left: 32px;
                margin-top: 15px;
                border: 4px solid black;
                border-radius: 15px;">
            <div class="classe_jogo">
                <h1><?=$dadosgame["titulo_jogo"]?></h1>
                <div class="image_game">
                    <img src="" alt="">
                </div>
                <h2>Descricao</h2>
                <p><?=$dadosgame["descricao_jogo"]?></p>
                <?php if($_SESSION["comprado"]){?>
                <h3>COMPRADO</h3>
                <?php } else {?>
                <a href="./conexao/comprar.php?id=<?=$dadosgame["id_jogo"]?>" class="voltar_alteruser">Comprar</a>
                <?php }?>
            </div>
        </div>
    </div>
</body>
</html>