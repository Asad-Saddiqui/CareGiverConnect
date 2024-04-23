<?php
session_start();
include("./config/config.php");

if (!isset($_SESSION['CaretakerEmail'])) {
    header("location:login.php");
}

$gid=$_GET['uid'];
$tid=$_SESSION['CaretakerID'];
$error = '';
$msg = '';

function test_input1($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['meetings'])) {
    $date = test_input1($_POST['date']);
    $subject = test_input1($_POST['subject']);
    $des = test_input1($_POST['des']);
     if(empty($date) || empty($subject) || empty($des) ){
        echo '<script>alert("Please Fill All Fields!")</script>';

     }else{
        $query_ = "INSERT INTO `meetings` (`tid`, `gid`, `date`, `subject`, `description`, `accept`, `status`) VALUES ('$tid', '$gid', '$date', '$subject', '$des', 0,0);";
                $result = mysqli_query($con, $query_);
            if ($result) {
                echo '<script>alert("Profile updated successfully!")</script>';
                header('location:profile.php');
            } else {
                echo '<script>alert("Failed to update profile: ' . mysqli_error($con) . '")</script>';
            }
     }
  
       
}
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
            <style>
                .p-input{
                        width: 331px;
    border: 0px;
    border-bottom: 2px solid #0000000f;
    margin: 5px 0px;
    outline: none;
    color: #80808082;

                }
                </style>
            <div class="full-row">
               <!-- Update Profile Form -->
<form method="post">
    <h3 class="text-center">Meeting</h3>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-6 border d-flex justify-content-center align-items-center">
          
            <div>
                <div>
                    Date: <br><input type="date" name="date" class="p-input"/>
                </div>
                <div>
                    Subject: <br><input type="text" name="subject" class="p-input" value="" />
                </div>
               
              
                <div>
                    Description: <br>
                    <textarea name="des" class="p-input"></textarea>
                </div>
                <div>
                    <button type="submit" name="meetings" class="mb-2">Schedule meeting</button>
                </div>
            </div>
            <?php ?>
        </div>
    </div>
</form>


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