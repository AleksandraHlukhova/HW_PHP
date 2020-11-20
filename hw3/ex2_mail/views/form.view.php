<h5><small id="emailHelp" class="form-text alert-danger"><?= isset($data['errMsg']['letterErr'])? $data['errMsg']['letterErr'] : ''; ?></small></h5>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="form-group">
        <label for="userName">Name</label>
        <input type="text" name="userName" class="form-control" id="userName">
        <small id="emailHelp" class="form-text alert-danger"><?= isset($data['errMsg']['errName'])? $data['errMsg']['errName'] : ''; ?></small>
    </div>
    <div class="form-group">
        <label for="userEmail">Email</label>
        <input type="text" name="userEmail" class="form-control" id="userEmail">
        <small id="emailHelp" class="form-text alert-danger"><?= isset($data['errMsg']['errEmail'])? $data['errMsg']['errEmail'] : ''; ?></small>
    </div>
    <div class="form-group">
        <label class="form-check-label" for="msgCategory">Message category</label>
        <select name="msgCategory" class="form-control" id="msgCategory">
            <?php foreach($subjectMsg as $msg): ?>
                <option value="1"> <?= $msg ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="userMsg" style="width:100%; height:100px" id="userMsg"></textarea>
        <label class="form-check-label" for="userMsg">Write message</label>
        <small id="emailHelp" class="form-text alert-danger"><?= isset($data['errMsg']['UserMsg'])? $data['errMsg']['UserMsg'] : ''; ?></small>
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
</form>