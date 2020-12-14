<!-- Navbar Menu -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=/'?>" class="navbar-brand">Blog</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="nav-link active ">Home</a>
        </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach($data['info'] as $item): ?>
            <li class="navbar-item">
                <a class="navbar-brand"
                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=main/category&category_id='. $item->id ?>"><?= $item->name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php if(! App\Core\Classes\Controllers\AuthController::issetAuth()):?>
        <ul class="navbar-nav ml-auto">
            <li class="navbar-item">
                <a class="navbar-brand"
                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/login' ?>">Login</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-brand"
                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/signup' ?>">Register</a>
            </li>
        </ul>
        <?php else:?>
        <ul class="navbar-nav ml-auto">
            <li class="navbar-item">
                <a class="navbar-brand"
                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/profile' ?>">Profile</a>
            </li>
        </ul>
        <?php endif;?>

    </div>
</nav>