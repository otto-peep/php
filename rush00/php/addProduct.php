<?php
	if (!isset($_SESSION))
    	session_start();
	if ($_SESSION['rank'] != 2)
	    header('Location: accueil.php');
        include_once('header.php');
    
        if ($_GET['add'] == "OK" && $_GET['produit'] && $_GET['description'] && $_GET['prix'] && $_GET['img'] && $_GET['idCat'])
        {
            require_once("connectDB.php");
            $connection = connectDB();
            $queryAdd = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
			('".$_GET['produit']."', '".$_GET['description']."', '".$_GET['prix']."', '".$_GET['img']."', '".$_GET['idCat']."');";
            if (!($result = mysqli_query($connection, $queryAdd)))
            {
                echo  "Bad request SQL\n" . mysqli_error($connection)."<br/>";
                echo "Probleme dans l'ajout dans la database";
            }
            else
            {
                echo "Le produit a été ajouté avec succès.";
                echo "<a href=\"admin.php\">RETOUR A LA PAGE ADMIN</a>";
                return ;
            }
        }
       	else if ($_GET['add'] == "OK")
       	{
       		echo "ATTENTION, VOUS DEVEZ REMPLIR TOUS LES CHAMPS!";
       	}
        echo "<br/>";
        $content = "Veuillez entrer les informations sur le produit?</br></br>";
        $content .= "<form action=\"addProduct.php\" method=\"get\">";
        $content .= "Produit: <input type=\"text\" name=\"produit\" value=\"" . $_GET['produit'] . "\" placeholder=\"Produit\"/></br>";
        $content .= "Description: <input type=\"text\" name=\"description\" value=\"" . $_GET['description'] . "\" placeholder=\"Description\"/></br>";
        $content .= "Prix: <input type=\"number\" min=\"0\" name=\"prix\" value=\"" . $_GET['prix'] . "\" placeholder=\"XX.XX€\"/></br>";
        $content .= "Lien img(http): <input type=\"text\" name=\"img\" value=\"" . $_GET['img'] . "\" placeholder=\"http://www.google.fr/img\"/></br>";
        $content .= "Id catégorie: <input type=\"number\" name=\"idCat\" max = \"150\" min = \"0\" value=\"" . $_GET['idCat'] . "\" placeholder=\"X;X:X;...\"/></br>";
        $content .= "<input type=\"hidden\" id=\"add\" name=\"idArticle\" value=\"". $_GET['idArticle'] ."\">";
        $content .= "<input type=\"submit\" name=\"add\" value=\"OK\">";
        $content .= "</form>";
        echo $content;
?>