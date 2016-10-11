UPDATE ft_table
	   SET date_de_creation = DATE_ADD(date_de_creation, INTERVAL 20 YEAR)
	   WHERE ft_table.id > 5;