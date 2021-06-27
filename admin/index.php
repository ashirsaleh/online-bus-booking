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
</head>

<body id="top">
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1 class="logoname"><a href="./">Online<span>bus</span>Booking</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li><a href="./"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="../gallery.php"><i class="fa fa-photo" aria-hidden="true"></i> Gallery</a></li>
                    <li class="active"><a href="../book.php"><i class="fa fa-book" aria-hidden="true"></i> Book Now</a></li>

                    <li><a href="../login.php"><i class="fa fa-logout" aria-hidden="true"></i> Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container">
        <ul id="clothing-nav" class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#pasengers" id="pasengers-tab" role="tab" data-toggle="tab" aria-controls="pasengers" aria-expanded="true">Pasengers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#busses" role="tab" id="busses-tab" data-toggle="tab" aria-controls="busses">Busses</a>
            </li>
        </ul>
        <a class="nav-link float-end" href=".././"><i class="fas fa-sign-out-alt"></i>Log Out</a>
        <!-- Content Panel -->
        <div id="clothing-nav-content" class="tab-content">
            <div role="tabpanel" class="tab-pane fade show active" id="pasengers" aria-labelledby="pasengers-tab">
                <h1>some</h1>
                <table class="border table-bordered col-md-12 justify-content-center">
                    <thead class=" table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Company Booked</th>
                            <th>Bus Type</th>
                            <th>Number Of Seats</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Rahma</td>
                            <td>ABOOD</td>
                            <td>Luxury</td>
                            <td>A2</td>
                            <td>0712727122</td>
                            <td class="project-actions text-right">
                                <button class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                                <button class="btn btn-primary btn-sm float-end" href="#">
                                    <i class="fa fa-check"></i>
                                    Checked
                                </button>
                            </td>

                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Shaukha</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Aqueenater</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Faustine</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="busses" aria-labelledby="busses-tab">
                <h2>foolish</h2>
                <table class="border table-bordered col-md-12 justify-content-center">
                    <div class="float-end pb-2">
                        <button class="btn btn-primary btn-sm float-end" type="button" data-toggle="modal" data-target="#modal-add">
                            <i class="fa fa-plus"></i>
                            Add Bus
                        </button>
                    </div>
                    <thead class=" table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Buss Number</th>
                            <th>Company Name</th>
                            <th>Bus Type</th>
                            <th>Seats capacity</th>
                            <th>Root</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>00123</td>
                            <td>ABOOD</td>
                            <td>Luxury</td>
                            <td>46</td>
                            <td>Dar - Mwanza</td>
                            <td class="project-actions justify-content-between">
                                <button class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                                <button class="btn btn-primary btn-sm float-end" type="button" data-toggle="modal" data-target="#modal-edit">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-edit">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Bus Details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action=""></form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="modal-add">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Bus </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action=""></form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>