<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Comment;
use App\Models\User;
use Faker\Generator as Faker;

class FilmSeeder extends Seeder
{

    public function run()
    {
        $films= [
                    [
                        'name'         => 'Film One',
                        'slug'         => 'film-one',
                        'description'  => 'Film one desc',
                        'release_date' => date("Y-m-d",strtotime("-5 days")),
                        'rating'       => 4,
                        'ticket_price' => 600,
                        'country'      => 'UK',
                        'genre'        => 'Norm',
                        'photo'        => 'https://thumbs.dreamstime.com/b/movie-slate-film-reel-wood-clapper-wooden-backgorund-36502412.jpg',

                    ],
                    [
                        'name'         => 'Film two',
                        'slug'         => 'film-two',
                        'description'  => 'Film two desc',
                        'release_date' => date("Y-m-d",strtotime("-10 days")),
                        'rating'       => 5,
                        'ticket_price' => 700,
                        'country'      => 'US',
                        'genre'        => 'Norm two',
                        'photo'        => 'https://thumbs.dreamstime.com/b/movie-slate-film-reel-wood-clapper-wooden-backgorund-36502412.jpg',
                    ],
                    [
                        'name'         => 'Film three',
                        'slug'         => 'film-three',
                        'description'  => 'Film three desc',
                        'release_date' => date("Y-m-d",strtotime("-15 days")),
                        'rating'       => 5,
                        'ticket_price' => 800,
                        'country'      => 'US',
                        'genre'        => 'Norm three',
                        'photo'        => 'https://thumbs.dreamstime.com/b/movie-slate-film-reel-wood-clapper-wooden-backgorund-36502412.jpg',
                    ],
                ];
        $comment=1;
                        
        foreach($films as $key => $film){

            $inserted=Film::create($film);
            $user=User::first();

            Comment::insert([
                "comment"=>"Comment ".$comment,
                "user_id"=>$user->id,
                "film_id"=>$inserted->id
            ]);

            $comment++;
        }        
    }
}
