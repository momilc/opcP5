  <?php

  	// Mutateur chargé de modifier l'attribut $_force.
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
    
    $this->_force = $force;
  	}