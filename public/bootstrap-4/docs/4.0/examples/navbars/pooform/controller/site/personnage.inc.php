<?php
 // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
  // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
require '../../model/site/bddcn.php';

 $perso = new Personnage($donnees);

 } 