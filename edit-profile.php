<?php
session_start();
include("./config/config.php");

if (!isset($_SESSION['CaregiverEmail']) && !isset($_SESSION['CaretakerEmail'])) {
    header("location:login.php");
}

$id=$_GET['uid'];
$error = '';
$msg = '';

function test_input1($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $name = test_input1($_POST['name']);
    $contact = test_input1($_POST['contact']);
    $address = test_input1($_POST['address']);
    $experience = test_input1($_POST['experience']);
    $availability = test_input1($_POST['availability']);
    $services = test_input1($_POST['services']);

    // Construct the SQL UPDATE query
    $query = "UPDATE `user` SET `name` = '$name' WHERE `user`.`id` = $id;";
    $result = mysqli_query($con, $query);
    $myquery = mysqli_query($con, "select * From profile where uid=$id");
    $numrows=mysqli_num_rows($myquery);
    if($numrows===1){
        $query_ = "UPDATE `profile` SET `exprience` = '$experience',`avalaiblity` = '$availability',`location` = '$address',`Service` = '$services',`phone` = '$contact' WHERE `uid` = '$id'";
        $result = mysqli_query($con, $query_);
    }else{
         $query_ = "INSERT INTO `profile` (`profile_id`, `uid`, `exprience`, `avalaiblity`, `location`, `Service`, `phone`) VALUES (NULL, '$id', '$experience', '$availability', '$address', '$services', '$contact');";
         $result = mysqli_query($con, $query_);
  
    }
    
    if ($result) {
        echo '<script>alert("Profile updated successfully!")</script>';
        header('location:profile.php');
    } else {
        echo '<script>alert("Failed to update profile: ' . mysqli_error($con) . '")</script>';
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
    <h3 class="text-center">Update Profile</h3>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-6 border d-flex justify-content-center align-items-center">
            <?php
            $uid = isset($_SESSION['CaregiverID']) ? $_SESSION['CaregiverID'] : $_SESSION['CaretakerID'];
            $query = mysqli_query($con, "SELECT * FROM `user` WHERE id='$uid'");
            $row = mysqli_fetch_assoc($query);
            $query1 = mysqli_query($con, "SELECT * FROM `profile` WHERE uid='$uid'");
            $rows = mysqli_num_rows($query1);
            $rowprofile = mysqli_fetch_assoc($query1);
            ?>
            <div>
                <div>
                    Full Name: <br><input type="text" name="name" class="p-input" value="<?php echo $row['name']; ?>" />
                </div>
                <div>
                    Contact: <br><input type="text" name="contact" class="p-input" value="<?php if ($rowprofile && $rowprofile['phone']) {
                                                                                            echo $rowprofile['phone'];
                                                                                        } ?>" />
                </div>
                <div>
                    Address: <br><input type="text" name="address" class="p-input" value="<?php if ($rowprofile && $rowprofile['location']) {
                                                                                                        echo $rowprofile['location'];
                                                                                                    } ?>" />
                </div>
                <div>
                    Experience: <br><input type="text" name="experience" class="p-input" value="<?php if ($rowprofile && $rowprofile['exprience']) {
                                                                                                        echo $rowprofile['exprience'];
                                                                                                    } ?>" />
                </div>
                <div>
                    Available: <br>
                    <select name="availability" class="p-input">
                        <option value="1" <?php if ($rowprofile && (int)$rowprofile['avalaiblity'] === 1) { ?> selected <?php } ?>>Available</option>
                        <option value="0" <?php if ($rowprofile && (int)$rowprofile['avalaiblity'] === 0) { ?> selected <?php } ?>>Not Available</option>
                    </select>
                </div>
                <div>
                    Services: <br>
                    <textarea name="services" class="p-input"><?php if ($rowprofile && $rowprofile['Service']) {
                                                                    echo $rowprofile['Service'];
                                                                } ?></textarea>
                </div>
                <div>
                    <button type="submit" name="update_profile" class="mb-2">Update Profile</button>
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