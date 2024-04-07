<?php
namespace App\Repositories;

use PDO;

class LibraryRepository extends Repository {

    public function addMovieToLibrary($userId, $movieId) {
        $stmt = $this->connection->prepare(
            "INSERT INTO library (user_id, movie_id, library_status) 
                    VALUES (:userId, :movieId, 1)"
        );
        return $stmt->execute([
                ':userId' => $userId,
                ':movieId' => $movieId]);
    }

    public function getUserLibraryById($userId) {
        try {
            $stmt = $this->connection->prepare(
            "SELECT * FROM movies 
                    INNER JOIN library ON movies.id = library.movie_id
                    WHERE library.user_id = :userId AND library.library_status = 1");
            $stmt->execute([':userId' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e){
            error_log("Database Error, getting user library: " . $e->getMessage());
            return false;
        }
    }
}
