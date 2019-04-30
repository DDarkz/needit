<?php

define("USAGER", "root");
define("PASSE", "");

try {
	$dns = 'mysql:host=localhost;dbname=bdservice;charset=utf8';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$connexion = new PDO($dns, USAGER, PASSE, $options);
} catch (Exception $e) {
	echo "Erreur de connexion à la base de donnée bdservice.";
	echo $e->getMessage();
	exit();
};

?>