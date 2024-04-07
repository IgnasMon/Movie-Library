<?php
include __DIR__ . '/../header.php';
?>

    <div class="container mt-8 flex">
        <div class="w-3/4">
            <h1 class="text-3xl font-bold mb-4">Welcome to the Movie list!</h1>
            <div id="movie-cards" class="flex flex-wrap">
                <?php foreach ($model as $movie) : ?>
                    <div class="m-2">
                        <?php require __DIR__ . '/MovieCard.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="w-1/4 ml-4">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            <!-- Add your category display here -->
        </div>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>