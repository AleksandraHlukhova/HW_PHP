<?php foreach($data as $item):?>
<?php foreach($item->posts as $post):?>
<div class="card mt-4" style="width: 90%;">
    <?php foreach($post->photos as $photo): ?>
        <img src="<?= $photo->Photo_Path?>" class="card-img-top" alt="..." style="width: 10%; height: 9%;">
    <?php endforeach; ?>
    <div class="card-body">
        
        <h5 class="card-title"><?= $post->title ?></h5>
        <p class="card-text"><?= (count($data) > 2) ? mb_strimwidth($post->description, 0, $_ENV['POST_WIDTH']) : $post->description;?>...</p>
        <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=main/post/&id=' . $post->id); ?>" class="btn btn-primary">Read more</a>
       
    
    </div>
</div>
<?php endforeach; ?>

<?php endforeach;?>