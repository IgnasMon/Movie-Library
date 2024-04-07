<?php
include __DIR__ . '/../header.php';
?>
<style>
    .required{
        color: red;
    }
</style>
    <div style="background: darkgrey; padding: 20px; border-radius: 25px;">
        <h1>Create user</h1>
        <p><span class="required">*</span> - fields are required to fill.</p>
        <form action="create" method="post">
            <div class="row">
                <h3>Identity</h3>
                <div class="form-group col-4">
                    <label for="inputUsername">Username<span class="required">*</span></label>
                    <input type="text"
                           class="form-control" id="inputUsername" name="username"
                           placeholder="Username" required>
                </div>
                <div class="form-group col-2">
                    <label for="inputPermission">Permissions</label>
                    <input type="text"
                           class="form-control" id="inputPermission" name="permission"
                           placeholder="0" required>
                </div>
            </div>
            <div class="row">
                <h3>Personal Information</h3>
                <div class="form-group col-4">
                    <label for="inputEmail">Email address<span class="required">*</span></label>
                    <input type="email"
                           class="form-control" id="inputEmail" name="email"
                           aria-describedby="emailHelp" placeholder="johndoe@gmail.com" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text"
                               class="form-control" id="inputFirstName" name="firstName"
                               placeholder="John">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text"
                               class="form-control" id="inputLastName" name="lastName"
                               placeholder="Doe">
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Password reset</h3>
                <div class="form-group col-4">
                    <label for="inputPassword">Password<span class="required">*</span></label>
                    <input type="password"
                           class="form-control" id="inputPassword" name="password"
                           placeholder="Password" required>
                </div>
                <div class="form-group col-4">
                    <label for="inputPasswordConfirm">Confirm Password<span class="required">*</span></label>
                    <input type="password"
                           class="form-control" id="inputPasswordConfirm" name="passwordConfirm"
                           placeholder="Password" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="col-3 btn btn-success">Create User</button>
            </div>
        </form>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>