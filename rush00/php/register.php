<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['rank'] == 2)
    header('Location: admin.php');
elseif ($_SESSION['rank'] == 1)
    header('Location: profile.php');
include_once('header.php');
?>
    <p>Bienvenue sur la plateforme, pour vous enregistrer, rien de plus simple, il suffit de renseigner les champs suivants :</p>
    <form action="createLogin.php" method="post">
        Identifiant: <input type="text" name="login" value="" placeholder="login"/></br>
        Mot de passe: <input type="password" name="passwd" value="" placeholder="password"/>
        <input type="submit" name="submit" value="OK">
    </form>

<?php include_once ('footer.php'); ?>