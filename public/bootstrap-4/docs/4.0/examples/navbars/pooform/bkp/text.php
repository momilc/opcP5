<?php

/**
* 
*/
class Text {

	public static function publicwithZero($chiffre){
		return self::withZero($chiffre);
		}

	
	private static function withZero($chiffre){
		if ($chiffre < 10) {
			return '0' .$chiffre;
		} else {
			return $chiffre;
		}
	}
}