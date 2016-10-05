#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		$s = $argv[1];
		$arr = array_filter(explode(" ", $s));
		$arr = array_values($arr);
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
