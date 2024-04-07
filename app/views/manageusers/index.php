<?php
include __DIR__ . '/../header.php';
?>

    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-4">Manage Users</h1>
        <div class="col-2">
            <a href="/manageusers/create"
               class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded inline-block mb-4">Create User</a>
        </div>
        <?php if(isset($model)) { ?>
        <table class="w-full table-auto border border-gray-300">
            <thead>
            <tr>
                <th class="px-4 py-2 border-b">Username</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">First Name</th>
                <th class="px-4 py-2 border-b">Last Name</th>
                <th class="px-4 py-2 border-b">Permissions</th>
                <th class="px-4 py-2 border-b">Date Created</th>
                <!--<th class="px-4 py-2 border-b">Categories</th>-->
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model as $index => $user): ?>
                <tr class="<?= $index % 2 === 0 ? 'bg-gray-200' : 'bg-gray-100' ?>">
                    <td class="px-4 py-2 border-b"><?php echo isset($user->username) ? $user->username : "" ; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo isset($user->email) ? $user->email : "" ; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo isset($user->first_name) ? $user->first_name : "" ; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo isset($user->last_name) ? $user->last_name : "" ; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo isset($user->permissions) ? $user->getPermissionName() : "" ; ?></td>
                    <td class="px-4 py-2 border-b"><?php echo isset($user->date_created) ? $user->date_created : "" ; ?></td>


                    <!--<td class="px-4 py-2 border-b">
                        <?php /*foreach ($movie->categories as $category): */?>
                            <a href='#' class="inline-block bg-gray-300 text-gray-800 px-2 py-1 rounded-full mr-2"><?php /*= $category->title */?></a>
                        <?php /*endforeach; */?>
                    </td>-->
                    <td class="px-4 py-2 border-b">
                        <a href='/manageusers/edit?id=<?= $user->id ?>' class="text-blue-500 hover:underline">Edit</a>
                        |
                        <a href='/manageusers/delete?id=<?= $user->id ?>' id='deleteUser_<?= $user->id ?>' onclick='confirmDelete(<?= $user->id ?>)' class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php } else{ ?>
            <h3>No users present in the database!</h3>
        <?php } ?>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>