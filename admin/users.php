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
    $del = $db->prepare("DELETE FROM `users` WHERE `userId` =?");
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
                    <li><a href="./"><i class="fa fa-book" aria-hidden="true"></i> Tickets</a></li>
                    <li class="active"><a href="users.php"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
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
                    <h1 class="heading" style="font-size: 4em; padding:10px">USERS</h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center" style="padding: 0 10 10 10; margin:2px">
                <table class="table table-hover table-center table-responsive">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col">No.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Login</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list = $db->prepare('SELECT * FROM `users` ORDER BY `role`');
                        $list->execute();

                        $counter = 0;
                        while ($users = $list->fetch(PDO::FETCH_ASSOC)) {
                            $counter++;
                            echo '<tr>';
                        ?>
                            <td>
                                <center><?php echo $counter; ?></center>
                            </td>
                            <td>
                                <?php echo  $users['firstName'] . " " . $users['lastName']; ?>
                            </td>
                            <td>
                                <center><?php echo  $users['phoneEmail']; ?></center>
                            </td>
                            <td>
                                <center><?php echo  $users['phoneNumber']; ?></center>
                            </td>
                            <td>
                                <center>
                                    <?php if ($users['role'] == 'admin') {
                                        echo "<a class='btn btn-success'>ADMIN</a>";
                                    } else {
                                        echo "<a class='btn btn-secondary'>Passenger</a>";
                                    }
                                    ?></center>
                            </td>
                            <td>
                                <center>
                                    <?php
                                    if ($users['role'] != 'admin') {
                                        echo '
                                    <a class="btn btn-danger" href="users.php?del=' . $users['userId'] . '><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>';
                                    }
                                    ?>
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