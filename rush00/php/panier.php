<?php
{
	session_start();
	include 'header.php';
	if (!empty($_POST['delArt']))
	{
		unset($_SESSION['panier']['qte'][$_POST['index']]);
		unset($_POST['delArt']);
		$len = count($_SESSION['panier']);
		$i = 0;
		$_SESSION['panier']['total'] = 0;
		while ($i < $len)
		{
			$_SESSION['panier']['total'] += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['qte'][$i];
			$i++;
		}

	}
	if (!empty($_POST['del']))
	{
		if (isset($_SESSION['panier']))
			unset($_SESSION['panier']);
		else
			echo "<h4>Ton panier est déjà vide</h4>";
		unset($_POST['delete']);
	}
	if (!empty($_POST['val']))
	{
		if (!isset($_SESSION['panier']))
			echo "<h4>Tu ne peux pas passer une commande vide</h4>";
		else
		{
			include_once("validpan.php");

		}

		unset($_POST['val']);
	}

}

function displayPanier()
{
	if (!isset($_SESSION['panier']))
	{
		echo "<h3>Votre panier est vide</h3>";
	}
	else
	{
		$i = 0;
		$len = count($_SESSION['panier']);
		while ($i < $len)
		{
			if ($_SESSION['panier']['qte'][$i])
			{
				echo"<img class=\"art-image\" src=",$_SESSION['panier']['img'][$i]," alt=\"image manquante\"/>";
				print($_SESSION['panier']['qte'][$i]); 			echo "<br/>";
				print($_SESSION['panier']['prix'][$i]); echo "<br/>";
				print($_SESSION['panier']['produit'][$i]); 			echo "<br/>";
				echo "<form action= \"panier.php\" method=\"post\">
				<input type=\"hidden\" id=\"index\" name=\"index\" value=\"". $i ."\">
				<input type=\"submit\" id=\"delArt\" name=\"delArt\" value=\"Supprimer produit\">
				</form>";
				
				echo "<br/>";
			}
			$i++;
		}
		echo "Cout total:", $_SESSION['panier']['total'];
	}
}
?>



		<?php displayPanier(); ?>
		<form action="panier.php" method="post">
		<input type="submit" id="del" name="del" value="Supprimer le panier">
		<input type="submit" id="val" name="val" value="Passer commande">
		</form>
	<?php include 'footer.php' ?>
