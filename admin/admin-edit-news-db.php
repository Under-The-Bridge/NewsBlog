<?php
require "../server/connection-db.php";

$news = $_POST["news_id"] ?? false;
$title = $_POST["title"] ?? false;
$content = $_POST["content"] ?? false;
$img = $_FILES["img"]["name"] ?? false;
$category = $_POST["category"] ?? false;

$sql = "UPDATE `News` SET";
if($img){
    $sql .= " `image`='$img',";
}
$sql .= " `title`='$title',`content`='$content',`category_id`='$category' WHERE news_id = $news";

mysqli_query($conn, $sql);

echo_good("Изменено","admin-news.php")

?>