<?php
    
    // maak alles leeg
    session_start();
    unset($_POST["password"]);
    unset($_SESSION["ID"]);
    unset($_SESSION["USER_ID"]);
    unset($_SESSION["USER_NAME"]);
    unset($_SESSION["STATUS"]);
    unset($_SESSION["is_admin"]);
    $_SESSION = array();

    session_destroy();
    $pdo = null; //verbinding met database sluiten

    header("Location:index.php?page=inloggen");
    die();
?>