<?php

    // inicia uma sessão
    session_start();

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $_SESSION["id"] = $id;

    header("location:../config_user.php");
    exit();