<?php
require "connection-db.php";

$username = $_POST["username"] ?? false;
$email = $_POST["email"] ?? false;
$password = $_POST["password"] ?? false;

$checkemail = mysqli_query($conn, "select * from Users where email = '$email' or username = '$username'");

if (mysqli_num_rows($checkemail) == 0) {
    $sql = "INSERT INTO `Users` (`username`, `password`, `email`) VALUES ('$username','$password','$email')";

    $reg = mysqli_query($conn, $sql);

    if ($reg) {
        header("Location: /auth.php");
    } else {
        echo_error("Ошибка регистрации","/registration.php");
        // echo '<div class="alert alert-danger" role="alert"> <a class="alert-link" href="">Вернутся</a></div>';
    }
} else {
    echo_error("Почта или имя пользователя уже занято","/registration.php");
    // echo '<div class="alert alert-danger" role="alert">Почта или имя пользователя уже занято! <a class="alert-link" href="/registration.php">Вернутся</a></div>';
}
?>