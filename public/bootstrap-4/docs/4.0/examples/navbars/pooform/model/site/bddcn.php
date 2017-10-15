<?php

// On admet que $db est un objet PDO

try
	{
	$db = new PDO('mysql:host=localhost;dbname=personnages', 'root','mokdgx620', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Excepetion $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

