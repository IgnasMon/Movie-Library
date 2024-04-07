<?php
include __DIR__ . '/../header.php';
?>

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-4">Edit Movie</h1>
        <?php
        include __DIR__ . '/../components/breadcrumbs.php';
        ?>
        <form method="POST" action="/managemovies/edit" enctype="multipart/form-data">
            <?php include_once 'CRUDFields.php' ?>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Save Changes</button>
        </form>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>