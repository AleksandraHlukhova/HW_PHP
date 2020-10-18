<div class="col-6">

    <?php if(isset($isLeapYear) && isset($dayinMonth)): ?>
    <div class="alert alert-success" role="alert">
        <strong>Year <?= $year ?> <?= $isLeapYear ?>.</strong>
    </div>
    <div class="alert alert-success" role="alert">
        <strong>In <?= $month ?> <?= $dayinMonth ?> days</strong>
    </div>
    <?php endif ?>
    <?php if(!empty($errors)): ?>
    <div class="alert alert-success" role="alert">
        <strong><?= $errors['year'] ?></strong>
    </div>
    <?php endif ?>
    
</div>