<div class="image col-lg-5">

    <?php if($photo->photo_path): ?>
    <a href="<?= $photo->photo_path?>" data-fancybox="gallery" data-caption="Caption #<?= $key?>">
        <img style="width:100%" src="<?= $photo->photo_path ?>" alt="" style="max-width:100%">
    </a>
    <?php endif;?>

</div>