<?php

session_start();
include("./config/config.php");

if (!isset($_SESSION['CaregiverEmail'])) {
    header("location:login.php");
}

$mid=$_GET['mid'];
$error = '';
$msg = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <!--	Title
	=========================================================-->
    <title>Profile</title>
</head>

<body>

    <div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
        <div class="d-flex justify-content-center y-middle position-relative">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>



    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>
            <!--	Header end  -->

            <!--	Banner   --->
            <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Profile</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--	Banner   --->


            <!--	Submit property   -->
            <div class="full-row">
                <div class="d-flex justify-content-center align-items-center">
            
                   
                        <div class="col-lg-5 col-md-6 border d-flex justify-content-center align-items-center ">
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM meetings LEFT JOIN user ON user.id = meetings.tid WHERE role='Caretaker' and mid=$mid;");
                                $row = mysqli_fetch_assoc($query);
                            ?>
                                <div class="user-info my-4 mt-md-50"> <img src="./uploads/<?php echo $row['img']; ?>" style="width: 120px ;height:100px;border-radius:50%;" alt="userimage">
                                    <div class="mb-4 mt-3">

                                    </div>

                                    <div class="font-18">
                                        <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['name']; ?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['email']; ?></div>
                                        <div class="mb-1 text-capitalize"><b>Role:</b> <?php echo $row['role']; ?></div>
                                <?php 
                               
?>
                                        <div class="mb-1 text-capitalize"><b>Date:</b> <?php echo $row['date']; ?></div>
                                        <div class="mb-1 text-capitalize"><b>Subject:</b> <?php echo $row['subject']; ?></div>
                                        <div class="mb-1 text-capitalize"><b>Description:</b> <?php echo $row['description']; ?></div>
                                        <!-- <div class="mb-1 text-capitalize"><b>Address:</b> <?php echo $row['location']; ?></div> -->
                                        <!-- <div class="mb-1 text-capitalize"><b>Services:</b> <?php echo $row['Service']; ?></div> -->

<?php
                                
?>
                                
                                
                                    </div>
                                    </a>
                                <?php ?>
                                </div>
                        </div>
                

                </div>
            </div>
        </div>
     
    </div>
    </div>
    <!-- Wrapper End -->
    <!-- FOR MORE PROJECTS visit: codeastro.com -->
    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>