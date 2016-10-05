#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		$arr = array();
		unset($argv[0]);
		foreach ($argv as $key=>$value)
		{
			$tmp = array_filter(explode(" ", trim($value, " ")));
			$arr = array_merge($arr, $tmp);
		}
		sort($arr);
		foreach ($arr as $key => $value) 
		{
			echo $value . "\n";
		}
	}
?>