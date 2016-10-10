<?php
$user = "root";
$passwd = "root";
$host = "localhost";
$connection = mysqli_connect($host, $user, $passwd);

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

$database = "DROP DATABASE IF EXISTS FT_MINISHOP";
if (!mysqli_query($connection, $database))
	echo "Error drop\n";

$str = "CREATE DATABASE IF NOT EXISTS FT_MINISHOP DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "USE `FT_MINISHOP`";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "DROP TABLE IF EXISTS `Article`;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "CREATE TABLE `Article` (
  `idArticle` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `produit` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(19,4) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idCat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('asus mobo', 'Carte mère trop bien', '350', '../img/cm_mobo.jpg', 1);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('MSI X99A', 'ca fait le café', '550', '../img/cm_msix99.png', 1);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('Asus Z10PE', 'Haut de gamme', '595', '../img/cm_z10pe.jpg', 1);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);


$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('Asus VS22', 'Ecran pas cher', '139.00', '../img/mo_vs22.jpg', 2);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('iiYama e24', 'Full HD 22pouces', '99', '../img/mo_iie24.jpg', 2);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('Acer KA22', 'Ecran polyvalent', '110', '../img/mo_ka22.jpg', 2);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('Sapphire R7', 'Entree de gamme', '70', '../img/cg_sar7.jpg', 3);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('Asus GT730', 'Meilleur rapport q/p', '90', '../img/cg_gt73.jpg', 3);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Article` (`produit`, `description`, `prix`, `img`, `idCat`) VALUES
('MSI RX480', 'Fais tourner word sans souci', '320', '../img/cg_rx48.png', 3);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "DROP TABLE IF EXISTS `Cat`;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "CREATE TABLE `Cat` (
  `idCat` int(10) NOT NULL PRIMARY KEY,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Cat` (`idCat`, `Description`) VALUES
(1, 'Carte mère');";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `Cat` (`idCat`, `Description`) VALUES
(2, 'Moniteurs');";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "DROP TABLE IF EXISTS `users`;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `droit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);


$str = "INSERT INTO `users` (`login`, `passwd`, `droit`) VALUES
('root', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 2);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "INSERT INTO `users` (`login`, `passwd`, `droit`) VALUES
('pocos', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1);";
if (!mysqli_query($connection, $str))
	echo "Error creating database: ". mysqli_error($connection);

$str = "CREATE TABLE `FT_MINISHOP`.`commandes` (
	 `commandId` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	 `command` VARCHAR(20000) NOT NULL ,
	 `total` INT(10) NOT NULL,
	 `login` VARCHAR(20) NOT NULL,
	 `time` VARCHAR(50) NOT NULL ) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if (!mysqli_query($connection, $str))
	echo "Errpr creating database: ". mysqli_error($connection);


if (!mysqli_query($connection, "ALTER TABLE `Article`
  MODIFY `idArticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;"))
	echo "Error creating database: ". mysqli_error($connection);

if (!mysqli_query($connection, "ALTER TABLE `Cat`
  MODIFY `idCat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;"))
	echo "Error creating database: ". mysqli_error($connection);

if (!mysqli_query($connection, "ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;"))
	echo "Error creating database: ". mysqli_error($connection);


$result = mysqli_query($connection, "SELECT * FROM `users`;");
if ($result)
{
	while ($row = mysqli_fetch_assoc($result)) {
//	    echo $row['id'] . "\n";
//	    echo $row['login'] . "\n";
//	    echo $row['passwd'] . "\n";
//	    echo $row['droit'] . "\n";
		}
}
else
	echo "ERROR QUERY FOR SELECT\n"; 
echo "DATABASE CREATED SUCCESSFULLY";

mysqli_close($connection);
?>
