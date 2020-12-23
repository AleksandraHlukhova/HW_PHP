<div class="container">
    <h2>Add new post</h2>
    <div class="row">
        <div class="col-12">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/add' ?>" method="POST"
                    enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="photos">Add your photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple>
                        <small id="photos" class="form-text <?=isset($data['errors']['photo']) ? 'text-danger' : '' ?>">
                            <?=isset($data['errors']['photo']) ? $data['errors']['photo'] : '' ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select name="category" class="form-control">
                            <?php if(isset($data['info'])):?>
                            <?php foreach($data['info'] as $category): ?>
                            <option value="<?= $category->id?>"><?= $category->name?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <?php foreach($data['categories'] as $category): ?>
                            <option value="<?= $category->id?>"><?= $category->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Post title</label>
                        <input type="text" name="title"
                            class="form-control <?=isset($data['errors']['title']) ? 'border-danger' : '' ?>"
                            value="<?=isset($data['oldInput']['title']) ? $data['oldInput']['title'] : ''?>">
                        <small id="title" class="form-text <?=isset($data['errors']['title']) ? 'text-danger' : '' ?>">
                            <?=isset($data['errors']['title']) ? $data['errors']['title'] : '' ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10">
                    <?=isset($data['oldInput']['description']) ? $data['oldInput']['description'] : ''?>
                    </textarea>
                        <small id="description"
                            class="form-text <?=isset($data['errors']['description']) ? 'text-danger' : '' ?>">
                            <?=isset($data['errors']['description']) ? $data['errors']['description'] : '' ?>
                        </small>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>

</div>