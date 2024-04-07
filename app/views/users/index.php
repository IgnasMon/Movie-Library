<?php
include __DIR__ . '/../header.php';
?>
<div class="container mt-8">
    <h1 class="text-3xl font-bold mb-4"><?php echo $user->username; ?> Profile</h1>
</div>

<div id="library_container" class="container">
    <h2 class="text-2xl font-bold mb-2">My Library</h2>
    <ul id="movie-list"></ul>
</div>

<script src="userlibrary.js"></script>
<script>
    var userId = <?php echo $user->id; ?>;
    window.onload = function() {
        fetchLibrary();
    };
</script>

<?php
include __DIR__ . '/../footer.php';
?>
