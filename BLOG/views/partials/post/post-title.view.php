<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=post/showOne&post_id=' . $post->id); ?>">
    <h2 class="h4">
        <?= $post->title ?>
    </h2>
</a>