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
if (isset($_GET['del'])) {
    $del = $db->prepare("DELETE FROM `tickets` WHERE `ticketId` =?");
    $del->execute(array($_GET['del']));
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
                    <li><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
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
                            <th scope="col">Bus Company</th>
                            <th scope="col">Bus Type</th>
                            <th scope="col">Booking Date|Time</th>
                            <th scope="col">Travel Date|Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list = $db->prepare('SELECT * FROM `tickets` JOIN `users` ON `tickets`.`userId` = `users`.`userId` JOIN `buses` ON `tickets`.`busId` = `buses`.`busId` ORDER BY `travelDate` ASC');
                        $list->execute();

                        $counter = 0;
                        while ($tickets = $list->fetch(PDO::FETCH_ASSOC)) {
                            $counter++;
                            echo '<tr>';
                        ?>
                            <td>
                                <center><?php echo $counter; ?></center>
                            </td>
                            <td>
                                <?php echo  $tickets['firstName'] . " " . $tickets['lastName']; ?>
                            </td>
                            <td>
                                <center><?php echo  $tickets['phoneNumber']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['startFrom']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['destination']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['seatNo']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['farePrice']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['name']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $tickets['busType']; ?></center>
                            </td>
                            <td>
                                <center><?php echo date('d F Y h:mA', strtotime($tickets['bookingDate'])); ?></center>
                            </td>
                            <td>
                                <center><?php echo  date('d F Y h:mA', strtotime($tickets['travelDate'])); ?></center>
                            </td>
                            <td>
                                <center>
                                    <a class="btn btn-danger" href="index.php?del=<?php echo  $tickets['ticketId']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </center>
                            </td>
                        <?php

                            echo '</tr>';
                        }
                        if ($list->rowCount() < 1) {
                            echo '<tr><td colspan="12"><center><h1 style="font-size:3em;">There are no Tickets</h1></center></td></tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>