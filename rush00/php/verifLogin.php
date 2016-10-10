<?php
    if (!isset($_SESSION))
        session_start();
    include_once("constants.php");
    if ($_SESSION['login']) {
        header('Location: accueil.php');
    }
    require_once ("connectDB.php");
    require_once ("functions.php");
    if ($connection = connectDB()) {
        if (empty($_POST['login']) || empty($_POST['passwd'])) {
            $message = '<p>une erreur s\'est produite pendant votre identification.
                Vous devez remplir tous les champs</p>
            <p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
        }
        else {
            $queryLogin = "SELECT * FROM users;";
            if ($allUsers = mysqli_query($connection, $queryLogin)) {
                $status = FALSE;
                while ($data = mysqli_fetch_assoc($allUsers))
                {
                    if ($data['login'] == $_POST['login']) {
                        if ($data['passwd'] == hash(sha256, $_POST['passwd'])) {
                            $_SESSION['login'] = $data['login'];
                            $_SESSION['rank'] = (int)$data['droit'];
                            $status = TRUE;
                            if ($_SESSION['rank'] == 2)
                                addLog($_SESSION['login'], 1, "");
                            $message = '<p>Bienvenue ' . $_SESSION['login'] . ',
                            vous êtes maintenant connecté!</p>
                            <p>Cliquez <a href="./accueil.php">ici</a>
                            pour revenir à la page d accueil</p>';
                        }
                        break ;
                    }
                }
                mysqli_free_result($allUsers);
                if (!$status) {
                    $message = '<p>Une erreur s\'est produite
                    pendant votre identification.<br /> Le mot de passe ou le pseudo
                    entré n\'est pas correct.</p><p>Cliquez <a href="./connexion.php">ici</a>
                    pour revenir à la page précédente
                    <br /><br />Cliquez <a href="./accueil.php">ici</a>
                    pour revenir à la page d accueil</p>';
                }
            }
            else {
                $message = "WTF PAS DE LOGIN DANS LA DB ???";
            }
            mysqli_close($connection);
        }
    }
    else
        $message = CONNECT_ERR;
    include_once('header.php');
    echo $message;
    include_once ('footer.php');
?>
