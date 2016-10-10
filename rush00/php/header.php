<?php
	function fileName($name) {
		if ($name == "Accueil")
			return "accueil.php";
		elseif ($name == "Produits")
			return "produits.php";
		elseif ($name == "Panier")
			return "panier.php";
		elseif ($name == "Connexion")
			return "connexion.php";
		elseif ($name == "Profile")
			return "profile.php";
		elseif ($name == "Admin")
			return "admin.php";
		elseif ($name == "Déconnexion")
			return "logout.php";
		elseif($name == "Commandes")
			return"commandes.php";
		elseif($name == "Inscription")
			return"register.php";
	}

	function namePage ($name) {
		if ($name == "accueil.php")
			return "Accueil";
		elseif ($name == "produits.php")
			return "Produits";
		elseif ($name == "panier.php")
			return "Panier";
		elseif ($name == "connexion.php")
			return "Connexion";
		elseif ($name == "profile.php")
			return "Profile";
		elseif ($name == "admin.php")
			return "Admin";
		elseif ($name == "logout.php")
			return "Déconnexion";
		elseif ($name == "commandes.php")
			return ("Commandes");
		elseif ($name == "register.php")
			return ("Inscription");
	}

	function setActiveTopLeftNavbar($name) {
		if (basename($_SERVER["PHP_SELF"]) == fileName($name)) {
			echo "<li><a href=\"#" . $name . "\" class=\"active\">" . $name . "</a></li>";
		}
		else
			echo "<li><a href=\"" . fileName($name) . "\">" . $name . "</a></li>";

	}

	function setActiveTopRightNavbar($name) {
		if (basename($_SERVER["PHP_SELF"]) == fileName($name)) {
			echo "<li style=\"float:right\"><a href=\"#" . $name . "\" class=\"active\">" . $name . "</a></li>";
		}
		else
			echo "<li style=\"float:right\"><a href=\"" . fileName($name) . "\">" . $name . "</a></li>";

	}


	echo "<!DOCTYPE html>
		<html>
		<head>
			<title>" . namePage(basename($_SERVER["PHP_SELF"])) . "</title>
			<link rel=\"stylesheet\" href=\"../css/style.css\">
		</head>
		<body>";
	echo "<ul>";
			setActiveTopLeftNavbar('Accueil');
			setActiveTopLeftNavbar('Produits');
			setActiveTopLeftNavbar('Panier');
			if ($_SESSION['rank'] !== 0)
				setActiveTopLeftNavbar('Commandes');
			if($_SESSION['rank'] == 2)
				setActiveTopLeftNavbar('Admin');
			if (empty($_SESSION['login'])) {
				setActiveTopRightNavbar('Inscription');
				setActiveTopRightNavbar('Connexion');
			}
			else {
				setActiveTopRightNavbar('Profile');
				setActiveTopRightNavbar('Déconnexion');
			}
	echo "</ul>";

?>
