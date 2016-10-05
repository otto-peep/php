<?php
	function ft_split ($s)
	{
		if (isset($s))
		{
			$arr = array_filter(explode(" ", trim($s, " ")));
			sort($arr);
			return $arr;
		}
	}
?>