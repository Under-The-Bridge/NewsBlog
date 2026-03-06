<?php
require "server/connection-db.php";

$news_id = $_GET["news_id"];

$user = $_COOKIE["auth"] ?? false;

$query = mysqli_fetch_assoc(mysqli_query($conn, "select * from News where news_id = $news_id"));
$comm = mysqli_query($conn, "select * from Comments join Users on Comments.user_id = Users.user_id where news_id = $news_id and comment_status = 'Активен'");
$comments = mysqli_fetch_all($comm, MYSQLI_ASSOC)
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
        main {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }

        .content,
        .comments {
            width: 80%;
        }

        .content {
            display: flex;
            flex-direction: column;
        }

        .content h1 {
            text-align: center;
        }

        .content img {
            width: 100%;
            align-self: center;
            border-radius: 15px;
            height: 400px;
            /* aspect-ratio: 7/4; */
        }

        .content-text {
            width: 100%;
        }

        .comments{
            list-style-type: none;
            padding: 0;
        }

        .comments li {
            padding: 1rem 0;
            font-size: 20px;
            border-bottom: 1px lightgray solid;
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
        <div class="content">
            <h1><?= $query["title"] ?></h1>
            <img src="photo_5456276395450824013_x.jpg" alt="">
            <p><?= date_format(new DateTime($query["publish_date"]), "Y.m.d H:i") ?></p>
            <!-- <div class="content-text"> -->
            <h4><?= $query["content"] ?></h4>
            <!-- </div> -->
        </div>
        <div class="comments">
            <h3>Комментарии <?= mysqli_num_rows($comm) ?></h3>
            <div>
                <form action="server/comment-db.php?news=<?= $news_id ?>" method="post">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Написать комментарий</label>
                        <input type="text" class="form-control" id="comment" name="comment">
                    </div>
                    <button type="submit" class="btn btn-primary">Выложить</button>
                </form>
                <ul class="comments">
                    <!-- <p>Vasya_batya: Блин жалко php, он мне как отец уже 😭😢😢</p> -->
                    <?php foreach ($comments as $comment) { ?>
                        <li>
                            <span><?= $comment["username"] ?>: <?= $comment["comment_text"] ?></span>
                            <?php if ($user == $comment["username"]) { ?>
                                <a
                                    href="server/comment-db.php?delete=1&comment_id=<?= $comment["comment_id"] ?>&news=<?= $news_id ?>">Удалить</a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

</body>

</html>