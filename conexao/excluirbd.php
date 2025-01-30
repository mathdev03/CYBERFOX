<?php
    class Exclusao{
        public function chamar($id_user){
            require_once("_conexao.php");

            $id = $id_user;
        
            $comandoSQL = $conexao->prepare("
        
                SELECT * FROM usuarios WHERE id_user = :id
        
            ");
        
            $comandoSQL->execute(array(
                ":id" => $id
            ));

            $dados = $comandoSQL->fetch();

            $arquivo = "../img_perfil/". $dados["foto_user"];

            // unlink($arquivo);

           $this->deletar($conexao, $id);
        }

        public function deletar($conexao, $id){

            try {
                $comandoSQL = $conexao->prepare("
            
                DELETE FROM usuarios WHERE id_user = :id
                ");
                
                $comandoSQL->execute(array(":id" => $id));
    
                if($comandoSQL->rowCount() > 0) {
                    header("location:../login.php");
                    exit();
                } else {
                    echo "Erro na exclusão";
                }
            } catch (PDOException $erro) {
                echo "Erro na conexao";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $chama = new Exclusao();

        $chama->chamar($id);

    } else {
        echo "Contato com o suporte!";
    }