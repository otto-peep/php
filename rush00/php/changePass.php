<?php
    if (!isset($_SESSION))
        session_start();
    if (empty($_SESSION['login']))
        header('Location: accueil.php');
    include_once('header.php');

    require_once ("connectDB.php");
    print_r($_POST);
    if (empty($_POST['oldpwd']) || empty($_POST['newpw']) || $_POST['oldpwd'] == $_POST['newpw'] || $_POST['submit'] != "OK") {
        $message = '<p>une erreur s\'est produite pendant le changement de votre mot de passe.
                        Vous devez remplir tous les champs et mettre un mot de passe différent de l\'ancien</p>
                    <p>Cliquez <a href="./changeProfile.php">ici</a> pour revenir à la page précedente</p>';
    }
    else {
        if ($connection = connectDB()) {
            $queryChgPwd = "UPDATE `users` SET `passwd` ='". hash(sha256, $_POST['newpw']) . "' WHERE `login` ='" . $_SESSION['login'] ."' AND `passwd` ='" . hash(sha256, $_POST['oldpwd']) . "';";
            $result = mysqli_query($connection, $queryChgPwd);
            if (mysqli_affected_rows($connection) > 0) {
                $message = '<p>Le mot de passe a bien été mis à jour. </p>
                            <br />Cliquez <a href="profile.php">ici</a> pour revenir à la page de votre profile</p>';
            }
            else {
                $message = '<p>L\'ancien mot de passe ne correspond pas avec le precedent. Veuillez reessayer
                            <br />Cliquez <a href="changeProfile.php">ici</a> pour revenir à la page précédente</p>';
            }

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