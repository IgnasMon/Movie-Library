<?php
namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        parent::mailInit();
        $this->service = new UserService();
    }

    private function setMailInfo($email, $subject, $body)
    {
        $this->mail->addAddress($email);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
    }

    public function index()
    {
        require __DIR__ . '/../views/auth/index.php';
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["username"]))
            {
                $usernameInput = $_POST["username"];
                $userMatch = $this->service->getUserByUsername($usernameInput);
                if($userMatch != null){
                    $passwordInput = $_POST["password"];
                    if(password_verify($passwordInput, $userMatch->password)) {
                        $_SESSION["authUser"] = $userMatch;
                        header("Location: /");
                        exit();
                    }else{
                        echo "Incorrect password!";
                    }
                }else{
                    echo "User not found!";
                }
            }
        }
    }

    public function register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $newUser = new User();
            $newUser->username = $_POST["username"];
            $newUser->email = $_POST["email"];
            if($_POST["password"] == $_POST["passwordConfirm"])
            {
                $newUser->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $this->service->addUser($newUser);
                $authorizedUser = $this->service->getUserByUsername($newUser->username);
                $_SESSION["authUser"] = $authorizedUser;
                header("Location: /");
                exit();
            }else{
                echo "<h1>Password incorrect!</h1>";
            }
        }else{
            require __DIR__ . '/../views/auth/register.php';
        }
    }

    public function logout()
    {
        unset($_SESSION["authUser"]);
        unset($_SESSION);
        header('Location: /');
        exit();
    }
}