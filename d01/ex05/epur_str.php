#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$s = $argv[1];
		$arr = array_filter(explode(" ", $s));
		$arr = array_values($arr);
		$len = count($arr);
		$i = -1;
		while (++$i < ($len - 1))
		{
			print($arr[$i]);
			print(" ");
		}
		print($arr[$i]);
		print("\n");
	}
?>