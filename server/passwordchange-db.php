<?php
require "connection-db.php";

$oldpass = $_POST["oldpass"] ?? false;
$newpass = $_POST["newpass"] ?? false;

if($oldpass != $newpass){
    $user = $_COOKIE["auth"];
    $query = mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where username = '$user'"));
    $user = $query["username"];
    $password = $query["password"];
    // $checkemail = mysqli_query($conn, "select * from Users where email = '$email'");
    if($password == $oldpass){
        $sql = "UPDATE Users SET password = '$newpass' WHERE username = '$user'";
        mysqli_query($conn,$sql);
        echo_good("Пароль изменен", "/profile.php");
    }else{
        echo_error("Неверный пароль","/passwordchange.php");
    }
}else{
    echo_error("Новый пароль совпадает со старым","/passwordchange.php");
}

?>