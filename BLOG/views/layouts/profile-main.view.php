<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <?php foreach($data['user'] as $user): ?>
                    <img src="<?= (isset($user->photo)) ? $user->photo_path : 'img/no-avatar.png' ?>" alt="" class="img-fluid rounded-circle">
                    <h1 class="text-light"><a href="index.html" class="user_name"><?= $user->name?></a></h1>
                <?php endforeach; ?>
                <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav class="nav-menu">
                <ul>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=/' ?>"><i
                                class="bx bx-home"></i> <span>Home</span></a></li>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/index' ?>"><i
                                class='bx bxs-book-add'></i><span>Write new post</span></a></li>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=post/show' ?>">
                            <i class='bx bxs-book-alt'></i><span>My posts</span>
                        </a></li>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=bookmark/index' ?>"><i class='bx bxs-bookmark'></i><span>Bookmark</span></a></li>
                    <li class=""><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=comment/index' ?>"><i class='bx bxs-comment-detail'></i></i>Comments</a></li>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=like/index' ?>"><i class='bx bxs-like'></i>Likes</a></li>
                    <li><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=auth/logout' ?>"><i
                                class='bx bx-log-in'></i>Log out</a></li>

                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    </header><!-- End Header -->
    </div>
    <div class="main_section">
        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    // Init fancybox
    $().fancybox({
        selector: '.imglist a:visible',
        thumbs: {
            autoStart: true
        }
    });

    // Simple filter
    $('#filter').on('change', function() {
        var $visible, val = this.value;

        if (val) {
            $visible = $('.imglist a').hide().filter('.' + val);

        } else {
            $visible = $('.imglist a');
        }

        $visible.show();
    });
    </script>
</body>

</html>