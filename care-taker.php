<?php
   
    session_start();
    if (!isset($_SESSION['CaregiverEmail'])) {
    header("location:index.php");
}
    include("./config/config.php");

    $id=$_SESSION['CaregiverID'];
    // Default search query to retrieve all caregivers
    $search = "SELECT * FROM meetings LEFT JOIN user ON user.id = meetings.gid WHERE role='Caregiver' and gid=$id;";

    // Check if the search form is submitted
    if (isset($_POST['search'])) {
        // Retrieve the search query from the form
        $search_query = $_POST['search_query'];

        // Construct the SQL query to search for caregivers
        $search = "SELECT * FROM meetings LEFT JOIN user ON user.id = meetings.gid WHERE role='Caregiver' AND gid=$id AND (name LIKE '%$search_query%' OR subject LIKE '%$search_query%')";
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
    <link rel="shortcut icon" href="./zmkImages/LOGO FINAL-02.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Title -->
    <title>Care</title>
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
            <!-- Header start -->
            <?php include("include/header.php"); ?>
            <div class="full-row">
                <div class="container">
                    <div>
                        <h3 class="text-center">Search CareTaker</h3>
                        <form method="post">
                            <div class="d-flex">
                            <div style="width: 70%">
                                <input type="text" name="search_query" style="background: #8080806b;
                                                            outline: none;
                                                            border: 0px;
                                                            border-bottom: 2px solid black;
                                                            width: 98%;height:40px;" placeholder="Search here ..." />
                            </div>
                            <div class="d-flex justify-content-evenly align-items-center" style="width: 30%; height:40px">
                                <button name="search" class="ml-3 bg-success">Search</button>
                            </div>
                        </div>
                           </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Meeting date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count=0;
                                $result = mysqli_query($con,$search);
                             while ($rows_= mysqli_fetch_assoc($result)) {
                                # code...
                              $count=$count + 1;
                                ?>
                                <tr>
                                    <th><?php echo $count ;?></th>
                                    <td><?php echo $rows_['name'] ;?></td>
                                    <td><?php echo $rows_['subject'] ;?></td>
                                    <td><?php echo $rows_['date'] ;?></td>
                                    
                                    <td>
                                        <a href="detail-request.php?mid=<?php echo $rows_['mid']; ?>">
                                            <button>See Details</button>
                                </a>
                                </td>
                                </tr>
                                <?php }  ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!-- jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/YouTubePopUp.jquery.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
