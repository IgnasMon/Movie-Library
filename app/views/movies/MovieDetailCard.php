<?php
$releaseDate = new DateTime($movie->release_date);
$releaseYear = $releaseDate->format('Y');
?>
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
<!--    <img src="/app/public/img/movies/--><?php //echo $movie->movie_cover; ?><!--" alt="--><?php //echo $movie->title?><!-- Cover">-->
    <h2 class="text-2xl font-bold"><?php echo $movie->title; ?></h2>
    <p class="text-gray-600">
        <i><?php echo $movie->age_rating; ?></i>
        <span><?php echo $releaseYear; ?></span>
        <span><?php echo $movie->duration; ?></span>
    </p>
    <p class="mt-2"><?php echo $movie->description; ?></p>
</div>
<script src="\js\movie.js"></script>