<?php
namespace App\api\controllers;

use App\Controllers\Controller;
use App\Services\LibraryService;

class LibraryController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new LibraryService();
    }

    public function index()
    {
        if(isset($_POST["userId"])){
            $userId = $_POST["userId"];
        }
        else if(isset($_GET["userId"])){
            $userId = $_GET["userId"];
        }
        else{
            $errorResponse = ["error" => "User Id was not given!"];
            $this->errorHandler($errorResponse);
        }

        $movie = $this->service->getUserLibraryById($userId);
        if($movie == null){
            $errorResponse = ["error" => "User library is empty"];
            $this->errorHandler($errorResponse);
        }

        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($movie);
    }

    public function add()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        if(isset($requestData['userId']) && isset($requestData['movieId']))
        {
            $userId = $requestData['userId'];
            $movieId = $requestData['movieId'];

            $libraryService = new LibraryService();
            $success = $libraryService->addMovieToLibrary($userId, $movieId);

            if ($success) {
                http_response_code(200);
                echo json_encode(["message" => "Movie added to library successfully"]);
            } else {
                $errorResponse = ["message" => "Failed to add movie to library"];
                $this->errorHandler($errorResponse);
            }
        } else {
            $errorResponse = ["message" => "Invalid request data"];
            $this->errorHandler($errorResponse);
        }
    }

    private function errorHandler($errorResponse){
        http_response_code(404);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($errorResponse);
        die;
    }
}
