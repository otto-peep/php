<?php
Class Color {
	
	public $red = 10;
	public $green = 20;
	public $blue = 30;
	public $rgb;

	function __construct() {
		print( 'Constructor called' . PHP_EOL);
	}

	function __destruct(){
		print( 'Destructor called' . PHP_EOL);
	}

	function __toString(){
		return 'Color( red: ' . $red . ', green: ' . $green . ', blue: ' . $blue ')\n';
	}
}

$rgb = array();
$instance = new Color();
print($instance . PHP_EOL);
?>