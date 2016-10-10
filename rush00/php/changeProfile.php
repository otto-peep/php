<?php
if (!isset($_SESSION))
    session_start();
if (!$_SESSION['login'])
	header('Location: connexion.php');
    include_once('header.php');
?>
    <p>Pour changer votre mot de passe, veuillez renseigner les deux champs suivants : </p>
    <form action="changePass.php" method="post">
        Ancien mot de passe : <input type="text" name="oldpwd" value="" placeholder="Ancien mot de passe"/>
        Nouveau mot de passe: <input type="text" name="newpw" value="" placeholder="Nouveau mot de passe"/>
        <input type="submit" name="submit" value="OK">
    </form>
    <br/><br/><br/>
<!--    <p>-->
<!--        Pour changer votre mot de passe, veuillez renseigner les deux champs suivants :-->
<!--    </p>-->
<!--    <form action="changeDataProfile.php" method="post">-->
<!--         : <input type="text" name="oldpwd" value="" placeholder="Ancien mot de passe"/>-->
<!--        Nouveau mot de passe: <input type="text" name="newpw" value="" placeholder="Nouveau mot de passe"/>-->
<!--        <input type="submit" name="passwd" value="OK">-->
<!--    </form>-->

<?php include_once ('footer.php'); ?>