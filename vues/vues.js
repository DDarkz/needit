function vueListerMembres(dataMembres){
	rep="<h2>Liste des membres</h2>";
	rep+="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Prénom</th><th scope="col">Date Naissance</th><th scope="col">Ville</th><th scope="col">Code Postal</th><th scope="col">Téléphone</th></tr>';
	var taille = dataMembres.length;
	for(i=0; i<taille; i++) {
		ligne=dataMembres[i];
		rep+="<tr>";
		rep+="<td>"+(ligne.idUser)+"</td>";
		rep+="<td>"+(ligne.nom)+"</td>";
		rep+="<td>"+(ligne.prenom)+"</td>";
		rep+="<td>"+(ligne.dateNaissance)+"</td>";
		rep+="<td>"+(ligne.ville)+"</td>";
		rep+="<td>"+(ligne.codePostale)+"</td>";
		rep+="<td>"+(ligne.telephone)+"</td>";
		rep+="</tr>";
	}
	rep+="</table>";
	$("#contenu").html(rep);
}

function vueListerMembresAdmin(dataMembres){
	rep="<h2>Liste des membres</h2>";
	rep+="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Prénom</th><th scope="col">Date Naissance</th><th scope="col">Ville</th><th scope="col">Code Postal</th><th scope="col">Téléphone</th></tr>';
	var taille = dataMembres.length;
	for(i=0; i<taille; i++) {
		ligne=dataMembres[i];
		rep+="<tr>";
		rep+="<td>"+(ligne.idUser)+"</td>";
		rep+="<td>"+(ligne.nom)+"</td>";
		rep+="<td>"+(ligne.prenom)+"</td>";
		rep+="<td>"+(ligne.dateNaissance)+"</td>";
		rep+="<td>"+(ligne.ville)+"</td>";
		rep+="<td>"+(ligne.codePostale)+"</td>";
		rep+="<td>"+(ligne.telephone)+"</td>";
		rep+="</tr>";
	}
	rep+="</table>";
	$("#contenu").html(rep);
}

function vueListerAnnoncesAdmin(dataAnnonces) {
	rep="<h2>Liste des annonces</h2>";
	rep+="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Description demande</th><th scope="col">Code Postale</th><th scope="col">statut</th><th scope="col">Fichier</th></tr>';
	var taille = dataAnnonces.length;
	for(i=0; i<taille; i++) {
		ligne=dataAnnonces[i];
		rep+="<tr>";
		// rep+="<td>"+(ligne.idAnnonce)+"</td>";
		// rep+="<td>"+(ligne.idDemandeur)+"</td>";
		rep+="<td>"+(ligne.idService)+"</td>";
		rep+="<td>"+(ligne.listeAchat)+"</td>";
		rep+="<td class='text-uppercase'>"+(ligne.codePostale)+"</td>";
		rep+="<td>"+(ligne.statut)+"</td>";
		rep+="<td>"+(ligne.pochette)+"</td>";
		rep+="</tr>";
	}
	rep+="</table>";
	$("#annonces").html(rep);

}

var vue=function(action,donnees){
	switch(action){
		case "actVueListerM":
			vueListerMembres(donnees);
		break;	
		case "actVueListerMAdmin":
			vueListerMembresAdmin(donnees);
		break;
		case "actVueListerA":
			vueListerAnnoncesAdmin(donnees);
		break;	
	}
}