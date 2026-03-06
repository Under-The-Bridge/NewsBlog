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
                    <?php if (!isset($_SESSION["auth"])) { ?>
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