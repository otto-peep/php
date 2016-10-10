<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['rank'] == 2)
    header('Location: admin.php');
elseif ($_SESSION['rank'] == 1)
    header('Location: profile.php');
include_once('header.php');

if (empty($_POST['login']) || empty($_POST['passwd'])) {
    $message = '<p>une erreur s\'est produite pendant votre inscription.
                Vous devez remplir tous les champs</p>
            <p>Cliquez <a href="./register.php">ici</a> pour revenir</p>';
}


require_once ("connectDB.php");
require_once  ("functions.php");
if (empty($_POST['login']) || empty($_POST['passwd']) || $_POST['submit'] != "OK") {
    $message = '<p>Vous devez remplir tous les champs</p>
                <p>Cliquez <a href="./register.php">ici</a> pour revenir à la page précedente</p>';
}
else {
    if ($connection = connectDB()) {
        if (!loginExist($connection, $_POST['login'])) {
            $queryAddLogin = "INSERT INTO `users` (`login`, `passwd`, `droit`) VALUES ('" . $_POST['login'] . "', '" . hash(sha256, $_POST['passwd']) . "', 1);";
            $result = mysqli_query($connection, $queryAddLogin);
            if (mysqli_affected_rows($connection) > 0) {
                $message = '<p>Le login a bien été créé.</p>
                            <br />Cliquez <a href="accueil.php">ici</a> pour revenir à la page d\'accueil</p>';
            } else {
                $message = '<p>Erreur lors de la création du login. Veuillez réessayer plus tard ou changer de login
                            <br />Cliquez <a href="register.php">ici</a> pour revenir à la page précédente</p>';
            }
        }
        else
            $message = '<p>Erreur lors de la création du login. Ce login existe déjà, merci d\'en choisir un autre.
                            <br />Cliquez <a href="register.php">ici</a> pour revenir à la page précédente</p>';

    }
    else {
        $message = '<p>Une erreur s\'est produite
                    avec la base de donnée. Veuillez contacter un administrateur ou prendre votre mal en patience
                    <br />Cliquez <a href="accueil.php">ici</a> pour revenir à la page d accueil</p>';
    }
}
echo $message;
include_once ('footer.php');
?>