<?php
//start session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}

// include config file
require_once "config.php";

if(isset($_POST["delete-id"]) && !empty($_POST["delete-id"])){
    // prepare a delete statment. in this case we only update status column
    $sql = "UPDATE reader SET status = 0 WHERE cardNumber = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_cardNumber);
        
        // Set parameters
        $param_cardNumber = trim($_POST["delete-id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            $_SESSION['msg']="Xóa thành công";
            header("location: reader.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
   echo "you are missing some parameter!";
}
?>