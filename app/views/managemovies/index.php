<?php
include __DIR__ . '/../header.php';
?>

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-4">Manage Movies</h1>
        <a href="/managemovies/create"
           class="bg-blue-500 hover:bg-blue-700
           py-2 px-4 mb-4 rounded inline-block
           text-white">Create Movie</a>
        <table class="w-full table-auto border border-gray-300">
            <thead>
            <tr>
                <th class="px-4 py-2 border-b">Title</th>
                <th class="px-4 py-2 border-b">Age Rating</th>
                <th class="px-4 py-2 border-b">Director</th>
                <th class="px-4 py-2 border-b">Duration</th>
                <th class="px-4 py-2 border-b">Description</th>
                <th class="px-4 py-2 border-b">Release Date</th>
                <!--<th class="px-4 py-2 border-b">Categories</th>-->
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model as $index => $movie): ?>
                <tr class="<?= $index % 2 === 0 ? 'bg-gray-200' : 'bg-gray-100' ?>">
                    <td class="px-4 py-2 border-b"><?= $movie->title ?></td>
                    <td class="px-4 py-2 border-b"><?= $movie->age_rating ?></td>
                    <td class="px-4 py-2 border-b"><?= $movie->director ?></td>
                    <td class="px-4 py-2 border-b"><?= $movie->duration ?></td>
                    <td class="px-4 py-2 border-b"><?= $movie->description ?></td>
                    <td class="px-4 py-2 border-b"><?= $movie->release_date ?></td>
                    <!--<td class="px-4 py-2 border-b">
                        <?php /*foreach ($movie->categories as $category): */?>
                            <a href='#'
                                class="inline-block bg-gray-300 text-gray-800 px-2 py-1 rounded-full mr-2">
                                <?php /*= $category->title */?>
                            </a>
                        <?php /*endforeach; */?>
                    </td>-->
                    <td class="px-4 py-2 border-b">
                        <a href='/managemovies/edit?movieId=<?= $movie->id ?>'
                           class="text-blue-500 hover:underline">Edit</a>
                        |
                        <a href='/managemovies/delete?movieId=<?= $movie->id ?>'
                           id='deleteMovie_<?= $movie->id ?>' onclick='confirmDelete(<?= $movie->id ?>)'
                           class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>