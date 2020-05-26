<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$bookName = $authorName = $categoryName = $publisherName = $publishYear = $quantity = "";
$bookName_err = $authorName_err = $categoryName_err = $publisherName_err = $publishYear_err = $quantity_err = "";
 
// Processing form data when form is submitted

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $bookCode = intval($_POST["id"]);
    // Validate book name
    $input_bookName = trim($_POST["bookName"]);
    if(empty($input_bookName)){
        $bookName_err = "Please enter a name.";
    }else{
        $bookName = $input_bookName;
    }

    // Validate author name
    $input_authorName = trim($_POST["authorName"]);
    if(empty($input_authorName)){
        $authorName_err = "Please choose a name.";
    }else{
        $authorName = intval($input_authorName);
    }

    // Validate style name
    $input_categoryName = trim($_POST["categoryName"]);
    if(empty($input_categoryName)){
        $categoryName_err = "Please choose a category name.";
    }else{
        $categoryName = intval($input_categoryName);
    }

    // Validate publisher name
    $input_publisherName = trim($_POST["publisherName"]);
    if(empty($input_publisherName)){
        $publisherName_err = "Please choose a name of publisher.";     
    } else{
        $publisherName = intval($input_publisherName);
    }
    // Validate publish year
    $input_publishYear = trim($_POST["publishYear"]);
    if(empty($input_publishYear)){
        $publishYear_err = "Please enter the publishYear.";     
    } elseif(!ctype_digit($input_publishYear)){
        $publishYear_err = "Please enter a positive integer value.";
    } else{
        $publishYear = intval($input_publishYear);
    }
    
    // Validate quantity
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter quantity of Book.";     
    } elseif(!ctype_digit($input_quantity)){
        $quantity_err = "Please enter a positive integer value.";
    } else{
        $quantity = intval($input_quantity);
    }
    
    // Check input errors before inserting in database
    if(empty($bookName_err) && empty($authorName_err) && empty($categoryName_err) 
    && empty($publisherName_err) && empty($publishYear_err) && empty($quantity_err)){
        // Prepare an update statement
        $sql = "UPDATE books SET bookName=?, authorCode=?, categoryCode=?, publisherCode=?, publishYear=?, quantity=? WHERE bookCode=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "siiiiii", $param_bookName, $param_authorName, $param_categoryName, $param_publisherName, $param_publishYear, $param_quantity, $param_bookCode);
            // Set parameters
            $param_bookName = $bookName;
            $param_authorName = $authorName;
            $param_categoryName = $categoryName;
            $param_publisherName = $publisherName;
            $param_publishYear = $publishYear;
            $param_quantity = $quantity;
            $param_bookCode = $bookCode;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                $_SESSION['msg']="Cập nhật thành công!";
                header("location: book.php");
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