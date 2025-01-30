<?php
    class Validar{
        public function ID($id_user, $a, $b, $c){
            try {
                require_once("_conexao.php");
            
                $id = $id_user;
            
                $comandoSQL = $conexao->prepare("
            
                    SELECT * FROM usuarios WHERE id_user = :id
            
                ");
            
                $comandoSQL->execute(array(
                    ":id" => $id
                ));

                $retorno = $comandoSQL->fetchAll();

                $this->vef($retorno, $a, $b, $c, $conexao, $id);
                
            }catch(PDOException $erro) {
                echo "Entre em contato com o suporte!";
            }
        }

        public function vef($retorno, $a, $b, $c, $conexao, $id){

            foreach($retorno as $dados){
                if($dados["nome_user"] == $a && $dados["email_user"] == $b){
                    header("location:../alterar.php?status");
                    exit();
                } else if("***" != $c){
                    $this->senha($conexao, $a, $b, $c, $id);
                } else {
                    $this->semsenha($conexao, $a, $b, $id);
                }
            }
        }

        public function senha($comandoSQL, $a, $b, $c, $id){
            try {

                $comandoSQL->prepare("
                    UPDATE usuarios SET
                    nome_user = :nome,
                    email_user = :email,
                    senha_user = :senha
                    WHERE id_user = :id
                ");

                $comandoSQL->execute(array(
                    ":nome" => $a,
                    ":email" => $b,
                    ":senha" => password_hash($c, PASSWORD_DEFAULT),
                    ":id" => $id
                ));

                if ($comandoSQL->rowCount() > 0) {
                    header("location:./config_user.php");
                } else {
                    echo "conta não existe";
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão";
            }
        }

        public function semsenha($conexao, $a, $b, $id){
            try {

                $comandoSQL  = $conexao->prepare("
                    UPDATE usuarios SET
                        nome_user = :nome,
                        email_user = :email
                    WHERE id_user = :id
                ");

                $comandoSQL->execute(array(
                    ":nome" => $a,
                    ":email" => $b,
                    ":id" => $id
                ));

                if ($comandoSQL->rowCount() > 0) {
                    header("location:../config_user.php");
                } else {
                    echo "conta não existe";
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão";
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] = "POST"){

        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $valida = new Validar();

        $valida->ID($id, $nome, $email, $senha);
    }