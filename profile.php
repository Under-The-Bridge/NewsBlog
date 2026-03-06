<?php
require "server/connection-db.php";

$user = $_COOKIE["auth"];
$query = mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where username = '$user'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-reboot.css.map">
    <link rel="stylesheet" href="./assets/css/bootstrap-utilities.min.css">
    <script src="./assets/js/bootstrap.bundle.min.js" async defer></script>
    <script src="./assets/js/jquery-4.0.0.js" async defer></script>
    <style>
        main {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }

        .content {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .block {
            padding: 1rem;
            background-color: #f8f9fa;
            font-size: 24px;
            margin: 0 !important;
            *{
                margin: 0 !important;
            }
        }

        .content if(.content a) {
            display: flex;
        }
        .content a:hover{
            color:gray;
        }
        a {
            color:black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Новостной портал Пингвины</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (!isset($_COOKIE["auth"])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/auth.php">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration.php">Регистрация</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile.php">Профиль</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/server/logout.php">Выйти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/createnews.php">Создать пост</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="content">
            <p class="block">Привет, <?= $_COOKIE["auth"] ?></p>
            <div class="block">
                <p>Логин</p>
                <p><?= $query["username"] ?></p>
            </div>
            <div class="block">
                <p>Email</p>
                <p><?= $query["email"] ?></p>
            </div>
            <div class="block">
                <a href="emailchange.php">Сменить почту</a>
                <a href="passwordchange.php">Сменить пароль</a>
            </div>
        </div>
    </main>

</body>

</html>