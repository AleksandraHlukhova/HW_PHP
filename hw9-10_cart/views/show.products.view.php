<div class="container">
    <div class="row mt-4">
        <?php foreach($products as $key => $product): ?>
        <div class="col-lg-4 col-sm-6 d-flex justify-content-center mt-2">
            <div class="card" style="width: 18rem;">
                <div class="img_box">
                    <img src="<?= $product['picture']?>" class="card-img-top" alt="<?= $product['picture']?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $product['article']?></h5>
                    <p class="card-text"><?= $product['price']?></p>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?action=add&id='.$product['id'] ?>"
                        class="btn btn-primary">Добавить в корзину</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>