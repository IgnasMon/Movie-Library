<?php
namespace App\Repositories;

use PDO;

class MovieRepository extends Repository {

    public function insertMovie($movie) {
        $stmt = $this->connection->prepare(
            "INSERT INTO movies 
                    (title, movie_cover, age_rating, director, duration, description, release_date) 
                    VALUES 
                    (:title, :movie_cover, :age_rating, :director, :duration, :description, :release_date)");
        
        $results = $stmt->execute([
            ':title' => $movie->title,
            ':movie_cover' => $movie->movie_cover,
            ':age_rating' => $movie->age_rating,
            ':director' => $movie->director,
            ':duration' => $movie->duration,
            ':description' => $movie->description,
            ':release_date' => $movie->release_date]);
        return $results;
    }
    public function getLastMovieId()
    {
        $stmt = $this->connection->prepare("SELECT id FROM movies ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $lastMovieId = $stmt->fetchColumn();
        return $lastMovieId ? $lastMovieId + 1 : 1;
    }

    public function removeMovie($movieId){
        $stmt = $this->connection->prepare(
                "DELETE FROM movies 
                        WHERE id = :id");
        return $stmt->execute([':id' => $movieId]);
    }

    public function updateMovie($movie) {
        $stmt = $this->connection->prepare(
            "UPDATE movies 
                SET title = :title, movie_cover = :movie_cover, age_rating = :age_rating, 
                    director = :director, duration = :duration, 
                    description = :description, release_date = :release_date 
                WHERE id = :id");

        $stmt->execute([
            ':title' => $movie->title,
            ':movie_cover' => $movie->movie_cover,
            ':age_rating' => $movie->age_rating,
            ':director' => $movie->director,
            ':duration' => $movie->duration,
            ':description' => $movie->description,
            ':release_date' => $movie->release_date,
            ':id' => $movie->id]);
    }

    /* Working for API as well */

    public function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM movies");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Movie');
        $movies = $stmt->fetchAll();

        return $movies;
    }

    public function getMovieById($movieId) {
        $stmt = $this->connection->prepare("SELECT * FROM movies 
                                                    WHERE id = :movieId");
        $stmt->execute([':movieId' => $movieId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Movie');
        $movie = $stmt->fetch();

        return $movie;
    }
}
