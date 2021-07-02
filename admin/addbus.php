<?php
session_start();
require('../includes/db.php');

//check if the admin is logged in and the session variables are set
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['user'])) {
    // redirect the page to login page
    if ($_SESSION['role'] != 'admin') {
        header('location: ../login.php');
        exit;
    }
}

if (isset($_POST['addBus'])) {
    $name = sanitizer($_POST['name']);
    $start = sanitizer($_POST['start']);
    $destination = sanitizer($_POST['destination']);
    $class = sanitizer($_POST['class']);
    $seats = sanitizer($_POST['seats']);
    $plateNo = sanitizer($_POST['plateNo']);
    $price = sanitizer($_POST['farePrice']);
    $phone = sanitizer($_POST['phone']);
    //upload first and get the ur
    $photoname = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_type = $_FILES['photo']['type'];
    $file_ext = strtolower(substr(strrchr($photoname, '.'), 1));
    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $extensions) === false) {
        $_SESSION['error'] = "Only Images are Allowed, please choose a JPEG or PNG file.";
        echo "error";
    } else {
        move_uploaded_file($file_tmp, "../assets/uploads/" . $photoname);
        $photoUrl = 'assets/uploads/' . $photoname;

        $add = $db->prepare("INSERT INTO `buses`(`name`,`startFrom`,`destination`,`busType`,`noSeats`,`plateNo`,`busPhone`,`farePrice`,`busPhoto`,`status`) VALUES(?,?,?,?,?,?,?,?,?,?)");
        if ($add->execute(array($name, $start, $destination, $class, $seats, $plateNo, $phone, $price, $photoUrl, 1))) {
            $_SESSION['success'] = "Bus has been added to the database";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buses | Online Bus Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" media="all">
    <link rel="stylesheet" href="../assets/css/layout.css" type="text/css">
    <style type="text/css">
        body {
            background-color: #FFF !important;
        }
    </style>
</head>

<body>
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1 class="logoname"><a href="./">Online<span>bus</span>Booking</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="./"><i class="fa fa-book" aria-hidden="true"></i> Tickets</a></li>
                    <li><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                    <li class="active"><a href="buses.php"><i class="fa fa-bus" aria-hidden="true"></i> Buses</a></li>
                    <li><a href="routes.php"><i class="fa fa-map" aria-hidden="true"></i> Routes</a></li>
                    <li><a href="../gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                    <li><a href="../book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>

                    <li><a href="../login.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row hoc">
                    <h1 class="heading" style="font-size: 4em; padding:10px">Add Buses</h1>
                </div>
            </div>
            <div class="row d-flex" style="padding: 0 10 10 10; margin:2px">
                <div class="row">
                    <div class="jumbotron">
                        <div class="container">
                            <form method="post" enctype="multipart/form-data">
                                <?php
                                //display any errors from the login form
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger fade show" role="alert">
                                            <strong>Error! </strong> ' . $_SESSION['error'] . '
                                            </div>';
                                    unset($_SESSION['error']);
                                }

                                if (isset($_SESSION['success'])) {
                                    echo '<div class="alert alert-success fade show" role="alert">
                                    <strong>Success! </strong> ' . $_SESSION['success'] . '
                                </div>';
                                    unset($_SESSION['success']);
                                } ?>
                                <div class="form-group">
                                    <label for="name">Bus Name</label>
                                    <input type="text" class="form-control form-control-lg" name="name" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="start">Start From</label>
                                    <input type="text" class="form-control form-control-lg" name="start" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="destination">Destination</label>
                                    <input type="text" class="form-control form-control-lg" name="destination" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="class">Bus Class</label>
                                    <select class="form-control form-control-lg" name="class" required>
                                        <option value="" disabled selected hidden>-- SELECT CLASS --</option>
                                        <option value="High Class">High Class</option>
                                        <option value="luxury">Luxury</option>
                                        <option value="Ordinary Class">Ordinary Class</option>
                                    </select>
                                </div> <br>
                                <div class="form-group">
                                    <label for="seats">Number of Seats</label>
                                    <input type="number" minlength="5" class="form-control form-control-lg" name="seats" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="plateNo">Plate Number</label>
                                    <input type="text" class="form-control form-control-lg" name="plateNo" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="farePrice">Fare Price</label>
                                    <input type="number" class="form-control form-control-lg" name="farePrice" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="phone">Bus Phone</label>
                                    <input type="text" class="form-control form-control-lg" name="phone" required>
                                </div> <br>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control form-control-lg" name="photo" required>
                                </div> <br>
                                <div class="form-group">
                                    <input type="reset" class="btn btn-primary" value="clear">
                                    <input type="submit" name="addBus" class="btn btn-success" style="float: right;" value="Select Bus">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>