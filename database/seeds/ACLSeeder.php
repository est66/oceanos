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

        /*         * * EDITION ** */
        $edition1 = new App\Edition();
        $edition1->date = "2016-07-24 15:28:22";
        $edition1->nom = "2016";
        $edition1->description = "";
        $edition1->resultats = "Nous sommes arrivés 1er";
        $edition1->enjeu = "Transporter plus, plus vite, en consommant moins d'énergie";
        $edition1->nbBateau = "2";
        $edition1->lieu = "Lausanne";
        $edition1->test = true;
        $edition1->archive = true;
        $edition1->actif = true;
        $edition1->save();
        
                /*         * * EDITION ** */
        $edition1 = new App\Edition();
        $edition1->date = "2017-09-04 15:28:22";
        $edition1->nom = "2017";
        $edition1->description = "Pour la première fois de son histoire, l’HydroContest ne se tiendra pas sur les rives du Lac Léman. Cette année, nous avons le plaisir d’annoncer que la compétition se déroulera à Saint-Tropez, du 4 au 10 septembre. La ville de Saint-Tropez, ville d’accueil de prestigieuses compétitions véliques, est entrée en partenariat avec la Fondation Hydros dans le but de promouvoir l’efficience énergétique dans la côte d’Azur.";
        $edition1->resultats = "Nous sommes arrivés 1er";
        $edition1->enjeu = "gagner la course";
        $edition1->nbBateau = "6";
        $edition1->lieu = "Lausanne";
        $edition1->test = true;
        $edition1->archive = true;
        $edition1->actif = true;
        $edition1->save();
        /*         * * ARTICLE ** */
        $article1 = new App\Article();
        $article1->titre = "Hydrocontest en sursi !";
        $article1->soustitre = "Tous va mal";
        $article1->type = "presse";
        $article1->auteur = "gagner la course";
        $article1->date = "2017-10-10 15:28:22";
        $article1->description = "Description de l'article";
        $article1->url = "url/url/.html";
        $article1->visible = true;
        $article1->archive = true;
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
        $article2->archive = true;
        $article2->edition_id = 2;
        $article2->presse_id = 1;
        $article2->save();
        
        
        
        
        
        
                
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
