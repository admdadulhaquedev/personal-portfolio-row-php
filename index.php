<?php 
    include_once 'backend/inc/database.php';

    // Site Setting Query
    $setting_select = "SELECT * FROM settings";
    $setting_sq = mysqli_query($db, $setting_select);
    $setting_assoc = mysqli_fetch_assoc($setting_sq);

    // Contuct Select
    $contuct_select = "SELECT * FROM contact_information";
    $contuct_q = mysqli_query($db, $contuct_select);
    $contact_assco = mysqli_fetch_assoc($contuct_q);

    // Contuct Select
    $users_select = "SELECT * FROM users";
    $users_q = mysqli_query($db, $users_select);
    $users_assco = mysqli_fetch_assoc($users_q);
                         
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $setting_assoc["website_name"] ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="backend/upload/favicon/<?= $setting_assoc["favicon"] ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none">
                                    <img src="backend/upload/logo/<?= $setting_assoc["logo_white"] ?>" alt="Logo">
                                </a>
                                <a href="index.php" class="navbar-brand s-logo-none">
                                    <img src="backend/upload/logo/<?= $setting_assoc["logo_black"] ?>" alt="Logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#about">about</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#service">service</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#portfolio">portfolio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger">
                                        <i class="flaticon-menu"></i>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="#">
                    <img src="backend/upload/logo/<?= $setting_assoc["logo_white"] ?>" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Address</h4>
                    <p>
                        <?= $contact_assco["address"] ?>
                    </p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p><?= $users_assco["phone"] ?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p><?= $users_assco["email"] ?></p>
                </div>
            </div>

            <?php  
                $social_select = "SELECT * FROM social_links";
                $social_sq = mysqli_query($db, $social_select);
            ?>

            <div class="social-icon-right mt-20">

                <?php foreach ($social_sq as $key => $social_link): ?>
                    
                <a href="<?= $social_link["link"] ?>">
                    <i class="<?= $social_link["icon"] ?>"></i>
                </a>
                <?php endforeach ?>
            </div>


        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $users_assco["name"] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">
                                <?= $users_assco["about_me"] ?>
                            </p>

                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <?php foreach ($social_sq as $key => $social_link): ?>
                                        <li>
                                            <a href="<?= $social_link["link"] ?>">
                                                <i class="<?= $social_link["icon"] ?>"></i>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>

                            <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img src="backend/upload/<?php echo $users_assco["photo"]?>" alt="Banner Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape">
                <img src="img/shape/dot_circle.png" class="rotateme" alt="img">
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/banner/banner_img2.png" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p>
                                <?= $users_assco["about_me"] ?>
                            </p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->

                        <?php 
                            $education_select = "SELECT * FROM education WHERE status = 1";
                            $education_sq = mysqli_query($db, $education_select);
                        ?>
                        <!-- loop start -->
                        <?php foreach ($education_sq as $key => $education): ?>
                            <div class="education">
                                <div class="year"><?php echo $education["year"] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?php echo $education["title"] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?php echo $education["progress_bar"] ?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- loop end -->

                        <!-- End Education Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->


        <!-- Services-area -->
        <?php 
            $service_select = "SELECT * FROM services WHERE status = 1";
            $service_sq = mysqli_query($db, $service_select);
        ?>
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- loop start -->
                    <?php foreach ($service_sq as $key => $service): ?>    
                    <div class="col-lg-4 col-md-6">
                        <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                            <i class="<?php echo $service["icon"] ?>"></i>
                            <h3><?php echo $service["title"] ?></h3>
                            <p>
                                <?php echo $service["description"] ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <!-- loop end -->
                </div>

            </div>
        </section>
        <!-- Services-area-end -->


        <!-- Portfolios-area -->

        <?php 
            $portfolios_select = "SELECT * FROM portfolios INNER JOIN categories ON portfolios.category_id = categories.id WHERE portfolios.status = 1";
            $portfolios_sq = mysqli_query($db, $portfolios_select);
        ?>

        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($portfolios_sq as $key => $protfolio): ?>
                    <div class="col-lg-4 col-md-6 pitem">
                        <div class="speaker-box">
                            <div class="speaker-thumb">
                                <img src="backend/upload/portfolio-img/thumbnail/<?= $protfolio["thumbnail"] ?>" alt="img">
                            </div>
                            <div class="speaker-overlay">
                                <span><?= $protfolio["name"] ?></span>
                                <h4>
                                    <a href="single-protfolio.php?slug=<?php echo $protfolio["slug"]?>">
                                        <?= $protfolio["title"] ?>
                                    </a>
                                </h4>
                                <a href="single-protfolio.php?slug=<?php echo $protfolio["slug"]?>" class="arrow-btn">
                                    More information 
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- counter-area -->

        <?php 
            $counter_select = "SELECT * FROM counter";
            $counter_sq = mysqli_query($db, $counter_select);
        ?>
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <!-- loop start -->
                        <?php foreach ($counter_sq as $key => $counter): ?>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="<?php echo $counter["icon"] ?>"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?php echo $counter["count_number"] ?></span></h2>
                                    <span><?php echo $counter["title"] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <!-- loop end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->

        <!-- testimonial-area -->

        <?php 

            $testimonial_select = "SELECT * FROM testimonials";
            $testimonial_sq = mysqli_query($db, $testimonial_select);

            ?>
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">

                            <!-- loop start -->
                            <?php foreach ($testimonial_sq as $key => $testimonial): ?>
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar">
                                    <img src="backend/upload/testimonials_img/<?php echo $testimonial["profile_img"] ?>" alt="img">
                                </div>
                                <div class="testi-content">
                                    <h4><span>“</span><?php echo $testimonial["comment"] ?><span>”</span></h4>
                                    <div class="testi-avatar-info">
                                        <h5><?php echo $testimonial["name"] ?></h5>
                                        <span><?php echo $testimonial["rank"] ?></span>
                                    </div>
                                </div>
                            </div>
                                <?php endforeach ?>
                            <!-- loop end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <?php 
            $patnears_select = "SELECT * FROM patners WHERE status = 1";
            $patnears_q = mysqli_query($db,$patnears_select);
            ?>
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <!-- loop start -->
                    <?php foreach ($patnears_q as $key => $patner_img): ?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/upload/patners_img/<?php echo $patner_img["image"] ?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach ?>
                    <!-- loop end -->
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>
                                <?= $contact_assco["contuct_desc"] ?>
                            </p>

                            <div class="contact-list">
                                <ul>
                                    <li>
                                        <i class="fas fa-map-marker"></i>
                                        <span>Address :</span><?= $contact_assco["address"] ?>
                                    </li>
                                    <li>
                                        <i class="fas fa-headphones"></i>
                                        <span>Phone :</span><?= $users_assco["phone"] ?>
                                    </li>
                                    <li>
                                        <i class="fas fa-globe-asia"></i>
                                        <span>e-mail :</span><?= $users_assco["email"] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">

                            <form action="backend/message/mail-action.php" method="POST">
                                <input type="text" name="name" placeholder="your name *">
                                <input type="email" name="email" placeholder="your email *">
                                <textarea name="message" id="message" placeholder="your message *"></textarea>
                                <button type="submit" class="btn">SEND</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>karnoder</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    <!-- JS here -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
