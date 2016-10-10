<?php
	if (!isset($_SESSION))
    	session_start();
	if ($_SESSION['rank'] != 2)
   		header('Location: accueil.php');
   	include_once('header.php');
	require_once("connectDB.php");
    $connection = connectDB();
    $queryDel = "DELETE FROM Article WHERE idArticle = '".$_GET['idArticle']."';";
    echo $queryDel;
    if (!($result = mysqli_query($connection, $queryDel)))
    {
    	echo  "Bad request SQL\n" . mysqli_error($connection)."<br/>";
        echo "Probleme dans la suppression de la database";
    }
    else
    {
                echo "Le produit a été supprimé avec succès.";
                echo "<a href=\"admin.php\">RETOUR A LA PAGE ADMIN</a>";
                return ;
            }
?>