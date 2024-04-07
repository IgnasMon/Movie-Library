<?php
include __DIR__ . '/../header.php';
?>
    <div class="container mt-8">
        <h1 class="text-3xl font-bold mb-4">Welcome to Mov.io</h1>

        <?php foreach ($model as $movie) : ?>
            <?php
            include __DIR__ . '/../movies/MovieDetailCard.php';
            ?>
        <?php endforeach; ?>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>