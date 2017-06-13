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
        DB::table('edition_sponsor')->truncate();
        DB::table('sponsors')->truncate();
        DB::table('articles')->truncate();
        DB::table('medias')->truncate();
        DB::table('editions')->truncate();
        DB::table('albums')->truncate();
        DB::table('presses')->truncate();
        DB::table('informations')->truncate();
        DB::table('parametres')->truncate();
        DB::table('res_socials')->truncate();

        /*         * * USERS ** */
        $user1 = new App\User();
        $user1->email = 'admin';
        $user1->password = bcrypt('123456');
        $user1->save();


        //EQUIPES

        $equipe1 = new App\Equipe();
        $equipe1->nom = "Team Communication";
        $equipe1->archive = false;
        $equipe1->edition_id = 2;
        $equipe1->save();

        $equipe2 = new App\Equipe();
        $equipe2->nom = "Team Ingénieurs";
        $equipe2->archive = false;
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
        $personne4->edition_id = 1;
        $personne4->save();
        $equipe1->personnes()->save($personne4);

        $personne5 = new App\Personne();
        $personne5->prenom = "Julien";
        $personne5->nom = "Gerber";
        $personne5->email = "julien.gerber@heig-vd.com";
        $personne5->statut = "Associé de projet";
        $personne5->phrase = "";
        $personne5->description = "";
        $personne5->edition_id = 1;
        $personne5->save();
        $equipe1->personnes()->save($personne5);
        
        $personne6 = new App\Personne();
        $personne6->prenom = "David";
        $personne6->nom = "Bolomey";
        $personne6->email = "david.bolomey@heig-vd.com";
        $personne6->statut = "Associé de projet";
        $personne6->phrase = "";
        $personne6->description = "";
        $personne6->edition_id = 1;
        $personne6->save();
        $equipe1->personnes()->save($personne5);
        
        $personne7 = new App\Personne();
        $personne7->prenom = "Romain ";
        $personne7->nom = "Paridant de Cauwere";
        $personne7->email = "romain.paridandecauwere@heig-vd.com";
        $personne7->statut = "External Provider";
        $personne7->phrase = "";
        $personne7->description = "";
        $personne7->edition_id = 1;
        $personne7->save();
        $equipe1->personnes()->save($personne7);
        
        $personne8 = new App\Personne();
        $personne8->prenom = "Laurent ";
        $personne8->nom = "Gravier";
        $personne8->email = "laurent.gravier@heig-vd.com";
        $personne8->statut = "Chercheur superviseur";
        $personne8->phrase = "";
        $personne8->description = "";
        $personne8->edition_id = 1;
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
        $personne9->edition_id = 1;
        $personne9->save();
        $equipe2->personnes()->save($personne9);
        
        $personne10 = new App\Personne();
        $personne10->prenom = "Cédric";
        $personne10->nom = "Schär";
        $personne10->email = "";
        $personne10->statut = "Chef du groupe CommExterne et membre du groupe sponsor";
        $personne10->phrase = "";
        $personne10->description = "";
        $personne10->edition_id = 1;
        $personne10->save();
        $equipe2->personnes()->save($personne10);
        
        $personne11 = new App\Personne();
        $personne11->prenom = "Kéren";
        $personne11->nom = "Bagnoud";
        $personne11->email = "";
        $personne11->statut = "Membre du groupe Sponsor";
        $personne11->phrase = "";
        $personne11->description = "";
        $personne11->edition_id = 1;
        $personne11->save();
        $equipe2->personnes()->save($personne11);
        
        $personne12 = new App\Personne();
        $personne12->prenom = "Kelly";
        $personne12->nom = "Pala";
        $personne12->email = "";
        $personne12->statut = "Membre du groupe Sponsor et aide à d'autres groupes";
        $personne12->phrase = "";
        $personne12->description = "";
        $personne12->edition_id = 1;
        $personne12->save();
        $equipe2->personnes()->save($personne12);
        
        $personne13 = new App\Personne();
        $personne13->prenom = "Kelly";
        $personne13->nom = "Pala";
        $personne13->email = "";
        $personne13->statut = "Membre du groupe Sponsor et aide à d'autres groupes";
        $personne13->phrase = "";
        $personne13->description = "";
        $personne13->edition_id = 1;
        $personne13->save();
        $equipe2->personnes()->save($personne13);

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
        $edition1->actif = true;
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
        $article1 = new App\Article();
        $article1->titre = "Succès suisse et français lors de l'Hydrocontest";
        $article1->soustitre = "";
        $article1->type = "presse";
        $article1->auteur = "";
        $article1->date = "2017-10-10 15:28:22";
        $article1->description = "Les hautes écoles suisses et françaises ont dominé l'édition 2016 de l'HydroContest à Lausanne.";
        $article1->url = "url/url/.html";
        $article1->visible = true;
        $article1->archive = false;
        $article1->edition_id = 1;
        $article1->presse_id = 1;
        $article1->save();

        $article2 = new App\Article();
        $article2->titre = str_random(10);
        $article2->soustitre = str_random(10);
        $article2->type = "presse";
        $article2->auteur = str_random(10);
        $article2->date = "2017-10-10 15:28:22";
        $article2->description = "Description";
        $article2->url = "url/url/.html";
        $article2->visible = true;
        $article2->archive = false;
        $article2->edition_id = 1;
        $article2->presse_id = 1;
        $article2->save();

        $article3 = new App\Article();
        $article3->titre = str_random(10);
        $article3->soustitre = str_random(10);
        $article3->type = "news";
        $article3->auteur = str_random(10);
        $article3->date = "2017-10-10 15:28:22";
        $article3->description = "Description";
        $article3->url = "url/url/.html";
        $article3->visible = true;
        $article3->archive = false;
        $article3->edition_id = 1;
        $article3->presse_id = 0;
        $article3->save();

        /*         * * SPONSORS ** */
        $sponsor1 = new App\Sponsor();
        $sponsor1->nom = "Yverdon Énergies";
        $sponsor1->categorie = "Sponsor Platine";
        $sponsor1->description = "le sponsor principal";
        $sponsor1->url = "blalbla";
        $sponsor1->archive = false;
        $sponsor1->save();
        $edition1->sponsors()->save($sponsor1);
        
        $sponsor2 = new App\Sponsor();
        $sponsor2->nom = "MB-Fins";
        $sponsor2->categorie = "Sponsor Platine";
        $sponsor2->description = "Aide indisponsable de leur part pour l'équipe";
        $sponsor2->url = "blalbla";
        $sponsor2->archive = false;
        $sponsor2->save();
        $edition1->sponsors()->save($sponsor2);
        
        $sponsor3 = new App\Sponsor();
        $sponsor3->nom = "HEIG-VD";
        $sponsor3->categorie = "Sponsor Or";
        $sponsor3->description = "Aide indisponsable de leur part pour l'équipe";
        $sponsor3->url = "blalbla";
        $sponsor3->archive = false;
        $sponsor3->save();
        $edition1->sponsors()->save($sponsor3);
        
        /*         * * PRESSE ** */

        $Presse1 = new App\Presse();
        $Presse1->nom = "20 Minutes";
        $Presse1->archive = false;
        $Presse1->save();

        $Presse2 = new App\Presse();
        $Presse2->nom = "24 Heures";
        $Presse2->archive = false;
        $Presse2->save();

        $Presse3 = new App\Presse();
        $Presse3->nom = "La Region";
        $Presse3->archive = false;
        $Presse3->save();

        /*         * * Reseaux Sociaux ** */

        $ResSoc1 = new App\ResSocial();
        $ResSoc1->nom = "Facebook";
        $ResSoc1->url = "facebook.com";
        $ResSoc1->archive = false;
        $ResSoc1->save();

        $ResSoc2 = new App\ResSocial();
        $ResSoc2->nom = "Instagram";
        $ResSoc2->url = "instagram.com";
        $ResSoc2->archive = false;
        $ResSoc2->save();

        /*         * * Media ** */
        $media0 = new App\Media();
        $media0->titre = "test";
        $media0->url = "\salut.jpg";
        $media0->description = "lol";
        $media0->type = "image";
        $media0->archive = false;
        $media0->save();

        $Media1 = new App\Media();
        $Media1->titre = "test";
        $Media1->url = "\salut.mov";
        $Media1->description = "lol";
        $Media1->type = "video";
        $Media1->archive = false;
        $Media1->album_id = 1;
        $Media1->save();

        $Media2 = new App\Media();
        $Media2->titre = "test";
        $Media2->url = "\salut.mov";
        $Media2->description = "lol";
        $Media2->type = "image";
        $Media2->archive = false;
        $Media2->album_id = 1;
        $Media2->save();

        $Media3 = new App\Media();
        $Media3->titre = "test";
        $Media3->url = "\equipe.jpg";
        $Media3->description = "lol";
        $Media3->type = "image";
        $Media3->equipe_id = 1;
        $Media3->archive = false;
        $Media3->save();

        $Media4 = new App\Media();
        $Media4->titre = "test";
        $Media4->url = "\personne1.jpg";
        $Media4->description = "lol";
        $Media4->type = "image";
        $Media4->personne_id = 1;
        $Media4->archive = false;
        $Media4->save();

        $Media5 = new App\Media();
        $Media5->titre = "test";
        $Media5->url = "\personne2.jpg";
        $Media5->description = "lol";
        $Media5->type = "image";
        $Media5->personne_id = 2;
        $Media5->archive = false;
        $Media5->save();

        $Media6 = new App\Media();
        $Media6->titre = "test";
        $Media6->url = "\atricle.jpg";
        $Media6->description = "lol";
        $Media6->type = "image";
        $Media6->article_id = 1;
        $Media6->archive = false;
        $Media6->save();

        $Media7 = new App\Media();
        $Media7->titre = "test";
        $Media7->url = "\atricle2.jpg";
        $Media7->description = "lol";
        $Media7->type = "image";
        $Media7->article_id = 2;
        $Media7->archive = false;
        $Media7->save();

        $Media8 = new App\Media();
        $Media8->titre = "test";
        $Media8->url = "\sponsor1.jpg";
        $Media8->description = "lol";
        $Media8->type = "image";
        $Media8->sponsor_id = 1;
        $Media8->archive = false;
        $Media8->save();

        $Media9 = new App\Media();
        $Media9->titre = "test";
        $Media9->url = "\sponsor2.jpg";
        $Media9->description = "lol";
        $Media9->type = "image";
        $Media9->sponsor_id = 2;
        $Media9->archive = false;
        $Media9->save();

        $media00 = new App\Media();
        $media00->titre = "test";
        $media00->url = "\sponsor2.jpg";
        $media00->description = "lol";
        $media00->type = "image";
        $media00->sponsor_id = 2;
        $media00->archive = false;
        $media00->save();

        $media01 = new App\Media();
        $media01->titre = "test";
        $media01->url = "\presse1.jpg";
        $media01->description = "lol";
        $media01->type = "image";
        $media01->presse_id = 1;
        $media01->archive = false;
        $media01->save();

        $media02 = new App\Media();
        $media02->titre = "test";
        $media02->url = "\presse1.jpg";
        $media02->description = "lol";
        $media02->type = "image";
        $media02->presse_id = 2;
        $media02->archive = false;
        $media02->save();
        
        $media03 = new App\Media();
        $media03->titre = "test";
        $media03->url = "\couverture.jpg";
        $media03->description = "image de fond de la page d'accueil";
        $media03->type = "image";
        $media03->information_id = 5;
        $media03->archive = false;
        $media03->save();

        /*         * * Album ** */
        $Album1 = new App\Album();
        $Album1->nom = "Concours";
        $Album1->description = "lol";
        $Album1->archive = false;
        $Album1->edition_id = 1;
        $Album1->save();

        $Album2 = new App\Album();
        $Album2->nom = "Tests_medias";
        $Album2->description = "lol";
        $Album2->archive = false;
        $Album2->edition_id = 1;
        $Album2->save();

        /*         * * Information ** */
        $info1 = new App\Information();
        $info1->nom = "PageAccueil_PhraseAccroche";
        $info1->texte = "L'efficience avant tout";
        $info1->visible = true;
        $info1->archive = false;
        $info1->save();

        $info2 = new App\Information();
        $info2->nom = "EspaceSponsor";
        $info2->texte = "Soutenez nous en devenant notre partenaire. De multiples avantages vous est offerts en fonction des investissements que vous faites... ";
        $info2->visible = true;
        $info2->archive = false;
        $info2->save();

        $info3 = new App\Information();
        $info3->nom = "EspaceEtudiant";
        $info3->texte = "L'occasion pour oeuvrer dans un projet d'envergure!";
        $info3->visible = true;
        $info3->archive = false;
        $info3->save();
        
        $info4 = new App\Information();
        $info4->nom = "ImageFondAccueil";
        $info4->texte = "image de fond pour l'accueil";
        $info4->visible = true;
        $info4->archive = false;
        $info4->save();
    }

}
