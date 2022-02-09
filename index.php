<?php
session_start();
require_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Finance Business HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="fontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="fontend/assets/css/fontawesome.css">
    <link rel="stylesheet" href="fontend/assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="fontend/assets/css/owl.css">
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>090-080-0760</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <?php
                        $get_query = "SELECT * FROM social_medias WHERE active_sts=1";
                        $db_from_icon = mysqli_query($db_conect, $get_query);
                        ?>
                        <?php foreach ($db_from_icon as $icon) : ?>
                            <li><a href="<?= $icon['social_url'] ?>" target="_blank"><i class="fa <?= $icon['social_icon'] ?>"></i></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Finance Business</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#top">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="one-page.html">One Page</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <?php
            $get_query_banner = "SELECT * FROM banners WHERE active_sts=1";
            $banner_from_db = mysqli_query($db_conect, $get_query_banner);

            ?>
            <?php
            foreach ($banner_from_db as $banners) :
            ?>
                <div class="item item-1">
                    <div class="img-fill" style="background-image: url(<?= $banners['image_location'] ?>);">
                        <div class="text-content">
                            <h6><?= $banners['banner_sub_title'] ?></h6>
                            <h4><?= $banners['banner_title_one'] ?><br>&amp;<?= $banners['banner_title_two'] ?> </h4>
                            <p><?= $banners['banner_detail'] ?></p>
                            <a href="#contact" class="filled-button">contact us</a>
                        </div>
                    </div>
                </div>

            <?php
            endforeach
            ?>
            <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Request a call back right now ?</h4>
                    <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
                </div>
                <div class="col-md-4">
                    <a href="#contact" class="border-button">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

    <div class="services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $get_query = "SELECT * FROM service_heads ";
                    $db_query_result = mysqli_query($db_conect, $get_query);
                    $after_assoc = mysqli_fetch_assoc($db_query_result);
                    ?>
                    <div class="section-heading">
                        <h2><?= $after_assoc['service_black_head'] ?><em><?= $after_assoc['service_green_head'] ?></em></h2>
                        <span><?= $after_assoc['service_sub_head'] ?></span>
                    </div>
                </div>
                <?php
                $get_query_service_item = "SELECT * FROM service_items WHERE active_sts=1 ORDER BY id DESC LIMIT 3";
                $service_from_db = mysqli_query($db_conect, $get_query_service_item);
                ?>

                <?php
                foreach ($service_from_db as $service) :
                ?>
                    <div class="col-md-4">

                        <div class="service-item">
                            <img src="<?= $service['image_location'] ?>" alt="">
                            <!-- <img src="fontend/assets/images/service_02.jpg" alt=""> -->

                            <div class="down-content">
                                <h4><?= $service['service_head'] ?></h4>
                                <p><?= $service['service_detail'] ?></p>
                                <a href="" class="filled-button">Read More</a>
                            </div>
                        </div>

                    </div>
                <?php
                endforeach
                ?>

            </div>
        </div>
    </div>


    <?php
    $get_query = "SELECT * FROM funfact WHERE active_sts=1;";
    $db_query_result = mysqli_query($db_conect, $get_query);
    $after_funfact = mysqli_fetch_assoc($db_query_result);
    ?>
    <div class="fun-facts" style=" background-image: url(<?= $after_funfact['image_location'] ?>);">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="left-content">
                        <span><?= $after_funfact['sub_head'] ?></span>
                        <h2><?= $after_funfact['white_head'] ?> <em><?= $after_funfact['green_head'] ?></em></h2>
                        <p><?= $after_funfact['para_one'] ?>
                            <br><br><?= $after_funfact['para_two'] ?>
                        </p>
                        <a href="" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="row">
                        <?php
                        $get_query = "SELECT * FROM funfact_items WHERE active_sts=1  ORDER BY id DESC LIMIT 4;";
                        $db_query_result = mysqli_query($db_conect, $get_query);
                        // $after_assoc = mysqli_fetch_assoc($db_query_result);
                        ?>
                        <?php
                        foreach ($db_query_result  as $funfact_items) :

                        ?>
                            <div class="col-md-6">
                                <div class="count-area-content">
                                    <div class="count-digit"><?= $funfact_items['funfact_counter'] ?></div>
                                    <div class="count-title"><?= $funfact_items['white_head'] ?></div>
                                </div>
                            </div>
                        <?php
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info">
        <div class="container" id="about">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            <?php
                            $get_query = "SELECT * FROM company_infos WHERE active_sts=1 LIMIT 1";
                            $db_from = mysqli_query($db_conect, $get_query);
                            ?>
                            <?php
                            foreach ($db_from as $info) :
                            ?>
                                <div class="col-md-6">
                                    <div class="left-image">
                                        <img src="<?= $info['image_location'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <div class="right-content">
                                        <span><?= $info['sub_head'] ?></span>
                                        <h2><?= $info['white_head'] ?> <em><?= $info['green_head'] ?></em></h2>
                                        <p><?= $info['para_one'] ?><br><br><?= $info['para_two'] ?></p>
                                        <a href="#" class="filled-button">Read More</a>
                                    </div>
                                </div>
                            <?php
                            endforeach
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $get_query = "SELECT * FROM testimonal_heads";
                    $db_from = mysqli_query($db_conect, $get_query);
                    $after_assoc = mysqli_fetch_assoc($db_from);

                    ?>
                    <div class="section-heading">
                        <h2><?= $after_assoc['testimonal_black_head'] ?> <em><?= $after_assoc['testimonal_green_head'] ?></em></h2>
                        <span><?= $after_assoc['testimonal_sub_head'] ?></span>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="owl-testimonials owl-carousel">
                        <?php
                        $get_query = "SELECT * FROM testimonial_items WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        $after_assoc = mysqli_fetch_assoc($db_from);
                        // print_r($after_assoc);

                        ?>
                        <?php
                        foreach ($db_from as $testimonial) :
                        ?>


                            <div class="testimonial-item">
                                <div class="inner-content">
                                    <h4><?= $after_assoc['name'] ?></h4>
                                    <span><?= $testimonial['degination'] ?></span>
                                    <p><?= $testimonial['detail'] ?></p>
                                </div>
                                <img style="width:60px;height:60px;" src="<?= $testimonial['image_location'] ?>" alt="">
                            </div>
                        <?php
                        endforeach
                        ?>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="callback-form" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $get_query = "SELECT * FROM message_heads ";
                    $db_query_result = mysqli_query($db_conect, $get_query);
                    $after_assoc = mysqli_fetch_assoc($db_query_result);
                    ?>
                    <div class="section-heading">
                        <h2><?= $after_assoc['black_head'] ?><em><?= $after_assoc['green_head'] ?></em></h2>
                        <span><?= $after_assoc['sub_head'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <?php

                    if (isset($_SESSION['update_successs'])) {

                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $_SESSION['update_successs'];
                            unset($_SESSION['update_successs']);

                            ?>
                        </div>

                    <?php
                    }

                    ?>
                    <form action="admin/guest_message_post.php" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="guest_name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="guest_email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="guest_subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="guest_message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="border-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-partners owl-carousel">
                        <?php
                        $get_query = "SELECT * FROM brand_items WHERE active_sts=1";
                        $db_from = mysqli_query($db_conect, $get_query);
                        $after_assoc = mysqli_fetch_assoc($db_from);
                        // print_r($after_assoc);

                        ?>
                        <?php
                        foreach ($db_from as $brand) :
                        ?>

                            <div class="partner-item">
                                <img src="<?= $brand['image_location'] ?>" title="1" alt="picture">
                            </div>
                        <?php
                        endforeach
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Starts Here -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-item">
                    <h4>Finance Business</h4>
                    <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
                    <ul class="social-icons">
                        <?php
                        $get_query = "SELECT * FROM social_medias WHERE active_sts=1";
                        $db_from_icon = mysqli_query($db_conect, $get_query);
                        ?>
                        <?php foreach ($db_from_icon as $icon) : ?>
                            <li><a href="<?= $icon['social_url'] ?>" target="_blank"><i class="fa <?= $icon['social_icon'] ?>"></i></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-md-4 footer-item">
                    <h4>Useful Links</h4>
                    <ul class="menu-list">
                        <li><a href="#">Vivamus ut tellus mi</a></li>
                        <li><a href="#">Nulla nec cursus elit</a></li>
                        <li><a href="#">Vulputate sed nec</a></li>
                        <li><a href="#">Cursus augue hasellus</a></li>
                        <li><a href="#">Lacinia ac sapien</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-item">
                    <h4>Additional Pages</h4>
                    <ul class="menu-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">How We Work</a></li>
                        <li><a href="#">Quick Support</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2022 Financial Business Co., Ltd.

                        - Devloped BY: <a rel="nofollow noopener" href="#" target="_blank">Zubair IT</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="fontend/vendor/jquery/jquery.min.js"></script>
    <script src="fontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="fontend/assets/js/custom.js"></script>
    <script src="fontend/assets/js/owl.js"></script>
    <script src="fontend/assets/js/slick.js"></script>
    <script src="fontend/assets/js/accordions.js"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>
    <?php if (isset($_SESSION['update_success'])) : ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?php echo $_SESSION['update_success'] ?>'
            })
        </script>

    <?php endif ?>
    <?php unset($_SESSION['update_success']); ?>

</body>

</html>