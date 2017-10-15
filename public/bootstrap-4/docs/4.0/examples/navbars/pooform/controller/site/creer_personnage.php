<?php
require '../../controller/site/pmanager.php';
require '../../controller/site/personnage.php';
// On crée un personnage
$perso = new Personnage([
	'nom' => 'Victor',
	'forcePerso' => 5,
	'degats' => 0,
	'niveau' => 1,
	'experience' => 0,
]);

require '../../model/site/bddcn.php';// Connection à la base de donnée
//Instance PDO
$manager = new PersonnagesManager($db);
//Ordre d'ajout en BDD
$manager->add($perso);

