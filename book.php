<?php
session_start();
require('includes/db.php');

//check if the admin is logged in and the session variables are set
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['user'])) {
    // redirect the page to login route
    header('location: login.php');
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
                    <li><a href="gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                    <li class="active"><a href="book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>
                    <li><a href="tickets.php"><i class="fa fa-file" aria-hidden="true"></i> Booked Tickets</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container-fluid">
        <div class="container col-md-6 pt-2">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <center>
                        <div class="row">
                            <h3>Online Booking Form</h3>
                            <h6>To reserve seats please complete and submit the booking form.</h6>
                        </div>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="jumbotron">
                            <div class="container">
                                <form method="GET" action="selectBus.php">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <select name="from" class="form-control form-control-lg" required>
                                            <option value="" disabled selected hidden>-- SELECT STARTING POINT -- </option>
                                            <?php
                                            $frm = $db->prepare('SELECT DISTINCT `startFrom` FROM buses');
                                            $frm->execute();
                                            while ($from = $frm->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $from['startFrom'] . "'>" . $from['startFrom'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div> <br>
                                    <div class="form-group">
                                        <label for="to">Destination</label>
                                        <select name="to" class="form-control form-control-lg selectpicker" required>
                                            <option value="" disabled selected hidden>-- SELECT YOUR DESTINATION -- </option>
                                            <?php
                                            $frm = $db->prepare('SELECT DISTINCT `destination` FROM buses');
                                            $frm->execute();
                                            while ($from = $frm->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $from['destination'] . "'>" . $from['destination'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="travelDate">Travelling Date</label>
                                        <input type="date" class="form-control form-control-lg setTodaysDate" name="travelDate" required>
                                    </div> <br>
                                    <div class="form-group">
                                        <input type="reset" class="btn btn-primary" value="clear">
                                        <input type="submit" name="selectBus" class="btn btn-success" style="float: right;" value="Select Bus">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // prevent selecting dates before today
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByClassName("setTodaysDate")[0].setAttribute('min', today);
    </script>
</body>

</html>