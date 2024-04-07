<?php
namespace App\Controllers;
use App\Services\UserService;

class UsersController extends Controller
{
    private $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();

    }

    public function index()
    {
        if(isset($_SESSION["authUser"])){
            $user = $_SESSION["authUser"];
            require __DIR__ . '/../views/users/index.php';
        }
        else{
            header('Location: /');
            exit();
        }
    }
}
