<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/18276695?v=4">
    <title>My Simple Web</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg fixed-top bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="https://inixindo.id">
                <img src="https://avatars.githubusercontent.com/u/18276695?v=4" alt="LogoX" width="30" height="30">
                <span class="px-2">Simple Web</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                session_start();
                if (!isset($_SESSION['name'])) {
                ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/contact.php">Contact</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/auth/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/books/index.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/authors/index.php">Authors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/simpleweb/project1/pages/charts/chart_display.php">Chart</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
                <ul class="navbar-nav d-flex">
                    <?php
                    if (!isset($_SESSION['name'])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User Area
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/simpleweb/project1/pages/auth/register.php">Register</a></li>
                                <li><a class="dropdown-item" href="http://localhost/simpleweb/project1/pages/auth/login.php">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost/simpleweb/project1/pages/auth/profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="http://localhost/simpleweb/project1/pages/auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                </ul>
            <?php
                    }
            ?>
            </div>
        </div>
    </nav>