<?php
include __DIR__ . '/../header.php';
?>
    <div style="background: darkgrey; padding: 20px; border-radius: 25px;">
        <h1>Manage user <?php echo $model->id; ?></h1>
        <form action="update" method="post">
            <input type="hidden" name="id" value="<?php echo $model->id; ?>">
            <div class="row">
                <h3>Identity</h3>
                <div class="form-group col-4">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Enter username" value="<?php echo $model->username; ?>">
                </div>
                <div class="form-group col-2">
                    <label for="inputPermission">Permissions</label>
                    <input type="text" class="form-control" id="inputPermission" name="permission" value="<?php echo $model->permissions; ?>">
                </div>
            </div>
            <div class="row">
                <h3>Personal Information</h3>
                <div class="form-group col-4">
                    <label for="inputEmail">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $model->email; ?>" disabled>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="User firstname" value="<?php echo $model->first_name; ?>">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="User lastname" value="<?php echo $model->last_name; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Password reset</h3>
                <a href="#">Request Change</a>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="col-3 btn btn-success">Confirm Changes</button>
            </div>
        </form>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>