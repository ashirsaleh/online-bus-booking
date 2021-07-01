<?php
session_start();
require('includes/db.php');

//check if the admin is logged in and the session variables are set
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['user'])) {
    // redirect the page to login route
    header('location: login.php');
    exit;
}


if (isset($_GET['selectBus'])) {
    $init = sanitizer($_GET['from']);
    $destination = sanitizer($_GET['to']);
    $date = sanitizer($_GET['travelDate']);
} else {
    header('location: book.php');
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
    <link rel="stylesheet" href="assets/css/bus.css" type="text/css">
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
                                        <div class="plane">
                                            <div class="exit exit--front">

                                            </div>
                                            <ol class="cabin fuselage">
                                                <li class="row row--1">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="checkbox" id="1" />
                                                            <label for="1">1</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="2" />
                                                            <label for="2">2</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="3" />
                                                            <label for="3">3</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="4" />
                                                            <label for="4">4</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--2">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="checkbox" id="5" />
                                                            <label for="5">5</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="6" />
                                                            <label for="6">6</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="7" />
                                                            <label for="7">7</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="8" />
                                                            <label for="8">8</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--3">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="checkbox" id="9" />
                                                            <label for="9">9</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="10" />
                                                            <label for="10">10</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="11" />
                                                            <label for="11">11</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="12" />
                                                            <label for="12">12</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--4">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="checkbox" id="13" />
                                                            <label for="13">13</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="14" />
                                                            <label for="14">14</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="15" />
                                                            <label for="15">15</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="16" />
                                                            <label for="16">16</label>
                                                        </li>
                                                    </ol>
                                                </li>

                                                <li class="row row--10">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="checkbox" id="10A" />
                                                            <label for="10A">10A</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="10B" />
                                                            <label for="10B">10B</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="10E" />
                                                            <label for="10E">10E</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="checkbox" id="10F" />
                                                            <label for="10F">10F</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="reset" class="btn btn-primary" value="clear">
                                        <input type="submit" name="destination" class="btn btn-success" style="float: right;" value="route">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>