<?php

/**
* 
*/
class Personnage
{	//Propriété = variables
	public $vie = 80;
	public $atk = 20;
	public $nom;

	//methodes = fonctions

	public function __construct($nom)//constructeur de paramètres
	{
		$this->nom = $nom;
	}

	public function regenerer($vie = null)
	{
		if(is_null($vie)) {

			$this->vie = 100;//

		} else {

			$this->vie += $vie;
		}
	}

	public function mort()
	{
		return $this->vie <= 0;//
	}

	public function attaque($cible)
	{
		//$this// Attaquant
		//$cible // Defenseur
		$cible->vie -= $this->atk; // defenseur.vie -= attaquant.atk
	}

	// public function crier()
	// {
	// echo "LEEROY JENKINS";	
	// }



}