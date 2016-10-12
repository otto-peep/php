<?php
	class House {
		function introduce(){
			$this->getHouseName();
			echo "House " , $this->getHouseName(), " of ", $this->getHouseSeat(), " : ", $this->getHouseMotto() . PHP_EOL;
		}
	}
?>