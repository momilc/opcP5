<?php

/**
* 
*/
class MaClasse
{
	private static $_compteur = 0;
	
	public function __construct()
	{
		self::$_compteur++;
		
	}

	public static function getCompteur() 
	{
		return self::$_compteur;
	}

}

$compter1 = new MaClasse;
$compter2 = new MaClasse;
$compter3 = new MaClasse;
$compter4 = new MaClasse;
$compter5 = new MaClasse;
$compter6 = new MaClasse;
$compter7 = new MaClasse;