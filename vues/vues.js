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

function vueListerMembresAdmin(dataMembresAdmin){
	rep="<h2>Liste des membres</h2>";
	rep+="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Prénom</th><th scope="col">Date Naissance</th><th scope="col">Ville</th><th scope="col">Code Postal</th><th scope="col">Téléphone</th></tr>';
	var taille = dataMembresAdmin.length;
	for(i=0; i<taille; i++) {
		ligne=dataMembresAdmin[i];
		rep+="<tr>";
		rep+="<td><button type='button' class='btn btn-danger' id='"+(ligne.idUser)+"' name='"+(ligne.idUser)+"' onclick='listerId(this.id)'>Supprimer "+(ligne.idUser)+"</button></td>";
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
	rep+='<tr><th scope="col">#</th><th scope="col">Titre</th><th scope="col">Description demande</th><th scope="col">Code Postale</th><th scope="col">Fichier</th></tr>';
	var taille = dataAnnonces.length;
	for(i=0; i<taille; i++) {
		ligne=dataAnnonces[i];
		rep+="<tr>";
		rep+="<td><button type='button' class='btn btn-danger' id='"+(ligne.idAnnonce)+"' name='"+(ligne.idAnnonce)+"' onclick='listerIdAnnonce(this.id)'>Supprimer  "+(ligne.idAnnonce)+"</button></td>";
		// rep+="<td>"+(ligne.idAnnonce)+"</td>";
		// rep+="<td>"+(ligne.idDemandeur)+"</td>";
		rep+="<td>"+(ligne.Titre)+"</td>";
		rep+="<td>"+(ligne.listeAchat)+"</td>";
		rep+="<td class='text-uppercase'>"+(ligne.codePostale)+"</td>";
		// rep+="<td>"+(ligne.statut)+"</td>";
		rep+="<td>"+(ligne.pochette)+"</td>";
		rep+="</tr>";
	}
	rep+="</table>";
	$("#annonces").html(rep);

}

function vueListerAnnonces(Annonces) {
	rep='<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></link>';
	rep+="<h1>Toutes les annonces</h1>";
	var taille = Annonces.length;
	for(i=0; i<taille; i++) {
		ligne=Annonces[i];
		rep+='<div class="card-columns">';
		rep+='<div class="card m-3">';
		rep+='<a class="text-dark" href="annonceDetail.php"><img class="card-img-top" src="images/'+(ligne.pochette)+'" alt="Card image cap">';
		rep+='<div class="card-body">';
		rep+='<p class="card-date">'+(ligne.date)+'</p>';
		rep+='<h5 class="card-title">'+(ligne.Titre)+'</h5>';
		rep+='<p class="card-text">'+(ligne.listeAchat)+'</p>';
		rep+='<p class="card-text"><small class="text-muted">Poste il y'+(ligne.date)+'</small></p>';
		rep+='</div>';
		rep+='</a>';
		rep+="</div>";
		rep+="</div>";
	}
	$("#annoncesAccueil").html(rep);

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
		case "actVueLister":
			vueListerAnnonces(donnees);
		break;	

		
	}
}