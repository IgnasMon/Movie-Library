<?php
namespace App\Models;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public ?string $first_name;
    public ?string $last_name;
    public int $permissions;
    public string $date_created;

    public function getPermissionName() {
        switch ($this->permissions) {
            case Permissions::System:
                return "System";
            case Permissions::Administrator:
                return "Admin";
            case Permissions::Member:
                return "Member";
            default:
                return "Unknown";
        }
    }
}
