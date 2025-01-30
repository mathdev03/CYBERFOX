<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION["id"])){
        $menu = "./menu_logado.php";
    } else {
        $menu = "./menu.php";
    }