<?php  require_once  __DIR__ . '/../handler.php'; ?>

Average Temperature is : <?= $everageTemp ?>
<br>
List of seven lowest temperatures : <?php echo implode(",", $lowest) ?>
<br>
List of seven highest temperatures : <?php echo implode(",", $highest) ?>