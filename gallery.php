<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Bus Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="all">
    <link rel="stylesheet" href="assets/css/layout.css" type="text/css">
</head>

<body id="top">
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1 class="logoname"><a href="./">Online<span>bus</span>Booking</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="active"><a href="gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                    <li><a href="book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>
                    <?php
                    //only show this buttons if the user is not logged in
                    if (!isset($_SESSION['loggedIn'])) {
                    ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Signup</a></li>
                        </li>
                    <?php
                    } else {
                        //show a navigation to admin if the role == 'admin
                        if ($_SESSION['role'] === 'admin') {
                            echo '<li><a href="admin/index.php"><i class="fa fa-user" aria-hidden="true"></i> Admin</a></li>';
                        }
                        echo '<li><a href="login.php"><i class="fa fa-logout" aria-hidden="true"></i> Log Out</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
    </div>
    <div class="bgded overlay" style="background-image:url('assets/imagesdemo/backgrounds/01.png');">
        <div id="breadcrumb" class="hoc clear">
        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <div class="content">
                <div id="gallery">
                    <figure>
                        <header class="heading">Buses Photo Gallery</header>
                        <ul class="nospace clear">
                            <li class="one_quarter first">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter first">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter first">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                            <li class="one_quarter">
                                <a href="#"><img src="assets/images/gallery/01.png" alt=""></a>
                            </li>
                        </ul>
                        <figcaption>Here a re some of the images for buses that can be booked online</figcaption>
                    </figure>
                </div>
            </div>
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    <div class="bgded overlay row4" style="background-image:url('assets/imagesdemo/backgrounds/01.png');">
        <footer id="footer" class="hoc clear">
            <div class="one_third first">
                <h1 class="logoname"><a href="./">Online<span>Bus</span>Booking</a></h1>
                <p>Online bus booking is one of the best ways to save your time instead of going physically to the bus station just to get the tickets
                </p>
                <ul class="faico clear">
                    <li><a class="faicon-facebook" href="https://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="faicon-linkedin" href="https://instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="faicon-twitter" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="faicon-vk" href="https://telegram.com/" target="_blank"><i class="fa fa-telegram"></i></a></li>
                    <li><a class="faicon-vk" href="https://whatsapp.com/" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="one_third">
                <h6 class="heading">Buses Gallery</h6>
                <ul class="nospace clear latestimg">
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                    <li>
                        <a class="imgover" href="#">
                            <img src="assets/images/100x100.png" alt="sample image">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="one_third">
                <h6 class="heading">News & Updates</h6>
                <ul class="nospace linklist">
                    <li>
                        <article>
                            <p class="nospace btmspace-10"><a href="#">Online bus booking is one of the best ways to save your time instead of going physically to the bus station just to get the
                                    tickets</a></p>
                            <time class="block font-xs" datetime="2021-04-06">Friday, 6<sup>th</sup> April 2021</time>
                        </article>
                    </li>
                    <li>
                        <article>
                            <p class="nospace btmspace-10"><a href="#">One of the best service you can get today is online bus booking</a></p>
                            <time class="block font-xs" datetime="2021-04-05">Thursday, 5<sup>th</sup> April 2021</time>
                        </article>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <div class="bgded overlay">
        <footer id="footer" class="hoc clear">
            <div class="wrapper row5">
                <div id="copyright" class="hoc clear">
                    <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved</p>
                    <p class="fl_right">Prepared By UDSM CoICT Project Team</p>
                    </p>
                </div>
            </div>
            <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </div>
    <!-- JAVASCRIPTS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        jQuery("#backtotop").click(function() {
            jQuery("body,html").animate({
                scrollTop: 0
            }, 600);
        });
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() > 150) {
                jQuery("#backtotop").addClass("visible");
            } else {
                jQuery("#backtotop").removeClass("visible");
            }
        });
    </script>
</body>

</html>