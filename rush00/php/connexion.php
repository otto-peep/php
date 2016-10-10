<?php
    if (!isset($_SESSION))
        session_start();
    if ($_SESSION['rank'] == 2)
        header('Location: admin.php');
    elseif ($_SESSION['rank'] == 1)
        header('Location: profile.php');
    include_once('header.php');
?>
    <div class="row">
        <div class="w-1">.</div>
        <div class="w-10 basic"><form action="verifLogin.php" method="post">Veuillez vous connecter :</br></br></br>
                    Identifiant: <input type="text" name="login" value="" placeholder="login"/><span></span>
                    Mot de passe: <input type="password" name="passwd" value="" placeholder="password"/>
                    <input type="submit" name="submit" value="OK">
                </form></div>
        <div class="w-1">.</div>
        <p class="clear"></p>
    </div>

<?php include_once ('footer.php'); ?>