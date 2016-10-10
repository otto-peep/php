<?php
	if (!isset($_SESSION))
    	session_start();
	if (!$_SESSION['login'])
		header('Location: connexion.php');
    include_once('header.php');
	
	function affCommande($array)
	{
		$i = 0;
		$array = array_filter($array);
		$len = count($array);
		while ($i < $len)
		{
				if ($array['qte'][$i])
				{
					echo "Quantité", $array['qte'][$i],"<br/>";
					echo "prix",$array['prix'][$i],"<br/>";
					print($array['produit'][$i]); 			echo "<br/>";
					echo "<br/>";
				}
			
			$i++;
		}
	}

	require_once('connectDB.php');
	if ($connection = connectDB())
	{
		$queryCommandes = "SELECT * FROM commandes WHERE login = '".$_SESSION['login']."';";
		if (!($allCom = mysqli_query($connection, $queryCommandes)))
			echo "PROBLEME DB COMMANDES\n";
		else
		{
			while ($data = mysqli_fetch_assoc($allCom))
			{
				if ($data['login'] == $_SESSION['login'])
				{
					echo ("<div class=\"w-5 box\">");
					$tabcom = unserialize($data['command']);
					echo "Heure de commande: ", $data['time'], "<br/>";
					echo "Reference de commande: ",$data['commandId'],"<br/>";
					echo "Total TTC: ",$data['total'], "<br/>";					
					affCommande($tabcom);
					echo("</div>");
				}
			}
			
		}
	}
?>




<?php include_once ("footer.php");