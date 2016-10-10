<?php
	session_start();
	$user = "root";
	$passwd = "root";
	$host = "localhost";
	$connection = mysqli_connect($host, $user, $passwd);
	$str = "USE `FT_MINISHOP`";
	if (!mysqli_query($connection, $str))
		echo "Error creating database: ". mysqli_error($connection);
	function addPanier($array, $qte)
	{
		if (!isset($_SESSION['panier']))
		{
			$_SESSION['panier']['total'] = "0";
			$_SESSION['panier']=array();
			$_SESSION['panier']['idArticle'] = array();
		 	$_SESSION['panier']['qte'] = array();
			$_SESSION['panier']['prix'] = array();
			$_SESSION['panier']['produit'] = array();
			$_SESSION['panier']['img'] = array();
	} //require_once quand on appelle addPanier
		$pos = array_search($array['idArticle'], $_SESSION['panier']['idArticle']);
		$idArticle = $array['idArticle'];
		$produit = $array['produit'];
		$prix = $array['prix'];
		$img = $array['img'];
		$_SESSION['panier']['total'] = $_SESSION['panier']['total'] + ($array['prix'] * $qte);
		if ($pos === false)
		{
			$_SESSION['panier']['produit'][] = $produit;
			array_push($_SESSION['panier']['qte'], $qte);
			array_push($_SESSION['panier']['idArticle'], $idArticle);
			array_push($_SESSION['panier']['prix'], $prix);
			array_push($_SESSION['panier']['img'], $img);
		}
		else{
			$_SESSION['panier']['qte'][$pos] += $qte;
		}
		unset($_POST['add']);
		unset($_POST['qte']);
	}

	function aff_cat($idcat, $connection)
	{
		if (!($result = mysqli_query($connection, "SELECT * FROM `Article`;")))
			echo "Bad request SQL\n" . "<br/>";
		while ($row = mysqli_fetch_array($result))
		{
			$count = 0;
			if ($row['idCat'] === $idcat)
			{
				if ($count == 0)
					echo "<div class=\"row\">";
				echo "<div class=\"w-3\">";
				echo "<img class=\"art-image\" src=",$row['img']," alt=\"image manquante\"/>";
				echo $row['produit'] , "<br/>", $row['description'] , "<br/>", $row['prix'] . "<br/>" , $row['idCat'] , "<br/>";
				echo"<form action=\"produits.php\" method=\"post\">
					<input type=\"number\" id=\"qte\" name=\"qte\" min=\"1\" max=\"10\" value=\"1\">
					<input type=\"submit\" id=\"add\" name=\"";
				echo $row['idArticle'];
				echo "\" value=\"Ajouter au panier\">";
					if (isset($_POST[$row['idArticle']]) && ($_POST['qte'] > 0))
					{
						addPanier($row, $_POST['qte']);
					}
					else if ($_POST['qte'] <= 0 && isset($_POST['add']))
						echo "invalid nb";

				echo"</form>";

				echo "</div>";
				if ($count == 4) {
				echo "<p class=\"clear\"></p></div>";
					$count == -1;
				}
				$count++;
			}
		}
		echo "<p class=\"clear\"></p></div>";	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produits</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php include 'header.php' ?>
	<div class="row">
		<div class="w-1"></div>
		<div class="w-10"><h1>Catégories</h1></div>
		<div class="w-1">.</div>
		<p class="clear"></p>
	</div>
	<div class="row">
		<div class="w-1"></div>
		<div class="w-10"><h2>Cartes mères</h2></br>			<?php
			aff_cat("1", $connection);
			?>
		</div>
		<div class="w-1">.</div>
		<p class="clear"></p>
	</div>
	<div class="row">
		<div class="w-1"></div>
		<div class="w-10"><h2>Moniteurs</h2></br>			<?php
			aff_cat("2", $connection);
			?></div>
		<div class="w-1">.</div>
		<p class="clear"></p>
	</div>
	<div class="row">
		<div class="w-1"></div>
		<div class="w-10"><h2>Cartes Graphiques </h2></br>			<?php
			aff_cat("3", $connection);
			?></div>
		<div class="w-1">.</div>
		<p class="clear"></p>
	</div>



<!--		<div class="box">-->
<!--		<h1>Catégories</h1>-->
<!--		<h2> Cartes mères </h2>-->
<!--		<div class="cat">-->
<!--		</div>-->
<!--		<h2> Moniteurs </h2>-->
<!--		<div class="cat">-->
<!---->
<!--		</div>-->
<!--		<h2> Cartes Graphiques </h2>-->
<!--		<div class="cat">-->
<!---->
<!--		</div>-->
<!--	</div>-->




	<?php include 'footer.php' ?>
</body>
</html>