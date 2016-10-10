<?php
    if (!isset($_SESSION))
        session_start();
    if ($_SESSION['rank'] != 2)
             header('Location: accueil.php');
    include_once('header.php');

        if ($_GET['mod'] == "OK")
        {
            require_once("connectDB.php");
            $connection = connectDB();
            $queryModify = "UPDATE Article
            SET produit = '".$_GET['produit']."', description = '".$_GET['description']."', prix = '".$_GET['prix']."', img = '".$_GET['img']."', idCat = '".$_GET['idCat']."' WHERE idArticle = '".$_GET['idArticle']."';";
            if (!($result = mysqli_query($connection, $queryModify)))
            {
                echo  "Bad request SQL\n" . mysqli_error($connection)."<br/>";
                echo "Probleme dans la modification de la database";
            }
            else
            {
                echo "Le produit a été modifié avec succès.";
                echo "<a href=\"admin.php\">RETOUR A LA PAGE ADMIN</a>";
                return ;
            }
        }
        echo "<br/>";
        $content = "Que souhaitez vous faire ?</br></br>";
        $content .= "<form action=\"modProduct.php\" method=\"get\">";
        $content .= "Produit: <input type=\"text\" name=\"produit\" value=\"" . $_GET['produit'] . "\" placeholder=\"Produit\"/></br>";
        $content .= "Description: <input type=\"text\" name=\"description\" value=\"" . $_GET['description'] . "\" placeholder=\"Description\"/></br>";
        $content .= "Prix: <input type=\"number\" min=\"0\" name=\"prix\" value=\"" . $_GET['prix'] . "\" placeholder=\"XX.XX€\"/></br>";
        $content .= "Lien img(http): <input type=\"text\" name=\"img\" value=\"" . $_GET['img'] . "\" placeholder=\"http://www.google.fr/img\"/></br>";
        $content .= "Id catégorie (séparé par \";\"): <input type=\"number\" name=\"idCat\" max = \"150\" min = \"0\" value=\"" . $_GET['idCat'] . "\" placeholder=\"X;X:X;...\"/></br>";
        $content .= "<input type=\"hidden\" id=\"mod\" name=\"idArticle\" value=\"". $_GET['idArticle'] ."\">";
        $content .= "<input type=\"submit\" name=\"mod\" value=\"OK\">";
        $content .= "</form>";
        echo $content;
?>