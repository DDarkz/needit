<?php

// define("USAGER", "root");
// define("PASSE", "");

define("USAGER", "surplus_gofor");
define("PASSE", "!gofor2019");


try {
	// $dns = 'mysql:host=localhost;dbname=bdservice;charset=utf8';
	$dns = 'mysql:host=surplus-inventaire.com;dbname=
	surplus_goforBaseDonnee;charset=utf8';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$connexion = new PDO($dns, USAGER, PASSE, $options);
} catch (Exception $e) {
	echo "Erreur de connexion à la base de donnée.";
	echo $e->getMessage();
	exit();
};

?>