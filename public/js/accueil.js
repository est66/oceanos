
var TAB_JSON;
var URL_SITE = 'http://pingouin.heig-vd.ch/oceanos/';
$(function() {
  loadAccueil();
});//FIN JS CORE /storage/images/asdd123ej2w1d12e2.jpg

/*************************************************************************/
/* Admin - Edition - Function - loadAccueil  *****************************/
/*************************************************************************/
function loadAccueil(){  
    $.getJSON("http://pingouin.heig-vd.ch/oceanos/informations", function (data) {
        TAB_JSON = data;
        console.log(TAB_JSON);
       
        console.log(TAB_JSON[0]["texte"]);
        console.log(TAB_JSON[4]["visible"]);
        console.log(TAB_JSON[3]["media"]["url"]);
        
    });
};