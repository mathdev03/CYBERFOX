<?php

    require_once("../sessao.php");

    try {
        require_once("_conexao.php");
    
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $id2 = $_SESSION["id"];
    
        $comandoSQL = $conexao->prepare("
    
        INSERT INTO adquirido(iduser, idjogo) VALUES(:user, :jogo)
    
        ");


        $comandoSQL->execute(array(
            ":user" => $id2,
            ":jogo" => $id
        ));

        if ($comandoSQL->rowCount() > 0) {
            
            header("location:../loja.php");
            exit();
        } else {
            echo "Erro ao gravar";
        }
        
    }catch(PDOException $erro) {
        echo "Entre em contato com o suporte!";
    }