<?php require_once("./sessao.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Configurações</title>
</head>
<body>
    <div class="main">
        <?php require_once($menu)?>
        <div class="container">
            <div class="block">
                <div class="ladoL">
                    <img src="./img_perfil/<?=$retorno["foto_user"]?>" alt="perfil">
                </div>
                <div class="ladoR">
                    <h1><?=$retorno["apelido_user"]?></h1>
                    <h2><?=$retorno["nome_user"]?></h2>
                    <p><?=$retorno["sobre_user"]?></p>
                </div>
                <div class="ladoR perfil_alterar">
                        <a href="./alterar_perfil.php">Alterar perfil</a>
                </div>
            </div>
            <div class="block">
                <ul>
                    <li><a href="./alterar.php" class="config_alter">Alterar dados</a></li>
                    <li><a href="excluir.php" class="config_remove">Excluir conta</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>