<?php if (isset($_GET['movieId'])): ?>
    <div>
        <label for="movieId" class="block">Movie Id:</label>
        <input type="text" id="movieId" name="movieId"
               class="w-full p-2 border border-gray-300 rounded" readonly>
    </div>
<?php endif; ?>

<div class="grid grid-cols-2 gap-4">
    <div class="mt-4">
        <label for="title" class="block mt-4">Title:</label>
        <input type="text" id="title" name="title"
               class="w-full p-2 border border-gray-300 rounded">

        <label for="ageRating" class="block mt-4">Age Rating:</label>
        <input type="text" id="ageRating" name="ageRating"
               class="w-full p-2 border border-gray-300 rounded">

        <label for="director" class="block mt-4">Director:</label>
        <input type="text" id="director" name="director"
               class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mt-4">
        <label for="duration" class="block mt-4">Duration:</label>
        <input type="text" id="duration" name="duration"
               class="w-full p-2 border border-gray-300 rounded">

        <label for="releaseDate" class="block mt-4">Release Date:</label>
        <input type="date" id="releaseDate" name="releaseDate"
               class="w-full p-2 border border-gray-300 rounded">
    </div>

    <div class="mb-3">
        <label for="movieCover" class="form-label">Movie Cover (Optional):</label>
        <input type="file" id="movieCover" name="movieCover">
    </div>
</div>

<label for="description" class="block mt-4">Description:</label>
<textarea id="description" name="description" rows="5"
          class="w-full p-2 border border-gray-300 rounded"></textarea>

<?php if (isset($_GET['movieId'])): ?>
    <script>
        var movieId = <?= json_encode($_GET['movieId']) ?>;
    </script>
    <script src="\js\movieCRUD.js"></script>
<?php endif; ?>