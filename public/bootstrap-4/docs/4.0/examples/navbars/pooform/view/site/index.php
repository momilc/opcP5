<!DOCTYPE html>
<html>
<head>
	<title>Les Classes en POO</title>
</head>

<body>
<?php

require '../../controller/site/pmanager.php';
require '../../controller/site/personnage.php';

?>

<?php
	echo $donnees[$perso->nom()], ' a ', $perso->forcePerso(), ' de force, ', $perso->degats(), ' de dégâts, ', $perso->experience(), ' d\'expérience et est au niveau ', $perso->niveau();
?>



</body>
</html>