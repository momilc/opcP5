<?php 

/**
* Ma première classe POO
*/
class Personnage
{	
//Déclaration des attributs de la classe Personnage avec ses valeurs par défaut
	private $_force;
  	private $_localisation;
  	private $_experience;
  	private $_degats;

 //Déclaration des constantes en rapport avec la force

  	const FORCE_PETITE = 20;
  	const FORCE_MOYENNE = 50;
  	const FORCE_GRANDE = 80;

  // Variable statique PRIVÉE.
  private static $_texteADire = 'Je vais tous vous tuer !';

	public function __construct($forceInitiale, $degats)
	{

	$this->setForce($forceInitiale);
	$this->setDegats($degats);
	$this->_experience = 1;
	}

// Les méthodes de la classe Personnage

	// public function frapper(Personnage $persoAFrapper) 
	// {
	// 	$persoAFrapper->_degats += $this->_force;
	// }
	public function frapper() 
	{
		$this->_degats += $this->_force;
	}

	public function gagnerExperience() 
	// Ceci est un raccourci qui équivaut à écrire « $this->_experience = $this->_experience + 1 »
    // On aurait aussi pu écrire « $this->_experience += 1 »
	{
		$this->_experience++;
	}

	// Mutateur chargé de modifier l'attribut $_force.
  	public function setForce($force)
  	{

	    if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
	    {

	      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
	      return;
	    }
	    
	    if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
	    {
	      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
	      return;
	    }

	    if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) 
	    	{
	    	$this->_force = $force;
	  	}
	}

  	  	// Mutateur chargé de modifier l'attribut $_degats.
  	public function setDegats($degats)
  	{
    if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Les dégats infligés à un personnage doivent être représentés par un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($degats > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('Les dégats infligés à un personnage ne peuvent dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_degats = $degats;
  	}
  
  	// Mutateur chargé de modifier l'attribut $_experience.
  	public function setExperience($experience)
  	{
    if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_experience = $experience;
  	}

	// Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
	public function degats() 
	{
		return $this->_degats;
	}
	// Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
	public function force() 
	{
		return $this->_force;
	}
	// Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
	public function experience() 
	
	{
		return $this->_experience;
	}

	// Notez que le mot-clé static peut être placé avant la visibilité de la méthode (ici c'est public).
  	public static function parler()
  	{
    echo 'Ils sont chauds les mecs ! Alors voici les personnages :<br/>';
    // variable static
    echo self::$_texteADire; // On donne le texte à dire.
  	}


}
