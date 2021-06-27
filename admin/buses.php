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
                    <h1 class="heading" style="font-size: 4em; padding:10px">List of all Buses</h1>
                </div>
            </div>
            <div class="row d-flex" style="padding: 0 10 10 10; margin:2px">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col">
                                <center>No.</center>
                            </th>
                            <th scope="col">
                                <center>Bus Photo</center>
                            </th>
                            <th scope="col">
                                <center>Bus Company Name</center>
                            </th>
                            <th scope="col">
                                <center>Bus Class</center>
                            </th>
                            <th scope="col">
                                <center>From</center>
                            </th>
                            <th scope="col">
                                <center>Destination</center>
                            </th>
                            <th scope="col">
                                <center>Number of Seats</center>
                            </th>
                            <th scope="col">
                                <center>Plates No.</center>
                            </th>
                            <th scope="col">
                                <center>Bus Phone</center>
                            </th>
                            <th scope="col">
                                <center>Fair Price</center>
                            </th>
                            <th scope="col">
                                <center>Bus Status</center>
                            </th>
                            <th scope="col">
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list = $db->prepare('SELECT * FROM `buses`');
                        $list->execute();
                        $buses = $list->fetch(PDO::FETCH_ASSOC);
                        if ($list->rowCount() > 0) {
                            for ($i = 1; $i <= $list->rowCount(); $i++) {
                                echo '<tr>';
                        ?>
                                <td>
                                    <center><?php echo $i ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['busPhoto']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['name']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['busType']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['startFrom']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['destination']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['noSeats']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['plateNo']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['busPhone']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['farePrice']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo  $buses['status']; ?></center>
                                </td>
                                <td>
                                    <center>
                                        <a class="btn btn-warning" href="editBus?id=<?php echo  $buses['busId']; ?>">Edit</a>
                                        <a class="btn btn-danger" href="deleteBus?id=<?php echo  $buses['busId']; ?>">Edit</a>
                                    </center>
                                </td>
                        <?php

                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="12"><center><h1 style="font-size:3em;">There are no Buses at this time</h1></center></td></tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>