<?php

    if (!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page d'accueil</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php include 'header.php' ?>
    <br/><br/>
    <div class="row">
        <div class="w-2"></div>
        <div class="w-8" id="Bienvenue"><p>Bienvenue sur Computer.com !</p></div>
        <div class="w-2"></div>
        <p class="clear"></p>
    </div>
    <div class="row">
        <div class="w-1"></div>
        <div class="w-10"><p class="middlePolice">Vous avez besoin d'une pièce d'ordinateur ? Vous savez cliquer ? Vous avez de l'argent ? Nous sommes là pour vous, nous allons vous aider à soulager votre porte monnaie, faites-nous confiance !</p></div>
        <div class="w-1"></div>
        <p class="clear"></p>
    </div>
    <div class="row">
        <div class="w-1">.</div>
        <a href="commandes.php" class="noUnderline"><div class="w-10 case">Voir ses commandes</div></a>
        <div class="w-1">.</div>
        <p class="clear"></p>
    </div>
    <div class="row">
        <div class="w-1">.</div>
        <a href="panier.php" class="noUnderline"><div class="w-10 case">Voir son panier</div></a>
        <div class="w-1">.</div>
        <p class="clear"></p>
    </div>
    <div class="row">
        <div class="w-1">.</div>
        <a href="profile.php" class="noUnderline"><div class="w-10 case">Voir son profil</div></a>
        <div class="w-1">.</div>
        <p class="clear"></p>
    </div>
	<?php include 'footer.php' ?>
</body>
</html>
