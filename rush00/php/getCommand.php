<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['rank'] != 2)
    header('Location: accueil.php');
include_once('header.php');

function affCommande($array)
{
    $i = 0;
    $len = count($array);
    while ($i < $len)
    {
        print($array['qte'][$i]); 			echo "<br/>";
        print($array['prix'][$i]); echo "<br/>";
        print($array['produit'][$i]); 			echo "<br/>";
        echo "<br/>";

        $i++;
    }
}
    if (($_POST['login'] || $_POST['idCmd']) && $_POST['get'] == "OK") {
        require_once("connectDB.php");
        if ($connection = connectDB())
        {
            if ($_POST['idCmd'])
                $queryCommandes = "SELECT * FROM commandes WHERE commandId = '".$_POST['idCmd']."';";
            else
                $queryCommandes = "SELECT * FROM commandes WHERE login = '".$_POST['login']."';";
            if (!($allCom = mysqli_query($connection, $queryCommandes)))
                echo "PROBLEME DB COMMANDES\n";
            else
            {
                while ($data = mysqli_fetch_assoc($allCom))
                {
                    if ($_POST['idCmd']) {
                        if ($data['id'] == $_POST['id']) {
                            echo ("<div class=\"w-5 box\">");
                            $tabcom = unserialize($data['command']);
                            echo "Commande ID:",$data['commandId'],"<br/>";
                            echo "Total TTC: ",$data['total'], "<br/>";
                            affCommande($tabcom);
                            echo("</div>");
                        }
                    }
                    elseif ($data['login'] == $_POST['login']) {
                        echo ("<div class=\"w-5 box\">");
                        $tabcom = unserialize($data['command']);
                        echo "Commande ID:",$data['commandId'],"<br/>";
                        echo "Total TTC: ",$data['total'], "<br/>";
                        affCommande($tabcom);
                        echo("</div>");
                    }

                }

            }
        }
    }
?>
    <p>Pour voir l'historique de commande(s) d'un utilisateur, rentrez son login ici ou son id :</p>
    <form action="getCommand.php" method="post">
        Identifiant: <input type="text" name="login" value="" placeholder="login"/></br>
        Id commande: <input type="text" name="idCmd" value="" placeholder="Id commande"/></br>
        <input type="submit" name="get" value="OK">
    </form>
    <br/></br>


<?php include_once ('footer.php'); ?>