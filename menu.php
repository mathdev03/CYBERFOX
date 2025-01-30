<div class="header">
    <a href="index.php" class="logo">CYBERFOX</a>
    <nav class="navbar">
        <a href="#" class="menu-loja">Loja</a>
        <a href="#" class="menu-laucher">Launcher</a>
        <a href="#" class="menu-sobre">Sobre</a>
        <div class="user">
            <img src="./img_perfil/Teste.png" alt="Visitante" class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <div class="pic_user">
                            <img src="./img_perfil/Teste.png">
                        </div>
                        <h3>Visitante</h3>
                    </div>
                    <hr>
                    <a href="login.php" class="sub-menu-link">
                        <img src="./img/Login.png">
                        <p>Login</p>
                        <span>></span>
                    </a>
                    <a href="registro.php" class="sub-menu-link">
                        <img src="./img/Registro.png">
                        <p>Cadastro</p>
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