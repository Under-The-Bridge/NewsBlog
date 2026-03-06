<?php
require "connection-db.php";

$news = $_GET["news"] ?? false;

$user = $_SESSION["auth"] ?? false;

if (!$user) {
    echo_error("Войдите в профиль", "/news.php?news_id=$news");
} else {
    if (isset($_GET["delete"])) {
        $comment_id = $_GET["comment_id"];
        $sql = "UPDATE `Comments` SET `comment_status`='Удален' WHERE comment_id = $comment_id";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: /news.php?news_id=$news");
        } else {
            echo_error("Ошибка", "/news.php?news_id=$news");
        }
    } else {
        $comment = $_POST["comment"] ?? false;
        $comment = htmlspecialchars($comment);
        $date = date('Y-m-d H:i:s');
        $userid = mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where username = '$user'"))["user_id"];
        $sql = "INSERT INTO `Comments`(`news_id`, `user_id`, `comment_text`, `comment_date`,`comment_status`) VALUES ($news,$userid,'$comment','$date','Активен')";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: /news.php?news_id=$news");
        } else {
            echo_error("Ошибка", "/news.php?news_id=$news");
        }
    }
}

?>