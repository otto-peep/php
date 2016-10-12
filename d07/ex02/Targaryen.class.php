<?php
	class Targaryen{
		function resistsFire(){
			return FALSE;
		}
		function getBurned(){
			if ($this->resistsFire())
				return ("emerges naked but unharmed");
			else
				return ("burns alive");
		}
	}
?>