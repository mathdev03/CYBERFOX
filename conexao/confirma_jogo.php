<?php

try {
    require_once("_conexao.php");

    $id = $_SESSION["id_jogo"];
    $id2 = $_SESSION["id"];

    $comandoSQL = $conexao->prepare("

        SELECT idjogo, iduser FROM adquirido WHERE iduser = :id and idjogo = :id2

    ");

    $comandoSQL->execute(array(
        ":id" => $id,
        ":id2" => $id2
    ));

    if($comandoSQL->rowCount() > 0){
        $_SESSION["comprado"] = true;
    } else{
        $_SESSION["comprado"] = false;
    }

}catch(PDOException $erro) {
    
}