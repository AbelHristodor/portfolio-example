<?php 
    include('../api/db.php');
    include('../api/functions.php');
    
    $go_back_link = isset($_GET['from']) ? $_GET['from'] : "/";
    if(!isset($_GET['logged_in']) || !$_GET['logged_in']) {
        header("location: /pages/login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='shortcut icon' type='image/x-icon' href='assets/favicons/icon.ico' />
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- LOADING FAVICONS -->
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
  <!-- LOADING FONTS & CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/normalize_reset.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/blog.css">
    
</head>
<body>
    <div class="header-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light static-top">
            <a href="<?php echo $go_back_link; ?>" class="go-back-button nav-link">
                <i class="fas fa-angle-double-left mr-1"></i> Go back
            </a>    
        </nav>
        <div class="row">
            <a class="logo-wrapper m-auto" href="../">
                <img src="../assets/images/logo.png" alt="SUP logo" id="logo">
            </a>
        </div>
    </div>
    <div class="title-section-wrapper">
        <div class="title-section">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4 class="display-3 lax" data-lax-preset="fadeInOut">Blog <p class="lead">Stay always updated with our latest news</p></h2>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>  
    </div>

    <div class="row container-fluid blog-section-wrapper my-2">
        <div class="col-md-3"></div>    
        <div class="col-md-6 blog-section">
            <div class="cards-wrapper">
                <?php 
                    $res = $conn->query("SELECT * FROM post ORDER BY published_at DESC");
                    while($row = $res->fetch_assoc()) { ?>

                        <div class="row card blog-post my-4">
                            <img class="card-img-top" src="<?php echo get_image_url($row['image']); ?>" alt="post image">
                            <div class="card-body">
                                <a class="card-title" href="/pages/single_post.php?from=/pages/blog.php&post_id=<?php echo $row["id"]; ?>"><?php echo $row['title']; ?></a>
                                <p class="card-text">
                                    <?php echo $row['summary']; ?> [...]
                                </p>
                            </div>
                            <div class="card-footer meta-section">
                                <p class="text-muted meta-data">Posted By <strong>
                                    <?php
                                        $result = $conn->query("SELECT first_name, last_name FROM user where id='".$row['author_id']."'");
                                        while ($usr_row = $result->fetch_assoc()) {
                                            echo "{$usr_row['first_name']} {$usr_row['last_name']}";
                                        }
                                    ?>
                                </strong> on <?php echo $row['published_at']; ?></p>
                            </div>
                        </div>
                    <?php }?>


            </div>
        </div>

        <div class="col-md-3">
            <div class="add-post-wrapper ml-2">
                <p class="lead">Have something to say? <br>Add a new blog post.</p>
                <?php include('add_new_modal.php'); ?>
            </div>
            <ul class="social-icons-wrapper">
                <a href="#">
                <li><i class="fab fa-facebook fa-2x social-icons"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-instagram fa-2x social-icons"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-pinterest fa-2x social-icons"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-twitter fa-2x social-icons"></i></li>
                </a>
            </ul>
        </div>
    </div>
    

    <footer class="footer-wrapper" id="contact-section">
        <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
            <div class="footer-social-icons-wrapper">
            <h5 class="display-2 lax" data-lax-preset="fadeInOut" data-lax-use-gpu="false">STAY CONNECTED</h5>
            <h6 class="display-4 lax mail" data-lax-preset="fadeInOut" data-lax-use-gpu="false"><a
                href="mailto:contact@myname.com">contact@myname.com</a></h6>
            <ul class="footer-social-icons lax" data-lax-preset="fadeInOut" data-lax-use-gpu="false">
                <a href="#">
                <li><i class="fab fa-facebook fa-2x mr-5"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-instagram fa-2x mr-5"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-pinterest fa-2x mr-5"></i></li>
                </a>
                <a href="#">
                <li><i class="fab fa-twitter fa-2x mr-5"></i></li>
                </a>
            </ul>
            </div>
        </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../assets/js/plugins/jquery_color.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="../assets/js/plugins/lax.min.js"></script>
    <script src="../assets/js/blog.js"></script>
</body>
</html>