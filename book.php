<?php
session_start();
require('includes/db.php');

//check if the admin is logged in and the session variables are set
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['user'])) {
    // redirect the page to login route
    header('location: ../login.php');
    exit;
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
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1 class="logoname"><a href="./">Online<span>bus</span>Booking</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="gallery.html"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                    <li class="active"><a href="book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container-fluid">
        <div class="container col-md-9 pt-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row p-3">
                        <h3>Online Booking Form</h3>
                        <h6>To reserve seats please complete and submit the booking form.</h6>
                    </div>
                    <hr>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="form-group col-md-4">
                                    <label for="inputState">From</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">To</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-4">
                            <label for="inputState">Choose Company</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <br>
                        <div class="row p-3">
                            <h6>Fill your Information</h6>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label for="fullname">First Name:</label>
                                    <input type="text" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Last Name:</label>
                                    <input type="text" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="form-group ">
                                    <label for="phoonenumber">Phone Number</label>
                                    <input type="numbers" id="phone-num" class="form-control">
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>


                        <!-- <input class="datepicker" data-date-format="mm/dd/yyyy"> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
</script>

</html>