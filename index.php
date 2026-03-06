<?php
require "server/connection-db.php";

$sql = "select * from News join Categories on News.category_id = Categories.category_id";
$filter = $_GET['filter'] ?? -1;
$sort = $_GET['sort'] ?? "DESC";
$order = $_GET['order'] ?? "publish_date";

if ($filter != -1) {
    $sql .= " where News.category_id = $filter";
}
$sql .= " order BY $order $sort";
$query = mysqli_query($conn, $sql);
$categories = mysqli_query($conn, "select * from Categories");
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
    <style>
        .content {
            width: 100%;
            /* display: grid;
            justify-content: space-between;
            grid-template-columns: repeat(auto-fit, minmax(286px, 1fr));
            row-gap: 25px; */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
        }

        .card {
            text-decoration: none;
        }

        .card-body * {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        main {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .navbar{
            width: 100%;
        }
        .cont {
            width: 80%;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Новостной портал Пингвины</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (!isset($_COOKIE["auth"])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/auth.php">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration.php">Регистрация</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile.php">Профиль</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/server/logout.php">Выйти</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/createnews.php">Создать пост</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto">
                    <form class="nav-item">
                        <label for="filter">Категория</label>
                        <select name="filter" id="filter">
                            <option value="-1" <?= ($filter == -1) ? "selected" : "" ?>>Не выбрано</option>
                            <?php foreach (mysqli_fetch_all($categories, MYSQLI_ASSOC) as $category) { ?>
                                <option value="<?= $category["category_id"] ?>" <?= ($category["category_id"] == $filter) ? "selected" : "" ?>><?= $category["name"] ?></option>

                            <?php } ?>
                        </select>
                    </form>
                    <li class="nav-item">
                        Дата публикации
                        <a href="?order=publish_date&sort=ASC">^</a>
                        <a href="?order=publish_date&sort=DESC">v</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="cont">
            <div class="content">
                <?php if (mysqli_num_rows($query) == 0) { ?>
                    <h1>Нет новостей</h1>
                <?php } else { ?>
                    <?php foreach (mysqli_fetch_all($query, MYSQLI_ASSOC) as $news) { ?>
                        <a class="card" style="width: 18rem;" href="news.php?news_id=<?= $news["news_id"] ?>">
                            <img src="photo_5456276395450824013_x.jpg" class="card-img-top" alt="Картинка не загрузилась"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $news["title"] ?></h5>
                                <p class="card-text"><?= $news["name"] ?></p>
                                <p class="card-text"><?= date_format(new DateTime($news["publish_date"]), "H:i") ?></p>
                                <p class="card-text"><?= date_format(new DateTime($news["publish_date"]), "Y.m.d") ?></p>
                                <p class="card-text"><?= $news["content"] ?></p>
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </main>

</body>
<script>
    let filter = document.getElementById("filter");
    filter.addEventListener("change", () => {
        filter.parentNode.submit();
    })
</script>

</html>