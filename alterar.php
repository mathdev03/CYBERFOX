<?php require_once("./sessao.php")?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Alterar Dados</title>
</head>
<body>
    <div class="main mainuser">
        <?php require_once("$menu")?>
        <form action="./conexao/alterarbd.php" method="post" class="form_alterar">
            <h1>Alterar Dados</h1>
            <input type="hidden" name="id" id="id" value="<?=$retorno["id_user"]?>">
            <div class="textfield">
                <input type="text" name="nome" id="nome" value="<?=$retorno["nome_user"]?>" required>
                <span></span>
                <label for="nome">Nome</label>
            </div>
            <div class="textfield">
                <input type="text" name="email" id="email"  value="<?=$retorno["email_user"]?>" required>
                <span></span>
                <label for="nome">Email</label>
            </div>
            <div class="textfield">
                <input type="password" name="senha" id="senha" value="***" required>
                <span></span>
                <label for="senha">Senha</label>
            </div>
            <div class="opcao_alternar">
                <a href="./config_user.php">Cancelar</a>
                <input type="submit" value="Confirmar">
            </div>
        </form>
    </div>
</body>
</html>