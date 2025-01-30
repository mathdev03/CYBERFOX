<?php 
    // inicia uma sessão
    session_start();

    // eliminas as possíveis variáveis de sessão
    session_unset();

    // destroy a sessão atual
    session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Login</title>
</head>
<body>
    <div class="main">
        <div class="fundo">
            <video class="videod" autoplay muted loop>
                <source src="video.mp4" type="video/mp4">
            </video>
        </div>
        <?php require_once('./menu.php');?>
        <div class="TelaL">
            <img src="./img/Cyberfox.png" alt="logo" class="tela-logo">
            <h1>Entre para o nosso time</h1>
        </div>
        <div class="TelaR">
            <form action="./conexao/valida_senha.php" method="post">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <input type="text" name="user" id="user" required>
                    <span></span>
                    <label for="nome">Username ou Email</label>
                </div>
                <div class="textfield">
                    <input type="password" name="senha" id="senha" required>
                    <span></span>
                    <label for="senha">Senha</label>
                </div>
                <?php 
                    if(isset($_GET["status"])){
                ?>
                <div class="erro-senha">
                    <p>Senha incorreta</p>
                </div>
                <?php 
                    } else if (isset($_GET["status2"])) {
                ?>
                <div class="erro-email">
                    <p>Email ou Usuário incorreto</p>
                </div>
                <?php 
                    }
                ?>
                <a class="login-cadastro" href="registro.php">Não possui cadastro?</a>
                <input type="submit" class="btn-login" value="Logar">
            </form>
        </div>
    </div>
    <div class="program">

    </div>
</body>
</html>