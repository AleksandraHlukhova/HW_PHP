<div class="container">
    <h2>Edit post</h2>
    <div class="row">
        <div class="col-12">
            <?php foreach($data['info'] as $category): ?>
            <?php foreach($category->posts as $post): ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/edit&post_id='. $post->id ?>"
                method="POST" enctype='multipart/form-data'>

                <div class="form-group">
                    <label for="photos">Edit your photos</label>
                    <div style="display:flex; flex-direction:row; flex-wrap:wrap;">
                        <?php foreach($post->photos as $photo): ?>
                        <div style="display:flex; flex-direction:column; width:25%">

                            <div class="" style="width:100%">
                                <a data-fancybox="gallery" href="<?= $photo->photo_path?>"><img
                                        src="<?= $photo->photo_path?>" style="max-width:100%"></a>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/delPhoto&photo_id='. $photo->id . '&post_id=' . $post->id?>">del
                                photo</a>
                        </div>

                        <?php endforeach; ?>
                    </div>
                    <input type="file" name="photos[]" class="form-control" multiple>
                    <small id="photos" class="form-text <?=isset($data['errors']['photo']) ? 'text-danger' : '' ?>">
                        <?=isset($data['errors']['photo']) ? $data['errors']['photo'] : '' ?>
                    </small>

                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select name="category" class="form-control">
                            <?php foreach($data['info'] as $category): ?>
                            <option value="<?= $category->id?>"><?= $category->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Post title</label>
                        <input type="text" name="title"
                            class="form-control <?=isset($data['errors']['title']) ? 'border-danger' : '' ?>"
                            value="<?=isset($data['oldInput']['title']) ? $data['oldInput']['title'] : $post->title?>">
                        <small id="title" class="form-text <?=isset($data['errors']['title']) ? 'text-danger' : '' ?>">
                            <?=isset($data['errors']['title']) ? $data['errors']['title'] : '' ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10">
                    <?=isset($data['oldInput']['description']) ? $data['oldInput']['description'] : $post->description?>
                    </textarea>
                        <small id="description"
                            class="form-text <?=isset($data['errors']['description']) ? 'text-danger' : '' ?>">
                            <?=isset($data['errors']['description']) ? $data['errors']['description'] : '' ?>
                        </small>
                    </div>
                    <?php endforeach; ?>

                    <?php endforeach; ?>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>