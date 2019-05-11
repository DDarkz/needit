function vueListerMembresAdmin(dataMembresAdmin){
	rep="<h2>Liste des membres</h2>";
	rep+="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Nom</th><th scope="col">Prénom</th><th scope="col">Date Naissance</th><th scope="col">Ville</th><th scope="col">Code Postal</th><th scope="col">Téléphone</th></tr>';
	var taille = dataMembresAdmin.length;
	for(i=0; i<taille; i++) {
		ligne=dataMembresAdmin[i];
		rep+="<tr>";
		rep+="<td><button type='button' class='btn btn-danger' id='"+(ligne.idUser)+"' name='"+(ligne.idUser)+"' onclick='listerId(this,this.id)'>Supprimer "+(ligne.idUser)+"</button></td>";
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
		rep+="<td><button type='button' class='btn btn-danger' id='"+(ligne.idAnnonce)+"' name='"+(ligne.idAnnonce)+"' onclick='listerIdAnnonce(this,this.id)'>Supprimer  "+(ligne.idAnnonce)+"</button></td>";
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
	$("#contenu").html(rep);
}

function vueListerAnnoncesMembres(dataAnnonces) {
	rep="<table class='table table-striped'>";
	rep+='<tr><th scope="col">#</th><th scope="col">Titre</th><th scope="col">Description demande</th><th scope="col">Code Postale</th><th scope="col">Fichier</th></tr>';
	var taille = dataAnnonces.length;
	for(i=0; i<taille; i++) {
		ligne=dataAnnonces[i];
		rep+="<tr>";
		rep+="<td><button type='button' class='btn btn-success mr-2' id='"+(ligne.idAnnonce)+"' name='"+(ligne.idAnnonce)+"' onclick='modifierIdAnnonce(this,this.id)'>Modifier  "+(ligne.idAnnonce)+"</button><button type='button' class='btn btn-danger' id='"+(ligne.idAnnonce)+"' name='"+(ligne.idAnnonce)+"' onclick='listerIdAnnonce(this,this.id)'>Supprimer  "+(ligne.idAnnonce)+"</button></td>";
		// rep+="<td>"+(ligne.idAnnonce)+"</td>";
		// rep+="<td>"+(ligne.idDemandeur)+"</td>";
		rep+="<td>"+(ligne.Titre)+"</td>";
		rep+="<td>"+(ligne.listeAchat)+"</td>";
		rep+="<td class='text-uppercase'>"+(ligne.codePostale)+"</td>";
		// rep+="<td>"+(ligne.statut)+"</td>";
		rep+="<td><img src='images/"+(ligne.pochette)+"' alt='photo' width='150'></td>";
		rep+="</tr>";
	}
	rep+="</table>";
	$("#contenu").html(rep);
}

function vueListerAnnonces(Annonces) {
	rep="";
	var taille = Annonces.length;
	for(i=0; i<taille; i++) {
		ligne=Annonces[i];
		//rep+='<div class="card-columns">';
		rep+='<div class="card m-3">';
		rep+='<a class="text-dark"><img class="card-img-top" src="images/'+(ligne.pochette)+'" alt="Card image cap">';
		rep+='<div class="card-body">';
		rep+='<p class="card-date">'+(ligne.date)+'</p>';
		rep+='<h5 class="card-title">'+(ligne.Titre)+'</h5>';
		rep+='<p class="card-text">'+(ligne.listeAchat)+'</p>';
		rep+='<p class="card-text"><small class="text-muted">Poste il y'+(ligne.date)+'</small></p>';
		rep+='</div>';
		rep+='</a>';
		// rep+='<form method="post" action="annonceDetail.php">';
		// rep+='<input type="hidden" id="idAnnonce" name="idAnnonce" value="'+(ligne.idAnnonce)+'">';
		// rep+='<input type="submit" class="btn btn-primary" id="submit" name="submit" value="Detail">';
		rep+='<button type="button" class="btn btn-info" id="'+(ligne.idAnnonce)+'" name="'+(ligne.idAnnonce)+'" onclick="listerIdAnnonce(this,this.id)">Detail'+(ligne.idAnnonce)+'</button>';
		// rep+='</form>';
		rep+="</div>";
		//rep+="</div>";
	}
	$("#annoncesAccueil").html(rep);
	$(".btn").click(function(){
		$("#annoncesDetail").show();
	});
	// $("#annoncesDetail").hide();

}

function vueListerAnnoncesIndex(Annonces) {
	rep="";
	var taille = Annonces.length;
	for(i=0; i<taille; i++) {
		ligne=Annonces[i];
		rep+='<div class="row align-items-center no-gutters mb-4 mb-lg-5">';
		rep+='<div class="col-xl-8 col-lg-7">';
		rep+='<a href="annonces.php">';
          rep+='<img class="img-fluid mb-3 mb-lg-0" src="images/'+(ligne.pochette)+'" alt="" width="80%" height="30%">';
        rep+='</div>';
        rep+='<div class="col-xl-4 col-lg-5">';
          rep+='<div class="featured-text text-center text-lg-left">';
            rep+='<h4>'+(ligne.Titre)+'</h4>';
            rep+='<p class="text-black-50 mb-0">'+(ligne.listeAchat)+'</p>';
		  rep+='</div>';
		  rep+='</a>';
        rep+='</div>';
	  rep+='</div>';
	}
	$("#annoncesIndex").html(rep);

}

function vueListerAnnoncesDetail(Annonces) {
	rep="";
	var taille = Annonces.length;
	for(i=0; i<taille; i++) {
		ligne=Annonces[i];
		rep+='<div class="row">';
		rep+='<div class="col-6">';
		rep+='<img class="img-fluid mb-3 mb-lg-0" src="images/'+(ligne.pochette)+'" alt="">';
        rep+='</div>';
        rep+='<div class="col-6">';
        rep+='<h1>'+(ligne.Titre)+'</h1>';
		rep+='<p class="card-date">'+(ligne.date)+'</p>';
		rep+='<p class="text-black-50 mb-0">'+(ligne.listeAchat)+'</p>';
		rep+="<button id='voirAnnonce' class='btn btn-success mr-2' onclick='requetes(null,'actionLister');'>Voir les annonces</button>";
		rep+="<button id='contacter' class='btn btn-dark'>Contacter</button>";
				rep+='</div>';
				rep+='</div>';
	}
	$("#annoncesDetail").html(rep);
	// $("#annoncesAccueil").hide();
	

}

function formEnregistrer(){
	rep='<div id="divEnreg">';
  // rep+='<span onClick="cacher(\'divEnreg\')">X</span>';
	rep+='<h2>Modifier cette annonce</h2>';
	rep+='<form id="enregForm">';
	rep+='<label for="idAnnonce1" class="col-md-2 col-form-label">Annonce</label>';
	rep+='<div class="col-md-10 disable"><input class="form-control" type="text" id="idAnnonce1" name="idAnnonce1" readonly value=""></div>';
	rep+='<label for="titre" class="col-md-2 col-form-label">Titre</label>';
	rep+='<div class="col-md-10"><input type="text" class="form-control" id="titre" name="titre"></div>';
	rep+='<label for="liste" class="col-md-2 col-form-label">Liste</label>';
	rep+='<div class="col-md-10"><textarea col="20" row="10" class="form-control" id="liste" name="liste"></textarea></div>';
	rep+='<label for="liste" class="col-md-2 col-form-label">Photo</label>';
	rep+='<input type="file" name="photo"><br><br>';
	rep+='<div class="col-md-10"><input type="button" class="btn btn-primary" value="Modifier" onClick="requetes(null,\'modifier\');"></div>';
	rep+='</form></div>';
return rep;
}

function vueMontrerAnnonce(data){
	// alert(data[0].idAnnonce);
	// Génère la fonction qui écrit le formulaire modifier dans le div ContenuEnreg.
	$('#contenu').html(formEnregistrer());
	// $('#contenu').html(formEnregistrer());
	// Affiche les valeurs de la bd dans le formulaire modifier
	$('#idAnnonce1').val(data[0].idAnnonce);
	$('#titre').val(data[0].Titre);
	$('#liste').html(data[0].listeAchat);

	// $("#test").html('<p>idAnnonce '+(data[0].idAnnonce)+'</p>')
	// Créer le formulaire divEnreg.
	montrer('divEnreg');
	//cacher('contenu');
}

var vue=function(action,donnees){
	switch(action){
		case "actVueListerMAdmin":
			vueListerMembresAdmin(donnees);
		break;
		case "actVueListerA":
			vueListerAnnoncesAdmin(donnees);
		break;
		case "actVueLister":
			vueListerAnnonces(donnees);
		break;
		case "actVueListerDetail":
			vueListerAnnoncesDetail(donnees);
		break;
		case "actVueListerIndex":
			vueListerAnnoncesIndex(donnees);
		break;	
		case "actVueListerAnnoncesMembres":
			vueListerAnnoncesMembres(donnees);
		break;
		case 'actVueMontrerAnnonce':
			vueMontrerAnnonce(donnees);
		break;
		case 'modifierJSON':
			$('#message').html(donnees.msg);
			setTimeout(function(){ $('#message').html(""); }, 3000);
		break;

		
	}
}