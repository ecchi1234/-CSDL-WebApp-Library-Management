<?php

// session start
session_start();

//include config file
require_once "config.php";

if (isset ($_POST['return']) && !empty($_POST['return'])){
    $actionCode = intval($_POST['return']);

    $sql1 = "SELECT a.bookCode, b.bookName FROM actions a INNER JOIN books b ON b.bookCode=a.bookCode WHERE a.actionCode=".$actionCode;
    if ($result = mysqli_query($link, $sql1)){
        if (mysqli_num_rows($result) > 0){
            if ($row=mysqli_fetch_array($result)){
                $bookName = $row['bookName'];
                $bookCode = $row['bookCode'];
            }
        }
    }
    else{
        echo "smt went wrong. Please try again later!";
    }
    $sql = "UPDATE actions SET dateBack=DATE(NOW()) WHERE bookCode = ".$bookCode." AND cardNumber=".$_SESSION['id']." AND dateBack IS NULL";
    echo $sql;
    $sql2 = "SELECT SUM(quantity) as numreturn FROM actions WHERE bookCode = ".$bookCode." AND cardNumber = ".$_SESSION['id']." AND dateBack IS NULL GROUP BY bookCode";
    echo $sql2;
    if ($result2=mysqli_query($link, $sql2)){
        if (mysqli_num_rows($result2) > 0){
            if ($row2 = mysqli_fetch_array($result2)){
                $quantity = $row2['numreturn'];
            }
             $sql3 = "UPDATE books SET quantity = quantity + ".$quantity." WHERE bookCode = ".$bookCode;
                if (mysqli_query($link, $sql3)){
                    if ($stmt = mysqli_query($link, $sql)){
                        // Trả sách thành công
                        $_SESSION['msg']="Bạn vừa trả thành công ".$bookName."!";
                        header("location: bookcase.php");
                        exit();
               
                    }
                    
                }
        }
        
    }        

    else{
        echo "something went wrong. Please try again later!";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
