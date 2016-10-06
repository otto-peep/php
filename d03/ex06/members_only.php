<?php
	if (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] == 'zaz' && isset($_SERVER['PHP_AUT_PW']) && $_SERVER['PHP_AUT_PW'] == "jaimelespetitsponeys") 
	{
		echo "bravo";
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Espace membres"');
    	header("HTTP/1.0 401 Unauthorized");
	}
?>