<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\MovieRepository;

class MovieService
{
    private $movierepository;
    private $categoryrepository;

    private function updateRepo(){
        $this->movierepository = new MovieRepository();
        $this->categoryrepository = new CategoryRepository();
    }

    public function insertMovie($movie) {
        $this->updateRepo();
        return $this->movierepository->insertMovie($movie);
    }
    public function getLastMovieId()
    {
        $this->updateRepo();
        return $this->movierepository->getLastMovieId();
    }

    public function removeMovie($movieId){
        $this->updateRepo();
        $this->movierepository->removeMovie($movieId);
    }

    public function updateMovie($movie) {
        $this->updateRepo();
        $this->movierepository->updateMovie($movie);
    }

    /* Working for API as well */

    public function getAll() {
        $this->updateRepo();
        return $this->movierepository->getAll();
    }
    public function getMovieById($movieId)
    {
        $this->updateRepo();
        return $this->movierepository->getMovieById($movieId);
    }
}
