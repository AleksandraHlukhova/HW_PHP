<nav class="navbar navbar-light bg-light">
  <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="navbar-brand">Shop</a>
    <a href="<?php echo $_SERVER['PHP_SELF'] . '?action=cart' ?>" class="btn btn-outline-success my-2 my-sm-0" type="submit">
      Cart <?= (cartProduct()) ? countCartProducts() : '' ?>
    </a>
</nav>
