<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: code/reader-dashboard.php");
    exit;
}
 
// Include config file
require_once "code/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password) || ($password==$hashed_password)){
                            $sql2 = "SELECT status FROM reader WHERE cardNumber =".$id;
                            if ($result2 = mysqli_query($link, $sql2)){
                              if ($row2 = mysqli_fetch_array($result2)){
                                $status = $row2['status'];
                                if ($status == 1){
                                  // Password is correct, so start a new session
                                  session_start();
                            
                                  // Store data in session variables
                                  $_SESSION["loggedin"] = true;
                                  $_SESSION["id"] = $id;
                                  $_SESSION["username"] = $username;
                                  $_SESSION["msg"] = "";                            
                                  echo "test3";
                                  // Redirect user to welcome page
                                  header("location: code/reader-dashboard.php");
                                }
                                else{
                                  echo "<script>alert('Tài khoản của bạn đã bị khóa. Hãy liên hệ với thủ thư để mở khóa thẻ!')</script>";
                                }
                              }
                            }
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
  <link href="code/v/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.google.com/specimen/Montserrat" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="code/css/lib.css" rel="stylesheet">
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA5y5AeQ-PE6Jr4L6z9_5sVuVEHu9LYFJI&sensor=false&v=3&libraries=geometry"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">DEADLIB</h1>
                    <h4 class="mb-3">Member Login</h4>
                    <div id="demo"></div>
                    <script>
                        var x = document.getElementById("demo");
                            function getLocation() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(showPosition);
                            } else {
                                x.innerHTML = "Geolocation is not supported by this browser.";
                            }
                            }

                            function showPosition(position) {
                            x.innerHTML = "Latitude: " + position.coords.latitude +
                            "<br>Longitude: " + position.coords.longitude;
                        }
                        </script>
                  </div>
                  <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <a href="reader.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="reader.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="code/adminlogin.php">Sign-in as Admin?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="code/register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="code/v/jquery/jquery.min.js"></script>
  <script src="code/v/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="code/v/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="code/js/sb-admin-2.min.js"></script>

</body>

</html>
