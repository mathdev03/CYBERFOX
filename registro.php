<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Cadastro</title>
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
            <form action="./conexao/registrobd.php" method="post">
                <h1>CADASTRO</h1>
                <div class="textfield">
                    <input type="text" name="nome" id="nome" required>
                    <span></span>
                    <label for="nome">Usuário</label>
                </div>
                <div class="textfield">
                    <input type="text" name="email" id="email" required> 
                    <span></span>
                    <label for="email">Email</label>
                </div>
                <div class="textfield">
                    <input type="password" name="senha" id="senha" required>
                    <span></span>
                    <label for="senha">Senha</label>
                </div>
                <?php if(isset($_GET["status"])){?>
                <div class="erro-senha">
                    <p>Senha mais de 8 digitos!</p>
                </div>
                <?php } else if(isset($_GET["status2"])){?>
                <div class="erro-email">
                    <p>Escreva o email corretamente!</p>
                </div>
                <?php }?>
                <input type="submit" class="btn-login" value="Cadastrar">
            </form>
        </div>
    </div>
    <div class="program">

    </div>
</body>
</html>