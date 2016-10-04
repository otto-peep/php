<?php
	$s = "Hello       	World AAA";
	function ft_split ($s)
	{
		$arr = explode(" ", $s);
		if ($s)
			sort($arr);
		print_r($arr);
		return ($arr);
	}
	ft_split($s);
?>