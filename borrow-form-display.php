<?php
// start session
session_start();

// include config file
require_once "config.php";

//get id from ajax
$bookCode = $_POST['bookCode'];

$sql = "SELECT b.bookName, (b.quantity - IF(a.quantity IS NULL, 0, SUM(a.quantity))) as availble FROM books b 
LEFT JOIN actions a ON a.bookCode = b.bookCode 
WHERE b.bookCode=".$bookCode." AND a.dateBack IS NULL";

if ($result = mysqli_query($link, $sql)){
    if (mysqli_num_rows($result) > 0){
        if ($row = mysqli_fetch_array($result)){
            $quantity = $row['availble'];
            $bookName = $row['bookName'];

            $response = '
                            <input type="hidden" name="id" value="'.$bookCode.'">
                            <h3>'.$bookName.'</h3>
                            <div>Số lượng sách còn lại: '.$quantity.'</div>
          
                            <div class="form-group">
                                <label for="quantity">Chọn số lượng mượn</label>
                                <input class="form-control" type="number" id="quantity" name="quantity" max='.$quantity.' min=1 required>
                            </div>
                        ';
            echo $response;
        }
    }
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>