<?php require_once("./sessao.php")?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>HOME</title>
</head>
<body>

    <div class="main">
        <div class="fundo">
            <video class="videod" autoplay muted loop>
                <source src="video.mp4" type="video/mp4">
            </video>
        </div>
        <?php
            require_once($menu);
        ?>
        <div class="TelaL">
            <img src="./img/Cyberfox.png" alt="logo" class="tela-logo">
            <h1>Construa e Jogue GAMES 2D</h1>
        </div>
        <div class="TelaR">
            <a class="index-produto" href="produto.php">START</a>
        </div>
    </div>
    <div class="program">

    </div>
</body>
</html>