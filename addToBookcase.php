<?php

// start session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//include config file
require_once "config.php";

// Define variables and initialize with empty values
$quantity = "";
$quantity_err = "";


echo $_POST['id'];

if (isset($_POST['id']) && !empty($_POST['id'])){
    // Get hidden input value
    $bookCode = intval($_POST["id"]);

    // Validate book name
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter quantity.";
    }else{
        $quantity = $input_quantity;
    }

    

    if (empty($quantity_err)){
        
        // prepare insert statement
        $sql = "INSERT INTO actions (cardNumber, bookCode, quantity, dateBorrow) VALUES (?,?,?, DATE(NOW()))";
        if ($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssi", $param_cardNumber, $param_bookCode, $param_quantity);

            $param_cardNumber = $_SESSION['id'];
            $param_bookCode = $bookCode;
            $param_quantity = $quantity;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                $sql1 = "UPDATE books SET quantity = (quantity -". $quantity.") WHERE bookCode = ".$bookCode;

                if ($stmt1 = mysqli_query($link, $sql1)){
                    // Records updated successfully. Redirect to landing page
                    $_SESSION['msg']="Mượn sách thành công";
                    header("location: borrow.php");
                    exit();
                }
                else{
                    echo "something went wrong. please try again later";
                }
               
                

                
            } else{
                echo "Something went wrong. Please try again later.";
            }

        }

           
        // Close statement
        mysqli_stmt_close($stmt);

    }
}

?>