<?php 
session_start();

if (!isset($_SESSION['CaretakerEmail'])) {
    header("location:login.php");
    exit(); // Stop execution after redirection
}

include("./config/config.php");

// Check if 'mid' is set in the URL
if (isset($_GET['mid'])) {
    $mid = mysqli_real_escape_string($con, $_GET['mid']);

    // Delete the meeting with the given ID
    $delete_query = "DELETE FROM `meetings` WHERE `mid` = '$mid'";
    $delete_result = mysqli_query($con, $delete_query);

    // Check if the query was successful
    if ($delete_result) {
        // Redirect back to care-giver.php after successful deletion
        header("location:care-giver.php");
        exit(); // Stop execution after redirection
    } else {
        // Handle the case where the deletion query fails
        echo "Error deleting meeting: " . mysqli_error($con);
    }
} else {
    // Handle the case where 'mid' is not set in the URL
    // For example, redirect to an error page or display an error message
    echo "Meeting ID is not provided.";
}
?>
