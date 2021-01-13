<!-- Comments -->
<div class="row">

    <div class="col-12">
        <h4>Comments</h4>
    </div>

    <?php if(\App\Core\Classes\Controllers\AuthController::issetAuth() && $_SESSION['auth'] !== $post->user_id):?>
        <div class="col-7">
            <!-- comment-form -->
            <?php require __DIR__ . '/comment/comment-form.view.php'; ?>
            <!-- end comment-form -->
        </div>
    <?php elseif(\App\Core\Classes\Controllers\AuthController::issetAuth() && $_SESSION['auth'] === $post->user_id):?>
    <div class="col-7">
        <p>Your can`t add comments to your posts</p>
    </div>
    <?php elseif(!\App\Core\Classes\Controllers\AuthController::issetAuth()):?>
    <div class="col-7">
        <p>Please, login to add the comments</p>
    </div>
    <?php endif;?>

    <?php foreach($data['info'] as $category): ?>
    <?php foreach($category->posts as $post): ?>
    <?php foreach($post->comments as $comment): ?>
    <div class="col-12" style="margin-top:30px">

        <div class="col-7">
            <div class="row">
                <div class="col-12">
                    <div class="div align-items-center" style="display:flex; flex-direction:row justify-content:center">

                        <?php foreach($comment->users as $user): ?>
                        <!-- comment user -->
                        <?php require __DIR__ . '/comment/comment-user.view.php';?>
                        <!-- end comment user -->
                        <?php endforeach; ?>


                        <!-- comment date -->
                        <?php require __DIR__ . '/comment/comment-date.view.php';?>
                        <!-- end comment date -->

                    </div>
                </div>
            </div>

            <p style="margin-top:10px">
                <!-- comment description -->
                <?php require __DIR__ . '/comment/comment-description.view.php';?>
                <!-- end comment description -->

                <?php if(App\Core\Classes\Controllers\AuthController::issetAuth()): ?>

                <?php if($user->id === $_SESSION['auth']): ?>

                <!-- comment btn_del -->
                <?php require __DIR__ . '/comment/comment-btn_del.view.php';?>
                <!-- end comment btn_del -->

                <?php endif; ?>
                <?php endif; ?>
            </p>
        </div>
    </div>

    <?php endforeach; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>

</div>
<!-- end comments -->