<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
        header("location: adminlogin.php");
        exit;
    }
    
    // include config.php
    require_once "config.php";
    // get bookCode from post http request via ajaxt
    $bookCode = $_POST['bookCode'];

    // Attempt select query execution
    $sql = "SELECT b.bookCode, b.bookName, b.bookImage, a.authorName, c.categoryName, p.publisherName, b.publishYear, b.quantity FROM books b
            INNER JOIN authors a ON a.authorCode=b.authorCode
            INNER JOIN category c ON c.categoryCode=b.categoryCode
            INNER JOIN publisher p ON p.publisherCode=b.publisherCode WHERE b.bookCode=".$bookCode;
     if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            if ($row = mysqli_fetch_array($result)){

                $bookName=$row['bookName'];
                $bookImage=$row['bookImage'];
                $authorName=$row['authorName'];
                $categoryName=$row['categoryName'];
                $publisherName=$row['publisherName'];
                $publishYear=$row['publishYear'];
                $quantity=$row['quantity'];

                $response="<div class='col'>";
                $response.="<img class='float-left' id='imgBookInfo' src='".$bookImage."' alt=''>";
                $response.="</div>";
                $response.="<form>";

                $response.="<div class='form-row'>";
                $response.="<div class='col-md-12 mb-3'>";
                    $response.="<h2 class='card-title' id='bookName'>".$bookName."</h2>";
                    $response.="<p class='card-text' id='authorName'><strong>Tác giả: </strong>".$authorName."</p>";
                    $response.="<p class='card-text' id='categoryName'><strong>Thể loại: </strong>".$categoryName."</p>";
                    $response.="<p class='card-text' id='publisherName'><strong>Nhà xuất bản: </strong>".$publisherName."</p>";
                    $response.="<p class='card-text' id='publishYear'><strong>Năm xuất bản: </strong>".$publishYear."</p>";
                    $response.="<p class='card-text' id='quantity'><strong>Số lượng: </strong>".$quantity."</p>";
                    $response.="<p class='card-text'><strong>Thời hạn mượn: </strong> 150 ngày </p>";
                $response.="</div>";
                $response.="</div>";
                $response.="</form>";

                echo $response;

            }
            
        }
        else{
            echo "<p class='lead'><em>No records were found.</em></p>";
        }
    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     // Close connection
     mysqli_close($link);
?>

