#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$s = $argv[1];
		$arr = array_filter(explode(" ", trim($s)));
		print_r($arr);
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