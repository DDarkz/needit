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

function ajaxListerAnnonces(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlLister'}, 
		dataType: 'json',
		success: function(Annonces){
			// alert("hello");
			vue('actVueLister',Annonces); 
		},
		fail:function(){
			alert("Problème pour lister annonces.");
		}
	});
}

function ajaxDeleteMembres(){
	var idUser=$('#idUser').val();
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data:{"action":'actCtlDeleteMembre',"idUser":idUser},
		dataType: 'json',
		success: function(){
			 alert("hello");
		},
		fail: function(){
			alert("Problème pour supprimer.");
		}
	});
}

function ajaxDeleteAnnonce(){
	var idAnnonce=$('#idAnnonce').val();
	alert("ajax " + idAnnonce );
	// e.preventDefault();
	$.ajax({
		// alert("hein");
		url:'serveur/controleur.php',
		type:'POST',
		// async: false,
		data:{"action":'actCtlDeleteAnnonce',"idAnnonce":idAnnonce},
		dataType: 'json',
		success: function(){
			 alert("hello");
		},
		fail: function(){
			alert("Problème pour supprimer.");
		}
	});
}

var requetes = function(action){
	switch(action) {
		case "actionListerM" :
			ajaxListerMembres();
		break;
		case "actionListerMAdmin" :
			// alert("coucou");
			ajaxListerMembresAdmin();
		break;
		case "actionListerA" :
			ajaxListerAnnoncesAdmin();
		break;
		case "actionLister" :
			ajaxListerAnnonces();
		break;
		case "actDeleteMembres" :
			ajaxDeleteMembres();
			break;
		case "actDeleteAnnonce" :
			ajaxDeleteAnnonce();
			break;
		default:
	}
}