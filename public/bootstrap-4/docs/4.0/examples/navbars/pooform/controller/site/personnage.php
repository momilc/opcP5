<?php
require '../../model/site/bddcn.php';

/**
* 
*/

class Personnage
{
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;

	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees)

	{
		foreach ($donnees as $key => $value) 
		{
			$id = 'set'.ucfirst($key);

			if (method_exists($this, $id)) 
			{
				$this->$_id($id);
			}

			if (method_exists($this, $nom)) 
			{
				$this->$_nom($nom);
			}

			if (method_exists($this, $forcePerso)) 
			{
				$this->$_forcePerso($forcePerso);
			}

			if (method_exists($this, $degats)) 
			{
				$this->$_degats($degats);
			}

			if (method_exists($this, $niveau)) 
			{
				$this->$_niveau($niveau);
			}

			if (method_exists($this, $experience)) 
			{
				$this->$_experience($experience);
			}
		}
	}
/* PARCOURS du tableau $donnees (avec pour clé $cle et pour valeur $valeur)
  On assigne à $setter la valeur « 'set'.$cle », en mettant la 
  première lettre de $cle en majuscule (utilisation de ucfirst())
  SI la méthode $setter de notre classe existe ALORS
    On invoque $setter($valeur)
  FIN SI
FIN PARCOURS*/



	// Liste des getters ****************************

	public function id() { return $this->_id; }
	public function nom() { return $this->_nom; }
	public function forcePerso() { return $this->_forcePerso; }
	public function degats() { return $this->_degats; }
    public function niveau() { return $this->_niveau; }
	public function experience() { return $this->_experience; }

	// Liste des setters *******************************

	public function setId($id)
	{
	 // On convertit l'argument en nombre entier.
    // Si c'en était déjà un, rien ne changera.
    // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).

	    $id = (int) $id;
	    // On vérifie ensuite si ce nombre est bien strictement positif.
	    if ($id > 0) 
	    {
	    	// Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut 
	    	$this->_id = $id;
	    }
	}

	public function setNom($nom)
	{
	 // On vérifie qu'il s'agit bien d'une chaine de caractères.

		if (is_string($nom)) 
		{
			$this->_nom = $nom;
		}
	}

	public function setForcePerso($forcePerso)
	{
	 // On convertit l'argument en nombre entier

		$forcePerso = (int) $forcePerso;

		if ($forcePerso >= 1 && $forcePerso <= 100)
		 
		{
			$this->_forcePerso = $forcePerso;
		}
	}

	public function setDegats($degats)
    {
    $degats = (int) $degats;
    
	    if ($degats >= 0 && $degats <= 100)
	    {
	      $this->_degats = $degats;
	    }
  	}
  
  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    
	    if ($niveau >= 1 && $niveau <= 100)
	    {
	      $this->_niveau = $niveau;
	    }
  }
  
  public function setExperience($experience)
  {
    $experience = (int) $experience;
    
	    if ($experience >= 1 && $experience <= 100)
	    {
	      $this->_experience = $experience;
	    }
  }

}


//Recherche BDD
$request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnage');
while ($donnees = $request->fetch(PDO::FETCH_ASSOC))// Chaque entrée sera récupérée et placée dans un array.
{
// On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
// On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
$perso = new Personnage($donnees);

 }