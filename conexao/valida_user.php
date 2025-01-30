<?php

    require_once('./_conexao.php');

    $comandoSQL = $conexao->prepare("
        SELECT * FROM usuarios
    ");

    $comandoSQL->execute();

    $dados = $comandoSQL->fetchAll();

    foreach($dados as $dado){
        if($dado["apelido_user"] == $us){
            header("location:../registro_user.php?id=$id&&status=erro");
            exit();
        }
    }