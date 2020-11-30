<?php foreach($data as $item):?>
<div class="card mt-4" style="width: 90%;">
    <img src="<?= $item->Photo_Path?>" class="card-img-top" alt="..." style="width: 10%; height: 9%;">
    <div class="card-body">
        <h5 class="card-title"><?= $item->title?></h5>
        <p class="card-text">
            <?= (count($data) > 2) ? mb_strimwidth($item->description, 0, POST_WIDTH) : $item->description;?>...</p>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=main/post/&id=' . $item->id); ?>"
            class="btn btn-primary">Read more</a>
    </div>
</div>
<?php endforeach;?>