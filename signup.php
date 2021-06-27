<?php
session_start();
require('includes/db.php');

if (isset($_POST['signup'])) {
    $user = sanitizer($_POST['emailphone']);
    $pass = sanitizer($_POST['password']);
    $msg = array();
    if (!empty($user) || !empty($pass)) {
        //proceed to login the user if all the inputs are filled
        $query = $db->prepare('SELECT * FROM `users` WHERE `phoneEmail` = ?');
        $query->execute(array($user));
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($query->rowCount() > 0) {
            if (password_verify($pass, $user['password'])) {
                //set up user sessions
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user['phoneEmail'];
                $_SESSION['role'] = $user['role'];
                //redirect to admin page if role == 'admin'
                if ($_SESSION['role'] == 'admin') {
                    header('location: admin/');
                    exit();
                } else {
                    $_SESSION['error'] = "Your still a user wheeeen";
                }
            } else {
                $_SESSION['error'] = "Wrong password Please try again";
            }
        } else {
            $_SESSION['error'] = "User not found";
        }
    } else {
        // return this error if there is an empty field
        $_SESSION['error'] =  "Please fill in all the fields";
    }
}
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

<body>
    <section class="content">
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <h1 class="logoname"><a href="./">Online<span>bus</span>Booking</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li><a href="gallery.html"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                        <li><a href="book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li class="active"><a href="signup.php">Signup</a></li>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center pt-5">
                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-center">
                            <h3 class="card-title">Online Bus Booking Signup</h3>
                        </div>
                        <form method="post" action="login.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                    //display any errors from the login form
                                    if (isset($_SESSION['error'])) {
                                        echo '<div class="alert alert-danger fade show" role="alert">
                                            <strong>Error! </strong> ' . $_SESSION['error'] . '
                                            </div>';
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="First name" required>
                                    </div>
                                    <div class="col">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailphone">Login Email/Phone</label>
                                    <input type="text" name="emailphone" class="form-control" placeholder="Enter Your email/phone number" required minlength="6" title="Phone number or email address you will use to login">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="********" required minlength="6">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="login" value="login" class="btn btn-primary ">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JAVASCRIPTS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>