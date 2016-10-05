#!/usr/bin/php
<?php
	include("ft_is_sort.php");
	
	$tab = array("b", "a");
	//$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
	if (ft_is_sort($tab))
		echo "Le tableau est trie\n";
	else
		echo "Le tableau n’est pas trie\n";
?>