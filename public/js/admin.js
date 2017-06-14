var TEMPLATE_EDITION;
var TAB_JSON;
var URL_SITE = 'http://pingouin.heig-vd.ch/oceanos/';
$(function() {
    TEMPLATE_EDITION = $(".templateEdition.divContainerSquareSelect").clone().removeClass("templateEdition");   
    loadEditions();    
    $(".imageAjouter100x100").on("click",addEdition);      
    $('body').on('click', 'a.close, #fade',FadePopUp);   
    $(".panel-body.containerFlex").on("click",".glyphicon.glyphicon-pencil",setEdition);  //on doit faire ça car sinon l'action ne se porte pas sur les boutons générés après coup via la template
    $(".panel-body.containerFlex").on("click",".glyphicon.glyphicon-remove",deleteEdition);  
    $("#btnValider").on("click",validationSetEdition);  
    $(".panel-body.containerFlex").on("click","#rbSelect",activateEdition);      
    
});//FIN JS CORE
/*************************************************************************/
/* Admin - Edition - Function - addEdition  ******************************/
/*************************************************************************/
function addEdition(){        
    var tmpl = TEMPLATE_EDITION.clone();
    $("#addBtn").after(tmpl);
};
/*************************************************************************/
/* Admin - Edition - Function - loadEdition  *****************************/
/*************************************************************************/
function loadEditions(){  
   $.getJSON("http://pingouin.heig-vd.ch/oceanos/editions", function (editions) {
        TAB_JSON = editions;
        
        $.each(TAB_JSON, function (edition, value){  
            //selectionne la première case faisant office de template et charge les premières données du tableau
            if(edition==0)
            {
                $(".templateEdition.divContainerSquareSelect").attr('idEdition',value.id);
                $(".templateEdition.divContainerSquareSelect > div.divSquareSelect.text-center").text(value.nom);                   
                if(value.actif)
                {              
                    $(".templateEdition.divContainerSquareSelect > input").attr('checked','checked');
                }
            }
            //affiche les editions en copiant les attribut du json dans les attr
            else
            {
                tmpl = TEMPLATE_EDITION.clone();  
                tmpl.attr('idEdition',value.id);   
                $(".divSquareSelect.text-center", tmpl).text(value.nom);                
                if(value.actif)
                {
                    $("input", tmpl).attr('checked','checked');
                }
                tmpl.appendTo(".panel-body.containerFlex");   
            }
        });       
    });
};
function test()
{
    return "coucou";
}
/*************************************************************************/
/* Admin - Edition - Function - setEdition  *****************************/
/*************************************************************************/
function setEdition(){
    var mode ="";
    if($(this).parents(':eq(2)').attr('idEdition') == "")
        {            
            mode="add";
        }
    else{ //Copie        
        var val = $(this).parents(':eq(2)').attr('idEdition')-0; //transforme l'index en nombre pour la boucle -0
        var index = TAB_JSON.findIndex(function(item, i){
          return item.id === val
        });
        $("#nomEdition").val(TAB_JSON[index]["nom"]);
        $("#resultat").val(TAB_JSON[index]["resultats"]);
        $("#dateEvent").val(TAB_JSON[index]["date"].slice(0,10));
        
        mode="set";
    }    
    $("#btnValider").attr("mode",mode); //Set le mode dans le bouton valider afin de savoir si on modifie ou créer
    $("#btnValider").attr("idEdition",$(this).parents(':eq(2)').attr('idEdition'));
    showPopUp();
};
/*************************************************************************/
/* Admin - Edition - Function - activateEdition  *************************/
/*************************************************************************/
function activateEdition(){        
    console.log($.isNumeric($(this).parents(':eq(0)').attr('idEdition')));
    if($.isNumeric($(this).parents(':eq(0)').attr('idEdition')))
     requestGet($(this).parents(':eq(0)').attr('idEdition'),URL_SITE,"edition/activer/","L'édition est activée !");  
};
/*************************************************************************/
/* Admin - Edition - Function - deleteEdition  *************************/
/*************************************************************************/
function deleteEdition(){        
    if($.isNumeric($(this).parents(':eq(2)').attr('idEdition')))
     requestDelete($(this).parents(':eq(2)').attr('idEdition'),URL_SITE,"editions/","Voulez-vous vraiment supprimer une édition et TOUT son contenu ?", "L'édition a été supprimée !");  
};
/*************************************************************************/
/* Admin - Edition - Function - requète set Edition  ******************************/
/*************************************************************************/
//Close Popups and Fade Layer
function validationSetEdition() { //Au clic sur le body...    
    var data = {'nom':$("#nomEdition").val(),'resultats':$("#resultat").val(),'date':$("#dateEvent").val()+" 00:00:00"};   
    
    if($("#btnValider").attr("mode")=="add")
    {
        requestPost(data,URL_SITE,"editions","L'édition a bien été ajoutée !");
    }
    if($("#btnValider").attr("mode")=="set")
    {
        requestPut(data,$(this).attr("idedition"),URL_SITE,"editions/","L'édition a bien été modifiée !");
    }    
};

/***************************************----------POP UP---------**********************************************/
/*************************************************************************/
/* Admin - Edition - Function - PopUp  ******************************/
/*************************************************************************/
function showPopUp() {
		//Faire apparaitre la pop-up et ajouter le bouton de fermeture                        ../images/Ajouter100x100.png"
		$('#' + "popup").fadeIn().css({ 'width': "800"}).prepend('<a href="#" class="close"><img src="./images/Fermer.png" class="btn_close" title="Close Window" alt="Close" /></a>');
		
		//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
		var popMargTop = ($('#' + "popup").height() + 80) / 2;
		var popMargLeft = ($('#' + "popup").width() + 80) / 2;
		
		//Apply Margin to Popup
		$('#' + "popup").css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues d'anciennes versions de IE
		$('body').append('<div id="fade"></div>');
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();
		
		return false;
};
/*************************************************************************/
/* Admin - Edition - Function - FadePopUp  ******************************/
/*************************************************************************/
//Close Popups and Fade Layer
function FadePopUp() { //Au clic sur le body...
    $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  
    }); //...ils disparaissent ensemble
    $("#nomEdition").val("");
    $("#resultat").val("");
    $("#dateEvent").val("");
    $("#btnValider").attr("mode","");
    return false;
};

    