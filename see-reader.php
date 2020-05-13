<?php
    // start session
    session_start();
    
    // include config.php
    require_once "config.php";
    // get bookCode from post http request via ajaxt
    $cardNumber = $_POST['cardNumber'];

    // Attempt select query execution
    $sql = "SELECT r.cardNumber, r.readerName, r.gender, r.dateOfBirth, r.address, r.phoneNumber, c.createdDay FROM reader r
    INNER JOIN card c ON r.cardNumber=c.cardNumber WHERE r.cardNumber=".$cardNumber;
     if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            if ($row = mysqli_fetch_array($result)){

                $readerName=$row['readerName'];
                $gender=$row['gender'];
                $dateOfBirth=$row['dateOfBirth'];
                $address=$row['address'];
                $phoneNumber=$row['phoneNumber'];
                $createdDay=$row['createdDay'];

                $response="<div class='row'>";
                $response.="<div class='col-md-7 align-self-center'>";
                if ($gender == "Nam"){
                    $response.="<img class='card-img-top-info' style='width: 230px; height: 230px;' src='./img/social.png'>";
                }
                else{
                    $response.="<img class='card-img-top-info' style='width: 230px; height: 230px;' src='./img/girl.png'>";
                }
                $response.="</div>";

                $response.="</div>";
                $response.=" <div class='row'>";
                    $response.="<div class='col-info text-center align-items-center'>";
                    $response.="<h2 class='card-title'>Họ và tên: ".$readerName."</h2>";
                    $response.="<p class='card-text'><strong>Ngày sinh: </strong> ".$dateOfBirth." </p>";
                    $response.="<p class='card-text'><strong>Giới tính: </strong> ".$gender." </p>";
                    $response.="<p class='card-text'><strong>Số điện thoại: </strong> ".$phoneNumber." </p>";
                    $response.="<p class='card-text'><strong>Mã số thẻ: </strong> ".$cardNumber." </p>";
                    $response.="<p class='card-text'><strong>Ngày tham gia: </strong> ".$createdDay." </p>";
                $response.="</div>";
                $response.="</div>";
                $response.="</div>";

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


                  