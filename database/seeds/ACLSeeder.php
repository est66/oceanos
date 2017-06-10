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
        $user1->email = 'admin@oceanos.com';
        $user1->password = bcrypt('123456');
        $user1->save();


        //EQUIPES
        $equipe1 = new App\Equipe();
        $equipe1->nom = "Ingenieurs";
        $equipe1->phrase = "Nous sommes les ingénieurs de Hydrocontest";
        $equipe1->archive = false;
        $equipe1->edition_id = 1;
        $equipe1->equipe_id = 1;
        $equipe1->save();
        //EQUIPES
        $equipe2 = new App\Equipe();
        $equipe2->nom = "TEAM HYDROCONTEST";
        $equipe2->phrase = "TOUS LES MEMBRES DE LA TEAM HYDROCONTEST";
        $equipe2->archive = false;
        $equipe2->edition_id = 1;
        $equipe2->equipe_id = 1;
        $equipe2->save();


        /*         * * PERSONNES ** */
        $personne1 = new App\Personne();
        $personne1->nom = "Esteem";
        $personne1->prenom = "Okoro";
        $personne1->dateDeNaissance = "1992-01-01";
        $personne1->email = "esteem.okoro@heig-vd.com";
        $personne1->filiere = "IT";
        $personne1->statut = "Communication";
        $personne1->phrase = "Je suis étudiant à l'HEIG-VD";
        $personne1->description = "Description de la personne";
        $personne1->save();
        //INSERTION DANS L'EQUIPE
        $equipe1->personnes()->save($personne1);
        //------------------------------------
        $personne2 = new App\Personne();
        $personne2->nom = "Jonathan";
        $personne2->prenom = "Aeschimann";
        $personne2->dateDeNaissance = "1990-01-01";
        $personne2->email = "jonathan.aeschimann@heig-vd.com";
        $personne2->filiere = "Media";
        $personne2->statut = "Communication";
        $personne2->phrase = "Phrase d'accroche";
        $personne2->description = "Description de la personne";
        $personne2->save();
        //INSERTION DANS L'EQUIPE
        $equipe1->personnes()->save($personne2);  
        //------------------------------------
        /*         * * EDITION ** */
        $edition1 = new App\Edition();
        $edition1->date = "2017-10-10 15:28:22";
        $edition1->nom = "2017";
        $edition1->description = "Edition no 1";
        $edition1->resultats = "Nous sommes arrivés 1er";
        $edition1->enjeu = "gagner la course";
        $edition1->nbBateau = "6";
        $edition1->lieu = "Lausanne";
        $edition1->test = true;
        $edition1->archive = false;
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
