#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		$arr1 = array();
		$arr2 = array();
		$arr3 = array();
		unset($argv[0]);
		foreach ($argv as $key=>$value)
		{
			$tmp = array_filter(explode(" ", trim($value, " ")));
			foreach($tmp as $key=>$value)
			{
				if (ctype_alpha($value) == 1)
					array_push($arr1, $value);
				else if (is_numeric($value) == 1)
					array_push($arr2, $value);
				else
					array_push($arr3, $value);
			}
		}
		natcasesort($arr1);
		sort($arr2, SORT_STRING);
		natcasesort($arr3);
		foreach ($arr1 as $key => $value) 
		{
			echo $value . "\n";
		}
		foreach ($arr2 as $key => $value) 
		{
			echo $value . "\n";
		}
		foreach ($arr3 as $key => $value) 
		{
			echo $value . "\n";
		}
	}
?>