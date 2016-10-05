#!/usr/bin/php
<?php
	function ft_split ($s)
	{
		if (isset($s))
		{
			$arr = array_filter(explode(" ", trim($s, " ")));
			return $arr;
		}
	}


	if ($argc == 2)
	{
		$arr = ft_split($argv[1]);
		print_r($arr);
		
	}
	else
		echo "Incorrect Parameters";
?>