<?php
namespace App\Services;

use App\Repositories\LibraryRepository;

class LibraryService {

    private $repository;

    private function updateRepo()
    {
        $this->repository = new LibraryRepository();
    }

    /* Working for API as well */

    public function addMovieToLibrary($userId, $movieId)
    {
        $this->updateRepo();
        return $this->repository->addMovieToLibrary($userId, $movieId);
    }

    public function getUserLibraryById($userId)
    {
        $this->updateRepo();
        return $this->repository->getUserLibraryById($userId);
    }
}