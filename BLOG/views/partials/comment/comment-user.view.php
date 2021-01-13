<div class="col-2">
    <a href="#" class="author d-flex align-items-center flex-wrap">
        <div class="avatar"><img src="<?= isset($user->avatar) ? $user->avatar : './img/no-avatar.png'?>" alt="..."
                class="img-fluid">
        </div>
        <div class="title"><span><?= $user->name?></span></div>
    </a>
</div>