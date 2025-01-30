<?php
try {
    require_once("_conexao.php");

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $comandoSQL = $conexao->prepare("

        SELECT * FROM jogos WHERE id_jogo = :id

    ");

    $comandoSQL->execute(array(
        ":id" => $id
    ));

    $dadosgame = $comandoSQL->fetch();
    
}catch(PDOException $erro) {
    echo "Entre em contato com o suporte!";
}