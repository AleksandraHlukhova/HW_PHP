<h2>You stayed comments to this posts</h2>

<?php if(count($data['info'])> 0 ):?>
<section class="featured-posts no-padding-top">
    <div class="container">

        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php foreach($data['info'] as $comment):?>
            <?php foreach($comment->posts as $post):?>
            <div class="text col-lg-7 mb-4">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <?php foreach($post->category as $item): ?>
                            <!-- post category -->
                            <?php require __DIR__ . '/partials/post/post-category.view.php';?>
                            <!-- end post category -->
                            <?php endforeach; ?>
                            
                            <!-- post title -->
                            <?php require __DIR__ . '/partials/post/post-title.view.php';?>
                            <!-- end post title -->

                        </header>
                        <p style="color:green; font-weight:bold">
                            Your comment:
                        </p>
                        <p style="color:brown; font-style:italic">
                            "<?= $comment->description?>"
                        </p>
                        <footer class="post-footer d-flex align-items-center">
                            <div class="date"><i class="icon-clock"></i><?= $post->date ?></div>
                            <div class="comments" style="margin-right:20px"><i class="icon-comment"></i><?= $post->commSum ?></div>

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