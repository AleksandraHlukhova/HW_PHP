<h2>You stayed comments to this posts</h2>

<?php if(count($data['info'])> 0 ):?>
<section class="featured-posts no-padding-top">
    <div class="container">
        <?php $sum = 0;?>
        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php foreach($data['info'] as $comment):?>
            <?php foreach($comment->posts as $post):?>
            <?php $sumLikes = 0;?>
            <?php $sum += count($comment->posts);?>
            <div class="text col-lg-7 mb-4">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div class="category">
                                <a href="#"><?= $post->title ?></a>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=post/showOne&post_id=' . $post->id); ?>">
                                <h2 class="h4">
                                    <?= $post->title ?>
                                </h2>
                            </a>
                        </header>
                        <p style="color:green; font-weight:bold">
                            Your comment:
                        </p>
                        <p style="color:brown; font-style:italic">
                            "<?= $comment->description?>"
                        </p>
                        <footer class="post-footer d-flex align-items-center">
                            <div class="date"><i class="icon-clock"></i><?= $comment->date ?></div>
                            <div class="comments" style="margin-right:20px"><i class="icon-comment"></i>12</div>

                            <?php foreach($post->likes as $like):?>
                            <?php $sumLikes += $like->status;?>

                            <?php if($like->user_id === $_SESSION['auth'] && $like->status):?>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle' style="color:red"></i>
                            </a>
                            <?php endif;?>
                            <?php endforeach; ?>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle'><?= $sumLikes?></i>
                            </a>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/bookmark&post_id='.$post->id ?>">
                                <i class='bx bxs-bookmark-alt-plus'></i>
                            </a>
                            <a class="del-comment"
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=comment/delComment&comment_id='. $comment->id . '&post_id=' . $post->id?>">del
                                comment
                            </a>

                        </footer>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
            <?php endforeach;?>
        </div>

    </div>
</section>

<?php else:?>
<div class="container">
    <h2>There isn`t any posts!</h2>

    <div class="row">
        <div class="col-12">
            <div class="success-posted">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/show' ?>">
                    <div class="info-box dark-bg">
                        <i class='bx bxs-book-alt'></i>
                        <div class="title">Do you wanna see all tour posts? Click here</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endif;?>