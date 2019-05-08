<?php
require_once("../bd/connexion.php");
session_start();

$rep=array();

function ctlListerMembresAdmin() {
	global $connexion, $rep;
	$sql = "SELECT * FROM utilisateur";
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
		echo "Problème controleur pour lister annonces.";
	 }finally {
		unset($connexion);
		unset($stmt);
		echo json_encode($rep);
	 }
}

function ctlListerAnnoncesMembres() {
	global $connexion, $rep, $idSession;
	$idDemandeur = $_POST['idDemandeur'];
	$sql = "SELECT * FROM annonce WHERE idDemandeur='$idDemandeur'";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute(array($idDemandeur));
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
	 } catch (Exception $e){
		echo "Problème controleur pour lister annonces de ce membre.";
	 }finally {
		unset($connexion);
		unset($stmt);
		echo json_encode($rep);
	 }
}

function ctlListerAnnonces() {
	global $connexion, $rep;
	$sql = "SELECT * FROM annonce";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute();
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
	 } catch (Exception $e){
		echo "Problème controleur pour lister annonces.";
	 }finally {
		unset($connexion);
		unset($stmt);
		echo json_encode($rep);
	 }
}

function ctlDeleteMembres() {
	global $connexion, $rep;
	$idUser=$_POST['idUser'];
	$sqlD = "DELETE FROM utilisateur WHERE idUser='$idUser'";
	
		 $stmtD = $connexion->prepare($sqlD);
		 $stmtD->execute(array($idUser));

	$sqlC = "DELETE FROM connexion WHERE idUser='$idUser'";
	
		 $stmtC = $connexion->prepare($sqlC);
		 $stmtC->execute(array($idUser));
}

function ctlDeleteAnnonce() {
	global $connexion, $rep;
	$idAnnonce=$_POST['idAnnonce'];
	$sqlD = "DELETE FROM annonce WHERE idAnnonce='$idAnnonce'";
	
		 $stmtD = $connexion->prepare($sqlD);
		 $stmtD->execute(array($idUser));
		//  echo "Le membre $idUser à été enlevé.";
}


// controleur
$action=$_POST["action"];
switch ($action) {
	case 'actCtlListerMAdmin':
		ctlListerMembresAdmin();
		break;
	case 'actCtlListerA':
		ctlListerAnnoncesAdmin();
		break;
	case 'actCtlLister':
		ctlListerAnnonces();
		break;
	case 'actCtlDeleteMembre':
		ctlDeleteMembres();
		break;
	case 'actCtlDeleteAnnonce':
		ctlDeleteAnnonce();
		break;
	case 'actCtlListerAnnoncesMembres':
		ctlListerAnnoncesMembres();
		break;

		
}


?>