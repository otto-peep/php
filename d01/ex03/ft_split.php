<?php
	function ft_split ($s)
	{
		if (isset($s))
		{
			$arr = preg_split('/ +/', $s, -1, PREG_SPLIT_NO_EMPTY);
			sort($arr);
			return ($arr);
		}
	}
?>