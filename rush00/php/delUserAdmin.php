<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['rank'] != 2)
    header('Location: accueil.php');
include_once('header.php');


require_once ("connectDB.php");
require_once  ("functions.php");
print_r($_POST);
if (empty($_POST['login']) || $_POST['del'] != "OK") {
    $message = '<p>Vous devez remplir tous les champs</p>
                <p>Cliquez <a href="./addUser.php">ici</a> pour revenir à la page précedente</p>';
}
else {
    if ($connection = connectDB()) {
        if (loginExist($connection, $_POST['login'])) {
            $queryAddLogin = "DELETE FROM `users` WHERE `users`.`login` ='" . $_POST['login'] . "';";
            $result = mysqli_query($connection, $queryAddLogin);
            if (mysqli_affected_rows($connection) > 0) {
                addLog($_SESSION['login'], 3, $_POST['login']);
                $message = '<p>Le login a bien été supprimé.</p>
                            <br />Cliquez <a href="addUser.php">ici</a> pour revenir à la page precedente</p>';
            } else {
                $message = '<p>Erreur lors de la suppression du login. Veuillez réessayer plus tard ou changer de login
                            <br />Cliquez <a href="addUser.php">ici</a> pour revenir à la page précédente</p>';
            }
        }
        else
            $message = '<p>Erreur lors de la suppresion du login. Ce login n\'existe pas.
                            <br />Cliquez <a href="addUser.php">ici</a> pour revenir à la page précédente</p>';

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