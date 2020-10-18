<div class="col-6">
    <div class="div mt-4"">
    
        <?php if(isset($vovelNumb)): ?>
            <div class=" alert alert-success" role="alert">
                <strong><?= $vovelNumb ?> vovel in your sentence</strong>
            </div>
            <?php endif ?>
            <?php if(!empty($errors)): ?>
            <div class="alert alert-success" role="alert">
                <strong><?= $errors['input'] ?></strong>
            </div>
        <?php endif ?>

    </div>
</div>