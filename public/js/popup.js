var URL = "http://pingouin.heig-vd.ch/oceanos/";

jQuery(function($){
	//Lorsque vous cliquez sur un lien de la classe poplight
	$('#equipes, #nomNouvelleEquipe').on('click', ".poplight", function() {
		var popID = $(this).data('rel'); //Trouver la pop-up correspondante
		var popWidth = $(this).data('width'); //Trouver la largeur
        var popHeight = $(this).data('height');
        
        console.log(popID);
        
        
        switch (popID) {
            case 'ajouterEquipe':
                $("#nom_Equipe").val($("#nouveauNom").val());
                break;
            case 'modifierEquipe':
                var id = $(this).parents('div:eq(1)').attr('idEquipe');
                $("#modifierEquipe").attr('idEquipe', id);
                $.getJSON(URL + "equipes/" + id, function (data) {
                    $("#modifNomEquipe").val(data.nom);
                    $("#modifPhraseIntro").val(data.phrase);
                });
                break;
            case 'ajouterMembre':
                var id = $(this).parents('div:eq(1)').attr('idEquipe');
                $("#ajouterMembre").attr('idEquipe', id);
                break;
            case 'modifierMembre':
                var id = $(this).parents('div:eq(2)').attr('idMembre');
                console.log(id);
                $("#modifierMembre").attr('idMembre', id);
                $.getJSON(URL + "personnes/" + id, function (data) {
                    $("#modifNomMembre").val(data.nom);
                    $("#modifPrenomMembre").val(data.prenom);
                    $("#modifStatutMembre").val(data.statut);
                    $("#modifDescriptionMembre").val(data.description);
                    $("#modif_Photo_Membre_Apercu").attr('src', data.media.url);
                });
                break;
        }

		//Faire apparaitre la pop-up et ajouter le bouton de fermeture
		$('#' + popID).fadeIn().css({ 'width': popWidth, 'height': popHeight, 'overflow': "auto" }).prepend('<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
		
		//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
		var popMargTop = ($('#' + popID).height() + 80) / 2;
		var popMargLeft = ($('#' + popID).width() + 80) / 2;
		
		//Apply Margin to Popup
		$('#' + popID).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues d'anciennes versions de IE
		$('body').append('<div id="fade"></div>');
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();
		
		return false;
	});
	
	
	//Close Popups and Fade Layer
	$('body').on('click', 'a.close, #fade', function() { //Au clic sur le body...
		$('#fade , .popup_block').fadeOut(function() {
			$('#fade, a.close').remove();  
	}); //...ils disparaissent ensemble
		
		return false;
	});
	
});