<?php foreach($data['latestPost'] as $post):?>

<!-- Latest Posts -->
<section class="latest-posts">
    <div class="container">
        <header>
            <h2>Latest from the blog</h2>
        </header>
        <div class="row">
            <div class="post col-md-4">
                <div class="post-thumbnail">
                    <?php foreach($post->photos as $photo): ?>
                    <?php if($photo->photo_path): ?>

                    <a href="<?= $photo->photo_path?>" data-fancybox="gallery" data-caption="Caption #<?= $key?>">
                        <img style="width:100%" src="<?= $photo->photo_path ?>" alt="" style="max-width:100%">
                    </a>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date"><?= $post->date?></div>

                        <?php foreach($post->categories as $category): ?>
                        <div class="category"><a href="#"><?= $category->name?></a></div>
                        <?php endforeach;?>

                    </div><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=post/showOne&post_id=' . $post->id); ?>">
                        <h3 class="h4"><?= $post->title?></h3>
                    </a>
                    <p class="text-muted">
                        <?= $post->description?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endforeach;?>