function ajaxListerMembres(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerM'}, // action="actCtlListerM" au controleur.php
		dataType: 'json',
		success: function(dataMembres){
<<<<<<< HEAD
			// alert("hello");
=======
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
			vue('actVueListerM',dataMembres); // action="actVueListerM" au fichier vues.js
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



var requetes = function(action,donnees){
	switch(action) {
		case "actionListerM" :
			ajaxListerMembres();
		break;
		case "actionListerA" :
			//alert("coucou");
			ajaxListerAnnoncesAdmin();
			//alert("coucou2");
		break;
		default:
	}
}