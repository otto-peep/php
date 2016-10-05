#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		unset($argv[0]);
		foreach ($argv as $elem)
		{
			print($elem);
			echo "\n";
		}
	}
?>