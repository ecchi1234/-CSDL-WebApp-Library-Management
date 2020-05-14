<?php
    // start session
    session_start();
    // include config.php
    require_once "config.php";
    // get bookCode from post http request via ajaxt
    $cardNumber = $_POST['cardNumber'];

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
                $response.="<div class='col-2'>";
                $response.=" <img class='float-left' id='imgReaderInfo' style='width: 180px; height: 180px;' src='./img/social.png'>";
                $response.="</div>";
                $response.="<div class='col'>";
                $response.="<form action='update-reader.php' method='post'>";
                $response.="<input type='hidden' value='".$cardNumber."' name='id'></input>";
                // Tác giả
                $response.="<div class='form-row'>";
                $response.="<div class='col-md-12 mb-3 form-group'>";
                   $response.="<p class='label-pb' for='nameReader'>Họ và tên</p>";
                   $response.="<input type='text' class='form-control form-control-eu' id='nameReader' name='readerName' value='".$readerName."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 col-pb'>";
                   $response.="<p class='label-pb' for='address'>Địa chỉ</p>";
                   $response.="<input type='text' class='form-control form-control-eu' id='address' name='address' value='".$address."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 '>";
                   $response.="<p class='label-pb' for='dob'>Ngày sinh</p>";
                   $response.="<input type='date' class='form-control form-control-eu' id='dob' name='dateOfBirth' value='".$dateOfBirth."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 '>";
                   $response.="<p class='label-pb' for='gender'>Giới tính</p>";
                   $response.="<select id='gender' name='gender' class='form-control form-control-gender'>";
                   $response.="<option value='".$gender."' selected>".$gender."</option>";
                   $response.="<option value='Nữ'>Nữ</option>";
                   $response.="<option value='Nam'>Nam</option>";
                   $response.="</select>";
                   $response.="</div>";
                   $response.="</div>";

                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 col-pb'>";
                   $response.="<p class='label-pb' for='mobile'>Số điện thoại</p>";
                   $response.="<input type='text' class='form-control form-control-pb' id='mobile' name='phoneNumber' value='".$phoneNumber."' required>";
                   $response.="</div>";
                   $response.="</div>";

                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 col-pb'>";
                   $response.="<p class='label-pb' for='card'>Địa chỉ</p>";
                   $response.="<input type='text' class='form-control form-control-pb' id='card' name='cardNumber' value='".$cardNumber."' required>";
                   $response.="</div>";
                   $response.="</div>";


                   $response.="<div class='form-group form-group-eb'>";
                   $response.="<div class='col float-right'>";
                   $response.="<button class='btn btn-secondary' type='button' data-dismiss='modal'>Hủy</button>";
                   $response.="<button class='btn btn-primary' type='submit'>Chấp nhận</button>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.=" </form>";
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