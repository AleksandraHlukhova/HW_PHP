<section class="featured-posts no-padding-top">
    <div class="container">

        <!-- Post-->
        <div class="row d-flex align-items-stretch mb-4">
            <?php foreach($data['info'] as $item):?>
            <?php foreach($item->posts as $post):?>
            <div class="text col-lg-7 mb-4">
                <div class="text-inner d-flex align-items-center">
                    <div class="content">
                        <header class="post-header">
                            <div class="category">
                                <a href="#"><?= $item->name ?></a>
                            </div>
                            <a
                                href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=/post/&id=' . $post->id); ?>">
                                <h2 class="h4">
                                    <?= $post->title ?>
                                </h2>
                            </a>
                        </header>
                        <p><?= (count($data['info']) > 1) ? mb_strimwidth($post->description, 0, $_ENV['POST_WIDTH']) . '...' : $post->description;?>
                        </p>
                        <footer class="post-footer d-flex align-items-center"><a href="#"
                                class="author d-flex align-items-center flex-wrap">
                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                <div class="title"><span>John Doe</span></div>
                            </a>
                            <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </footer>
                    </div>
                </div>
            </div>
            <?php foreach($post->photos as $photo): ?>
            <div class="image col-lg-5"><img src="<?= $photo->Photo_Path?>" alt="..."></div>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <?php endforeach;?>
        </div>

    </div>
</section>
<!-- Divider Section
    <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section> -->
<!-- Latest Posts -->
<section class="latest-posts">
    <div class="container">
        <header>
            <h2>Latest from the blog</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>
        <div class="row">
            <div class="post col-md-4">
                <div class="post-thumbnail"><a href="post.html"><img src="img/blog-1.jpg" alt="..."
                            class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">20 May | 2016</div>
                        <div class="category"><a href="#">Business</a></div>
                    </div><a href="post.html">
                        <h3 class="h4">Ways to remember your important ideas</h3>
                    </a>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore.</p>
                </div>
            </div>
        </div>
    </div>
</section>