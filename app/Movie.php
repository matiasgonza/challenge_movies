<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Movie extends Model
{
    protected $fillable = [
        'title', 'release_year', 'casting', 'directors', 'producer',
    ];

    public function actors()
    {
        return $this->belongsToMany(Person::class, 'actor_movie');
    }

    public function directors()
    {
        return $this->belongsToMany(Person::class, 'director_movie');
    }

    public function producer()
    {
        return $this->belongsToMany(Person::class, 'producer_movie');
    }

}
