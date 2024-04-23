<?php
session_start();
if (isset($_SESSION['CaregiverEmail'])) {
    unset($_SESSION['CaregiverName']);
    unset($_SESSION['CaregiverEmail']);
    unset($_SESSION['CaregiverImg']);
    unset($_SESSION['CaregiverID']);
}else{
    unset($_SESSION['CaretakerName']);
    unset($_SESSION['CaretakerEmail']);
    unset($_SESSION['CaretakerImg']);
    unset($_SESSION['CaretakerID']);
}

header('location:login.php');
