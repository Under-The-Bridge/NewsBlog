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
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <h1>Смена пароля</h1>
        <form method="post" action="/server/passwordchange-db.php">
            <div class="mb-3">
                <label for="oldpass" class="form-label">Старый пароль</label>
                <input type="password" class="form-control" id="oldpass" name="oldpass">
            </div>
            <div class="mb-3">
                <label for="newpass" class="form-label">Новый пароль</label>
                <input type="password" class="form-control" id="newpass" name="newpass">
            </div>
            <button type="submit" class="btn btn-primary">Сменить</button>
        </form>
    </main>
</body>

</html>