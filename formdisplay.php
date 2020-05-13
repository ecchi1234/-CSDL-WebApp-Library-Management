<?php
    // start session
    session_start();
    // include config.php
    require_once "config.php";
    // get bookCode from post http request via ajaxt
    $bookCode = $_POST['bookCode'];

    // Attempt select query execution
    $sql = "SELECT b.bookCode, b.bookName, b.bookImage, a.authorName, b.authorCode, c.categoryName, b.categoryCode, p.publisherName, b.publisherCode, b.publishYear, b.quantity FROM books b
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
                $authorCode=$row['authorCode'];
                $categoryCode=$row['categoryCode'];
                $publisherCode=$row['publisherCode'];

                $author=$authorName;
                $category=$categoryName;
                $publisher=$publisherName;

                $response='<div class="col">';
                $response.="<img class='float-left' id='imgBookInfo' src='".$bookImage."' alt=''>";
                $response.="</div>";
                $response.="<form action='update-book.php' method='post'>";
                $response.="<input type='hidden' value='".$bookCode."' name='id'></input>";
                // Tác giả
                $response.="<div class='form-row'>";
                $response.="<div class='col-md-12 mb-3'>";
                   $response.="<p class='label-pb' id='nameBook'>Tên sách</p>";
                   $response.="<input type='text' class='form-control form-control-pb2 ' id='nameBook' name='bookName' value='".$bookName."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 form-group'>";
                   $response.="<p class='label-pb' id='nameAuthor'>Tên tác giả</p>";
                   $response.="<select name='authorName' class='form-control form-control-pb2'>";
                   $response.="<option value='".$authorCode."'>".$authorName."</option>";
                        $sql1 = "SELECT * FROM `authors`";
                        $query = mysqli_query($link, $sql1);
                        while($row1=mysqli_fetch_array($query)):
                            if ($author==$row1[1]){
                               continue;
                            }
                            else{
                                $response.="<option value='".$row1[0]."'>".$row1[1]."</option>";
                            }endwhile;             
                   $response.="</select> ";
                   $response.="</div>";
                   $response.="</div>";
                    // Thể loại
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 form-group'>";
                   $response.="<p class='label-pb' id='nameAuthor'>Thể loại</p>";
                   $response.="<select name='categoryName' class='form-control form-control-pb2'>";
                   $response.="<option value='".$categoryCode."'>".$categoryName."</option>";
                        $sql1 = "SELECT * FROM `category`";
                        $query = mysqli_query($link, $sql1);
                        while($row1=mysqli_fetch_array($query)):
                            if ($category==$row1[1]){
                               continue;
                            }
                            else{
                                $response.="<option value='".$row1[0]."'>".$row1[1]."</option>";
                            }endwhile;             
                   $response.="</select> ";
                   $response.="</div>";
                   $response.="</div>";
                    // Nhà xuất bản
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 form-group'>";
                   $response.="<p class='label-pb' id='nameAuthor'>Nhà xuất bản</p>";
                   $response.="<select name='publisherName' class='form-control form-control-pb2'>";
                   $response.="<option value='".$publisherCode."'>".$publisherName."</option>";
                        $sql1 = "SELECT * FROM `publisher`";
                        $query = mysqli_query($link, $sql1);
                        while($row1=mysqli_fetch_array($query)):
                            if ($publisher==$row1[1]){
                               continue;
                            }
                            else{
                                $response.="<option value='".$row1[0]."'>".$row1[1]."</option>";
                            }endwhile;             
                   $response.="</select> ";
                   $response.="</div>";
                   $response.="</div>";


                   $response.="<div class='form-group'>";
                   $response.="<label>Ảnh sách</label>";
                   $response.="<input type='text' name='bookImage' class='form-control' value=''>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 col-pb'>";
                   $response.="<p class='label-pb' id='year'>Năm xuất bản</p>";
                   $response.="<input type='text' class='form-control form-control-pb' id='yearPublish' name='publishYear' value='".$publishYear."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 '>";
                   $response.="<p class='label-pb' id='quantity'>Số lượng</p>";
                   $response.="<input type='number' class='form-control form-control-pb' name='quantity' value='".$quantity."' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-row'>";
                   $response.="<div class='col-md-12 mb-3 '>";
                   $response.="<p class='label-pb' id='expired'>Thời hạn mượn (ngày)</p>";
                   $response.="<input type='text' class='form-control form-control-pb' id='timeToExpired' value='150' required>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.="<div class='form-group form-group-eb'>";
                   $response.="<div class='col float-right'>";
                   $response.="<button class='btn btn-secondary' type='button' data-dismiss='modal'>Hủy</button>";
                   $response.="<button class='btn btn-primary' type='submit'>Chấp nhận</button>";
                   $response.="</div>";
                   $response.="</div>";
                   $response.=" </form>";

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

                