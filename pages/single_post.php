<?php
    include('../api/db.php');
    include('../api/functions.php');

    $go_back_link = isset($_GET['from']) ? $_GET['from'] : "/";
    $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : header("location: /");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='shortcut icon' type='image/x-icon' href='assets/favicon.ico' />
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/normalize_reset.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/blog-single.css">
    
</head>
<body>
    <div class="header-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light static-top">
            <a href="<?php echo $go_back_link; ?>" class="go-back-button nav-link">
                <i class="fas fa-angle-double-left mr-1"></i> Go back
            </a>    
        </nav>

    <?php 
        $res = $conn->query("SELECT * FROM post WHERE id='".$post_id."'");
        while($row = $res->fetch_assoc()) {?>
            
        <div class="title-section-wrapper">
            <div class="title-section">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4 class="display-3 lax" data-lax-preset="fadeInOut"><?php echo $row['title']; ?>
                            <p class="lead">By
                                <?php
                                    $result = $conn->query("SELECT first_name, last_name FROM user where id='".$row['author_id']."'");
                                    while ($usr_row = $result->fetch_assoc()) {
                                        echo "{$usr_row['first_name']} {$usr_row['last_name']}";
                                    }
                                ?>
                            </p>
                        </h4>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="jumbotron jumbotron-fluid my-2 summary">
                    <div class="text-center">
                        <blockquote class="blockquote"><?php echo $row['summary']; ?>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="post-content">
                        <img src="<?php echo get_image_url($row["image"]); ?>" alt="Post Image" class="post-image">
                        <div class="post-text">
                            <p><?php echo $row['description']; ?></p>
                        </div>
                        <div class="post-footer">
                            <p class="text-muted">Published on
                                <?php
                                    $dt = new DateTime($row['published_at']);
                                    $date = $dt->format('m/d/y');
                                    $hour = $dt->format('H:i A');
                                    echo "{$date} at {$hour}";
                            
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php } ?>

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

</body>
</html>