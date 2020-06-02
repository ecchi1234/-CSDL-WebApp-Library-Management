<?php
   // start session
   session_start(); 

   // check login

   if(!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true){
      header("location: adminlogin.php");
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
               <a class="nav-link" href="reader.php">
               <i class="fas fa-book-reader"></i>
               <span>Quản lý người đọc</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="book.php">
               <i class="fas fa-fw fa-folder"></i>
               <span>Quản lý tài liệu</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="giveback.php">
               <i class="fas fa-backward"></i>
               <span>Quản lý mượn trả</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" style="background-color: #31dc89;">
               <a class="nav-link" href="dashboard.php">
               <i class="fas fa-chart-line"></i>
               <span>Thống kê</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="card.php">
               <i class="fas fa-id-card"></i>
               <span>Quản lý thẻ</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="help.php">
               <i class="fas fa-hands-helping"></i>
               <span>Trợ giúp</span></a>
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
                     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                     <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                              <div class="input-group">
                                 <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </li>
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
                        <span class="mr-2 d-none d-lg-inline text-blue-600 "><?php echo htmlspecialchars($_SESSION["admin"]); ?></span>
                        <img class="img-profile rounded-circle" src="https://kenh14cdn.com/thumb_w/620/2018/5/16/3189533012638884437482503274448191335956480n-15264802105001243615494.jpg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <a class="dropdown-item" href="#">
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
                  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">THỐNG KÊ</h3>
                     </div>
                     <div class="card-body">
                        <!--Attempt select query execution-->
                        <div class="row">
                           <!-- Sách trong kho-->
                           <?php
                              require_once "config.php";
                                 $sql1 = "SELECT SUM(quantity) as total  FROM books";
                                 $query = mysqli_query($link, $sql1);
                                 ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $sum = $row1['total']; 
                              ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-success mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-success text-center">
                                    <h5><strong>SÁCH TRONG KHO</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-book"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $sum; ?>
                                 </div>
                              </div>
                           </div>
                           <!--------------------------------------------------------------------------------------------------------------------------------->
                           <!-- Sách được mượn-->
                           <?php 
                              $sql1 = "SELECT SUM(quantity) AS bookBorrow FROM actions";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $bookborrow = $row1['bookBorrow']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-primary mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-primary text-center">
                                    <h5><strong>SÁCH ĐƯỢC MƯỢN</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-book"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $bookborrow; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------>
                           <!-- Sách mới nhập -->
                           <?php
                              $sql1 = "SELECT COUNT(created_at) AS newBook FROM books WHERE TIMESTAMPDIFF(DAY,`created_at`,NOW()) <= 15";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $newbook = $row1['newBook']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-danger mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-danger text-center">
                                    <h5><strong>SÁCH MỚI NHẬP</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-address-book"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $newbook; ?>
                                 </div>
                              </div>
                           </div>
                           <!----------------------------------------------------------------------------------------------------------------------------------------->
                           <!-- Người dùng web -->
                           <?php
                              $sql1 = "SELECT COUNT(cardNumber) AS totalReader FROM reader";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $totalreader = $row1['totalReader']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-warning mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-warning text-center">
                                    <h5><strong>NGƯỜI DÙNG WEB</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-person-booth"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $totalreader; ?>
                                 </div>
                              </div>
                           </div>
                           <!-------------------------------------------------------------------------------------------------------------------------------->
                           <!-- Tài khoản mượn sách-->
                           <?php
                              $sql1 = "SELECT COUNT(DISTINCT c.cardNumber) AS accBorrow FROM card c
                                      INNER JOIN actions a ON c.cardNumber=a.cardNumber;";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $accborrow = $row1['accBorrow']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-dark mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-dark text-center">
                                    <h5><strong>TÀI KHOẢN MƯỢN SÁCH</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-user-edit"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $accborrow; ?>
                                 </div>
                              </div>
                           </div>
                           <!----------------------------------------------------------------------------------------------------------------------------------------->
                           <!-- Tài khoản mới tạo-->
                           <?php
                              $sql1 = "SELECT COUNT(cardNumber) as newAcc FROM card WHERE datediff(now(),createdDay)<= 15";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $newacc = $row1['newAcc']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-info mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-info text-center">
                                    <h5><strong>TÀI KHOẢN MỚI TẠO</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-address-card"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $newacc; ?>
                                 </div>
                              </div>
                           </div>
                           <!----------------------------------------------------------------------------------------------------------------------------------------->
                           <!--Thẻ hoạt động-->
                           <?php
                              $sql1 = "SELECT COUNT(cardNumber) as activeAcc FROM card WHERE datediff(expiredDay, NOW())> 0";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $activeacc = $row1['activeAcc']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-2 mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-2 text-center">
                                    <h5><strong>THẺ HOẠT ĐỘNG</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-id-card"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $activeacc; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------------->
                           <!--Thẻ hết hạn-->
                           <?php
                              $sql1 = "SELECT COUNT(cardNumber) as noactAcc FROM card WHERE datediff(expiredDay, NOW())<= 0";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $noactacc = $row1['noactAcc']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-4 mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-4 text-center">
                                    <h5><strong>THẺ HẾT HẠN</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-id-card-alt"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $noactacc; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------------->
                           <!--Nhân viên-->
                           <?php
                              $sql1 = "SELECT COUNT(*) as numberEmployee FROM librarian";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $numberemployee = $row1['numberEmployee']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-5 mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-5 text-center">
                                    <h5><strong>NHÂN VIÊN</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-user-shield"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $numberemployee; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------------->
                           <!--Sách chưa trả-->
                           <?php
                              $sql1 = "SELECT sum(quantity) AS noGiveBack FROM actions WHERE dateBack IS NULL";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $nogiveback = $row1['noGiveBack']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-1 mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-1 text-center">
                                    <h5><strong>SÁCH CHƯA TRẢ</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-user-times"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $nogiveback; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------------->
                           <!--Sách trả quá hạn-->
                           <?php
                              $sql1 = "SELECT COUNT(a.actionCode) as overTime FROM actions a INNER JOIN books b ON b.bookCode = a.bookCode WHERE datediff(a.dateBack,a.dateBorrow)>b.duration";
                              $query = mysqli_query($link, $sql1);
                              ?>
                           <?php $row1 = mysqli_fetch_array($query);
                              $overtime = $row1['overTime']; ?>
                           <div class="col-sm-4">
                              <div class="card card-st text-white bg-secondary mb-3" style="max-width: 18rem;">
                                 <div class="card-header card-header-secondary text-center">
                                    <h5><strong>SÁCH TRẢ QUÁ HẠN</strong></h5>
                                 </div>
                                 <div class="row">
                                    <i class="fas fas-book fa-fw fa-user-shield"></i>
                                 </div>
                                 <div class="row text-number">
                                    <?php echo $overtime; ?>
                                 </div>
                              </div>
                           </div>
                           <!------------------------------------------------------------------------------------------------------------------------------------------->
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
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="logout.php">Logout</a>
               </div>
            </div>
         </div>
      </div>
      <!--##################################################################################-->
      </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <!-- <script src="./vendor/jquery/jquery.min.js"></script> -->
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