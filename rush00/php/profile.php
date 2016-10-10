<?php
    session_start();
    if ($_SESSION['login'] == "")
        header('Location: connexion.php');
    include_once ("header.php");
?>
    <div class="row">
        <div class="w-1">.</div>
        <div class="w-10 basic"><p>
                    Bonjour <?php echo $_SESSION['login']; ?> !
                    <br/>
                    Vous pouvez vous déconnecter en cliquant <a href="./logout.php">ici</a> ou en haut à droite.
                    </br>
                    Vous pouvez également modifier vos données en cliquant <a href="./changeProfile.php">ici</a>
                </p>
                <p class="clear"></p></div>
        <div class="w-1">.</div>
    </div>

<?php include_once ("footer.php");