<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
include('Euron.class.php');
$euron = new Euron();

print($euron->familyMotto . PHP_EOL);
?>

