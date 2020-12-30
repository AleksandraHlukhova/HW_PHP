<h2>You add to bookmarks this posts</h2>

<?php if(count($data['info'])> 0 ):?>
<section class="featured-posts no-padding-top">
    <div class="container">
        <?php $sum = 0;?>
        <?php $sumBookmarks = 0;?>

        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php foreach($data['info'] as $bookmark):?>
                <?php $sumBookmarks += $bookmark->status;?>
            <?php foreach($bookmark->posts as $post):?>
                <?php $sumLikes = 0;?>

            <?php $sum += count($bookmark->posts);?>
            <div class="text col-lg-7 mb-4">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div style="display:flex; flex-direction:row">

                                <?php foreach($post->photos as $key => $photo): ?>
                                <div class="" style="width:25%;">
                                    <a href="<?= $photo->photo_path?>" data-fancybox="gallery"
                                        data-caption="Caption #<?= $key?>">
                                        <img src="<?= $photo->photo_path ?>" alt="" style="max-width:100%">
                                    </a>

                                </div>
                                <?php endforeach; ?>
                            </div>
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
                        <p><?= ($sum > 1) ? mb_strimwidth($post->description, 0, $_ENV['POST_WIDTH']) . '...' : $post->description;?>
                        </p>
                        <footer class="post-footer d-flex align-items-center">
                            <div class="date"><i class="icon-clock"></i><?= $post->date ?></div>
                            <div class="comments" style="margin-right:20px"><i class="icon-comment"></i>12</div>
                            <?php foreach($post->likes as $like):?>
                                <?php $sumLikes += $like->status;?>
                            <?php endforeach;?>
 
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle' style="color:red"></i>
                            </a>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle'><?= $sumLikes?></i>
                            </a>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/bookmark&post_id='.$post->id ?>">
                                <i class='bx bxs-bookmark-alt-plus' style="color:red"></i>
                            </a>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/bookmark&post_id='.$post->id ?>">
                                <i class='bx bxs-bookmark-alt-plus'><?= $sumBookmarks?></i>
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