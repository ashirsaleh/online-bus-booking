<?php
session_start();
require('includes/db.php');

//check if the admin is logged in and the session variables are set
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['user'])) {
  // redirect the page to login route
  header('location: login.php');
  exit;
}

if (isset($_GET['ticketId'])) {
  // $bus = sanitizer($_GET['busId']);
  // $seat = sanitizer($_GET['seatNo']);
  // $ticket = sanitizer(($_GET['ticket']));
} else {
  header('location: book.php');
}

$det = $db->prepare("SELECT * FROM `tickets` JOIN `users` on `tickets`.`userId` = `users`.`userId` JOIN `buses` ON `tickets`.`busId` = `buses`.`busId` WHERE `tickets`.`ticketId` = ? AND `tickets`.`userId` = ?");
$det->execute(array($_GET['ticketId'], $_SESSION['user']['userId']));
$ticket = $det->fetch(PDO::FETCH_ASSOC);
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
              <h3>Passenger Ticket</h3>
            </div>
          </center>
          <hr>
          <div class="card-body" id="risiti">
            <table class="table table-center table-dark">
              <tbody>
                <tr>
                  <td colspan="2">
                    <center><img src="<?php echo $ticket['busPhoto']; ?>" style="height: 300px; !important;" alt="bus image"></center>
                  </td>
                </tr>
                <tr>
                  <th>Passenger Name</th>
                  <td><?php echo ucfirst($ticket['firstName']) . " " . ucfirst($ticket['lastName']); ?></td>
                </tr>
                <tr>
                  <th>From</th>
                  <td><?php echo $ticket['startFrom']; ?></td>
                </tr>
                <tr>
                  <th>To</th>
                  <td><?php echo $ticket['destination']; ?></td>
                </tr>
                <tr>
                  <th>Bus name</th>
                  <td><?php echo $ticket['name']; ?></td>
                </tr>
                <tr>
                  <th>Bus Type</th>
                  <td><?php echo $ticket['busType']; ?></td>
                </tr>
                <tr>
                  <th>Bus Number</th>
                  <td><?php echo $ticket['plateNo']; ?></td>
                </tr>
                <tr>
                  <th>Bus Phone</th>
                  <td><?php echo $ticket['busPhone']; ?></td>
                </tr>
                <tr>
                  <th>Bus fare</th>
                  <td><?php echo $ticket['Price']; ?></td>
                </tr>
                <tr>
                  <th>Seat No</th>
                  <td><?php echo $ticket['seatNo']; ?></td>
                </tr>
                <tr>
                  <th>Booking Date</th>
                  <td><?php echo date('d /m/ Y H:i', strtotime($ticket['bookingDate'])); ?></td>
                </tr>
                <tr>
                  <th>Travel Date</th>
                  <td><?php echo date('d /m/ Y H:i', strtotime($ticket['travelDate'])); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="pricingTable-sign-up">
            <a onclick="printReceipt('risiti')" class="btn btn-primary">Print</a>
            <a href="tickets.php" class="btn btn-success" style="float: right;">Confirm</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function printReceipt(el) {
      var mywindow = window.open('', 'PRINT', 'height=400,width=600');
      mywindow.document.write('<html><head><title>' + document.title + '</title>');
      mywindow.document.write('</head><body>');
      mywindow.document.write('<center><h1>Online Bus Booking Receipt</h1></center>');
      mywindow.document.write(document.getElementById(el).innerHTML);
      mywindow.document.write('</body></html>');
      mywindow.print();
      return true;
    }
  </script>
</body>

</html>