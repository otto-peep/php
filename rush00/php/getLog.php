<?php
    if (!isset($_SESSION))
        session_start();
    if ($_SESSION['rank'] != 2)
        header('Location: accueil.php');
    include_once('header.php');

    require_once ("functions.php");
    $log = getLog();
    $log = str_replace("\n", "</br>", $log);
    echo $log;

    include_once ("footer.php");?>