<?php
require "server/connection-db.php";

$news_id = $_GET["news_id"];

$user = $_SESSION["auth"] ?? false;

$query = mysqli_fetch_assoc(mysqli_query($conn, "select * from News where news_id = $news_id"));
$comm = mysqli_query($conn, "select * from Comments join Users on Comments.user_id = Users.user_id where news_id = $news_id and comment_status = 'Активен'");
$comments = mysqli_fetch_all($comm, MYSQLI_ASSOC);
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

        .comments {
            list-style-type: none;
            padding: 0;
        }

        .comments li {
            padding: 1rem 0;
            font-size: 20px;
            border-bottom: 1px lightgray solid;
        }

        a:not(:hover) {
            text-decoration: none;
        }

        .comment-date {
            font-size: 14px;
            color: gray;
        }
    </style>
</head>

<body>
    <?php
    if ($user == "admin") {
        include "components/admin-header.php";
    } else {
        include "components/header.php";
    }
    ?>
    <main>
        <div class="content">
            <h1><?= $query["title"] ?></h1>
            <img src="source/<?= $query["image"] ?>" alt="">
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
                            <div class="comment-date"><?= $comment["comment_date"] ?></div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

</body>

</html>