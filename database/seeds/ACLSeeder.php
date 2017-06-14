<?php

use Illuminate\Database\Seeder;

class ACLSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->truncate();
        DB::table('personnes')->truncate();
        DB::table('equipes')->truncate();
        DB::table('equipe_personne')->truncate();
        DB::table('sponsors')->truncate();
        DB::table('articles')->truncate();
        DB::table('medias')->truncate();
        DB::table('editions')->truncate();
        DB::table('albums')->truncate();
        DB::table('informations')->truncate();
        DB::table('parametres')->truncate();
        DB::table('res_socials')->truncate();

        /*         * * USERS ** */
        $user1 = new App\User();
        $user1->email = 'admin';
        $user1->password = bcrypt('123456');
        $user1->save();
        //EQUIPES
        $equipe0 = new App\Equipe();
        $equipe0->nom = "Team Ingénieurs";
        $equipe0->edition_id = 1;
        $equipe0->save();

        $equipe1 = new App\Equipe();
        $equipe1->nom = "Team Communication";
        $equipe1->edition_id = 2;
        $equipe1->save();
        $equipe2 = new App\Equipe();
        $equipe2->nom = "Team Ingénieurs";
        $equipe2->edition_id = 2;
        $equipe2->save();
        /*         * * PERSONNES ** */
        $personne1 = new App\Personne();
        $personne1->prenom = "Jonathan";
        $personne1->nom = "Aeschimann";
        $personne1->email = "jonathan.aeschimann@heig-vd.com";
        $personne1->statut = "Team manager";
        $personne1->phrase = "Manager une équipe, c'est avant tout connaître les compétences de chaques personnes qui la compose";
        $personne1->description = "Je suis un étudiant à la HEIG-VD en 2ème année";
        $personne1->edition_id = 2;
        $personne1->save();
        $equipe1->personnes()->save($personne1);
        $personne2 = new App\Personne();
        $personne2->prenom = "Jonathan";
        $personne2->nom = "Coelho";
        $personne2->email = "jonathan.coelho@heig-vd.com";
        $personne2->statut = "Communication manager";
        $personne2->phrase = "Communiquer, une notion importante dans un projet";
        $personne2->description = "Je suis un étudiant à la HEIG-VD en 2ème année";
        $personne2->edition_id = 2;
        $personne2->save();
        $equipe1->personnes()->save($personne2);
        $personne3 = new App\Personne();
        $personne3->prenom = "Mathias";
        $personne3->nom = "Favre";
        $personne3->email = "mathias.favre@heig-vd.com";
        $personne3->statut = "Logistics manager";
        $personne3->phrase = "";
        $personne3->description = "";
        $personne3->edition_id = 2;
        $personne3->save();
        $equipe1->personnes()->save($personne3);
        $personne4 = new App\Personne();
        $personne4->prenom = "Dani";
        $personne4->nom = "Duarte";
        $personne4->email = "dani.duarte@heig-vd.com";
        $personne4->statut = "Associé de projet";
        $personne4->phrase = "";
        $personne4->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne4->edition_id = 2;
        $personne4->save();
        $equipe1->personnes()->save($personne4);
        $personne5 = new App\Personne();
        $personne5->prenom = "Julien";
        $personne5->nom = "Gerber";
        $personne5->email = "julien.gerber@heig-vd.com";
        $personne5->statut = "Associé de projet";
        $personne5->phrase = "";
        $personne5->description = "";
        $personne5->edition_id = 2;
        $personne5->save();
        $equipe1->personnes()->save($personne5);

        $personne6 = new App\Personne();
        $personne6->prenom = "David";
        $personne6->nom = "Bolomey";
        $personne6->email = "david.bolomey@heig-vd.com";
        $personne6->statut = "Associé de projet";
        $personne6->phrase = "";
        $personne6->description = "";
        $personne6->edition_id = 2;
        $personne6->save();
        $equipe1->personnes()->save($personne5);

        $personne7 = new App\Personne();
        $personne7->prenom = "Romain ";
        $personne7->nom = "Paridant de Cauwere";
        $personne7->email = "romain.paridandecauwere@heig-vd.com";
        $personne7->statut = "External Provider";
        $personne7->phrase = "";
        $personne7->description = "";
        $personne7->edition_id = 2;
        $personne7->save();
        $equipe1->personnes()->save($personne7);

        $personne8 = new App\Personne();
        $personne8->prenom = "Laurent ";
        $personne8->nom = "Gravier";
        $personne8->email = "laurent.gravier@heig-vd.com";
        $personne8->statut = "Chercheur superviseur";
        $personne8->phrase = "";
        $personne8->description = "";
        $personne8->edition_id = 2;
        $personne8->save();
        $equipe1->personnes()->save($personne8);

        //---------------------------------------equipeComm
        $personne9 = new App\Personne();
        $personne9->prenom = "Joséphine";
        $personne9->nom = "Chabin";
        $personne9->email = "";
        $personne9->statut = "Cheffe du goupe Design";
        $personne9->phrase = "";
        $personne9->description = "";
        $personne9->edition_id = 2;
        $personne9->save();
        $equipe2->personnes()->save($personne9);

        $personne10 = new App\Personne();
        $personne10->prenom = "Cédric";
        $personne10->nom = "Schär";
        $personne10->email = "";
        $personne10->statut = "Chef du groupe CommExterne et membre du groupe sponsor";
        $personne10->phrase = "";
        $personne10->description = "";
        $personne10->edition_id = 2;
        $personne10->save();
        $equipe2->personnes()->save($personne10);

        $personne11 = new App\Personne();
        $personne11->prenom = "Kéren";
        $personne11->nom = "Bagnoud";
        $personne11->email = "";
        $personne11->statut = "Membre du groupe Sponsor";
        $personne11->phrase = "";
        $personne11->description = "";
        $personne11->edition_id = 2;
        $personne11->save();
        $equipe2->personnes()->save($personne11);

        $personne12 = new App\Personne();
        $personne12->prenom = "Kelly";
        $personne12->nom = "Pala";
        $personne12->email = "";
        $personne12->statut = "Membre du groupe Sponsor et aide d'autres groupes";
        $personne12->phrase = "";
        $personne12->description = "";
        $personne12->edition_id = 2;
        $personne12->save();
        $equipe2->personnes()->save($personne12);

        $personne13 = new App\Personne();
        $personne13->prenom = "Colin";
        $personne13->nom = "Mottas";
        $personne13->email = "";
        $personne13->statut = "Membre de l'équipe Web";
        $personne13->phrase = "";
        $personne13->description = "";
        $personne13->edition_id = 2;
        $personne13->save();
        $equipe2->personnes()->save($personne13);

        $personne14 = new App\Personne();
        $personne14->prenom = "Fréféric";
        $personne14->nom = "Cimbali";
        $personne14->email = "";
        $personne14->statut = "Chef de l'équipe VideosTeam";
        $personne14->phrase = "";
        $personne14->description = "";
        $personne14->edition_id = 2;
        $personne14->save();
        $equipe2->personnes()->save($personne14);

        $personne15 = new App\Personne();
        $personne15->prenom = "Julien";
        $personne15->nom = "Pittolaz";
        $personne15->email = "";
        $personne15->statut = "Chef de l'équipe Web";
        $personne15->phrase = "";
        $personne15->description = "";
        $personne15->edition_id = 2;
        $personne15->save();
        $equipe2->personnes()->save($personne15);

        $personne16 = new App\Personne();
        $personne16->prenom = "Timothée";
        $personne16->nom = "Delapierre";
        $personne16->email = "";
        $personne16->statut = "Membre de l'équipe presse";
        $personne16->phrase = "";
        $personne16->description = "";
        $personne16->edition_id = 2;
        $personne16->save();
        $equipe2->personnes()->save($personne16);

        $personne17 = new App\Personne();
        $personne17->prenom = "Cécile";
        $personne17->nom = "Porchet";
        $personne17->email = "";
        $personne17->statut = "Membre de l'équipe Sponsor";
        $personne17->phrase = "";
        $personne17->description = "";
        $personne17->edition_id = 2;
        $personne17->save();
        $equipe2->personnes()->save($personne17);

        $personne18 = new App\Personne();
        $personne18->prenom = "Carla";
        $personne18->nom = "Enzen";
        $personne18->email = "";
        $personne18->statut = "Membre de l'équipe Design";
        $personne18->phrase = "";
        $personne18->description = "";
        $personne18->edition_id = 2;
        $personne18->save();
        $equipe2->personnes()->save($personne18);

        $personne19 = new App\Personne();
        $personne19->prenom = "Cristina";
        $personne19->nom = "Goretti";
        $personne19->email = "";
        $personne19->statut = "Membre de l'équipe VideosTeam et du groupe CommExterne";
        $personne19->phrase = "";
        $personne19->description = "";
        $personne19->edition_id = 2;
        $personne19->save();
        $equipe2->personnes()->save($personne19);

        $personne20 = new App\Personne();
        $personne20->prenom = "David";
        $personne20->nom = "Kostic";
        $personne20->email = "";
        $personne20->statut = "Membre de l'équipe Evenement à l'école";
        $personne20->phrase = "";
        $personne20->description = "";
        $personne20->edition_id = 2;
        $personne20->save();
        $equipe2->personnes()->save($personne20);

        $personne21 = new App\Personne();
        $personne21->prenom = "Antoine";
        $personne21->nom = "Lot";
        $personne21->email = "";
        $personne21->statut = "Membre de l'équipe VideosTeam";
        $personne21->phrase = "";
        $personne21->description = "";
        $personne21->edition_id = 2;
        $personne21->save();
        $equipe2->personnes()->save($personne21);

        $personne21 = new App\Personne();
        $personne21->prenom = "Dylan";
        $personne21->nom = "Fernandes";
        $personne21->email = "";
        $personne21->statut = "Coordinateur des équipes";
        $personne21->phrase = "";
        $personne21->description = "";
        $personne21->edition_id = 2;
        $personne21->save();
        $equipe2->personnes()->save($personne21);


        //---------------------Année précèdente-----------------

        $personne22 = new App\Personne();
        $personne22->prenom = "Romain ";
        $personne22->nom = "Paridant de Cauwere";
        $personne22->email = "romain.paridandecauwere@heig-vd.com";
        $personne22->statut = "Team Manager";
        $personne22->phrase = "";
        $personne22->description = "";
        $personne22->edition_id = 1;
        $personne22->save();
        $equipe0->personnes()->save($personne22);

        $personne23 = new App\Personne();
        $personne23->prenom = "Emmanuel";
        $personne23->nom = "Spoerry";
        $personne23->email = "";
        $personne23->statut = "Communication manager";
        $personne23->phrase = "";
        $personne23->description = "";
        $personne23->edition_id = 1;
        $personne23->save();
        $equipe0->personnes()->save($personne23);

        $personne24 = new App\Personne();
        $personne24->prenom = "Philippe";
        $personne24->nom = "Richerzhagen";
        $personne24->email = "";
        $personne24->statut = "Logistics manager";
        $personne24->phrase = "";
        $personne24->description = "";
        $personne24->edition_id = 1;
        $personne24->save();
        $equipe0->personnes()->save($personne24);

        $personne25 = new App\Personne();
        $personne25->prenom = "Tim";
        $personne25->nom = "Lair";
        $personne25->email = "";
        $personne25->statut = "Accocie de projet";
        $personne25->phrase = "";
        $personne25->description = "";
        $personne25->edition_id = 1;
        $personne25->save();
        $equipe0->personnes()->save($personne25);

        $personne26 = new App\Personne();
        $personne26->prenom = "Corinne";
        $personne26->nom = "Ayer";
        $personne26->email = "";
        $personne26->statut = "Accocie de projet";
        $personne26->phrase = "";
        $personne26->description = "";
        $personne26->edition_id = 1;
        $personne26->save();
        $equipe0->personnes()->save($personne26);

        $personne27 = new App\Personne();
        $personne27->prenom = "Ricardo";
        $personne27->nom = "Arg Ello Moralles Juan";
        $personne27->email = "";
        $personne27->statut = "Accocie de projet";
        $personne27->phrase = "";
        $personne27->description = "";
        $personne27->edition_id = 1;
        $personne27->save();
        $equipe0->personnes()->save($personne27);
        /*         * * EDITION ** */
        $edition1 = new App\Edition();
        $edition1->date = "2016-07-24 15:28:22";
        $edition1->nom = "2016";
        $edition1->description = "L'édition précédente, l'HydroContest 2016, a été l'annnée de la première participation de la HEIG-VD à ce concours basé sur l'efficience énérgétique du transport maritime. Ca s'est déroulé, comme les éditions précédentes, aux Pyramiddes de Vidyy, à Lausanne.";
        $edition1->resultats = "Nous sommes arrivés 3ème au transport léger et 5ème au transport de masse. De plus, nous avons gagné le prix de l'innovation.";
        $edition1->enjeu = "Transporter plus, plus vite, en consommant moins d'énergie";
        $edition1->nbBateau = "2";
        $edition1->lieu = "Lausanne";
        $edition1->test = true;
        $edition1->archive = false;
        $edition1->actif = false;
        $edition1->save();
        $edition2 = new App\Edition();
        $edition2->date = "2017-09-04 15:28:22";
        $edition2->nom = "2017";
        $edition2->description = "Pour la première fois de son histoire, l’HydroContest ne se tiendra pas sur les rives du Lac Léman. Cette année, nous avons le plaisir d’annoncer que la compétition se déroulera à Saint-Tropez, du 4 au 10 septembre. La ville de Saint-Tropez, ville d’accueil de prestigieuses compétitions véliques, est entrée en partenariat avec la Fondation Hydros dans le but de promouvoir l’efficience énergétique dans la côte d’Azur.";
        $edition2->resultats = "";
        $edition2->enjeu = "Transporter plus, plus vite, en consommant moins d'énergie";
        $edition2->nbBateau = "6";
        $edition2->lieu = "St-Tropez";
        $edition2->test = true;
        $edition2->archive = false;
        $edition2->actif = true;
        $edition2->save();
        /*         * * ARTICLE ** */

        //-------------presse------------------
        $article1 = new App\Article();
        $article1->titre = "Succès suisse et français lors de l'Hydrocontest";
        $article1->soustitre = "";
        $article1->type = "presse";
        $article1->auteur = "";
        $article1->date = "2017-10-10 15:28:22";
        $article1->description = "Les hautes écoles suisses et françaises ont dominé l'édition 2016 de l'HydroContest à Lausanne.";
        $article1->url = "http://www.20min.ch/ro/news/vaud/story/Ecoles-suisses-et-fran-aises-prim-es---l-HydroContest-13017063";
        $article1->edition_id = 1;
        $article1->presse_id = 1;
        $article1->save();
        $article2 = new App\Article();
        $article2->titre = "Ecoles suisses et françaises primées à l'HydroContest";
        $article2->soustitre = "Lausanne Les hautes écoles suisses et françaises ont dominé l'édition 2016 de l'HydroContest à Lausanne.";
        $article2->type = "presse";
        $article2->auteur = "";
        $article2->date = "2016-07-31 20:58:00";
        $article2->description = "";
        $article2->url = "http://www.24heures.ch/vaud-regions/ecoles-suisses-francaises-primees-hydrocontest/story/25414798";
        $article2->edition_id = 1;
        $article2->presse_id = 2;
        $article2->save();

        //-------------news 2017------------------

        $article3 = new App\Article();
        $article3->titre = "Un événement au sein de notre école";
        $article3->soustitre = "";
        $article3->type = "news";
        $article3->auteur = "Team communication";
        $article3->date = "2017-05-10 15:28:22";
        $article3->description = "Un stand a été monté pour faire connaître l'événement Hydrocontest aux étudiants. Vous trouverez des photos et des vidéos dans notre album qui s'intitule ; Événement stand Hydrocontest";
        $article3->edition_id = 2;
        $article3->save();
        $article4 = new App\Article();
        $article4->titre = "Une team communication pour nous soutenir cette année";
        $article4->soustitre = "";
        $article4->type = "news";
        $article4->auteur = "";
        $article4->date = "2017-04-10 20:58:00";
        $article4->description = "";
        $article4->edition_id = 2;
        $article4->save();

        //-------------news 2016------------------

        $article5 = new App\Article();
        $article5->titre = "On est apparu dans le 20 minutes et le 24 heures!";
        $article5->soustitre = "";
        $article5->type = "news";
        $article5->auteur = "";
        $article5->date = "2016-10-10 15:28:22";
        $article5->description = "Allez découvrir les articles qui ont été écrit à propos de l'événement sous la catégorie presse de notre site";
        $article5->edition_id = 1;
        $article5->save();



        /*         * * SPONSORS ** */
        $sponsor1 = new App\Sponsor();
        $sponsor1->nom = "Yverdon Énergies";
        $sponsor1->categorie = "Sponsor Platine";
        $sponsor1->description = "Le sponsor principal qui nous a aidé finacièrement";
        $sponsor1->url = "http://www.yverdon-energies.ch/";
        $sponsor1->save();
        $edition1->sponsors()->save($sponsor1);
        $edition2->sponsors()->save($sponsor1);

        $sponsor2 = new App\Sponsor();
        $sponsor2->nom = "MB-Fins";
        $sponsor2->categorie = "Sponsor Platine";
        $sponsor2->description = "Aide indisponsable de leur part pour l'équipe";
        $sponsor2->url = "http://www.mb-fins.com/";
        $sponsor2->save();
        $edition1->sponsors()->save($sponsor2);
        $edition2->sponsors()->save($sponsor2);

        $sponsor3 = new App\Sponsor();
        $sponsor3->nom = "HEIG-VD";
        $sponsor3->categorie = "Sponsor Or";
        $sponsor3->description = "Aide indisponsable de leur part pour l'équipe";
        $sponsor3->url = "http://heig-vd.ch/";
        $sponsor3->save();
        $edition1->sponsors()->save($sponsor3);
        $edition2->sponsors()->save($sponsor3);

        $sponsor4 = new App\Sponsor();
        $sponsor4->nom = "Regie du Rhone";
        $sponsor4->categorie = "";
        $sponsor4->description = "";
        $sponsor4->url = "http://www.regierhone.ch/";
        $sponsor4->save();
        $edition1->sponsors()->save($sponsor4);

        /*         * * PRESSE ** */
        $Presse1 = new App\Presse();
        $Presse1->nom = "20 Minutes";
        $Presse1->save();
        $Presse2 = new App\Presse();
        $Presse2->nom = "24 Heures";
        $Presse2->save();
        $Presse3 = new App\Presse();
        $Presse3->nom = "La Region";
        $Presse3->save();
        /*         * * Reseaux Sociaux ** */
        $ResSoc1 = new App\ResSocial();
        $ResSoc1->nom = "Facebook";
        $ResSoc1->url = "http://www.facebook.com/teamheigvd.hydrocontest/";
        ;
        $ResSoc1->save();
        $ResSoc2 = new App\ResSocial();
        $ResSoc2->nom = "Instagram";
        $ResSoc2->url = "https://www.instagram.com/hydrocontest_heig_vd/";
        $ResSoc2->save();

        $ResSoc3 = new App\ResSocial();
        $ResSoc3->nom = "Youtube";
        $ResSoc3->url = "http://www.youtube.com/channel/UCM3d-hi1emSK0ua6oWWjd_g";
        $ResSoc3->save();
        /*         * * Media ** */
        //-----------Page accueil--------------
        $media1 = new App\Media();
        $media1->titre = "pageAccueil";
        $media1->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/lake.jpg";
        $media1->description = "image de fond de la page d'accueil";
        $media1->type = "image";
        $media1->information_id = 4;
        $media1->save();

        //-----------Albums2016--------------
        //--------Album1---------------
        $media2 = new App\Media();
        $media2->titre = "";
        $media2->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/ed1.jpg";
        $media2->description = "";
        $media2->type = "image";
        $media2->album_id = 1;
        $media2->save();

        $media3 = new App\Media();
        $media3->titre = "";
        $media3->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/ed2.jpg";
        $media3->description = "";
        $media3->type = "image";
        $media3->album_id = 1;
        $media3->save();

        //-----------Albums2017--------------
        //--------Album1---------------

        $media4 = new App\Media();
        $media4->titre = "";
        $media4->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/st1.jpg";
        $media4->description = "";
        $media4->type = "image";
        $media4->album_id = 2;
        $media4->save();

        $media5 = new App\Media();
        $media5->titre = "";
        $media5->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/st2.jpg";
        $media5->description = "";
        $media5->type = "image";
        $media5->album_id = 2;
        $media5->save();

        /* $media5 = new App\Media();
          $media5->titre = "";
          $media5->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/\.jpg";
          $media5->description = "";
          $media5->type = "video";
          $media5->album_id = 2;
          $media5->save(); */

        //--------Album2---------------
        $media6 = new App\Media();
        $media6->titre = "";
        $media6->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/av1.jpg";
        $media6->description = "";
        $media6->type = "image";
        $media6->album_id = 3;
        $media6->save();

        $media7 = new App\Media();
        $media7->titre = "";
        $media7->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/av2.jpg";
        $media7->description = "";
        $media7->type = "image";
        $media7->album_id = 3;
        $media7->save();

        //-----------Equipes--------------
        $media8 = new App\Media();
        $media8->titre = "";
        $media8->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/2016.jpg";
        $media8->description = "";
        $media8->type = "image";
        $media8->equipe_id = 1;
        $media8->save();

        $media9 = new App\Media();
        $media9->titre = "";
        $media8->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/2017.jpg";
        $media9->description = "";
        $media9->type = "image";
        $media9->equipe_id = 2;
        $media9->save();

        //-----------Personnes--------------

        for ($i = 1; $i <= 26; $i++) {
            $media10 = new App\Media();
            $media10->titre = "";
            $media10->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/john.jpg";
            $media10->description = "";
            $media10->type = "image";
            $media10->personne_id = $i;
            $media10->save();
        }
//        $media10 = new App\Media();
//        $media10->titre = "";
//        $media10->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/john.jpg";
//        $media10->description = "";
//        $media10->type = "image";
//        $media10->personne_id = 2;
//        $media10->save();
//
//        $media10 = new App\Media();
//        $media10->titre = "";
//        $media10->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/john.jpg";
//        $media10->description = "";
//        $media10->type = "image";
//        $media10->personne_id = 3;
//        $media10->save();
//
//        $media10 = new App\Media();
//        $media10->titre = "";
//        $media10->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/john.jpg";
//        $media10->description = "";
//        $media10->type = "image";
//        $media10->personne_id = 4;
//        $media10->save();
//
//        $media10 = new App\Media();
//        $media10->titre = "";
//        $media10->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/john.jpg";
//        $media10->description = "";
//        $media10->type = "image";
//        $media10->personne_id = 5;
//        $media10->save();
        //-----------Equipes--------------        
        $media11 = new App\Media();
        $media11->titre = "";
        $media11->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/romain.jpg";
        $media11->description = "";
        $media11->type = "image";
        $media11->equipe_id = 2;
        $media11->save();

        //-----------artcles--------------

        $media12 = new App\Media();
        $media12->titre = "";
        $media12->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/art.jpg";
        $media12->description = "";
        $media12->type = "image";
        $media12->article_id = 3;
        $media12->save();

        //-----------sponsors--------------

        $media13 = new App\Media();
        $media13->titre = "";
        $media13->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/yverdon.png";
        $media13->description = "";
        $media13->type = "image";
        $media13->sponsor_id = 1;
        $media13->save();

        $media14 = new App\Media();
        $media14->titre = "";
        $media14->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/mb.png";
        $media14->description = "";
        $media14->type = "image";
        $media14->sponsor_id = 2;
        $media14->save();

        $media15 = new App\Media();
        $media15->titre = "";
        $media15->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/heig.png";
        $media15->description = "";
        $media15->type = "image";
        $media15->sponsor_id = 3;
        $media15->save();

        $media16 = new App\Media();
        $media16->titre = "";
        $media16->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/rg.png";
        $media16->description = "";
        $media16->type = "image";
        $media16->sponsor_id = 4;
        $media16->save();


        //-----------presses--------------

        $media17 = new App\Media();
        $media17->titre = "";
        $media17->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/20.png";
        $media17->description = "";
        $media17->type = "image";
        $media17->presse_id = 1;
        $media17->save();

        $media18 = new App\Media();
        $media18->titre = "";
        $media18->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/24.png";
        $media18->description = "";
        $media18->type = "image";
        $media18->presse_id = 2;
        $media18->save();

        $media19 = new App\Media();
        $media19->titre = "";
        $media19->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/reg.gif";
        $media19->description = "";
        $media19->type = "image";
        $media19->presse_id = 3;
        $media19->save();

        //-----------reseaux sociaux--------------

        $media17 = new App\Media();
        $media17->titre = "";
        $media17->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/f.png";
        $media17->description = "";
        $media17->type = "image";
        //$media17->reseau_id = 1;
        $media17->save();

        $media18 = new App\Media();
        $media18->titre = "";
        $media18->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/i.jpg";
        $media18->description = "";
        $media18->type = "image";
        //$media18->reseau_id = 2;
        $media18->save();

        $media19 = new App\Media();
        $media19->titre = "";
        $media19->url = "http://pingouin.heig-vd.ch/oceanos/storage/images/y.png";
        $media19->description = "";
        $media19->type = "image";
        //$media19->reseau_id = 3;
        $media19->save();



        /*         * * Album ** */
        $Album1 = new App\Album();
        $Album1->nom = "Edition 2016 à Vidy";
        $Album1->description = "";
        $Album1->edition_id = 1;
        $Album1->save();
        $Album2 = new App\Album();
        $Album2->nom = "Stand hydrocontest";
        $Album2->description = "";
        $Album2->edition_id = 2;
        $Album2->save();

        $Album3 = new App\Album();
        $Album3->nom = "Avancement";
        $Album3->description = "";
        $Album3->edition_id = 2;
        $Album3->save();
        /*         * * Information ** */
        $info1 = new App\Information();
        $info1->nom = "PHRASEACCROCHE";
        $info1->texte = "L'efficience avant tout";
        $info1->save();
        $info2 = new App\Information();
        $info2->nom = "EspaceSponsor";
        $info2->texte = "Soutenez nous en devenant notre partenaire. De multiples avantages vous est offerts en fonction des investissements que vous faites... ";
        $info2->save();
        $info3 = new App\Information();
        $info3->nom = "EspaceEtudiant";
        $info3->texte = "L'occasion pour oeuvrer dans un projet d'envergure!";
        $info3->save();

        $info4 = new App\Information();
        $info4->nom = "IMAGEFOND";
        $info4->texte = "image de fond pour l'accueil";
        $info4->save();

        $info5 = new App\Information();
        $info5->nom = "CPT";
        $info5->texte = "afficher compteur, visible à true ou false";
        $info5->save();

        $info6 = new App\Information();
        $info6->nom = "NOMDEDOMAINE";
        $info6->texte = "http://pingouin.heig-vd.ch/oceanos";
        $info6->save();

        $info7 = new App\Information();
        $info7->nom = "EQUIPE";
        $info7->texte = "Team HEIG-VD";
        $info7->save();
    }

}
