<?php
    class Emailuser{

        public function session_user($dados){
            session_start();
            $_SESSION["id"] = $dados["id_user"];
        }

        public function email($conexao, $us, $senha){
            try {
                $comandoSQL = $conexao->prepare("
                    SELECT * FROM usuarios WHERE email_user = :email
                ");

                $comandoSQL->execute(array(
                    ":email" => $us
                ));

                if ($comandoSQL->rowCount() > 0) {
                    
                    $dados = $comandoSQL->fetch();

                    if (password_verify($senha, $dados["senha_user"])) {
                        
                        $this->session_user($dados);

                        header("location:../index.php");
                        exit();

                    } else {
                        header("location:../login.php?status=erro-senha");
                        exit();
                    }
                } else {
                    header("location:../login.php?status2=erro-email");
                    exit();
                }
            } catch (PDOException $erro) {
                header("location:../login.php?status2=erro-email");
                exit();
            }
        }

        public function user($conexao, $us, $senha){
            try {
                $comandoSQL = $conexao->prepare("
                    SELECT * FROM usuarios WHERE apelido_user = :user
                ");

                $comandoSQL->execute(array(
                    ":user" => $us
                ));

                if ($comandoSQL->rowCount() > 0) {
                    
                    $dados = $comandoSQL->fetch();

                    if ($senha == $dados["senha_user"]) {
                        
                        $this->session_user($dados);

                        header("location:../index.php");
                        exit();

                    } else {
                        header("location:../login.php?status=erro-senha");
                        exit();
                    }
                } else {
                    header("location:../login.php?status2=erro-email");
                    exit();
                }
            } catch (PDOException $erro) {
                header("location:../login.php?status2=erro-email");
                exit();
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('./_conexao.php');

        $us  = filter_input(INPUT_POST, "user", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha    = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $verificauser = new Emailuser();

        if (strpos($us, "@")) {
            $verificauser->email($conexao, $us, $senha);
        } else {
            $verificauser->user($conexao, $us, $senha);
        }
    }