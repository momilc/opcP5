<?php
require '../../model/site/bddcn.php';
/**
* 
*/

class PersonnagesManager
{
	
	private $_db; // Instance de PDO

	public function __construct($db) 
	{
		$this->setDb($db);
	}

	public function add(Personnage $perso)
	{
	$q = $this->_db->prepare('INSERT INTO personnage(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');// Préparation de la requête d'insertion.
    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);// Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
    $q->execute();// Exécution de la requête.
	}

	public function delete(Personnage $perso)
	{
		$this->_db->exec('DELETE FROM personnage WHERE id = '.$perso->id());// Exécute une requête de type DELETE
	}

	public function get($id)
	{ // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
		$id = (int) $id;

		$q = $this->_id->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnage WHERE  id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Personnage($donnees);
	}

	public function getList()
	{ // Retourne la liste de tous les personnages.
		$perso = [];

		$q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnage ORDER BY nom');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
		{
			$perso[] = new Personnage($donnees);
		}

		return $perso;
	}

	public function update(Personnage $perso)
	{
	$q = $this->_db->prepare('UPDATE personnage SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, expérience = :experience WHERE id = :id');// Prépare une requête de type UPDATE.
        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);// Assignation des valeurs à la requête.
    $q->execute();// Exécution de la requête.
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

}





