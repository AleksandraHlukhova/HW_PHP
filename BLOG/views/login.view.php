<p>Login</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/login' ?>" method="POST">

    <div class="form-group">
        <label for="user_email">Email address</label>
        <input type="text" name="user_email" 
                class="form-control <?=isset($data['errors']['user_email']) ? 'border-danger' : '' ?>" id="user_email" 
                value="<?=isset($data['oldInput']['user_email']) ? $data['oldInput']['user_email'] : '' ?>">
        <small id="emailHelp" class="form-text <?=isset($data['errors']['user_email']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_email']) ? $data['errors']['user_email'] : '' ?>
        </small>
    </div>
    <div class="form-group">
        <label for="user_pass">Password</label>
        <input type="password" name="user_pass" 
        class="form-control <?=isset($data['errors']['user_pass']) ? 'border-danger' : '' ?>" id="user_pass"
        value="<?=isset($data['oldInput']['user_pass']) ? $data['oldInput']['user_pass'] : '' ?>">
        <small id="emailHelp" class="form-text <?=isset($data['errors']['user_pass']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['user_pass']) ? $data['errors']['user_pass'] : '' ?>
        </small>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>