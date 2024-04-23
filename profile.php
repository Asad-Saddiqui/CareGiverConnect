<?php

session_start();
include("./config/config.php");

if (!isset($_SESSION['CaregiverEmail']) && !isset($_SESSION['CaretakerEmail'])) {
    header("location:login.php");
}

$error = '';
$msg = '';
function test_input1($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    // Include database connection file

    $id = $_SESSION['userID'];
    $comment = $_POST['message'];
    $comment = test_input1($comment);
    $query23 = "INSERT INTO `feedback` (`id`, `message`, `uid`, `email`, `status`) VALUES (NULL,'$comment', '$id', '', '0');";
    $resuluser23 = mysqli_query($con, $query23);
    if ($resuluser23) {

        echo '<script>alert("Feedback sent  successfully!")</script>';
        $comment = "";
        header('location:profile.php');
    } else {
        echo '<script>alert("' . $stmt->error . '")</script>';
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
            <div class="full-row">
                <div class="d-flex justify-content-center align-items-center">
            
                   
                        <div class="col-lg-5 col-md-6 border d-flex justify-content-center align-items-center ">
                            <?php
                            $uid = isset($_SESSION['CaregiverID'])?$_SESSION['CaregiverID']: $_SESSION['CaretakerID'] ;
                            $query = mysqli_query($con, "SELECT * FROM `user` WHERE id='$uid'");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <div class="user-info my-4 mt-md-50"> <img src="./uploads/<?php echo $row['img']; ?>" style="width: 120px ;height:100px;border-radius:50%;" alt="userimage">
                                    <div class="mb-4 mt-3">

                                    </div>

                                    <div class="font-18">
                                        <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['name']; ?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['email']; ?></div>
                                        <!-- <div class="mb-1"><b>Contact:</b> <?php echo $row['3']; ?></div> -->
                                        <div class="mb-1 text-capitalize"><b>Role:</b> <?php echo $row['role']; ?></div>
                                    </div>
                                    <a href="edit-profile.php?uid=<?php echo $row['id']; ?>" ><button style="border: 0px;
                                                    outline: none;
                                                    letter-spacing: 2px;
                                                    padding-left: 11px;
                                                    padding-right: 11px;
                                                    background: #8291f642;
                                                    border-radius: 10px;
                                                    color: #00000063;
                                                    cursor: pointer;">edit</button></a>
                                    <a href="logout.php">

                                    <button style="border: 0px;
                                                    outline: none;
                                                    letter-spacing: 2px;
                                                    padding-left: 11px;
                                                    padding-right: 11px;
                                                    background: #e9773142;
                                                    border-radius: 10px;
                                                    color: #00000063;
                                                    cursor: pointer;">logout</button>
                                    </a>
                                <?php } ?>
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