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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Bus Booking</title>
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
                    <li class="active"><a href="./"><i class="fa fa-book" aria-hidden="true"></i> Tickets</a></li>
                    <li><a href="buses.php"><i class="fa fa-bus" aria-hidden="true"></i> Buses</a></li>
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
                    <h1 class="heading" style="font-size: 4em; padding:10px">Passenger Tickets</h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center" style="padding: 0 10 10 10; margin:2px">
                <table class="table table-hover table-center table-responsive">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col">Ticket No.</th>
                            <th scope="col">Passenger Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">From</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Seat No</th>
                            <th scope="col">Ticket Price</th>
                            <th scope="col">Bus Type</th>
                            <th scope="col">Bus Company</th>
                            <th scope="col">Booking Date|Time</th>
                            <th scope="col">Travel Date|Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>