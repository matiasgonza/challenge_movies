<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Person;
use App\User;

class DatabaseSeeder extends Seeder
{

    public $number_user = 1;
    public $number_movies = 3;
    public $number_of_actors = 15;
    public $number_of_directors = 3;
    public $number_of_producer = 1;
    public $movie;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'name' => 'matias',
            'email' => 'mati@gmail.com',
            'password' => bcrypt('123123'),
        ]);

        factory(Movie::class, $this->number_movies)->create()->each(
            function($movie)
            {   
                $this->movie = $movie; 
                factory(Person::class, $this->number_of_actors)->create()->each(
                    function($actor)
                    {
                        $actor->movies_actor()->attach($this->movie);
                    }
                );

                factory(Person::class, $this->number_of_directors)->create()->each(
                    function($director)
                    {
                        $director->movies_director()->attach($this->movie);
                    }
                );

                factory(Person::class, $this->number_of_producer)->create()->each(
                    function($producer)
                    {
                        $producer->movies_producer()->attach($this->movie);
                    }
                );
            }
        );
    }
}
