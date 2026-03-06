<?php
require "connection-db.php";

$title = $_POST["title"] ?? false;
$content = $_POST["content"] ?? false;
$img = $_POST["img"] ?? false;
$category = $_POST["category"] ?? false;
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO `News` (`image`, `title`, `content`, `category_id`, `publish_date`) VALUES ('$img','$title','$content','$category','$date')";

$createnews = mysqli_query($conn, $sql);

if ($createnews) {
    echo_good("Пост успешно выложен","/");
} else {
    echo_error("Ошибка","/createnews.php");
    // echo '<div class="alert alert-danger" role="alert"> <a class="alert-link" href="">Вернутся</a></div>';
}
?>