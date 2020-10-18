<?php asort($countries); ?>
<?php foreach($countries as $country => $capital): ?>
    <p>The capital of <?= $country ?> is <?= $capital ?></p>
<?php endforeach ?>