<?php
	if (!isset($_SESSION))
    	session_start();
	if ($_SESSION['rank'] == 0)
	{
    	echo "Vous devez d'abord vous connecter pour valider le panier\n";
		echo "Cliquez <a href=\"connexion.php\">ici</a> pour vous connecter";
	}
   	else
   	{
	require_once("connectDB.php");
	if ($connection = connectDb()) 
	{
		$commande = serialize($_SESSION['panier']);
		$str = "USE `FT_MINISHOP`";
		date_default_timezone_set('UTC');
		$time = date (DATE_RFC2822);
		if (!mysqli_query($connection, $str))
			echo "Error creating database: ". mysqli_error($connection);
		$str = "INSERT INTO `commandes` (`command`, `total`, `login`, `time`) VALUES ('".$commande."', '".$_SESSION['panier']['total']."','".$_SESSION['login']."','".$time."');";
		if (!mysqli_query($connection, $str))
			echo "Probleme avec la commande, contactez un administrateur";
		else
		{
			echo "<h3>La commande a été passée avec succès</h3>";
						unset($_SESSION['panier']);
		}
		//echo $str;
	}
	else
		echo "FAIL TO CONNECT DB, CONTACT AN ADMIN";
	mysqli_close($connection);
	}
?>