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



var requetes = function(action,donnees){
	switch(action) {
		case "actionListerM" :
			ajaxListerMembres();
		break;
		default:
	}
}