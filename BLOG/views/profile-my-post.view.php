<h2>My posts</h2>
<section class="featured-posts no-padding-top">
    <div class="container">
        <?php foreach($data['info'] as $item):?>
        <?php foreach($item->posts as $post):?>
        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">

            <div class="text col-lg-7 mb-4" style="background-color:white">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div style="display:flex; flex-direction:row">

                                <?php foreach($post->photos as $key => $photo):?>
                                <!-- post img -->
                                <?php require __DIR__ . '/partials/post/post-img.view.php';?>
                                <!-- end post img -->
                                <?php endforeach;?>

                            </div>

                            <!-- post category -->
                            <?php require __DIR__ . '/partials/post/post-category.view.php';?>
                            <!-- end post category -->

                            <!-- post title -->
                            <?php require __DIR__ . '/partials/post/post-title.view.php';?>
                            <!-- end post title -->
                        </header>

                        <!-- post description -->
                        <?php require __DIR__ . '/partials/post/post-description.view.php';?>
                        <!-- end post description -->

                        <footer class="post-footer d-flex align-items-center">
                            <div class="date"><i class="icon-clock"></i><?= $post->date ?></div>
                            <div class="comments" style="margin-right:20px"><i class="icon-comment"></i><?= $post->commSum?></div>

                            <?php foreach($post->likes as $like):?>

                            <!-- post auth_user_like -->
                            <?php require __DIR__ . '/partials/post/post-auth_user_like.view.php';?>
                            <!-- end post auth_user_like -->

                            <?php endforeach;?>

                            <?php if(count($post->likes) > 0):?>

                            <!-- post user_like -->
                            <?php require __DIR__ . '/partials/post/post-user_like.view.php';?>
                            <!-- end post user_like -->

                            <?php endif;?>
                            <?php if(count($post->likes) === 0):?>

                            <!-- post user_like -->
                            <?php require __DIR__ . '/partials/post/post-user_like.view.php';?>
                            <!-- end post user_like -->

                            <?php endif;?>


                            <?php foreach($post->bookmarks as $bookmark):?>

                            <!-- post auth_user_bookmark -->
                            <?php require __DIR__ . '/partials/post/post-auth_user_bookmark.view.php';?>
                            <!-- end post auth_user_bookmark -->

                            <?php endforeach;?>

                            <?php if(count($post->bookmarks) > 0):?>

                            <!-- post bookmark -->
                            <?php require __DIR__ . '/partials/post/post-user_bookmark.view.php';?>
                            <!-- end post user_bookmark -->

                            <?php endif;?>
                            <?php if(count($post->bookmarks) === 0):?>

                            <!-- post user_like -->
                            <?php require __DIR__ . '/partials/post/post-user_bookmark.view.php';?>
                            <!-- end post user_like -->

                            <?php endif;?>



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


        </div>
        <?php endforeach; ?>
        <?php endforeach;?>
    </div>
</section>