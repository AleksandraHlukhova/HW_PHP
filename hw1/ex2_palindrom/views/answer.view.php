<div class="col-6">
    <div class="div mt-4"">
    
        <?php if(isset($isPalindrom)): ?>
            <div class=" alert alert-success" role="alert">
                <strong>This word <?= $isPalindrom ?></strong>
            </div>
            <?php endif ?>
            <?php if(!empty($errors)): ?>
            <div class="alert alert-success" role="alert">
                <strong><?= $errors['input'] ?></strong>
            </div>
        <?php endif ?>

    </div>
</div>