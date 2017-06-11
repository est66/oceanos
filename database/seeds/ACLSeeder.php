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
        $equipe1->save();

        $equipe2 = new App\Equipe();
        $equipe2->nom = "TEAM HYDROCONTEST";
        $equipe2->phrase = "TOUS LES MEMBRES DE LA TEAM HYDROCONTEST";
        $equipe2->archive = false;
        $equipe2->edition_id = 1;
        $equipe2->save();


        /*         * * PERSONNES ** */
        $personne1 = new App\Personne();
        $personne1->nom = "Esteem";
        $personne1->prenom = "Okoro";
        $personne1->email = "esteem.okoro@heig-vd.com";
        $personne1->filiere = "IT";
        $personne1->statut = "Communication";
        $personne1->phrase = "Je suis étudiant à l'HEIG-VD";
        $personne1->description = "Description de la personne";
        $personne1->edition_id = 1;
        $personne1->save();
        //JOINTURE AVEC PIVOT
        $equipe1->personnes()->save($personne1);
        //------------------------------------
        $personne2 = new App\Personne();
        $personne2->nom = "Jonathan";
        $personne2->prenom = "Aeschimann";
        $personne2->email = "jonathan.aeschimann@heig-vd.com";
        $personne2->filiere = "Media";
        $personne2->statut = "Communication";
        $personne2->phrase = "Phrase d'accroche";
        $personne2->description = "Description de la personne";
        $personne2->edition_id = 1;
        $personne2->save();
        //JOINTURE AVEC PIVOT
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
      
                /*         * * ARTICLEs ** */
        
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
        $media0 = new App\Media();
        $media0->titre="test";
        $media0->url="\salut.jpg";            
        $media0->description="lol";
        $media0->type="image";
        $media0->archive=false;
        $media0->save();
        
        $Media1 = new App\Media();
        $Media1->titre="test";
        $Media1->url="\salut.mov";            
        $Media1->description="lol";
        $Media1->type="video";
        $Media1->archive=false;
        $Media1->album_id=1;
        $Media1->save();

        $Media2 = new App\Media();
        $Media2->titre="test";
        $Media2->url="\salut.mov";            
        $Media2->description="lol";
        $Media2->type="image";
        $Media2->archive=false;
        $Media2->album_id=1;
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
        
        $Media6 = new App\Media();
        $Media6->titre="test";
        $Media6->url="\atricle.jpg";            
        $Media6->description="lol";
        $Media6->type="image";
        $Media6->article_id=1;
        $Media6->archive=false;
        $Media6->save();
        
        $Media7 = new App\Media();
        $Media7->titre="test";
        $Media7->url="\atricle2.jpg";            
        $Media7->description="lol";
        $Media7->type="image";
        $Media7->article_id=2;
        $Media7->archive=false;
        $Media7->save();
        
        $Media8 = new App\Media();
        $Media8->titre="test";
        $Media8->url="\sponsor1.jpg";            
        $Media8->description="lol";
        $Media8->type="image";
        $Media8->sponsor_id=1;
        $Media8->archive=false;
        $Media8->save();         
        
        $Media9 = new App\Media();
        $Media9->titre="test";
        $Media9->url="\sponsor2.jpg";            
        $Media9->description="lol";
        $Media9->type="image";
        $Media9->sponsor_id=2;
        $Media9->archive=false;
        $Media9->save();   
        
        $media00 = new App\Media();
        $media00->titre="test";
        $media00->url="\sponsor2.jpg";            
        $media00->description="lol";
        $media00->type="image";
        $media00->sponsor_id=2;
        $media00->archive=false;
        $media00->save();  
        
        $media01 = new App\Media();
        $media01->titre="test";
        $media01->url="\presse1.jpg";            
        $media01->description="lol";
        $media01->type="image";
        $media01->presse_id=1;
        $media01->archive=false;
        $media01->save();  
                
        $media02 = new App\Media();
        $media02->titre="test";
        $media02->url="\presse1.jpg";            
        $media02->description="lol";
        $media02->type="image";
        $media02->presse_id=2;
        $media02->archive=false;
        $media02->save();  
        
        /*         * * Album ** */   
        $Album1 = new App\Album();
        $Album1->nom="Concours";           
        $Album1->description="lol";
        $Album1->archive=false;
        $Album1->edition_id=1;
        $Album1->save(); 
        
        $Album2 = new App\Album();
        $Album2->nom="Tests_medias";           
        $Album2->description="lol";
        $Album2->archive=false;
        $Album2->edition_id=1;
        $Album2->save(); 
        
        /*         * * Information ** */   
        $info1 = new App\Information();
        $info1->nom="PageAccueil_PhraseAccroche";          
        $info1->texte="L'efficience avant tout";
        $info1->visible=true;
        $info1->archive=false;
        $info1->save(); 
        
        $info2 = new App\Information();
        $info2->nom="EspaceSponsor";           
        $info2->texte="Soutenez nous en devenant notre partenaire. De multiples avantages vous est offerts en fonction des investissements que vous faites... ";
        $info2->visible=true;
        $info2->archive=false;
        $info2->save(); 
        
        $info3 = new App\Information();
        $info3->nom="EspaceEtudiant";           
        $info3->texte="L'occasion pour oeuvrer dans un projet d'envergure!";
        $info3->visible=true;
        $info3->archive=false;
        $info3->save(); 


//        $article1->edition()->save($edition1);
//       /**         * GROUPS ** */
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
