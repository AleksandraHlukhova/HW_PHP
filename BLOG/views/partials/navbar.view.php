<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <ul class="navbar-nav mr-auto">
        <li class="navbar-item">
            <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']?>">Home</a>
        </li>
        <li class="navbar-item">
            <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']. '?action=main/contact' ?>">Contact</a>
        </li>
    </ul>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach($data as $item): ?>
            <li class="navbar-item">
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']. '?action=main/category&category_id='. $item->id ?>"><?= $item->name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ml-auto">
            <li class="navbar-item">
                <a class="navbar-brand" href="/login">Login</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-brand" href="/register">Register</a>
            </li>
        </ul>

    </div>
</nav>