<?php require_once("./conexao/view_user.php")?>

<div class="header">
    <a href="index.php" class="logo">CYBERFOX</a>
    <nav class="navbar">
        <a href="loja.php" class="menu-loja">Loja</a>
        <a href="#" class="menu-laucher">Launcher</a>
        <a href="#" class="menu-sobre">Sobre</a>
        <div class="user">
            <img src="./img_perfil/<?=$retorno["foto_user"]?>" alt="Visitante" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <div class="pic_user">
                            <img src="./img_perfil/<?=$retorno["foto_user"]?>">
                        </div>
                        <h3><?=$retorno["apelido_user"]?></h3>
                    </div>
                    <hr>
                    <a href="config_user.php" class="sub-menu-link">
                        <img src="./img/definicoes.png">
                        <p>Configurar Conta</p>
                        <span>></span>
                    </a>
                    <a href="Estrelas.php?perfil" class="sub-menu-link">
                        <img src="./img/estrela.png">
                        <p>conquista</p>
                        <span>></span>
                    </a>
                    <a href="login.php" class="sub-menu-link">
                        <img src="./img/fechar.png">
                        <p>Sair</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>