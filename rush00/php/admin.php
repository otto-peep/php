<?php

    if (!isset($_SESSION))
        session_start();
    if ($_SESSION['rank'] != 2) {
        header('Location: accueil.php');
    }
    include_once('header.php');
    function aff_art($connection)
    {
        if (!($result = mysqli_query($connection, "SELECT * FROM `Article`;")))
            echo  "Bad request SQL\n" . "<br/>";
        while ($row = mysqli_fetch_array($result))
        {
            echo "<img class=\"art-image\" src=",$row['img']," alt=\"image manquante\"/>";
            echo $row['produit'] , "<br/>", $row['description'] , "<br/>", $row['prix'] . "<br/>" , $row['idCat'] , "<br/>";
            echo $row['idArticle'];
            echo"<form action=\"modProduct.php\" method=\"get\">
            <input type=\"hidden\" id=\"mod\" name=\"produit\" value=\"". $row['produit'] ."\">
            <input type=\"hidden\" id=\"mod\" name=\"description\" value=\"". $row['description'] ."\">
            <input type=\"hidden\" id=\"mod\" name=\"prix\" value=\"". $row['prix'] ."\">
            <input type=\"hidden\" id=\"mod\" name=\"idCat\" value=\"". $row['idCat'] ."\">
            <input type=\"hidden\" id=\"mod\" name=\"img\" value=\"". $row['img'] ."\">
            <input type=\"hidden\" id=\"mod\" name=\"idArticle\" value=\"". $row['idArticle'] ."\">
                 <input type=\"submit\" id=\"mod\" name=\"";echo $row['idArticle'];echo "\" value=\"Modifier\">";
                echo"</form>";
            echo "<form action =\"delProduct.php\" method=\"get\">
            <input type=\"hidden\" id=\"del\" name=\"idArticle\" value=\"".$row['idArticle'] ."\">
            <input type=\"submit\" id=\"del\" name=\"Supprimer\" value=\"SUPPRIMER\">";
        }
        echo "<p class=\"clear\"></p></div>";
    }
    echo "</br>
            <div class=\"row\">
            <div class=\"w-1\">.</div>
            <a href=\"addUser.php\" class=\"noUnderline\"><div class=\"w-10 case\">Interagir sur un utilisateur</div></a>
            <div class=\"w-1\">.</div>
            <p class=\"clear\"></p>
            </div>";
echo " <div class=\"row\">
            <div class=\"w-1\">.</div>
            <a href=\"getCommand.php\" class=\"noUnderline\"><div class=\"w-10 case\">Voir commande</div></a>
            <div class=\"w-1\">.</div>
            <p class=\"clear\"></p>
            </div>";
echo " <div class=\"row\">
            <div class=\"w-1\">.</div>
            <a href=\"getLog.php\" class=\"noUnderline\"><div class=\"w-10 case\">Voir log</div></a>
            <div class=\"w-1\">.</div>
            <p class=\"clear\"></p>
            </div>";
echo " <div class=\"row\">
            <div class=\"w-1\">.</div>
            <a href=\"addProduct.php\" class=\"noUnderline\"><div class=\"w-10 case\">Ajouter un nouveau produit</div></a>
            <div class=\"w-1\">.</div>
            <p class=\"clear\"></p>
            </div>";
    require_once ("connectDB.php");
    if ($connection = connectDB()) {
        aff_art($connection);
    }



include_once ('footer.php');
?>
