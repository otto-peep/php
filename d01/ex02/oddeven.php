#!/usr/bin/php
<?php
	while(2)
	{
		print"Entrer un nombre: ";
		if(fscanf(STDIN, "%s\n", $number))
		{
			if(is_numeric($number))
			{
				if (($number % 2) == 0)
					printf("Le chiffre %d est Pair\n", $number);
				else
					printf("Le chiffre %d est Impair\n", $number);
			}
			else
				print "'" . $number . "' n'est pas un chiffre\n" ;
		}
		else
		{
			print"\n";
			break ;	
		}
	}
?>