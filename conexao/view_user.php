<?php

try {
    require_once("_conexao.php");

    $id = $_SESSION["id"];

    $comandoSQL = $conexao->prepare("

        SELECT * FROM usuarios WHERE id_user = :id

    ");

    $comandoSQL->execute(array(
        ":id" => $id
    ));

    $retorno = $comandoSQL->fetch();
    
}catch(PDOException $erro) {
    echo "Entre em contato com o suporte!";
}