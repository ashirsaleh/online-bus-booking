<?php
session_start();
?>
<!DOCTYPE html>

<html lang="">

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
                    <li class="active"><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
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
                        echo '<li><a href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
    </div>
    <div class="bgded overlay" style="background-image:url('assets/images/backgrounds/01.png');">
        <div id="pageintro" class="hoc clear">
            <article>
                <h3 class="heading">Welcome To Online Bus Booking</h3>
                <p>Here you can book... </p>
                <p>Online bus booking is one of the best ways to save your time instead of going physically to the bus station just to get the tickets
                </p>
            </article>
        </div>
    </div>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <section id="introblocks">
                <ul class="nospace group btmspace-80 elements elements-four">
                    <li class="one_quarter">
                        <article><a href="book.php"><i class="fa fa-bus"></i></a>
                            <h6 class="heading">DAR LUX</h6>
                            <p>Bus Company description for this bus is here Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo optio accusamus vel ipsum exercitationem. Autem nesciunt magnam ut est vero exercitationem laborum et molestiae quasi
                                facilis blanditiis, itaque iure qui.</p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><a href="book.php"><i class="fa fa-bus"></i></a>
                            <h6 class="heading">ABOOD</h6>
                            <p>Bus Company description for this bus is here Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo optio accusamus vel ipsum exercitationem. Autem nesciunt magnam ut est vero exercitationem laborum et molestiae quasi
                                facilis blanditiis, itaque iure qui.
                            <p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><a href="book.php"><i class="fa fa-bus"></i></a>
                            <h6 class="heading">NEW FORCE</h6>
                            <p>Bus Company description for this bus is here Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo optio accusamus vel ipsum exercitationem. Autem nesciunt magnam ut est vero exercitationem laborum et molestiae quasi
                                facilis blanditiis, itaque iure qui.</p>
                        </article>
                    </li>
                    <li class="one_quarter">
                        <article><a href="book.php"><i class="fa fa-bus"></i></a>
                            <h6 class="heading">SUPER FEO</h6>
                            <p>Bus Company description for this bus is here Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo optio accusamus vel ipsum exercitationem. Autem nesciunt magnam ut est vero exercitationem laborum et molestiae quasi
                                facilis blanditiis, itaque iure qui.</p>
                        </article>
                    </li>
                </ul>
            </section>
            <div class="row">
                <section class="group shout">
                    <figure class="one_half first"><img src="assets/images/546x356.png" alt="Bus Photo">
                        <figcaption class="heading"><a href="gallery.php">DAR LUX</a></figcaption>
                    </figure>
                    <figure class="one_half"><img src="assets/images/546x356.png" alt="Bus Photo">
                        <figcaption class="heading"><a href="gallery.php">ABOOD</a></figcaption>
                    </figure>
                    <figure class="one_half first"><img src="assets/images/546x356.png" alt="Bus Photo">
                        <figcaption class="heading"><a href="gallery.php">NEW FORCE</a></figcaption>
                    </figure>
                    <figure class="one_half"><img src="assets/images/546x356.png" alt="Bus Photo">
                        <figcaption class="heading"><a href="gallery.php">KIMOTCO</a></figcaption>
                    </figure>
                </section>
            </div>
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    <div class="wrapper row3">
        <section class="hoc container clear">
            <div class="sectiontitle">
                <p class="nospace font-xs">Reviews</p>
                <h6 class="heading font-x2">Customer Reviews</h6>
            </div>
            <ul id="latest" class="nospace group">
                <li class="one_third first">
                    <article>
                        <a class="imgover"><img src="assets/images/348x261.png" alt=""></a>
                        <ul class="nospace meta clear">
                            <li><i class="fa fa-user"></i> <a href="#">John Samwel</a></li>
                            <li><i class="fa fa-comments"></i>
                                <a href="#"></a>
                            </li>
                        </ul>
                        <div class="excerpt">
                            <time datetime="2021-04-05T08:15+00:00">05 Apr 2021</time>
                            <p class="heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis incidunt, nam sed suscipit dolorum porro ipsum tenetur explicabo ea reprehenderit pariatur velit similique dolore adipisci, at iusto doloremque! Rem, minus?</p>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <a class="imgover"><img src="assets/images/348x261.png" alt=""></a>
                        <ul class="nospace meta clear">
                            <li><i class="fa fa-user"></i> <a href="#">Hicker Chicker</a></li>
                            <li><i class="fa fa-comments"></i>
                                <a href="#"></a>
                            </li>
                        </ul>
                        <div class="excerpt">
                            <time datetime="2021-04-04T08:15+00:00">04 Apr 2021</time>
                            <p class="heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit dolore quas velit recusandae inventore reiciendis aperiam? Dicta dolorem incidunt, saepe commodi, perferendis blanditiis maiores aut, neque minima accusamus animi
                                similique!
                            </p>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <a class="imgover"><img src="assets/images/348x261.png" alt=""></a>
                        <ul class="nospace meta clear">
                            <li><i class="fa fa-user"></i> <a href="#">John Samson</a></li>
                            <li><i class="fa fa-comments"></i>
                                <a href="#"></a>
                            </li>
                        </ul>
                        <div class="excerpt">
                            <time datetime="2021-04-03T08:15+00:00">03 Apr 2021</time>
                            <p class="heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, ipsa voluptatum eveniet eum obcaecati earum iste, iure nostrum consequatur, sit dolor? Sit vitae explicabo quasi, quae vero expedita in voluptatum?</p>
                        </div>
                    </article>
                </li>
            </ul>
        </section>
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