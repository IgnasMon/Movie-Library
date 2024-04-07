<?php
namespace App\Api\Controllers;
use App\Services\UserService;

class UsersController extends Controller
{
    private $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new LibraryService();
    }

    public function index()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $userId = $_GET['userId'] ?? null;
            if(!$userId){
                http_response_code(400);
                echo 'No user ID provided';
                return false;
            }
            try {
                $userLibrary = $this->userService->getUserLibrary($userId);
                if (!$userLibrary) {
                    http_response_code(404);
                    echo json_encode(['error' => 'No favorites found']);
                    return false;
                }
                http_response_code(200);
                echo json_encode($userLibrary);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
            }

        }
    }
}
