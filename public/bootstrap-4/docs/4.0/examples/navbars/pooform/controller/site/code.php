<?php

require '../../controller/site/personnage.php'; // Appel de la classe Personnage

	//Valeur par défaut des $_force et et $_degats

	$perso1 = new Personnage (Personnage::FORCE_MOYENNE, 0);
	$perso2 = new Personnage(Personnage::FORCE_GRANDE, 10);

	Personnage::parler(); 
	?>
	<br/>
	<?php

	//Valeur par défaut de experience et frapper
	$perso1->setExperience(2);
	$perso2->setExperience(58);

	$perso1->frapper($perso2);  // $perso1 frappe $perso2
	$perso1->gagnerExperience(); // $perso1 gagne de l'expérience

	$perso2->frapper($perso1);  // $perso2 frappe $perso1
	$perso2->gagnerExperience(); // $perso2 gagne de l'expérience



header("Localisation: ../../view/site/index.html.twig");