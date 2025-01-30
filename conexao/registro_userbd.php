<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!empty($_FILES["foto"]["name"])) {
            $pasta = "../img_perfil/";

            $nomeOriginal = str_replace(" ", "_", $_FILES["foto"]["name"]);

            $foto = $nomeOriginal;
        } else{
            $foto = "Teste.png";
        }

        // Adicionar os dados restantes
        $us = filter_input(INPUT_POST, "user", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            require_once('./valida_user.php');

            $comandoSQL = $conexao->prepare("
                UPDATE usuarios SET
                    apelido_user = :apelido,
                    foto_user = :foto
                WHERE id_user = :id
            ");

            $comandoSQL->execute(array(
                ":apelido" => $us,
                ":foto" => $foto,
                ":id" => $id
            ));

            if ($comandoSQL->rowCount() > 0) {
                if (!empty($_FILES["foto"]["name"])) {
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $pasta.$foto);
                }

                header("location:../index.php");
                exit();
            } else{
                echo "Erro na Gravação";
            }
        } catch (PDOException $erro) {
            echo "Erro na conexão";
        }
    } else {
        echo "Entre em contato com o suporte!";
    }