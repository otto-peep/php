#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$n1 = trim($argv[1]);
		$n2 = trim($argv[3]);
		$op = trim($argv[2]);
		if (strcmp($op, "+") == 0)
			{echo ($n1 + $n2);}
		else if (strcmp($op, "-") == 0)
			{echo ($n1 - $n2);}
		else if (strcmp($op, "/") == 0)
			{echo ($n1 / $n2);}
		else if (strcmp($op, "%") == 0)
			{echo ($n1 % $n2);}
		else if (strcmp($op, "*") == 0)
			{echo ($n1 * $n2);}
	}
	else
		echo "Incorrect Parameters";
?>