<?php
    class Perfil{

        public function selecionar($id_user, $us, $sobre){
            try {
                require_once("_conexao.php");
                
                $this->verfuser($conexao, $id_user, $us, $sobre);

                $id = $id_user;
            
                $comandoSQL = $conexao->prepare("
            
                    SELECT * FROM usuarios WHERE id_user = :id
            
                ");
            
                $comandoSQL->execute(array(
                    ":id" => $id
                ));

                $dados = $comandoSQL->fetch();

                $this->atualiza($dados, $id, $us, $sobre, $conexao);

            } catch(PDOException $erro){
                echo "Erro no ID";
            }
        }

        public function verfuser($conexao, $id, $us, $sobre){
            $comandoSQL = $conexao->prepare("
            SELECT * FROM usuarios
            ");
    
            $comandoSQL->execute();
        
            $dados = $comandoSQL->fetchAll();
        
            foreach($dados as $dado){
                if($dado["apelido_user"] == $us && $dado["sobre_user"] == $sobre){
                    header("location:../alterar_perfil.php?id=$id&&status=erro");
                    exit();
                }
            }
        }

        public function atualiza($dados, $id, $us, $sobre, $conexao){

            if (!empty($_FILES["foto"]["name"])) {
                $pasta = "../img_perfil/";
    
                $nomeOriginal = str_replace(" ", "_", $_FILES["foto"]["name"]);
    
                $foto = $nomeOriginal;
            } else{
                $foto = $dados["foto_user"];
            }
    
            try {
    
                $comandoSQL = $conexao->prepare("
                    UPDATE usuarios SET
                        apelido_user = :apelido,
                        sobre_user = :sobre,
                        foto_user = :foto
                    WHERE id_user = :id
                ");
    
                $comandoSQL->execute(array(
                    ":apelido" => $us,
                    ":sobre" => $sobre,
                    ":foto" => $foto,
                    ":id" => $id
                ));
    
                if ($comandoSQL->rowCount() > 0) {
                    if (!empty($_FILES["foto"]["name"])) {
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $pasta.$foto);
                    }
    
                    header("location:../config_user.php");
                    exit();
                } else{
                    echo "Erro na Gravação";
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $us = filter_input(INPUT_POST, "user", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sobre = filter_input(INPUT_POST, "about", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $comando = new Perfil();

        $comando->selecionar($id, $us, $sobre);

    } else{
        echo "Entre contato com suporte!";
    }