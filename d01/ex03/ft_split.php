<?php
	function ft_split ($s)
	{
		$arr = preg_split('/ +/', $s, -1, PREG_SPLIT_NO_EMPTY);
		if ($s)
			sort($arr);
		return ($arr);
	}
?>