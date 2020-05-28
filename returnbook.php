<?php

// session start
session_start();

//include config file
require_once "config.php";

if (isset ($_POST['return']) && !empty($_POST['return'])){
    $actionCode = intval($_POST['return']);

    $sql = "UPDATE actions SET dateBack=DATE(NOW()) WHERE actionCode=".$actionCode;
    $sql1 = "SELECT a.bookCode, b.bookName FROM actions a INNER JOIN books b ON b.bookCode=a.bookCode WHERE a.actionCode=".$actionCode;
    if ($result = mysqli_query($link, $sql1)){
        if (mysqli_num_rows($result) > 0){
            if ($row=mysqli_fetch_array($result)){
                $bookName = $row['bookName'];
            }
        }
    }
    else{
        echo "smt went wrong. Please try again later!";
    }
    if ($stmt=mysqli_query($link, $sql)){
         // Trả sách thành công
         $_SESSION['msg']="Bạn vừa trả thành công ".$bookName."!";
         header("location: bookcase.php");
         exit();
    }
    else{
        echo "something went wrong. Please try again later!";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


?>