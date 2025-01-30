<?php
    $comandoSQL = $conexao->prepare("

    SELECT * FROM usuarios WHERE nome_user = :nome

    ");

    echo $nome;


    $comandoSQL->execute(array(

        ":nome" => $nome
    ));

    echo $nome;

    $dados = $comandoSQL->fetch();