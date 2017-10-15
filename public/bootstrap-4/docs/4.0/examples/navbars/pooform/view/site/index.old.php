<!DOCTYPE html>
<html>
<head>
	<title>Les Classes en POO</title>
</head>

<body>
<?php

require '../../controller/site/code.php';
require '../../controller/site/maclasse.php';
?>

<?php
	echo 'Le personnage 1 a ' .$perso1->force(). ' de force, contrairement au personnage 2 qui a ' .$perso2->force(). ' de force.<br />';
	echo 'Le personnage 1 a ' .$perso1->experience(). ' d\'expérience, contrairement au personnage 2 qui a ' .$perso2->experience(). ' d\'expérience.<br />';
	echo 'Le personnage 1 a ' .$perso1->degats(). ' de dégâts, contrairement au personnage 2 qui a ' .$perso2->degats(). ' de dégâts.<br />';

	echo 'Le constructeur a été instancié ' .MaClasse::getCompteur(). ' fois.<br />';
?>



</body>
</html>