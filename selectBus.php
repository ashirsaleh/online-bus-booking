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
    //add this to the form
    $from = sanitizer($_GET['from']);
    $destination = sanitizer($_GET['to']);
    $date = sanitizer($_GET['travelDate']);
} else {
    if (!isset($_GET['selectBusSeat'])) {
        header('location: book.php');
    }
}

if (isset($_GET['selectBusSeat'])) {
    //process the ticket information
    $from = $_GET['from'];
    $to = $_GET['destination'];
    $date = date('Y-m-d H:i:s', strtotime($_GET['travelDate']));
    $bus = $_GET['bus'];
    $seatNo = $_GET['seat'];
    $user = $_SESSION['user']['userId'];

    //check if the date seat is not taken
    $qr = $db->prepare('SELECT * FROM `tickets` WHERE `seatNo` = ? AND `travelDate` =?');
    $qr->execute(array($seatNo, $date));
    $dup = $qr->fetch(PDO::FETCH_ASSOC);
    if ($qr->rowCount() < 1) {
        $pri = $db->prepare("SELECT `farePrice` FROM `buses` WHERE busId = ?");
        $pri->execute(array($bus));
        $pric = $pri->fetch(PDO::FETCH_ASSOC);
        $price = $pric['farePrice'];
        //add ticket data to the db
        $add = $db->prepare("INSERT INTO tickets(`userId`,`busId`,`startFrom`,`destination`,`seatNo`,`Price`,`travelDate`) VALUES(?,?,?,?,?,?,?)");

        if ($add->execute(array($user, $bus, $from, $to, $seatNo, $price, $date))) {
            header('location: ticket.php?ticketId=' . $db->lastInsertId());
        } else {
            $_SESSION['error'] =  "Failed Please try again";
        }
    } else {
        $_SESSION['error'] = "This seat has been taken please select another one!";
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
                            <h6>Select Bus and Seat Number </h6>
                        </div>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="jumbotron">
                            <?php
                            //display any errors from the login form
                            if (isset($_SESSION['error'])) {
                                echo '<div class="alert alert-danger fade show" role="alert">
                                            <strong>Error! </strong> ' . $_SESSION['error'] . '
                                            </div>';
                                unset($_SESSION['error']);
                            } ?>
                            <div class="container">
                                <form method="GET">
                                    <div class="form-group">
                                        <input type="hidden" name="from" value="<?php echo $from;  ?>">
                                        <input type="hidden" name="destination" value="<?php echo $destination;  ?>">
                                        <input type="hidden" name="travelDate" value="<?php echo $date;  ?>">
                                        <label for="bus">Select Bus</label>
                                        <select name="bus" class="form-control form-control-lg" required>
                                            <option value="" disabled selected hidden>-- SELECT STARTING POINT -- </option>
                                            <?php
                                            $buses = $db->prepare('SELECT * FROM `buses` WHERE `startFrom`=? AND `destination` = ?');
                                            $buses->execute(array($from, $destination));
                                            if ($buses->rowCount() < 1) {
                                                echo "<option disabled> -- No Bus Please select another Route--</option>";
                                            }
                                            while ($bus = $buses->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $bus['busId'] . "'>Bus Name: " . $bus['name'] . " - Class: " . $bus['busType'] . "</option>";
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
                                                            <input type="radio" name="seat" value="1" id="1" />
                                                            <label for="1">1</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="2" id="2" />
                                                            <label for="2">2</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="3" id="3" />
                                                            <label for="3">3</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="4" id="4" />
                                                            <label for="4">4</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--2">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="5" id="5" />
                                                            <label for="5">5</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="6" id="6" />
                                                            <label for="6">6</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="7" id="7" />
                                                            <label for="7">7</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="8" id="8" />
                                                            <label for="8">8</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--3">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="9" id="9" />
                                                            <label for="9">9</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="10" id="10" />
                                                            <label for="10">10</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="11" id="11" />
                                                            <label for="11">11</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="12" id="12" />
                                                            <label for="12">12</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--4">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="13" id="13" />
                                                            <label for="13">13</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="14" id="14" />
                                                            <label for="14">14</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="15" id="15" />
                                                            <label for="15">15</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="16" id="16" />
                                                            <label for="16">16</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--5">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="17" id="17" />
                                                            <label for="17">17</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="18" id="18" />
                                                            <label for="18">18</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="19" id="19" />
                                                            <label for="19">19</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="20" id="20" />
                                                            <label for="20">20</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--6">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="21" id="21" />
                                                            <label for="21">21</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="22" id="22" />
                                                            <label for="22">22</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="23" id="23" />
                                                            <label for="23">23</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="24" id="24" />
                                                            <label for="24">24</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--7">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="25" id="25" />
                                                            <label for="25">25</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="26" id="26" />
                                                            <label for="26">26</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="27" id="27" />
                                                            <label for="27">27</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="28" id="28" />
                                                            <label for="28">28</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--8">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="29" id="29" />
                                                            <label for="29">29</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="30" id="30" />
                                                            <label for="30">30</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="31" id="31" />
                                                            <label for="31">31</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="32" id="32" />
                                                            <label for="32">32</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--9">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="33" id="33" />
                                                            <label for="33">33</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="34" id="34" />
                                                            <label for="34">34</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="35" id="35" />
                                                            <label for="35">35</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="36" id="36" />
                                                            <label for="36">36</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--10">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="37" id="37" />
                                                            <label for="37">37</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="38" id="38" />
                                                            <label for="38">38</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="39" id="39" />
                                                            <label for="39">39</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="40" id="40" />
                                                            <label for="40">40</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--11">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="41" id="41" />
                                                            <label for="41">41</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="42" id="42" />
                                                            <label for="42">42</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="43" id="43" />
                                                            <label for="43">43</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="44" id="44" />
                                                            <label for="44">44</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--12">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="45" id="45" />
                                                            <label for="45">45</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="46" id="46" />
                                                            <label for="46">46</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="47" id="47" />
                                                            <label for="47">47</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="48" id="48" />
                                                            <label for="48">48</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--13">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="49" id="49" />
                                                            <label for="49">49</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="50" id="50" />
                                                            <label for="50">46</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="51" id="51" />
                                                            <label for="51">51</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="52" id="52" />
                                                            <label for="52">52</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--14">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="53" id="53" />
                                                            <label for="53">53</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="54" id="54" />
                                                            <label for="54">54</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="55" id="55" />
                                                            <label for="55">55</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="56" id="56" />
                                                            <label for="56">56</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="row row--15">
                                                    <ol class="seats" type="A">
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="57" id="57" />
                                                            <label for="57">57</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="58" id="58" />
                                                            <label for="58">58</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="59" id="59" />
                                                            <label for="59">59</label>
                                                        </li>
                                                        <li class="seat">
                                                            <input type="radio" name="seat" value="60" id="60" />
                                                            <label for="60">60</label>
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="book.php" class="btn btn-primary"> Choose Another Route</a>
                                        <input type="submit" name="selectBusSeat" class="btn btn-success" style="float: right;" value="route">
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