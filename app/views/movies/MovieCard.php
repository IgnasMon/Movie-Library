<?php $movieCoverPath = 'img/movies/' . $movie->movie_cover;?>
<div class="relative movie_card">
    <a href="movie_detail.php?id=<?= $movie->id ?>" class="block">
        <div class="w-44 h-64 rounded-t overflow-hidden shadow-lg">
            <img src="<?= $movieCoverPath ?>" alt="<?= $movie->title ?>" class="w-full h-full object-cover object-center">
        </div>
    </a>
    <button class="absolute bottom-1 left-1/2
        transform -translate-x-1/2 py-1 px-2
        bg-blue-500 text-white font-semibold rounded text-xs" onclick="addMovieToLibrary(<?php echo $_SESSION['authUser']->id ?>, <?php echo $movie->id ?>)">Add to Library</button>
</div>
<script src="\js\moviecard.js"></script>