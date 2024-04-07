<?php
include __DIR__ . '/../header.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="formContainers">
            <div class="modeSwitch">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/auth">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register">Register</a>
                    </li>
                </ul>
            </div>
            <div class="formContent">
                <form action="auth/login" method="post">
                    <div class="form-group inputField">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group inputField">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="*********" required>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-success">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
