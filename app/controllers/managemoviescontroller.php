<?php
namespace App\Controllers;

use App\Models\Movie;
use App\Services\MovieService;

class ManageMoviesController extends Controller
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
        require __DIR__ . '/../views/managemovies/index.php';
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            require '../views/managemovies/create.php';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $movie = new Movie();
            $this->updateMovieChanges($movie);

            $this->moviesService->insertMovie($movie);

            $this->index();
        }
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->updateMovie();
        } elseif ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['movieId'])) {
            $movieId = $_GET['movieId'];
            $movie = $this->moviesService->getMovieById($movieId);

            require __DIR__ . '/../views/managemovies/edit.php';
        }
    }

    private function updateMovie() {
        $movieId = $_POST['movieId'];
        $movie = $this->moviesService->getMovieById($movieId);
        if($movie == null){
            http_response_code(404);
            echo json_encode(['error' => 'No movie found']);
            return false;
        }
        $movie = $this->updateMovieChanges($movie);

        $this->moviesService->updateMovie($movie);

        $this->index();
    }

    private function updateMovieChanges($movie) {
        /* for Create method to set the id of last movie in the database +1 */
        if (!isset($movie->id)) {
            $movie->id  = $this->moviesService->getLastMovieId();
        }

        $movie->title = htmlspecialchars($_POST['title']);
        $movie->age_rating = htmlspecialchars($_POST['ageRating']);
        $movie->director = htmlspecialchars($_POST['director']);
        $movie->duration = htmlspecialchars($_POST['duration']);
        $movie->description = htmlspecialchars($_POST['description']);
        $movie->release_date = $_POST['releaseDate'];

        /* Handle upload image file */
        if ($_FILES['movieCover']['error'] == UPLOAD_ERR_OK) {
            $movie = $this->handleFileUpload($movie);
        } else {
            echo "Error uploading file.";
        }

        return $movie;
    }

    private function handleFileUpload($movie) {
        $movieId = $movie->id;
        $movieCoverName = $movieId . '.' . pathinfo($_FILES['movieCover']['name'], PATHINFO_EXTENSION);
        $tempName = $_FILES['movieCover']['tmp_name'];
        $destinationDirectory = __DIR__ . '/../public/img/movies/';

        /* Deletion of old image if it exits */
        if (!empty($movie->movie_cover)) {
            $oldImagePath = $destinationDirectory . $movie->movie_cover;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        /* Move the image file with a new file name */
        $destination = $destinationDirectory . $movieCoverName;
        if (move_uploaded_file($tempName, $destination)) {
            $movie->movie_cover = $movieCoverName;
        }

        return $movie;
    }

    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['movieId'])) {
            $movieId = $_GET['movieId'];
            $this->moviesService->removeMovie($movieId);
            $this->index();
        }
    }
}
