INSERT INTO `ft_table` (`login`, `date_de_creation`)



SELECT (nom, date_naissance) FROM fiche_personne WHERE instr(nom, 'a') AND length(nom) < 9 ORDER BY nom LIMIT 10;
SELECT * FROM fiche_personne WHERE instr(nom, 'a') AND length(nom) < 9 ORDER BY nom LIMIT 10;