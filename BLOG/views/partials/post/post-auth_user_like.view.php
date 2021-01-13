<?php if($_SESSION['auth'] === $like->user_id):?>
<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
    <i class='bx bxs-heart-circle' style="color:red"></i>
</a>
<?php endif; ?>
