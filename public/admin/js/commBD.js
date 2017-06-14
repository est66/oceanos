var URL = "http://pingouin.heig-vd.ch/oceanos/";
var IMG_SRC;

$(function () {
    // EVENTS ADD, MODIFY, DELETE EQUIPE
    $("#ajouterEquipe .btnValider").on('click', createEquipe);
    $("#modifierEquipe .btnValider").on('click', modifyEquipe);
    $("#equipes").on('click', ".supprimerEquipe", deleteEquipe);
    // EVENTS ADD, MODIFY, DELETE MEMBRE
    $("#ajouterMembre .btnValider").on('click', createMembre);
    $("#modifierMembre .btnValider").on('click', modifyMembre);
    $("#equipes").on('click', ".supprimerMembre", deleteMembre);
    $("#photo_Membre").on("change", loadImage);
});

function loadImage() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        // The file's text will be printed here
        IMG_SRC = event.target.result.substr(23);
    };
    reader.readAsDataURL(file);
}

function createEquipe() {
    // Get sur les éditons et prendre l'ID de l'édition qui
    // est active. Envoyer l'ID édition dans 'data'.
    var data = {
        'nom': $("#nom_Equipe").val(),
        'phrase': $("#phraseIntro").val()
    };
    $.ajax({
        url: URL + 'equipes',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        dataType: 'json',
        success: function (data) {
            alert("L'équipe a été créée !");
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //On error do this
            if (xhr.status == 200) {
                alert(ajaxOptions);
            } else {
                alert(xhr.status);
                alert(thrownError);
            }
        }
    });
}

function modifyEquipe() {
    var id = $(this).parents('div:eq(2)').attr('idEquipe');
    var data = {
        'nom': $("#modifNomEquipe").val(),
        'phrase': $("#modifPhraseIntro").val()
    };
    $.ajax({
        url: URL + 'equipes/' + id,
        type: 'PUT',
        data: data,
        success: function (data) {
            alert("L'équipe a été modifiée !");
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //On error do this
            if (xhr.status == 200) {
                alert(ajaxOptions);
            } else {
                alert(xhr.status);
                alert(thrownError);
            }
        }
    });
}

function deleteEquipe() {
    var answer = confirm("Voulez-vous vraiment supprimer cette équipe ? Toutes les infos seront supprimées !");
    var id = $(this).parents('div:eq(1)').attr('idEquipe');
    if (answer) {
        $.ajax({
            url: URL + 'equipes/' + id,
            type: 'DELETE',
            success: function (result) {
                alert("L'équipe a été supprimée !");
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //On error do this
                if (xhr.status == 200) {
                    alert(ajaxOptions);
                } else {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }
        });
    }
}

function createMembre() {
    var idEquipe = $(this).parents('div:eq(2)').attr('idEquipe');
    var data = {
        nom: $("#nom_Membre").val(),
        prenom: $("#prenom_Membre").val(),
        statut: $("#statut_Membre").val(),
        description: $("#description_Membre").val()
    };
    /***** CREATION DE LA PERSONNE *****/
    $.ajax({
        url: URL + 'personnes',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        dataType: 'json',
        success: function (membreID) {
            /***** ENVOIE DE L'IMAGE *****/
            $.ajax({
                url: URL + 'medias',
                type: 'POST',
                data: {
                    media: IMG_SRC,
                    personne_id: membreID
                },
                success: function (answer) {
                    /***** AJOUTER LE MEMBRE A L'EQUIPE *****/
                    $.ajax({
                        url: URL + 'equipes/ajouterpersonne',
                        type: 'POST',
                        data: {
                            personne_id: membreID,
                            equipe_id: idEquipe
                        },
                        success: function () {
                            alert("Le membre a été créé !");
                            //location.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            //On error do this
                            if (xhr.status == 200) {
                                alert(ajaxOptions);
                            } else {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        }
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //On error do this
                    if (xhr.status == 200) {
                        alert(ajaxOptions);
                    } else {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                }
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //On error do this
            if (xhr.status == 200) {
                alert(ajaxOptions);
            } else {
                alert(xhr.status);
                alert(thrownError);
            }
        }
    });
}

function modifyMembre() {
    var id = $(this).parents('div:eq(2)').attr('idMembre');
    var data = {
        nom: $("#modifNomMembre").val(),
        phrase: $("#modifPrenomMembre").val(),
        statut: $("#modifStatutMembre").val(),
        description: $("#modifDescriptionMembre").val()
    };
    $.ajax({
        url: URL + 'personnes/' + id,
        type: 'PUT',
        data: data,
        success: function (data) {
            alert("Le membre a été modifié !");
            //location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //On error do this
            if (xhr.status == 200) {
                alert(ajaxOptions);
            } else {
                alert(xhr.status);
                alert(thrownError);
            }
        }
    });
}

function deleteMembre() {
    var answer = confirm("Voulez-vous vraiment supprimer ce membre ? Toutes les infos seront supprimées !");
    var id = $(this).parents('div:eq(2)').attr('idMembre');
    console.log(id);
    if (answer) {
        $.ajax({
            url: URL + 'personnes/' + id,
            type: 'DELETE',
            success: function (result) {
                alert("Le membre a été supprimé !");
                //location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //On error do this
                if (xhr.status == 200) {
                    alert(ajaxOptions);
                } else {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }
        });
    }
}

















