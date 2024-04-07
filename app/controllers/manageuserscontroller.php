<?php
namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use http\Header;

class ManageUsersController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new UserService();
    }

    public function index()
    {
        $model = $this->service->getAll();
        require __DIR__ . '/../views/manageusers/index.php';
    }

    public function returnToIndex()
    {
        header("Location: /manageusers");
        exit();
    }

    public function create()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $newUser = new User();
            $newUser->username = $_POST["username"];
            //permission
            $newUser->email = $_POST["email"];
            $newUser->first_name = $_POST["firstName"];
            $newUser->last_name = $_POST["lastName"];

            if($_POST["password"] == $_POST["passwordConfirm"])
                $newUser->password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $this->service->addUser($newUser);

            $this->returnToIndex();
        }else{
            require __DIR__ . '/../views/manageusers/create.php';
        }
    }

    public function edit()
    {
        $userId = $_GET["id"] ?? null;

        if  ($userId !== null){
            $model = $this->service->getUserById($userId);
            if($model)
            {
                require __DIR__ . '/../views/manageusers/edit.php';
            } else{
                echo "<h1>User does not exist with provided ID!</h1>";
            }
        }else{
            echo "<h1>ID not provided!</h1>";
        }
    }

    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userId = $_POST["id"] ?? null;

            if ($userId !== null) {
                $currentUser = $this->service->getUserById($userId);

                $currentUser->username = $_POST["username"];
                $currentUser->first_name = $_POST["firstName"];
                $currentUser->last_name = $_POST["lastName"];

                $this->service->updateUserById($currentUser);

                $this->returnToIndex();
            } else {
                echo "<h1>ID not provided!</h1>";
            }
        } else {
            echo "<h1>User does not exist with the provided Id!</h1>";
        }
    }

    public function delete()
    {
        $userId = $_GET["id"] ?? null;

        if  ($userId !== null){
            $model = $this->service->getUserById($userId);
            if($model)
            {
                $this->service->deleteUserById($userId);

                $this->returnToIndex();
            } else{
                echo "<h1>User does not exist with provided ID!</h1>";
            }
        }else{
            echo "<h1>ID not provided!</h1>";
        }
    }
}