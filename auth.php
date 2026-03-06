<?php
require "server/connection-db.php";
$user = $_SESSION["auth"] ?? false;
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
</head>

<body>
    <?php
    if ($user == "admin") {
        include "components/admin-header.php";
    } else {
        include "components/header.php";
    }
    ?>
    <main class="container">
        <h1>Вход</h1>
        <form method="post" action="/server/auth-db.php">
            <div class="mb-3">
                <label for="user" class="form-label">Имя пользователя/электронная почта</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </main>
</body>

</html>