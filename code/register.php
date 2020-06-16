<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $fname = $lname = $phoneNumber = $address = "";
$username_err = $password_err = $confirm_password_err = $fname_err = $lname_err = $phoneNumber_err = $address_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate first name
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter first name.";     
    } else{
        $fname = trim($_POST["fname"]);
    }

    // Validate last name
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter last name.";     
    } else{
        $lname = trim($_POST["lname"]);
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address.";     
    } else{
        $address = trim($_POST["address"]);
    }

    // Validate phone number
    if(empty(trim($_POST["phoneNumber"]))){
        $phoneNumber_err = "Please enter your phone number.";     
    } else{
        $phoneNumber = trim($_POST["phoneNumber"]);
    }

    // Validate last name
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter last name.";     
    } else{
        $lname = trim($_POST["lname"]);
    }

    $readerName="";
    $readerName.=$lname;
    $readerName.=" ";
    $readerName.=$fname;

    
    
    // Check input errors before inserting in database
    if(empty($address_err) && empty($phoneNumber_err) && empty($fname_err) && empty($lname_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
       
        $sql0 = "INSERT INTO card (createdDay, expiredDay) VALUES (DATE(NOW()), ADDDATE(DATE(NOW()), INTERVAL 2 YEAR))";
        if($result = mysqli_query($link, $sql0)){
            
            $last_id = mysqli_insert_id($link);
            // Prepare an insert statement
            $sql = "INSERT INTO reader (cardNumber, readerName, address, phoneNumber) VALUES (".$last_id.",?, ?, ?)";
            echo $last_id;
            echo $sql;
            if($stmt = mysqli_prepare($link, $sql)){
               
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_readerName, $param_address, $param_phoneNumber);
                
                // Set parameters
               
                $param_readerName = $readerName;
                $param_address = $address;
                $param_phoneNumber = $phoneNumber;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                  $sql2 = "INSERT INTO users (id, username, password) values (".$last_id.", ?, ?)";
                  if ($stmt2 = mysqli_prepare($link, $sql2)){
                    mysqli_stmt_bind_param($stmt2, "ss", $param_username, $param_password);

                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                    if (mysqli_stmt_execute($stmt2)){
                      // Redirect to login page
                      header("location: index.php");
                    }
                    else{
                      echo "something went wrong. Please try again later.";
                    }

                  }
                    
                } else{
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
    }  
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DEADLIB</title>

  <!-- Custom fonts for this template-->
  <link href="v/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.google.com/specimen/Montserrat" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/lib.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fname">
                    <span class="help-block"><?php echo $fname_err; ?></span>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lname">
                    <span class="help-block"><?php echo $lname_err; ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleUsername" placeholder="Username" name="username">
                  <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="confirm_password">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputAddress" placeholder="Address" name="address">
                  <span class="help-block"><?php echo $address_err; ?></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputMobile" placeholder="Phone Number" name="phoneNumber">
                  <span class="help-block"><?php echo $phoneNumber_err; ?></span>
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="index.php" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="v/jquery/jquery.min.js"></script>
  <script src="v/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="v/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
