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
$bookImage = $bookName = $authorName = $categoryName = $publisherName = $publishYear = $quantity = "";
$bookImage_err = $bookName_err = $authorName_err = $categoryName_err = $publisherName_err = $publishYear_err = $quantity_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate book image
    $input_bookImage = trim($_POST["bookImage"]);
    if(empty($input_bookImage)){
        $bookImage_err = "Please enter URL of your book image.";
    }else{
        $bookImage = $input_bookImage;
    }

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
        $authorName = $input_authorName;
    }

    // Validate style name
    $input_categoryName = trim($_POST["categoryName"]);
    if(empty($input_categoryName)){
        $categoryName_err = "Please choose a style name.";
    }else{
        $categoryName = $input_categoryName;
    }

    // Validate publisher name
    $input_publisherName = trim($_POST["publisherName"]);
    if(empty($input_publisherName)){
        $publisherName_err = "Please choose a name of publisher.";     
    } else{
        $publisherName = $input_publisherName;
    }
    
    // Validate publish year
    $input_publishYear = trim($_POST["publishYear"]);
    if(empty($input_publishYear)){
        $publishYear_err = "Please enter the publishYear.";     
    } elseif(!ctype_digit($input_publishYear)){
        $publishYear_err = "Please enter a positive integer value.";
    } else{
        $publishYear = $input_publishYear;
    }
    
    // Validate quantity
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter quantity of Book.";     
    } elseif(!ctype_digit($input_quantity)){
        $quantity_err = "Please enter a positive integer value.";
    } else{
        $quantity = $input_quantity;
    }
    // echo "test4";
    // echo $bookImage_err;
    // echo $bookName_err;
    // echo $authorName_err;
    // echo $categoryName_err;
    // echo $publisherName_err;
    // echo $publishYear_err;
    // echo $quantity_err;
    // Check input errors before inserting in database
    if(empty($bookImage_err) && empty($bookName_err) && empty($authorName_err) && empty($categoryName_err) 
    && empty($publisherName_err) && empty($publishYear_err) && empty($quantity_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO books (bookName, bookImage, authorCode, categoryCode, publisherCode, publishYear, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_bookName, $param_bookImage, $param_authorName, $param_categoryName, $param_publisherName, $param_publishYear, $param_quantity);
            
            // Set parameters
            $param_bookName = $bookName;
            $param_bookImage = $bookImage;
            $param_authorName = $authorName;
            $param_categoryName = $categoryName;
            $param_publisherName = $publisherName;
            $param_publishYear = $publishYear;
            $param_quantity = $quantity;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                $_SESSION['msg']="Thêm sách thành công";
                header("location: book.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }
}
?>