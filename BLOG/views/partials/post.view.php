<section class="featured-posts no-padding-top">
    <div class="container">
        <?php $sum = 0;?>
        <?php foreach($data['info'] as $item):?>
        <?php foreach($item->posts as $post):?>
        <?php $sumLikes = 0;?>

        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php $sum += count($item->posts); ?>
            <div class="text col-lg-7 mb-4" style="position:relative">

                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div class="category">
                                <a href="#"><?= $item->name ?></a>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=post/showone&post_id=' . $post->id); ?>">
                                <h2 class="h4">
                                    <?= $post->title ?>
                                </h2>
                            </a>
                        </header>
                        <p>
                            <?= ($sum > 1) ? mb_strimwidth($post->description, 0, $_ENV['POST_WIDTH']) . '...' : $post->description;?>
                        </p>

                        <footer class="post-footer d-flex align-items-center row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="div align-items-center"
                                            style="display:flex; flex-direction:row justify-content:center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..."
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="date"><i class="icon-clock"></i><?= $post->date ?></div>
                                            <div class="comments"><i class="icon-comment"></i>12</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php if(App\Core\Classes\Controllers\AuthController::issetAuth()):?>
                            <div class="col-2">
                                <?php foreach($post->likes as $like): ?>
                                <?php $sumLikes += $like->status;?>
                                <?php if($like->user_id === $_SESSION['auth'] && $like->status):?>
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                    <i class='bx bxs-heart-circle' style="color:red"></i>
                                </a>
                                <?php elseif($like->user_id !== $_SESSION['auth'] && !$like->status): ?>
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                    <i class='bx bxs-heart-circle'></i>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/like&post_id='.$post->id ?>">
                                    <i class='bx bxs-heart-circle'><?= $sumLikes?></i>
                                </a>
                                <a
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/bookmark&post_id='.$post->id ?>">
                                    <i class='bx bxs-bookmark-alt-plus'></i>
                                </a>
                            </div>
                            <?php endif;?>
                        </footer>

                    </div>
                </div>
            </div>
            <?php foreach($post->photos as $key => $photo): ?>
            <div class="image col-lg-5">
                <?php if($photo->photo_path): ?>
                <a href="<?= $photo->photo_path?>" data-fancybox="gallery" data-caption="Caption #<?= $key?>">
                    <img style="width:100%" src="<?= $photo->photo_path ?>" alt="" style="max-width:100%">
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- end posts -->

        <!-- Comments -->
        <div class="row">

            <?php if($sum === 1):?>
            <div class="col-12">
                <h4>Comments</h4>
            </div>
            <?php endif;?>

            <?php if($sum === 1 && App\Core\Classes\Controllers\AuthController::issetAuth() && $_SESSION['auth'] !== $post->user_id):?>
            <div class="col-7">
                <?php require_once __DIR__ . '/comments-form.view.php'; ?>
            </div>
            <?php endif;?>

            <?php if($sum === 1 && isset($_SESSION['auth']) && $_SESSION['auth'] === $post->user_id):?>
            <div class="col-7">
                <p>Your can`t add comments to your posts</p>
            </div>
            <?php endif;?>

            <?php if($sum === 1 && !App\Core\Classes\Controllers\AuthController::issetAuth()):?>
            <div class="col-7">
                <p>Please, login to add the comments</p>
            </div>
            <?php endif;?>

            <?php if($sum === 1):?>
            <div class="col-12" style="margin-top:30px">

                <?php foreach($post->comments as $comment): ?>
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="div align-items-center"
                                style="display:flex; flex-direction:row justify-content:center">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                    </div>
                                    <?php foreach($comment->users as $user): ?>
                                    <div class="title"><span><?= $user->name?></span></div>
                                    <?php endforeach; ?>
                                </a>
                                <div class="date"><i class="icon-clock"></i><?= $comment->date ?></div>
                            </div>

                        </div>
                    </div>
                    <p style="margin-top:10px">
                        <?= $comment->description;?>
                        <?php if($user->id === $_SESSION['auth']): ?>
                        <a class="del-comment"
                            href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=comment/delComment&comment_id='. $comment->id . '&post_id=' . $post->id?>">del
                            comment
                        </a>
                        <?php endif; ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif;?>
        </div>
        <!-- end comments -->
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</section>