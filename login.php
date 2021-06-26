<?php
session_start();
require('admin/connect.php');

if (isset($_POST['login'])) {
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
        <div class="container-fluid">
            <div class="row d-flex justify-content-center pt-5">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-center">
                            <h3 class="card-title">Online Bus Booking Login</h3>
                        </div>
                        <form method="post" action="login.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        print_r($_SESSION['error']);
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="emailphone">Email/Phone</label>
                                    <input type="text" name="emailphone" class="form-control" placeholder="Enter Your email/phone number" required minlength="6">
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