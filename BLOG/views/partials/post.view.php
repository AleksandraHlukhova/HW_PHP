<section class="featured-posts no-padding-top">
    <div class="container">
        <?php foreach($data['info'] as $item):?>
        <?php foreach($item->posts as $post):?>

        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <div class="text col-lg-7 mb-4" style="position:relative">

                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">

                            <!-- post category -->
                            <?php require __DIR__ . '/post/post-category.view.php';?>
                            <!-- end post category -->

                            <!-- post title -->
                            <?php require __DIR__ . '/post/post-title.view.php';?>
                            <!-- end post title -->

                        </header>

                        <!-- post description -->
                        <?php require __DIR__ . '/post/post-description.view.php';?>
                        <!-- end post description -->


                        <footer class="post-footer d-flex align-items-center row">
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="div align-items-center"
                                            style="display:flex; flex-direction:row justify-content:center">

                                            <?php foreach($post->users as $user):?>
                                            <!-- post user_avatar -->
                                            <?php require __DIR__ . '/post/post-user_avatar.view.php';?>
                                            <!-- end post user_avatar -->
                                            <?php endforeach;?>

                                            <!-- post date -->
                                            <?php require __DIR__ . '/post/post-date.view.php';?>
                                            <!-- end post date -->

                                            <!-- post comment_qty -->
                                            <?php require __DIR__ . '/post/post-comment_qty.view.php';?>
                                            <!-- end post comment_qty -->

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-3">

                                <?php foreach($post->likes as $like):?>

                                <!-- post auth_user_like -->
                                <?php require __DIR__ . '/post/post-auth_user_like.view.php';?>
                                <!-- end post auth_user_like -->

                                <?php endforeach;?>

                                <?php if(count($post->likes) > 0):?>

                                <!-- post user_like -->
                                <?php require __DIR__ . '/post/post-user_like.view.php';?>
                                <!-- end post user_like -->

                                <?php endif;?>
                                <?php if(count($post->likes) === 0):?>

                                <!-- post user_like -->
                                <?php require __DIR__ . '/post/post-user_like.view.php';?>
                                <!-- end post user_like -->

                                <?php endif;?>


                                <?php foreach($post->bookmarks as $bookmark):?>

                                <!-- post auth_user_bookmark -->
                                <?php require __DIR__ . '/post/post-auth_user_bookmark.view.php';?>
                                <!-- end post auth_user_bookmark -->

                                <?php endforeach;?>

                                <?php if(count($post->bookmarks) > 0):?>

                                <!-- post bookmark -->
                                <?php require __DIR__ . '/post/post-user_bookmark.view.php';?>
                                <!-- end post user_bookmark -->

                                <?php endif;?>
                                <?php if(count($post->bookmarks) === 0):?>

                                <!-- post user_like -->
                                <?php require __DIR__ . '/post/post-user_bookmark.view.php';?>
                                <!-- end post user_like -->

                                <?php endif;?>

                            </div>

                        </footer>

                    </div>
                </div>
            </div>

            <?php foreach($post->photos as $key => $photo):?>
            <!-- post img -->
            <?php require __DIR__ . '/post/post-img.view.php';?>
            <!-- end post img -->
            <?php endforeach;?>

        </div>
        <!-- end posts -->

        <?php endforeach;?>
        <?php endforeach;?>

    </div>
</section>