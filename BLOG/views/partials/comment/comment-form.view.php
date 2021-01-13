<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/showOne&post_id='. $post->id ?>" method="POST">

    <div class="form-group">
        <label for="comment">Add your comment</label>
        <textarea name="comment" style="height:100px" class="form-control <?=isset($data['errors']['description']) ? 'border-danger' : '' ?>">
                <?=isset($data['oldInput']['description']) ? $data['oldInput']['description'] : '' ?>
        </textarea>
        <small id="comment" class="form-text <?=isset($data['errors']['description']) ? 'text-danger' : '' ?>">
        <?=isset($data['errors']['description']) ? $data['errors']['description'] : '' ?>
        </small>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>