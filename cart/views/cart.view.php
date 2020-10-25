<div class="container">


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Id</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $totalQwt = 0; ?>
                <?php $totalSum = 0; ?>
                <tr>
                    <?php foreach($products as $key => $product): ?>
                <tr>
                    <td><?= $product["info"]->article ?></td>
                    <td><?= $product["id"] ?></td>
                    <td>
                        <input type="hidden" name="qty[id][]" value="<?= $product["id"] ?>">
                        <input type="number" name="qty[qty][]" value="<?= $product["qty"] ?>">
                    <td><img src="<?= $product["info"]->picture ?>" alt=""></td>
                    <td><?= $product["info"]->price ?></td>
                    <td><?= $sum = ($product["info"]->price) * ($product["qty"]) ?></td>
                    <td>
                        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?action=delate&id='.$product['id'] ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td></td>
                    <td></td>
                    <th>Total qty: <?= $totalQwt += $product["qty"]?></th>
                    <td></td>
                    <td></td>
                    <th>Total sum: <?= $totalSum += $sum?></th>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php require_once __DIR__ . '/partials/buttons.view.php'?>
    </form>


</div>