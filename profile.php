<?php
require "server/connection-db.php";

$user = $_SESSION["auth"];
$query = mysqli_fetch_assoc(mysqli_query($conn, "select * from Users where username = '$user'"));
$comm = mysqli_query($conn, "select * from Comments join Users on Comments.user_id = Users.user_id where username = '$user' and comment_status = 'Активен'");
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

        .content {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .block {
            padding: 1rem;
            background-color: #f8f9fa;
            font-size: 24px;
            margin: 0 !important;

            * {
                margin: 0 !important;
            }
        }

        .content if(.content a) {
            display: flex;
        }

        .content a:hover {
            color: gray;
        }

        a:not(:hover) {
            text-decoration: none;
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
            <p class="block">Привет, <?= $_SESSION["auth"] ?></p>
            <div class="block">
                <p>Логин</p>
                <p><?= $query["username"] ?></p>
            </div>
            <div class="block">
                <p>Email</p>
                <p><?= $query["email"] ?></p>
            </div>
            <div class="block">
                <a href="emailchange.php">Сменить почту</a>
                <a href="passwordchange.php">Сменить пароль</a>
            </div>
            <hr>
            <h3>Ваши комментарии</h3>
            <ul class="comments">
                <?php foreach ($comments as $comment) { ?>
                    <li>
                        <span>
                            <?= $comment["username"] ?>:
                            <a href="news.php?delete=1&&news_id=<?= $comment["news_id"] ?>" style="color:black">
                                <?= $comment["comment_text"] ?>
                            </a>
                        </span>
                        <a
                            href="server/comment-db.php?delete=1&comment_id=<?= $comment["comment_id"] ?>&news=<?= $comment["news_id"] ?>">Удалить</a>
                        <div class="comment-date"><?= $comment["comment_date"] ?></div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </main>

</body>

</html>