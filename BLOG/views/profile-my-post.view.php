<h2>My posts</h2>
<section class="featured-posts no-padding-top">
    <div class="container">
        <?php $sum = 0;?>
        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php foreach($data['info'] as $item):?>
            <?php foreach($item->posts as $post):?>
            <?php $sumLikes = 0;?>
            <?php $sum += count($item->posts);?>
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
                                <a href="#"><?= $item->name ?></a>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=/post/&id=' . $post->id); ?>">
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

                            <?php foreach($post->likes as $like): ?>
                            <?php $sumLikes += $like->status;?>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle' style="color:red"></i>
                            </a>
                            <?php endforeach; ?>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                <i class='bx bxs-heart-circle'><?= $sumLikes?></i>
                            </a>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/bookmark&post_id='.$post->id ?>">
                                <i class='bx bxs-bookmark-alt-plus'></i>
                            </a>



                            <div class="div edit">
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/edit&post_id=' . $post->id ?>"><i
                                        class='bx bx-edit-alt'></i>Edit
                                </a>
                            </div>
                            <div class="div del">
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/delete&post_id=' . $post->id ?>"><i
                                        class='bx bx-edit-alt'></i>Delete
                                </a>
                            </div>

                        </footer>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
            <?php endforeach;?>
        </div>
    </div>
</section>