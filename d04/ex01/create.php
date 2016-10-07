<?php /*/
	session_start();
	if ($_POST[submit] == "OK")
	{
		if ($_POST[login] == null || $_POST[passwd] == null)
		{
			echo "ERROR pas de login/mdp\n";
			exit();
		}
		if (file_exists("./private") == false)
		{	mkdir("./private"); }
		if (file_exists("./private/passwd") == false)
		{	file_put_contents("./private/passwd", ""); }
		$ids = file_get_contents("./private/passwd");
		$tab = unserialize($ids);

		$log = array("$_POST[login]", "$_POST[passwd]");
		foreach ($tab as $key=>$value)
		{
			$tmp = unserialize($value[0])
		//	echo ($tmp);
		//	if (log[0] === unserialize($value[0])
		//	{
		//		echo "ERROR l'utilisateur existe deja\n";
		//		exit ();
		//	}
		}		
		$tab[] = serialize($log);
		file_put_contents("./private/passwd", serialize($tab));
		$ids = file_get_contents("./private/passwd");
		$tab = unserialize($ids);
		$ex = unserialize($tab[0]);
		print_r($ex);
	}
	else
	{
		echo "ERROR submite != OK \n";
	}
?>
/*/?>
<?php
	session_start();
	if ($_POST[submit] !== "OK")
	{	echo("Error SUBMIT NOT OK\n");	
		exit(); }
	if ($_POST[login] == NULL || $_POST[passwd] == null)
	{
		echo("Error no login/pwd\n");
		exit();}
	$logs = array($_POST[login], $_POST[passwd]);
	if(file_exists("./private") == false)
	{	mkdir("./private");}
	if (file_exists("./private/passwd") == false)
	{
		file_put_contents("./private/passwd", "");
	}
	else
	{
		$content = unserialize(file_get_contents("./private/passwd"));
//	print($content[1]);
		foreach ($content as $key=>$value)
		{
			if((unserialize($value))[0] === $logs[0])
			{
				echo "ERROR doublon","<br/>";
				exit();
			}
		}
	}
	$content[] = serialize($logs);
	file_put_contents("./private/passwd", serialize($tab));
?>