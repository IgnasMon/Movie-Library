<?php
include __DIR__ . '/../header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="formContainers">
            <div class="modeSwitch">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/auth">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/auth/register">Register</a>
                    </li>
                </ul>
            </div>
            <div class="formContent">
                <form action="register" method="post">
                    <div class="form-group inputField">
                        <label for="inputUsername">Username</label>
                        <input type="text"
                               class="form-control" id="inputUsername" name="username"
                               placeholder="Username">
                    </div>
                    <div class="form-group inputField">
                        <label for="inputEmail">Email address</label>
                        <input type="email"
                               class="form-control" id="inputEmail" name="email"
                               aria-describedby="emailHelp" placeholder="johndoe@gmail.com">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group inputField">
                        <label for="inputPassword">Password</label>
                        <input type="password"
                               class="form-control" id="inputPassword" name="password"
                               placeholder="..." required>
                    </div>
                    <div class="form-group inputField">
                        <label for="inputPasswordConfirm">Confirm Password</label>
                        <input type="password"
                               class="form-control" id="inputPasswordConfirm" name="passwordConfirm"
                               placeholder="..." required>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="col-3 btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
