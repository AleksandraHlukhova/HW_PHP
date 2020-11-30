<p>Register</p>

<form action="" method="POST">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" name="user_name" 
                class="form-control <?= $model->hasError('user_name') ? ' is-invalid': '' ?>" id="exampleInputPassword1" value="<?= $model->user_name ?>">
        <div class="invalid-feedback">
            <?= $model->getFirstError('user_name') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="user_email" 
                class="form-control <?= $model->hasError('user_email') ? ' is-invalid': '' ?>" id="exampleInputPassword1" value="<?= $model->user_email ?>"
        >
        <div class="invalid-feedback">
            <?= $model->getFirstError('user_email') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pasword</label>
        <input type="text" name="user_pass" 
                class="form-control <?= $model->hasError('user_pass') ? ' is-invalid': '' ?>" id="exampleInputPassword1" value="<?= $model->user_pass ?>"
        >
        <div class="invalid-feedback">
            <?= $model->getFirstError('user_pass') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Pasword confirm</label>
        <input type="text" name="user_passConf" 
                class="form-control <?= $model->hasError('user_passConf') ? ' is-invalid': '' ?>" id="exampleInputPassword1" value="<?= $model->user_passConf ?>"
        >
        <div class="invalid-feedback">
            <?= $model->getFirstError('user_passConf') ?>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>