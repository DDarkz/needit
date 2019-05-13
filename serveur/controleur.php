<?php
require_once("../bd/connexion.php");
session_start();

$rep=array();
$message='';
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
	global $connexion, $rep, $idSession, $message;
	$idDemandeur = $_POST['idDemandeur'];
	$sql = "SELECT * FROM annonce WHERE idDemandeur='$idDemandeur'";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute(array($idDemandeur));
		 if ($stmt->rowCount() > 0){
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$rep[]=$ligne;
			 }
		 } else {
			$rep['msg'] = "Vous n'avez aucune annonnces.";
			// $message = "Vous n'avez aucune annonnces.";
		 }
	 } catch (Exception $e){
		echo "Problème controleur pour lister annonces de ce membre.";
	 } finally {
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

function ctlListerAnnoncesIndex() {
	global $connexion, $rep;
	$sql = "SELECT * FROM annonce ORDER BY idAnnonce DESC LIMIT 3";
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

function ctlListerAnnoncesDetail() {
	global $connexion, $rep;
	$idAnnonce=$_POST['idAnnonce'];
	$sql = "SELECT * FROM annonce WHERE idAnnonce='$idAnnonce'";
	try{
		 $stmt = $connexion->prepare($sql);
		 $stmt->execute(array($idAnnonce));
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
	 } catch (Exception $e){
		echo "Problème controleur pour lister annonces détail.";
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

// function ctlModifierAnnonce() {
// 	global $connexion, $rep;
// 	$idAnnonce=$_POST['idAnnonce'];
// 	$titre=$_POST['titre'];
// 	$liste=$_POST['liste'];
// 	$codepostal=$_POST['codepostal'];
// 	$service=$_POST['service'];
// 	$tmp=$_FILES['photo']['tmp_name'];
// 	$sql = "UPDATE annonce SET titre=?, liste=?, codepostal=?, photo=? WHERE idAnnonce='$idAnnonce'";
	
// 		 $stmt = $connexion->prepare($sql);
// 		 $stmt->execute(array($titre, $liste, $codepostal, $service));
// 		//  echo "Le membre $idUser à été enlevé.";
// }

function ctlDeleteAnnonce() {
	global $connexion, $rep;
	$idAnnonce=$_POST['idAnnonce'];
	$sqlD = "DELETE FROM annonce WHERE idAnnonce='$idAnnonce'";
	
		 $stmtD = $connexion->prepare($sqlD);
		 $stmtD->execute(array($idAnnonce));
		 $rep['msg'] = "Votre annonces est effacé.";
		 echo json_encode($rep);
}

function ctlMontrerAnnonce(){
	global $connexion, $rep;
	$idAnnonce=$_POST['idAnnonce'];
	$sql="SELECT * FROM annonce WHERE idAnnonce='$idAnnonce'";
	try{
		$stmt = $connexion->prepare($sql);
		$stmt->execute(array($idAnnonce));
		while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			// echo "bonjour";
		   $rep[]=$ligne;
		}
	} catch (Exception $e){
	   echo "Problème controleur pour afficher l'annonce.";
	}finally {
	   unset($connexion);
	   unset($stmt);
	   echo json_encode($rep);
	}
}

function modifier(){
	require_once("../librairie/gestionFichiers.inc.php");
	global $connexion, $rep;
	$idAnnonce=$_POST['idAnnonce1'];
	$titre=$_POST['titre'];
	$listeAchat=$_POST['liste'];
	$tmp=$_FILES['photo']['tmp_name'];
	$requete="SELECT pochette FROM annonce WHERE idAnnonce=?";
	$stmt=$connexion->prepare($requete);
	$stmt->execute(array($idAnnonce));
	$ligne=$stmt->fetch(PDO::FETCH_OBJ);
	$pochette=$ligne->pochette;
	if($tmp !== ""){
		//Je dois enlever l'ancienne pochete
		$dossier='../images/';
		if($pochette !== "avatar.jpg"){
			enleverFichier($dossier,$pochette);
		}
		$nomPochette=sha1($titre.time());
		$pochette=deposerFichier("photo",$dossier,$nomPochette);
	}
	$requete="UPDATE annonce SET titre=?,listeAchat=?,pochette=? WHERE idAnnonce=?";
	$stmt=$connexion->prepare($requete);
	$stmt->execute(array($titre,$listeAchat,$pochette,$idAnnonce));
	$rep['msg']="Annonce $idAnnonce bien modifie";
	unset($connexion);
	unset($stmt);
	echo json_encode($rep);
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
	case 'actCtlListerIndex':
		ctlListerAnnoncesIndex();
		break;
	case 'actCtlListerDetail':
		ctlListerAnnoncesDetail();
		break;
	case 'actCtlDeleteMembre':
		ctlDeleteMembres();
		break;
	case 'actMontrerAnnonce':
		ctlMontrerAnnonce();
		break;
	case 'modifier':
			modifier();
		break;
	case 'actCtlDeleteAnnonce':
		ctlDeleteAnnonce();
		break;
	case 'actCtlListerAnnoncesMembres':
		ctlListerAnnoncesMembres();
		break;

		
}


?>