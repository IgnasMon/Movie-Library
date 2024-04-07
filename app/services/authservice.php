<?php

namespace App\Services;

use App\Repositories\UserRepository;

class AuthService {
    private $repository;

    private function updateRepo(){
        $this->repository = new UserRepository();
    }

    public function loginUser($username, $password)
    {
        $this->updateRepo();
        $user = $this->repository->getUserByUsername($username);

        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public function registerUser($newuser){

        $this->updateRepo();
        try {
            $existingUser = $this->repository->getUserByUsername($newuser->username);
            if($existingUser == null){
                throw new \Exception("User not found!");
            }

            $result = $this->repository->createUser($newuser);
            if (isset($result)) {
                return "User registered successfully!";
            } else {
                throw new \Exception('Error registering user');
            }
        }catch (\Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
}