<?php
    namespace Tutoriel;

    class Archer extends Personnage {

        protected $vie = 40;

		public function attaque($cible)
	    {
		$cible->vie -= $this->atk;
		$cible->empecher_negatif();
	    }
     }