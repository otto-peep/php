<?php
	session_start();
	if ($_GET[submit] == "OK")
	{
		$_SESSION[login] = $_GET[login];
		$_SESSION[password] = $_GET[password];
	}
?>
<html><body>
<form action="index.php" method="get">
	Identifiant: <input type="text" name="login" value="<?php echo $_SESSION["login"]?>" placeholder="login"/>
	Mot de passe: <input type="text" name="passwd" value="<?php echo $_SESSION["password"]; ?>" placeholder="password"/>
	<input type="submit" name="submit" value="OK">
</form>
</body></html>