<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$readerName = $gender = $dateOfBirth = $address = $phoneNumber  = "";
$readerName_err = $gender_err = $dateOfBirth_err = $address_err = $phoneNumber_err =  "";
 
// Processing form data when form is submitted

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $cardNumber = intval($_POST["id"]);
    // Validate reader name
    $input_readerName = trim($_POST["readerName"]);
    if(empty($input_readerName)){
        $readerName_err = "Please enter a name.";
    }else{
        $readerName = $input_readerName;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please choose gender";
    }else{
        $gender = intval($input_gender);
    }

    // Validate style name
    $input_dateOfBirth = trim($_POST["dateOfBirth"]);
    if(empty($input_dateOfBirth)){
        $dateOfBirth_err = "Please choose birthday";
    }else{
        $dateOfBirth = intval($input_dateOfBirth);
    }

    // Validate publisher name
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please choose address";     
    } else{
        $address = intval($input_address);
    }
    // Validate publish year
    $input_phoneNumber = trim($_POST["phoneNumber"]);
    if(empty($input_phoneNumber)){
        $phoneNumber_err = "Please enter phone number";     
    } elseif(!ctype_digit($input_phoneNumber)){
        $phoneNumber_err = "Please enter a positive integer value.";
    } else{
        $phoneNumber = intval($input_phoneNumber);
    }
    
    // Check input errors before inserting in database
    if(empty($readerName_err) && empty($gender_err) && empty($dateOfBirth_err) 
    && empty($address_err) && empty($phoneNumber_err) ){
        // Prepare an update statement
        $sql= "UPDATE reader SET readerName=?, gender=?, dateOfBirth=?, address=?, phoneNumber=? WHERE cardNumber=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_readerName, $param_gender, $param_dateOfBirth, $param_address, $param_phoneNumber, $param_cardNumber);
            // Set parameters
            $param_readerName = $readerName;
            $param_gender = $gender;
            $param_dateOfBirth = $dateOfBirth;
            $param_address = $address;
            $param_phoneNumber = $phoneNumber;
            $param_cardNumber = $cardNumber;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                $_SESSION['msg']="Cập nhật thành công!";
                header("location: reader.php");
                exit();

                
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
         
        // Close statement
        mysqli_stmt_close($stmt);
        
    }
}

?>
