<?php
   // start session
   session_start(); 
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: index.php");
      exit;
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
      <link href="./v/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.google.com/specimen/Montserrat" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="./css/lib.css" rel="stylesheet">
      <!--This need to be on top of this html-->
      <script src="./v/jquery/jquery.min.js"></script>
      <script src="./js/sb-admin-2.min.js"></script>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="reader.html">
               <div class="sidebar-brand-icon ">
                  <i class="fas fa-book"></i>
               </div>
               <div class="sidebar-brand-text">DEADLIB</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="reader-dashboard.php">
               <i class="fas fa-book-reader"></i>
               <span>Trang chủ</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="borrow.php">
               <i class="fas fa-fw fa-folder"></i>
               <span>Mượn sách</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="bookcase.php">
               <i class="fas fa-backward"></i>
               <span>Tủ sách</span></a>
            </li>
            
         </ul>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- Topbar -->
               <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                  <!-- Topbar Search -->
                  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                           <i class="fas fa-search fa-sm"></i>
                           </button>
                        </div>
                     </div>
                  </form>
                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Nav Item - Alerts -->
                     <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-bell fa-fw"></i>
                           <!-- Counter - Alerts -->
                           <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                           <h6 class="dropdown-header">
                              Alerts Center
                           </h6>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="mr-3">
                                 <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                 </div>
                              </div>
                              <div>
                                 <div class="small text-gray-500">December 12, 2019</div>
                                 <span class="font-weight-bold">A new monthly report is ready to download!</span>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="mr-3">
                                 <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                 </div>
                              </div>
                              <div>
                                 <div class="small text-gray-500">December 7, 2019</div>
                                 $290.29 has been deposited into your account!
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="mr-3">
                                 <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                 </div>
                              </div>
                              <div>
                                 <div class="small text-gray-500">December 2, 2019</div>
                                 Spending Alert: We've noticed unusually high spending for your account.
                              </div>
                           </a>
                           <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                     </li>
                     <!-- Nav Item - Messages -->
                     <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-envelope fa-fw"></i>
                           <!-- Counter - Messages -->
                           <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                           <h6 class="dropdown-header">
                              Message Center
                           </h6>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                                 <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                 <div class="status-indicator bg-success"></div>
                              </div>
                              <div class="font-weight-bold">
                                 <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                 <div class="small text-gray-500">Emily Fowler · 58m</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                                 <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                 <div class="status-indicator"></div>
                              </div>
                              <div>
                                 <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                 <div class="small text-gray-500">Jae Chun · 1d</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                                 <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                 <div class="status-indicator bg-warning"></div>
                              </div>
                              <div>
                                 <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                 <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                                 <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                 <div class="status-indicator bg-success"></div>
                              </div>
                              <div>
                                 <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                 <div class="small text-gray-500">Chicken the Dog · 2w</div>
                              </div>
                           </a>
                           <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                     </li>
                     <div class="topbar-divider d-none d-sm-block"></div>
                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-blue-600 "><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                <img class="img-profile rounded-circle" src="https://kenh14cdn.com/thumb_w/620/2018/5/16/3189533012638884437482503274448191335956480n-15264802105001243615494.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
                  </ul>
               </nav>
               <!-- End of Topbar -->
               <!-- Begin Page Content -->
               <div class="container-fluid">
               <div class="row">
                     
                     <?php if($_SESSION['msg']!="")
                         {?>
                         <div class="col-md-6">
                             <div class="alert alert-success" >
                                 <strong>Success :</strong> 
                                     <?php echo htmlentities($_SESSION['msg']);?>
                                     <?php echo htmlentities($_SESSION['msg']="");?>
                             </div>
                         </div>
                     <?php } ?>

                  </div>
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4 card-mp">
                     <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">THÔNG TIN CÁ NHÂN</h3>
                     </div>
                     <div class="card-body">
                        <!--Information-->
                        <div class="row row-cols-2">
                           
                           <div class="col-8">
                              <form action="update-profile.php" method="POST">
                              <input type="hidden" name="id" value=<?php echo $_SESSION['id'];?>>
                                 <p style=" font-weight: 900;">Tài khoản</p>
                                 <!--Tên đăng nhập-->
                                 <?php
                                    require_once "config.php";
                                    $sql1 = "SELECT userName FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $username = $row1['userName']; 
                                    ?> 
                                 <div class="form-group row">
                                    <label for="user-profile" class="col-sm-3 col-form-label label-pb">Tên đăng nhập</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" value= "<?php echo $username; ?>" required  id="user-profile" placeholder="Tên đăng nhập">
                                    </div>
                                 </div>
                                 <p style=" font-weight: 900;">Thông tin chi tiết</p>
                                 <!--Tên người dùng-->
                                 <?php
                                    $sql1 = "SELECT readerName FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $readername = $row1['readerName']; 
                                    ?> 
                                 <div class="form-group row">
                                    <label for="name-profile" class="col-sm-3 col-form-label label-pb">Tên người dùng</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="readerName" value= "<?php echo $readername; ?>" required id="name-profile" placeholder="Tên người dùng">
                                    </div>
                                 </div>
                                 <!--Giới tính-->
                                 <?php
                                    $sql1 = "SELECT gender FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $gender = $row1['gender']; 
                                    ?> 
                                 <div class="form-group row">
                                    <label for="gender-profile" class="col-sm-3 col-form-label label-pb">Giới tính</label>
                                    <div class="col-sm-8">
                                       <select class="form-control" name="gender" id="gender-profile" >
                                          <option value= "<?php echo $gender; ?>" selected ><?php echo $gender; ?></option>
                                          <option>Nữ</option>
                                          <option>Nam</option>
                                       </select>
                                    </div>
                                 </div>
                                 <!--Ngày sinh-->
                                 <?php
                                    $sql1 = "SELECT dateOfBirth FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    
                                    $dateofbirth = $row1['dateOfBirth']
                                    ?> 
                                 <div class="form-group row">
                                    <label for="birth-profile" class="col-sm-3 col-form-label label-pb">Ngày sinh</label>
                                    <div class="col-sm-8">
                                       <input type="date" class="form-control" name="dateOfBirth"  value="<?php echo $dateofbirth; ?>" required id="birth-profile" >
                                    </div>
                                 </div>
                                 <!--Số điện thoại-->
                                 <?php
                                    $sql1 = "SELECT phoneNumber FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $phonenumber = $row1['phoneNumber']; 
                                    ?>  
                                 <div class="form-group row">
                                    <label for="phone-profile" class="col-sm-3 col-form-label label-pb">Số điện thoại</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="phoneNumber"  value="<?php echo $phonenumber; ?>" required id="phone-profile" placeholder="Số điện thoại">
                                    </div>
                                 </div>
                                 <!--Địa chỉ-->
                                 <?php
                                    $sql1 = "SELECT address FROM reader WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $address = $row1['address']; 
                                    ?> 
                                 <div class="form-group row">
                                    <label for="place-profile" class="col-sm-3 col-form-label label-pb">Địa chỉ</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" name="address"  value="<?php echo $address; ?>" required id="place-profile">
                                    </div>
                                 </div>
                                 <p style=" font-weight: 900;">Thẻ</p>
                                 <?php
                                    $sql1 = "SELECT cardNumber,createdDay,expiredDay FROM card WHERE cardNumber =".$_SESSION["id"];
                                    $query = mysqli_query($link, $sql1);
                                    ?>
                                 <?php $row1 = mysqli_fetch_array($query);
                                    $cardNumber = $row1['cardNumber']; 
                                    $cd = date_create($row1['createdDay']);
                                    $createdDay = date_format($cd, "d-m-Y");
                                    $ed = date_create($row1['expiredDay']);
                                    $expiredDay = date_format($ed, "d-m-Y");
                                    ?> 
                                 <p style="font-weight:600">Mã số thẻ: <?php echo $cardNumber ?></p>
                                 <p style="font-weight:600">Ngày bắt đầu: <?php echo $createdDay ?> </p>
                                 <p style="font-weight:600">Ngày kết thúc: <?php echo $expiredDay ?> </p>
                                 <div class=" btn-profile float-right">

                                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                 <button type="submit" class="btn btn-primary" href="profile.php">Chấp nhận</button>
                                 </div>
                           
                              </form>
                        </div>
                           <div class="col-4">
                              <div class="card" style="width: 18rem; margin-left: 13%;">
                                 <img src="https://kenh14cdn.com/thumb_w/620/2018/5/16/3189533012638884437482503274448191335956480n-15264802105001243615494.jpg" class="card-img-top card-img-top-profile" alt="...">
                                 <div class="card-body">
                                    <input type="text" style="margin-left: 0%;"class="form-control " placeholder="Điền link ảnh...">
                                 </div>
                              </div>
                           </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Scroll to Top Button-->
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalLabel">Ready to Leave?</h6>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="index.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="./v/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="./v/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <!-- <script src="./js/sb-admin-2.min.js"></script> -->
      <!-- Page level plugins -->
      <script src="./v/datatables/jquery.dataTables.min.js"></script>
      <script src="./v/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="./js/demo/datatables-demo.js"></script>
   </body>
</html>
