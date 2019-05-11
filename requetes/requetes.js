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

function ajaxListerAnnoncesMembres(){
	var idDemandeur=$('#idDemandeur').val();
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerAnnoncesMembres', 'idDemandeur':idDemandeur}, 
		dataType: 'json',
		success: function(dataAnnonces){
			// alert("hello");
			vue('actVueListerAnnoncesMembres',dataAnnonces); 
		},
		fail:function(){
			alert("Problème pour lister les annonces de ce membre.");
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
			$('spinner-border').hide();
		},
		fail:function(){
			alert("Problème pour lister annonces.");
		}
	});
}

function ajaxListerAnnoncesIndex(){
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerIndex'}, 
		dataType: 'json',
		success: function(Annonces){
			vue('actVueListerIndex',Annonces); 
		},
		fail:function(){
			alert("Problème pour lister annonces.");
		}
	});
}
function ajaxListerAnnoncesDetail(){
	var idAnnonce=$('#idAnnonce').val();
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data: {'action' : 'actCtlListerDetail','idAnnonce':idAnnonce}, 
		dataType: 'json',
		success: function(Annonces){
			vue('actVueListerDetail',Annonces); 
			$("#annoncesAccueil").hide();
		},
		fail:function(){
			alert("Problème pour lister annonces.");
		}
	});
}
function ajaxDeleteMembres(elem){
	var idUser=$('#idUser').val();
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data:{"action":'actCtlDeleteMembre',"idUser":idUser},
		dataType: 'html', // si en txt je peux utiliser alert
		success: function(data){
			//  alert(elem);
			 $(elem.parentNode.parentNode).remove();
		},
		fail: function(){
			alert("Problème pour supprimer.");
		}
	});
}

function ajaxDeleteAnnonce(elem){
	var idAnnonce=$('#idAnnonce').val();
	alert(idAnnonce);
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data:{"action":'actCtlDeleteAnnonce',"idAnnonce":idAnnonce},
		dataType: 'html', // si en txt je peux utiliser jquery #loading
		 success: function(data){
			// alert(elem);
			$(elem.parentNode.parentNode).remove();
			// $("#loading").append("<h2>you are here</h2>");
		 },
		fail: function(){
			alert("Problème pour supprimer.");
		}
	});
}


function ajaxMontrerAnnonce(){
	//var idf=$('#numM').val();
	var idAnnonce=$('#idAnnonce').val();
	alert(idAnnonce);
	$.ajax({
		url:'serveur/controleur.php',
		type:'POST',
		data:{"action":'actMontrerAnnonce',"idAnnonce":idAnnonce},
		dataType:'json',
		success: function(data){
			//cacher('divModifier');
			//alert(JSON.stringify(data));
			vue('actVueMontrerAnnonce',data); 
		},
		fail:function(){
			alert("Problème pour afficher cette annonce.");
		}
	});
}

var requetes = function(elem,action){
	// alert(action);
	switch(action) {
		case "actionListerMAdmin" :
			ajaxListerMembresAdmin();
		break;
		case "actionListerA" :
			ajaxListerAnnoncesAdmin();
		break;
		case "actionLister" :
			ajaxListerAnnonces();
		break;
		case "actionListerDetail" :
			ajaxListerAnnoncesDetail();
		break;
		case "actionListerIndex" :
			ajaxListerAnnoncesIndex();
		break;
		case "actDeleteMembres" :
			ajaxDeleteMembres(elem);
			break;
		case "actDeleteAnnonce" :
			ajaxDeleteAnnonce(elem);
			break;
		case "ajaxMontrerAnnonce" :
			ajaxMontrerAnnonce(elem);
			break;
		case "actionListerAnnoncesMembres" :
			ajaxListerAnnoncesMembres();
			break;
		default:
	}
}