function vueListerMembres(dataMembres){
	rep="<p>Liste des membres</p>";
	rep+="<ul>";
	var taille = dataMembres.length;
	for(i=0; i<taille; i++) {
		ligne=dataMembres[i];
		rep+="<li>"+(ligne.idUser)+" "+(ligne.nom)+" "+(ligne.prenom)+" "+(ligne.dateNaissance)+" "+(ligne.ville)+" <span class='text-uppercase'>"+(ligne.codePostale)+"</span> "+(ligne.telephone)+"</li>";
	}
	rep+="</ul>";
	rep+="<p>fin de la liste.</p>";
	$("#contenu").html(rep);
}

	

var vue=function(action,donnees){
	switch(action){
		case "actVueListerM":
			vueListerMembres(donnees);
		break;		
	}
}