<?php
require_once("../bd/connexion.php");
session_start();

$rep=array();

function ctlListerMembres() {
	global $connexion, $rep;
	$sql = "SELECT * FROM connexion";
	// $rep="";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute();
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
	 }catch (Exception $e){
		echo "Problème controleur pour lister membres.";
	 }finally {
		unset($connexion);
		unset($stmt);
		echo json_encode($rep);
	 }
}


function ctlListerAnnoncesAdmin() {
	global $connexion, $rep;
	$sql = "SELECT * FROM annonce";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute();
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
	 } catch (Exception $e){
		echo "Problème controleur pour lister membres.";
	 }finally {
		unset($connexion);
		unset($stmt);
		echo json_encode($rep);
	 }
}


// controleur
$action=$_POST["action"];
switch ($action) {
	case 'actCtlListerM':
		ctlListerMembres();
		break;
	case 'actCtlListerA':
		//echo "coucou!!!";
		ctlListerAnnoncesAdmin();
		break;
}


?>