#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$s = $argv[1];
		$arr = preg_split('/ +/', $s, -1, PREG_SPLIT_NO_EMPTY);
		$len = count($arr);
		$i = -1;
		while (++$i < ($len -1))
		{
			print($arr[$i]);
			print(" ");
		}
		print($arr[$i]);
		print("\n");
	}

?>