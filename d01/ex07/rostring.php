#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$s = $argv[1];
		$arr = split('/ +/', $s);
		$len = count($arr);
		$i = 0;
		while (++$i < ($len))
		{
			print($arr[$i]);
			print(" ");
		}
		print($arr[0]);
		print("\n");
	}

?>
