<?php

namespace App\Repositories;

use App\Models\User;
use PDO;

class AuthRepository extends Repository {

    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $users = $stmt->fetchAll();

        return $users;
    }

    public function getUserByUsername($username)
    {
        try{
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
            $user = $stmt->fetch();

            if(isset($user)){
                return $user;
            }
            return null;
        }catch (\PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function createUser($newUser)
    {
        $hashedPassword = password_hash($newUser->password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (username, password, authority, firstname, lastname) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$newUser->username,
                $hashedPassword,
                $newUser->authority,
                $newUser->firstname,
                $newUser->lastname
            ]);
            $this->connection->commit();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            throw $e;
        }
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