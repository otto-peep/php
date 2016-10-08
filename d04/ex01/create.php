<?php
	if ($_POST['submit'] !== "OK")
	{	echo("Error SUBMIT NOT OK\n");	
		return ;}
	if ($_POST['login'] && $_POST['passwd'])
	{
		if (!file_exists('private'))
		{
			mkdir('private');
		}
		if (file_exists('private/passwd'))
		{
			$dtbase = file_get_contents('private/passwd');
			$array = unserialize($dtbase);
			foreach($array as $tab)
			{
				foreach ($tab as $key => $value)
				{
					if ($key === 'login') && ($value === $_POST['login'])
					{
						echo "ERROR\n";
						return ;
					}
				}
			}
			$logs[] = ['login' => $_POST['login']
						'passwd' => hash('whirlpool', $_POST['passwd'], FALSE)];
			file_put_contents('private/passwd', serialize($logs));
		}
		else
		{
			$logs[] = ['login' => $_POST['login']
						'passwd' => hash('whirlpool', $_POST['passwd'], FALSE)];
			file_put_contents('private/passwd', serialize($logs));
		}
		echo "OK\n";
	}
	else
	{
		echo "ERROR\n";
		return ;
	}

?>