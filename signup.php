<?php
session_start();
require('includes/db.php');

if (isset($_POST['signup'])) {
    $fname = sanitizer($_POST['firstName']);
    $lname = sanitizer($_POST['lastName']);
    $login = sanitizer($_POST['emailphone']);
    $pass = sanitizer($_POST['password']);
    $phone = sanitizer($_POST['phonenumber']);
    if (!empty($fname) || !empty($lname) ||  !empty($login) || !empty($pass) || $phone) {
        $encPass = password_hash($pass, PASSWORD_DEFAULT);
        //proceed to register if all the inputs are filled
        $query = $db->prepare('INSERT INTO `users`(`phoneEmail`, `password`, `firstName`, `lastName`,`phoneNumber`, `role`, `status`) VALUES(?, ?, ?, ?, ?, ?, ?)');
        if ($query->execute(array($login, $encPass, $fname, $lname, $phone, "user", 1))) {
            $_SESSION['success'] = "Successifully signed up, Please login to continue";
            header('location: login.php');
        } else {
            $_SESSION['error'] = "Failed to sign up Please Try again";
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
                        <li><a href="gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
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
                        <form method="post" class="form" action="signup.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                    //display any errors from the signup form
                                    if (isset($_SESSION['error'])) {
                                        echo '<div class="alert alert-danger fade show" role="alert">
                                            <strong>Error! </strong> ' . $_SESSION['error'] . '
                                            </div>';
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                </div>
                                <div class="row form-group" style="padding: 20px;">
                                    <div class="col">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="First name" required>
                                    </div>
                                    <div class="col">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="form-group" style="padding: 20px;">
                                    <label for="emailphone">Login Email/Phone</label>
                                    <input type="text" name="emailphone" class="form-control" placeholder="Enter Your email/phone number you will use to login" required minlength="6" title="Phone number or email address you will use to login">
                                </div>
                                <div class="form-group" style="padding: 20px;">
                                    <label for="phonenumber">Login Email/Phone</label>
                                    <input type="text" name="phonenumber" class="form-control" placeholder="0600000000" required minlength="10" title="Phone number">
                                </div>
                                <div class="form-group" style="padding: 20px;">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="********" required minlength="6">
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 20px;">
                                <a href="login.php" class="btn btn-primary">Login</a>
                                <button type="submit" name="signup" style="float:right;" value="signup" class="btn btn-success">Sign Up</button>
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