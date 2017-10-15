<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$pla = $conn->query("SELECT * FROM placements WHERE id=" . $userRow['rno']);

//$plaRow = mysqli_fetch_array($pla, MYSQLI_ASSOC);
$upc = $conn->query("SELECT * FROM company WHERE rcgpa<=" . $userRow['cgpa']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Hello,<?php echo $userRow['email']; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/index.css" type="text/css"/>
    </head>
    <body>

        <!-- Navigation Bar-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Placement info</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">HOME</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                <span
                                      class="glyphicon glyphicon-user"></span>&nbsp;Logged
                                in: <?php echo $userRow['email']; ?>
                                &nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




        <div class="container">
            <!-- Jumbotron-->
            <div class="jumbotron">
                <h1>Hello, <?php
                    echo $userRow['username']; ?></h1>
                  <p>You have been placed in:
                <?php 
                while($plaRow = mysqli_fetch_assoc($pla))
                { ?>

              
                    <li>
                        <?php
                    echo $plaRow['cname'];
                        ?>
                    </li>
                </p>
                <?php
                }
                ?>
                
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2>Upcoming Placements you are eligible for: </h2>
                   
                <?php 
                while($upcRow = mysqli_fetch_assoc($upc))
                { ?>

              <div>
                    <li>COMPANY NAME:
                        <?php
                    echo $upcRow['cname'];
                        ?>
                    </li>
                       <li>SALARY: 
                        <?php
                    echo $upcRow['sal'];
                        ?>
                    </li>
                       <li>DATE OF RECRUITMENT:
                        <?php
                    echo $upcRow['dor'];
                        ?>
                    </li>
                </div>
                    <br>
                    <hr>
                <?php
                }
                ?>
                        
                    <p>
                        <small></small>
                    </p>
                    <p></p>
                </div>


            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
