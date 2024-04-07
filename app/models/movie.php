<?php

namespace App\Models;

class Movie
{
    public int $id;
    public string $title;
    public ?string $movie_cover;
    public string $age_rating;
    public int $duration;
    public ?string $director;
    public ?string $description;
    public $release_date;
}
