var URL = "http://pingouin.heig-vd.ch/oceanos/";

var template_membre;
var template_sponsor;
var template_articleNews;
var template_articlePresse;
var template_reseauSocial;
var template_team;
var template_equipe;
var template_album;
var template_contenu;

$(function () {
    template_membre = $(".membre_template").clone();
    template_sponsor = $(".sponsor_template").clone();
    template_articleNews = $(".articleNews_template").clone();
    template_articlePresse = $(".articlePresse_template").clone();
    template_reseauSocial = $(".resSocial_template").clone();
    template_team = $(".team_template").clone();
    template_album = $(".album_template").clone();
    template_contenu = $(".contenu_template").clone();
    refreshMembresEquipe();
    refreshSponsors();
    refreshArticlesNews();
    refreshArticlesPresse();
    refreshReseauxSociaux();
    refreshAlbums();
    refreshContenuAlbums();

    /***** EVENTS *****/

});


/* Cette fonction charge tous les membres de l'équipe et met les dans
   des templates html pour ensuite pouvoir les afficher. */
function refreshMembresEquipe() {
    $(".membres").empty();
    $(".team").empty();
    // Cloner la template équipe APRÈS d'avoir vider les divs 'membres' et 'team'
    template_equipe = $(".equipe_template").clone();
    $("#equipes").empty();
    $.getJSON(URL + "equipes", function (data) {
        console.log(data);
        $.each(data, function (key, team) {
            var tmpl_equipe = template_equipe.clone();
            var tmpl_team = template_team.clone();
            $(".nomEquipe", tmpl_team).text(team.nom);
            $(".team", tmpl_equipe).append(tmpl_team);
            $(tmpl_equipe).attr('idEquipe', team.id);
            if (!_.isEmpty(team.personnes)) {
                $.each(team.personnes, function (key, membre) {
                    var tmpl_membre = template_membre.clone();
                    $(".nomMembre", tmpl_membre).text(membre.prenom + " " + membre.nom);
                    if (!_.isNull(membre.media)) {
                        $(".photoMembre", tmpl_membre).attr('src', membre.media.url);
                    }
                    $(tmpl_membre).attr('idMembre', membre.id);
                    $(".membres", tmpl_equipe).append(tmpl_membre);
                });
            }
            tmpl_equipe.appendTo("#equipes");
        });
    });
}

/* Cette fonction charge tous les sponsors de l'équipe et met les dans
   des templates html pour ensuite pouvoir les afficher. */
function refreshSponsors() {
    $("#sponsors").empty();
    $.getJSON(URL + "sponsors", function (data) {
        $.each(data, function (key, sponsor) {
            var tmpl = template_sponsor.clone();
            $(".nomSponsor", tmpl).text(sponsor.nom);
            if (!_.isNull(sponsor.media)) {
                $(".imgSponsor", tmpl).attr('src', sponsor.media.url);
            } else {
                $(".imgSponsor", tmpl).attr('alt', sponsor.description);
            }
            tmpl.appendTo("#sponsors");
        });
    });
}

/* Cette fonction charge tous les articles de l'équipe et met les dans
   des templates html pour ensuite pouvoir les afficher. */
function refreshArticlesNews() {
    $("#articlesNews").empty();
    $.getJSON(URL + "articles", function (data) {
        $.each(data, function (key, article) {
            var tmpl = template_articleNews.clone();
            $(".titreArticle", tmpl).text(article.titre);
            $(".soustitreArticle", tmpl).text(article.soustitre);
            $(".date", tmpl).text(article.date);
            $(".auteur", tmpl).text(article.auteur);
            if (!_.isNull(article.media)) {
                $(".imgArticle", tmpl).attr('src', article.media.url);
                $(".imgLegende", tmpl).text(article.media.titre);
            }
            $(".textArticle", tmpl).text(article.description);
            tmpl.appendTo("#articlesNews");
        });
    });
}

/* Cette fonction charge tous les articles de presse de l'équipe et met
   les dans des templates html pour ensuite pouvoir les afficher. */
function refreshArticlesPresse() {
    $("#articlesPresse").empty();
    $.getJSON(URL + "presses", function (data) {
        $.each(data, function (key, article) {
            var tmpl = template_articlePresse.clone();
            if (!_.isNull(article.media)) {
                $(".imgArticlePresse", tmpl).attr('src', article.media.url);
            }
            $(".titreArticlePresse", tmpl).text(article.nom);
            tmpl.appendTo("#articlesPresse");
        });
    });
}

/* Cette fonction charge tous les réseaux sociaux sur lesquels l'équipe est
   active et met les dans des templates html pour ensuite pouvoir les afficher. */
function refreshReseauxSociaux() {
    $(".reseauxSociaux").empty();
    $.getJSON(URL + "reseaux", function (data) {
        $.each(data, function (key, reseau) {
            var tmpl = template_reseauSocial.clone();
            $(".imgResSocial", tmpl).attr('src', reseau.imgResSocial);
            $(".nomResSocial", tmpl).text(reseau.nom);
            tmpl.appendTo(".reseauxSociaux");
        });
    });
}

/* Cette fonction charge tous les albums de l'équipe et met
   les dans des templates html pour ensuite pouvoir les afficher. */
function refreshAlbums() {
    $(".albums").empty();
    $.getJSON(URL + "albums", function (data) {
        $.each(data, function (key, album) {
            var tmpl = template_album.clone();
            if (!_.isNull(album.medias)) {
                $(".imgAlbum", tmpl).attr('src', album.medias.url);
            }
            $(".nomAlbum", tmpl).text(album.nom);
            $(".dateAlbum", tmpl).text(album.created_at);
            tmpl.appendTo(".albums");
        });
    });
}

/* Cette fonction charge tous les contenus albums de l'équipe et met
   les dans des templates html pour ensuite pouvoir les afficher. */
function refreshContenuAlbums() {
    $(".contenuAlbums").empty();
    $.getJSON(URL + "albums", function (data) {
        $.each(data, function (key, album) {
            var tmpl = template_album.clone();
            if (!_.isNull(album.medias)) {
                $(".imgAlbum", tmpl).attr('src', album.medias.url);
            }
            $(".nomAlbum", tmpl).text(album.nom);
            $(".dateAlbum", tmpl).text(album.created_at);
            tmpl.appendTo(".albums");
        });
    });
}