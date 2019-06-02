<?php

namespace App;

use App\Movie;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'aliases'
    ];

    public function movies_actor()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie');
    }

    public function movies_director()
    {
        return $this->belongsToMany(Movie::class, 'director_movie');
    }

    public function movies_producer()
    {
        return $this->belongsToMany(Movie::class, 'producer_movie');
    }
}
