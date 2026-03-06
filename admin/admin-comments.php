<?php
require "../server/connection-db.php";


// $query = mysqli_fetch_assoc(mysqli_query($conn, "select * from News where news_id = $news_id"));
$comm = mysqli_query($conn, "select * from Comments join Users on Comments.user_id = Users.user_id");
$comments = mysqli_fetch_all($comm, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        .comment-date {
            font-size: 14px;
            color: gray;
        }
    </style>
</head>

<body>
    <?php include "../components/admin-header.php" ?>
    <main>
        <div clas="container">
            <ul class="comments">
                <?php foreach ($comments as $comment) { ?>
                    <li>
                        <span>
                            <?= $comment["username"] ?>:
                            <a href="../news.php?&news_id=<?= $comment["news_id"] ?>" style="color:black">
                                <?= $comment["comment_text"] ?>
                            </a>
                        </span>
                        <a href="admin-delete-comments.php?comment_id=<?= $comment["comment_id"] ?>&delete=1">Удалить</a>
                        <a href="admin-delete-comments.php?comment_id=<?= $comment["comment_id"] ?>">Востановить</a>
                        <div class="comment-date"><?= $comment["comment_date"] ?></div>
                        <div class="comment-date">Статус: <?= $comment["comment_status"] ?></div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </main>
</body>

</html>