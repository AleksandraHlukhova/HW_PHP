<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
    <i class='bx bxs-heart-circle'></i><?= $post->likeSum?>
</a>
