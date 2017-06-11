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
        DB::table('sponsors')->truncate();
        DB::table('articles')->truncate();
        DB::table('medias')->truncate();
        DB::table('editions')->truncate();
        DB::table('albums')->truncate();
        DB::table('informations')->truncate();
        DB::table('parametres')->truncate();
        DB::table('res_socials')->truncate();
        DB::table('equipe_personne')->truncate();
        
        
        /*         * * USERS ** */
        $user1 = new App\User();
        $user1->email = 'amdin';
        $user1->password = bcrypt('pass');
        $user1->save();
        $user2 = new App\User();
        $user2->email = 'test';
        $user2->password = bcrypt('test');
        $user2->save();

        /*         * * PERSONNES ** */
        $personne1 = new App\Personne();
        $personne1->nom = "Jonathan";
        $personne1->prenom = "Aeschimann";
        $personne1->email ="jonathan.aeschimann@heig-vd.com";
        $personne1->statut = "Team manager";
        $personne1->phrase = "L'efficence avant tout!";
        $personne1->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne1->save();
        
        $personne2 = new App\Personne();
        $personne2->nom = "Jonathan";
        $personne2->prenom = "Coelho";
        $personne2->email ="jonathan.coelho@heig-vd.com";
        $personne2->statut = "Communication manager";
        $personne2->phrase = "L'efficence avant tout!";
        $personne2->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne2->save();
        
        $personne3 = new App\Personne();
        $personne3->nom = "Mathias";
        $personne3->prenom = "Favre";
        $personne3->email ="mathias.favre@heig-vd.com";
        $personne3->statut = "Logistics manager";
        $personne3->phrase = "L'efficence avant tout!";
        $personne3->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne3->save();
        
        $personne4 = new App\Personne();
        $personne4->nom = "Dani";
        $personne4->prenom = "Duarte";
        $personne4->email ="dani.duarte@heig-vd.com";
        $personne4->statut = "Associé de projet";
        $personne4->phrase = "L'efficence avant tout!";
        $personne4->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne4->save();
        
        $personne5 = new App\Personne();
        $personne5->nom = "Julien";
        $personne5->prenom = "Gerber";
        $personne5->email ="julien.gerber@heig-vd.com";
        $personne5->statut = "Associé de projet";
        $personne5->phrase = "L'efficence avant tout!";
        $personne5->description = "Je suis Ingenieur à la HEIG-VD.";
        $personne5->save();
        
        /*         * * EQUIPE ** */
        $equipe1 = new App\Equipe();
        $equipe1->nom = "Team HEIG-VD";
        $equipe1->archive = false;
        $equipe1->edition_id = 2;
        $equipe1->save();
        
        /*         * * EQUIPE ** */
        $equipe1 = new App\Equipe();
        $equipe1->nom = "Team Communication";
        $equipe1->archive = false;
        $equipe1->edition_id = 2;
        $equipe1->equipe_id = 1;
        $equipe1->save();
        
        /*         * * EQUIPE ** */
        $equipe1 = new App\Equipe();
        $equipe1->nom = "Team Ingénieurs";
        $equipe1->archive = false;
        $equipe1->edition_id = 2;
        $equipe1->equipe_id = 1;
        $equipe1->save();
        
        /*         * * EQUIPE_PERSONNE ** */
        $equipe1 = new App\Equipe_Personne();
        $equipe1->equipe_id = 2;
        $equipe1->personne_id = 1;
        $equipe1->save();
        $equipe1 = new App\Equipe_Personne();
        $equipe1->equipe_id = 2;
        $equipe1->personne_id = 2;
        $equipe1->save();
        $equipe1 = new App\Equipe_Personne();
        $equipe1->equipe_id = 3;
        $equipe1->personne_id = 3;
        $equipe1->save();

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
        
        $edition1 = new App\Edition();
        $edition1->date = "2017-09-04 15:28:22";
        $edition1->nom = "2017";
        $edition1->description = "Pour la première fois de son histoire, l’HydroContest ne se tiendra pas sur les rives du Lac Léman. Cette année, nous avons le plaisir d’annoncer que la compétition se déroulera à Saint-Tropez, du 4 au 10 septembre. La ville de Saint-Tropez, ville d’accueil de prestigieuses compétitions véliques, est entrée en partenariat avec la Fondation Hydros dans le but de promouvoir l’efficience énergétique dans la côte d’Azur.";
        $edition1->resultats = "";
        $edition1->enjeu = "Transporter plus, plus vite, en consommant moins d'énergie";
        $edition1->nbBateau = "6";
        $edition1->lieu = "St-Tropez";
        $edition1->test = true;
        $edition1->archive = false;
        $edition1->actif = true;
        $edition1->save();
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
        $article1->edition_id = 2;
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
        $article2->edition_id = 2;
        $article2->presse_id = 1;
        $article2->save();
        
         /*         * * ARTICLE ** */
        
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
        $article3->edition_id = 2;
        $article3->presse_id = 0;
        $article3->save();
        
        
         /*         * * SPONSORS ** */
        $sponsor1 = new App\Sponsor();
        $sponsor1->nom = "Yverdon Énergies";
        $sponsor1->categorie= "Sponsor Platine";
        $sponsor1->description= "le sponsor principal";
        $sponsor1->url="blalbla";
        $sponsor1->archive=false;
        $sponsor1->save();
        
        $sponsor2 = new App\Sponsor();
        $sponsor2->nom = "MB-Fins";
        $sponsor2->categorie= "Sponsor Platine";
        $sponsor2->description= "Aide indisponsable de leur part pour l'équipe";
        $sponsor2->url="blalbla";
        $sponsor2->archive=false;
        $sponsor2->save();
        
        $sponsor3 = new App\Sponsor();
        $sponsor3->nom = "HEIG-VD";
        $sponsor3->categorie= "Sponsor Or";
        $sponsor3->description= "Aide indisponsable de leur part pour l'équipe";
        $sponsor3->url="blalbla";
        $sponsor3->archive=false;
        $sponsor3->save();
        
        
        
        /*         * * PRESSE ** */
        
        $Presse1 = new App\Presse();
        $Presse1->nom = "20 Minutes";
        $Presse1->archive=false;
        $Presse1->save();
        
        $Presse2 = new App\Presse();
        $Presse2->nom = "24 Heures";
        $Presse2->archive=false;
        $Presse2->save();
        
        $Presse3 = new App\Presse();
        $Presse3->nom = "La Region";
        $Presse3->archive=false;
        $Presse3->save();
        
        
        /*         * * Reseaux Sociaux ** */
        
        $ResSoc1 = new App\ResSocial();
        $ResSoc1->nom = "Facebook";
        $ResSoc1->url="facebook.com";
        $ResSoc1->archive=false;
        $ResSoc1->save();
        
        $ResSoc2 = new App\ResSocial();
        $ResSoc2->nom = "Instagram";
        $ResSoc2->url="instagram.com";
        $ResSoc2->archive=false;
        $ResSoc2->save();
        
        /*         * * Media ** */        
        $Media1 = new App\Media();
        $Media1->titre="test";
        $Media1->url="\salut.jpg";            
        $Media1->description="lol";
        $Media1->type="image";
        $Media1->position=1;
        $Media1->archive=false;
        $Media1->save();
        
        $Media2 = new App\Media();
        $Media2->titre="test";
        $Media2->url="\salut.mov";            
        $Media2->description="lol";
        $Media2->type="video";
        $Media2->position=2;
        $Media2->archive=false;
        $Media2->save();
        
        
        $Media3 = new App\Media();
        $Media3->titre="test";
        $Media3->url="\equipe.jpg";            
        $Media3->description="lol";
        $Media3->type="image";
        $Media3->equipe_id=1;
        $Media3->archive=false;
        $Media3->save();
        
        $Media4 = new App\Media();
        $Media4->titre="test";
        $Media4->url="\personne1.jpg";            
        $Media4->description="lol";
        $Media4->type="image";
        $Media4->personne_id=1;
        $Media4->archive=false;
        $Media4->save();
        
        $Media5 = new App\Media();
        $Media5->titre="test";
        $Media5->url="\personne2.jpg";            
        $Media5->description="lol";
        $Media5->type="image";
        $Media5->personne_id=2;
        $Media5->archive=false;
        $Media5->save();
        
                
//        $article1->edition()->save($edition1);


        /**         * GROUPS ** */
//        $admin = new \App\Group();
//        $admin->name = 'admin';
//        $admin->save();
//        $moderator = new \App\Group();
//        $moderator->name = 'moderator';
//        $moderator->save();
//        $visitor = new \App\Group();
//        $visitor->name = 'visitor';
//        $visitor->save();
//        /*         * * RESSOURCES ** */
//        $news = new \App\Resource();
//        $news->name = "news";
//        $news->save();
//        $photo = new \App\Resource();
//        $photo->name = "photo";
//        $photo->save();
//        /*         * * NEWS ** */
//        $user1->news()->save(new \App\News([
//            'title' => 'News de test du user 1',
//            'body' => 'Body de test',
//        ]));
//        $user1->news()->save(new \App\News([
//            'title' => 'News de test 2 du user 1',
//            'body' => 'Body de test',
//        ]));
//        $user2->news()->save(new \App\News([
//            'title' => 'News de test du user 2',
//            'body' => 'Body de test',
//        ]));
//
//        /*         * * RELATIONSHIPS ** */
//        // ADD USERS TO GROUPS
//        $admin->users()->save($user1);
//        $moderator->users()->save($user2);
//        // GIVE ROLES TO GROUPS ON RESSOURCES
//        $admin->resources()->save($news, ['role' => \App\Role::DELETE]);
//        $admin->resources()->save($news, ['role' => \App\Role::UPDATE]);
//        $admin->resources()->save($news, ['role' => \App\Role::READ]);
//        $admin->resources()->save($news, ['role' => \App\Role::CREATE]);
    }

}
