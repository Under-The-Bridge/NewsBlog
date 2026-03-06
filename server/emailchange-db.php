<?php
require "connection-db.php";

$email = $_POST["email"] ?? false;

$checkemail = mysqli_query($conn, "select * from Users where email = '$email'");
if (mysqli_num_rows($checkemail) == 0) {
    $user = $_SESSION["auth"];
    $currentemail = mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where username = '$user'"))["email"];
    $sql = "UPDATE Users SET email = '$email' WHERE email = '$currentemail'";
    mysqli_query($conn,$sql);
    // header("Location: /profile.php");
    echo_good("Почта изменена", "/profile.php");

}else{
    echo_error("Почта уже занята","/emailchange.php");
}
?>