<?php
require "../server/connection-db.php";

$news = $_GET["news_id"] ?? false;
$action = $_GET["action"] ?? false;

$sql = "UPDATE `News` SET `status`='$action' WHERE news_id = $news";

mysqli_query($conn, $sql);

echo_good("Статус изменен","admin-news.php");