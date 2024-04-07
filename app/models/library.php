<?php
namespace App\Models;

use JsonSerializable;

class Library implements JsonSerializable
{
    public int $id;
    public int $user_id;
    public int $movie_id;
    public bool $library_status;
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'movie_id' => $this->movie_id,
            'library_status' => $this->library_status
        ];
    }
}
