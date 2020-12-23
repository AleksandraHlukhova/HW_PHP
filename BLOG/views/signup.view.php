<p>SignUp</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/signup' ?>" method="POST">
    <div class="form-group">
        <label for="user_name">Name</label>
        <input type="text" name="user_name" 
                class="form-control <?=isset($data['errors']['user_name']) ? 'border-danger' : '' ?>" id="user_name" 
                value="<?=isset($data['oldInput']['user_name']) ? $data['oldInput']['user_name'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_name']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_name']) ? $data['errors']['user_name'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_email">Email address</label>
        <input type="text" name="user_email" 
                class="form-control <?=isset($data['errors']['user_email']) ? 'border-danger' : '' ?>" id="user_email" 
                value="<?=isset($data['oldInput']['user_email']) ? $data['oldInput']['user_email'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_email']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_email']) ? $data['errors']['user_email'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_phone">Phone</label>
        <input type="phone" name="user_phone" 
                class="form-control <?=isset($data['errors']['user_phone']) ? 'border-danger' : '' ?>" id="user_phone" 
                value="<?=isset($data['oldInput']['user_phone']) ? $data['oldInput']['user_phone'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_phone']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_phone']) ? $data['errors']['user_phone'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_nick">NickName</label>
        <input type="text" name="user_nick" 
                class="form-control <?=isset($data['errors']['user_nick']) ? 'border-danger' : '' ?>" id="user_nick" 
                value="<?=isset($data['oldInput']['user_nick']) ? $data['oldInput']['user_nick'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_nick']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_nick']) ? $data['errors']['user_nick'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_pass">Password</label>
        <input type="password" name="user_pass" 
        class="form-control <?=isset($data['errors']['user_pass']) ? 'border-danger' : '' ?>" id="user_pass"
        value="<?=isset($data['oldInput']['user_pass']) ? $data['oldInput']['user_pass'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_pass']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_pass']) ? $data['errors']['user_pass'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_passRep">Password repeat</label>
        <input type="password" name="user_passRep" 
        class="form-control <?=isset($data['errors']['user_passRep']) ? 'border-danger' : '' ?>" 
        value="<?=isset($data['oldInput']['user_passRep']) ? $data['oldInput']['user_passRep'] : '' ?>">
        <small class="form-text <?=isset($data['errors']['user_passRep']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_passRep']) ? $data['errors']['user_passRep'] : '' ?>
        </small>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>