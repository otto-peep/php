<?php
    session_start();

    if ($_SESSION['login'] == "")
        $message = '</p>Vous êtes déjà déconnecté.<br />Cliquez <a href="./connexion.php">ici</a>
                    pour connecter ou cliquez <a href="./accueil.php">ici</a>
                    pour revenir à l\'accueil</p>';
    else {
        $_SESSION['login'] = "";
        $_SESSION['rank'] = 0;
        $message = '</p>Vous avez été déconnecté.<br />Cliquez <a href="./accueil.php">ici</a>
            pour revenir à la page d accueil</p>';
    }

    include_once ("header.php");
    echo $message;
    include_once ("footer.php");
?>