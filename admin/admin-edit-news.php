<?php
require "../server/connection-db.php";
$news = $_GET["news_id"] ?? false;
$news = mysqli_fetch_assoc(mysqli_query($conn, "select * from News where news_id = $news"));
$categories = mysqli_fetch_all(mysqli_query($conn,"select * from Categories"));
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
<?php include "../components/admin-header.php"?>
    <main class="container">
        <h1>Редактировать пост</h1>
        <form method="post" action="admin-edit-news-db.php" enctype="multipart/form-data">
            <input type="text" name="news_id" value="<?=$news['news_id']?>" hidden>
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" required value="<?=$news["title"]?>">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Выбрать категорию</label>
                <select name="category" id="category">
                    <?php foreach ($categories as $category) {?>
                        <option value="<?=$category[0]?>" <?=$category[0] = $news["category_id"]?>><?=$category[1]?></option>
                    <?php }?>
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea type="text" class="form-control" id="content" name="content" maxlength="1000" required><?=$news["content"]?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Выложить</button>
        </form>
    </main>
</body>

</html>