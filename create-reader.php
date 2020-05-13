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
$readerName = $address = $dob = $gender = $phoneNumber;
$readerName_err = $address_err = $dob_err = $gender_err = $phoneNumber_err;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Validate reader name
    $input_readerName = trim($_POST["readerName"]);
    if(empty($input_readerName)){
        $readerName_err = "Please enter a name.";
    }else{
        $readerName = $input_readerName;
    }

    // Validate author name
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter your address.";
    }else{
        $address = $input_address;
    }

    // Validate style name
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter your date of birth.";
    }else{
        $dob = $input_dob;
    }

    // Validate publisher name
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please choose a gender.";     
    } else{
        $gender = $input_gender;
    }
    
    // Validate publish year
    $input_phoneNumber = trim($_POST["phoneNumber"]);
    if(empty($input_phoneNumber)){
        $phoneNumber_err = "Please enter the phoneNumber.";     
    } elseif(!ctype_digit($input_phoneNumber)){
        $phoneNumber_err = "Please enter a positive integer value.";
    } else{
        $phoneNumber = $input_phoneNumber;
    }
    
    // echo "test4";
    // echo $bookImage_err;
    // echo $bookName_err;
    // echo $address_err;
    // echo $dob_err;
    // echo $gender_err;
    // echo $phoneNumber_err;
    // echo $quantity_err;
    // Check input errors before inserting in database
    if(empty($bookImage_err) && empty($readerName_err) && empty($address_err) && empty($dob_err) 
    && empty($gender_err) && empty($phoneNumber_err) && empty($quantity_err)){
        $sql0 = "INSERT INTO card (createdDay, expiredDay) VALUES (DATE(NOW()), ADDDATE(DATE(NOW()), INTERVAL 2 YEAR))";
        if($result = mysqli_query($link, $sql0)){
            $last_id = mysqli_insert_id($link);
            // Prepare an insert statement
            $sql = "INSERT INTO reader (cardNumber, readerName, address, dateOfBirth, gender, phoneNumber) VALUES (".$last_id.", ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssss", $param_readerName, $param_address, $param_dob, $param_gender, $param_phoneNumber);
                
                // Set parameters
                $param_readerName = $readerName;
                $param_address = $address;
                $param_dob = $dob;
                $param_gender = $gender;
                $param_phoneNumber = $phoneNumber;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    $_SESSION['msg']="Thêm bạn đọc thành công. Mã số thẻ của bạn đọc là ".$last_id;
                    header("location: reader.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
        }

    }
}
?>