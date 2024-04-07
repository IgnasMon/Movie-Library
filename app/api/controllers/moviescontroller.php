<?php
namespace App\Api\Controllers;

use App\Models\Movie;

class MoviesController extends Controller
{
    private $moviesService;

    public function __construct()
    {
        parent::__construct();
        $this->moviesService = new \App\Services\MovieService();
    }

    public function index()
    {
        $movies = $this->moviesService->getAll();

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($movies);
    }

    public function movie()
    {
        if(isset($_POST["movieId"])){
            $movieId = $_POST["movieId"];
        }
        else if(isset($_GET["movieId"])){
            $movieId = $_GET["movieId"];
        }
        else{
            $errorResponse = ["error" => "Movie Id was not given!"];
            $this->errorHandler($errorResponse);
        }

        $movie = $this->moviesService->getMovieById($movieId);
        if($movie == null){
            $errorResponse = ["error" => "Movie with this Id does not exits!"];
            $this->errorHandler($errorResponse);
        }

        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($movie);
    }

    private function errorHandler($errorResponse){
        http_response_code(404);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($errorResponse);
        die;
    }
}
