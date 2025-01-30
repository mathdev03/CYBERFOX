<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // pegando os dados vindo do formulário
        $nome     = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email    = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha    = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $letras = strlen($senha);

        if ($letras < 8) {
            header("location:../registro.php?status=erro-senha");
            exit();
        } else if(strpos($email, '@') == false){
            header("location:../registro.php?status2=erro-email");
            exit();
        }

        try {
            require_once('_conexao.php');

            $comandoSQL = $conexao->prepare("
            
                INSERT INTO usuarios (nome_user, email_user, senha_user)
                VALUES (:nome, :email, :senha)
            ");

            $senhaverif = $senha;

            $comandoSQL->execute(array(
                ":nome" => $nome,
                ":email" => $email,
                ":senha" => $senhaverif
            ));

            if ($comandoSQL->rowCount() > 0) {
                require_once('registro_view.php');

                session_start();

                $_SESSION["id"] = $dados["id_user"];

                header("location:../registro_user.php");
                exit();
            } else {
                echo "Erro ao gravar";
            }
        } catch (PDOException $erro) {
            echo "Conexão perdida";
        }
    } else {
        echo "Entre contato com o suporte!";
    }