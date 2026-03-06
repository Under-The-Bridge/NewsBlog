<?php
require "../server/connection-db.php";
$comment_id = $_GET["comment_id"];
if ($_GET["delete"] == 1) {
    $sql = "UPDATE `Comments` SET `comment_status`='Удален' WHERE comment_id = $comment_id";
} else {
    $sql = "UPDATE `Comments` SET `comment_status`='Активен' WHERE comment_id = $comment_id";
}
$query = mysqli_query($conn, $sql);
if ($query) {
    header("Location: admin-comments.php");
} else {
    echo_error("Ошибка", "/news.php?news_id=$news");
}
?>