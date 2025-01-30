<?php require_once('./sessao.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Loja</title>
</head>
<body>
    <div class="container loja">
        <?php require_once($menu)?>
        <div class="center">
            <h1>Loja</h1>
            <h2>Jogos</h2>
            <?php 
                require_once("./conexao/view_loja.php");

                $total = $totalRegistros;
                $itens = 3;
                $a = 0;

                while ($a < $total) {
            ?>
            <div class="block_center">
                <?php 
                    for ($i=0; $i < $itens; $i++){
                        if($a < $total){
                ?>
                <div class="card" onclick="window.location.href = './jogo.php?id=<?=$dados[$a]['id_jogo']?>'">
                    <div class="card_image">
                        <img src="./img/<?=$dados[$a]["foto_jogo"]?>" >
                    </div>
                    <h2><?=$dados[$a]["titulo_jogo"]?></h2>
                </div>
                <?php 
                    $a++;
                        }
                    }
                ?>
            </div>
            <?php }?>
        </div>
    </div>
</body>
</html>