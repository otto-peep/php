<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['rank'] != 2)
    header('Location: accueil.php');
include_once('header.php');
?>
    <p>Ici vous pouvez ajouter manuellement un utilisateur :</p>
    <form action="addUserAdmin.php" method="post">
        Identifiant: <input type="text" name="login" value="" placeholder="login"/></br>
        Mot de passe: <input type="password" name="passwd" value="" placeholder="password"/></br>
        Rank: <input type="password" name="rank" value="" placeholder="0/1/2"/></br>
        <input type="submit" name="add" value="OK">
    </form>
    <br/></br>
    <p>Ici vous pouvez supprimer manuellement un utilisateur :</p>
    <form action="delUserAdmin.php" method="post">
        Identifiant: <input type="text" name="login" value="" placeholder="login"/></br>
        <input type="submit" name="del" value="OK">
    </form>


<?php include_once ('footer.php'); ?>