<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title', 'release_year', 'casting', 'directors', 'producer',
    ];

    public function actors()
    {
        return $this->hasMany(User::class, 'actor_movie');
    }

    public function directors()
    {
        return $this->hasMany(User::class, 'director_movie');
    }

    public function producer()
    {
        return $this->hasMany(User::class, 'producer_movie');
    }

}
