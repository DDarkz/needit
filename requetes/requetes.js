function ajaxListerMembres(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerM'}, // action="actCtlListerM" au controleur.php
		dataType: 'json',
		success: function(dataMembres){
			vue('actVueListerM',dataMembres); // action="actVueListerM" au fichier vues.js
		},
		fail:function(){
			alert("Problème pour lister membres.");
		}
	});
}

function ajaxListerMembresAdmin(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerMAdmin'}, // action="actCtlListerM" au controleur.php
		dataType: 'json',
		success: function(dataMembresAdmin){
			// alert("wow");
			vue('actVueListerMAdmin',dataMembresAdmin); // action="actVueListerM" au fichier vues.js
		},
		fail:function(){
			alert("Problème pour lister membres.");
		}
	});
}

function ajaxListerAnnoncesAdmin(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerA'}, 
		dataType: 'json',
		success: function(dataAnnonces){
			// alert("hello");
			vue('actVueListerA',dataAnnonces); 
		},
		fail:function(){
			alert("Problème pour lister annonces.");
		}
	});
}

function ajaxDeleteMembres(){
	
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlDeleteMembre'}, 
		dataType: 'json',
		success: function(dataAnnonces){
			// alert("hello");
			vue('actVueDeleteMembres',dataAnnonces); 
		},
		fail:function(){
			alert("Problème pour supprimer.");
		}
	});
}


var requetes = function(action,donnees){
	switch(action) {
		case "actionListerM" :
			ajaxListerMembres();
		break;
		case "actionListerMAdmin" :
			// alert("coucou");
			ajaxListerMembresAdmin();
		break;
		case "actionListerA" :
			//alert("coucou");
			ajaxListerAnnoncesAdmin();
			//alert("coucou2");
		break;
		case "actDeleteMembres" :
			ajaxDeleteMembres();
		default:
	}
}