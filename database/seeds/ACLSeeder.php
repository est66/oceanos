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
        DB::table('personne')->truncate();
        DB::table('equipe')->truncate();
        DB::table('sponsor')->truncate();
        DB::table('article')->truncate();
        DB::table('media')->truncate();
        DB::table('edition')->truncate();
        DB::table('album')->truncate();
        DB::table('information')->truncate();
        DB::table('parametre')->truncate();


        /*         * * USERS ** */
        $user1 = new App\User();
        $user1->email = 'john@example.com';
        $user1->password = bcrypt('123456');
        $user1->save();
        $user2 = new App\User();
        $user2->email = 'john2@example.com';
        $user2->password = bcrypt('123456');
        $user2->save();
        
               /*         * * PERSONNES ** */
        $personne1 = new App\Personne(); 
        $personne1->nom ="Fred";
        $personne1->prenom ="Cici";
        $personne1->nom ="Fred";


                    $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateDeNaissance');
            $table->string('email')->nullable();
            $table->string('filiere');
            $table->string('statut');
            $table->string('phrase');
            $table->text('description');
            $table->timestamps();
        
        
        /*         * * GROUPS ** */
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
