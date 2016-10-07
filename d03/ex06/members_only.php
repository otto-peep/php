<?php
	if ((isset($_SERVER['PHP_AUTH_USER']) && ($_SERVER['PHP_AUTH_USER'] == "zaz")) && (isset($_SERVER['PHP_AUTH_PW']) && ($_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")))
	{
		$s = file_get_contents('../img/42.png');
		$s1 = base64_encode($s);
		echo "<html><body>\nBonjour Zaz<br />\n<img src='data:img/png;base64,".$s1."'>\n</body></html>";
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Espace membres"');
    	header("HTTP/1.0 401 Unauthorized");
		print("<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n");
	}
?>