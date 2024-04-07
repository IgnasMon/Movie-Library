<?php
namespace App\Controllers;

use App\Services\MovieService;

class MoviesController extends Controller
{
    private $moviesService;

    public function __construct()
    {
        parent::__construct();
        $this->moviesService = new MovieService();
    }

    public function index()
    {
        $model = $this->moviesService->getAll();
        require __DIR__ . '/../views/movies/index.php';
    }
}
