<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="pt-4">
    <div class="form-group">
        <input type="number" name="year" id="year" step="1" class="form-control">
        <select name="month" id="month" class="form-control mt-4">
            <?php foreach($months as $key => $month): ?>
            <option value="<?= $key ?>"><?= $month ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" name="submit" value="submit" class="btn btn-primary mt-4">Calculate</button>
    </div>

    </div>
</form>