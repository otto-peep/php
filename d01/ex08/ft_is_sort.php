<?php
	function ft_is_sort($arr)
	{
		if (is_array($arr))
		{
			$tmp = $arr;
			sort($tmp);
			foreach($tmp as $key=>$value)
			{
				if (strcmp($value, $arr[$key]) != 0)
					return false;
			}
			return true;
		}
	}	
?>