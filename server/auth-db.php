<?php
require "connection-db.php";

$user = $_POST["user"] ?? false;
$password = $_POST["password"] ?? false;

$checkuser = mysqli_query($conn, "select * from Users where email = '$user' or username = '$user'");
if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    if ($user["password"] == $password) {
        setcookie("auth", $user["username"], time() + 3600, "/");
        header("Location: /");
    } else {
        echo_error("Неверный пароль", "/auth.php");
        // echo '<div class="alert alert-danger" role="alert">Неверный пароль! <a class="alert-link" href="/auth.php">Вернутся</a></div>';
    }
} else {
    echo_error("Нет такого пользователя", "/auth.php");
    // echo '<div class="alert alert-danger" role="alert">Нет такого пользователя! <a class="alert-link" href="/auth.php">Вернутся</a></div>';
}

?>