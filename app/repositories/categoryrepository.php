<?php
namespace App\Repositories;

use PDO;

class CategoryRepository extends Repository {
    public function deleteCategories($movieId) {
        $stmt = $this->connection->prepare("DELETE FROM moviecategories WHERE movieId = :movieId");
        $stmt->execute([':movieId' => $movieId]);
    }
}
