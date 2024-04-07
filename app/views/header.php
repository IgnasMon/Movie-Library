<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mov.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<style>
    <?php include __DIR__ . '/../public/css/style.css' ?>
</style>
    <main>
        <div class="bg-secondary">
            <div id="topNav" class="container">
                <nav class="navbar">
                    <a class="navbar-brand" href="/">
                        <img class="d-inline-block align-top logo"
                             src="\img\logos\logoTitle.png" alt="Logo Image">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'bold-nav-link' : ''; ?>">
                            <a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/movies') ? 'bold-nav-link' : ''; ?>">
                            <a href="/movies" class="nav-link">Browse</a></li>
                        <?php
                        use App\Models\Permissions;
                        if(isset($_SESSION["authUser"])) {
                            $authUser = $_SESSION["authUser"];
                            if($authUser->permissions < 2) { ?>
                                <li class="nav-item dropdown <?php echo ($_SERVER['REQUEST_URI'] == '/manage') ? 'bold-nav-link' : ''; ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Management
                                    </a>
                                    <div id="dropdownManagement" class="dropdown-menu dropdown-menu-end"
                                         aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/manageusers">Manage Users</a>
                                        <a class="dropdown-item" href="/managemovies">Manage Movies</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="\img\users\default.png" alt="User Avatar"
                                         class="d-inline-block align-top avatarIcon">
                                </a>
                                <div id="dropdownUser" class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                                    <a class="dropdown-item" href='/users?username=<?php echo $authUser->username; ?>'>Profile</a>
                                    <a class="dropdown-item" href="/auth/logout">Logout</a>
                                </div>
                            </li>
                        <?php } else{ ?>
                            <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/auth') ? 'bold-nav-link' : ''; ?>"><a href="/auth" class="nav-link">Sign in</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
