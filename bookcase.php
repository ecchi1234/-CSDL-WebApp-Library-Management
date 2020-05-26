<?php
session_start();

require_once "config.php";


// check login

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
      <link href="v/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.google.com/specimen/Montserrat" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/lib.css" rel="stylesheet">
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
               <a class="nav-link" href="borrow.php">
               <i class="fas fa-book-open"></i>
               <span>Mượn sách</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="bookcase.php">
               <i class="fas fa-chart-line"></i>
               <span>Tủ sách</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
               <a class="nav-link" href="reader-dashboard.php">
               <i class="fas fa-hands-helping"></i>
               <span>Trang chủ</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
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
                <span class="mr-2 d-none d-lg-inline text-blue-600 "><?php echo htmlspecialchars($_SESSION['username']);?></span>
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
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4 ">
                     <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">TỦ SÁCH CỦA TÔI</h3>
                     </div>
                     <div class="card-body card-body-book">
                        <div class="row row-book">
                     <?php

                        $perpage = 21;

                        if(isset($_GET["page"])){
                        $page = intval($_GET["page"]);
                        }
                        else {
                           $page = 1;
                        }
                     $calc = $perpage * $page;
                     $start = $calc - $perpage;
                     $sql = "SELECT b.bookCode, b.bookName, b.bookImage, a.authorName, c.categoryName, p.publisherName, b.publishYear, b.quantity FROM books b
                     INNER JOIN authors a ON a.authorCode=b.authorCode
                     INNER JOIN category c ON c.categoryCode=b.categoryCode
                     INNER JOIN publisher p ON p.publisherCode=b.publisherCode
                     WHERE b.bookCode IN (SELECT bookCode FROM actions WHERE cardNumber=".$_SESSION['id']." AND dateBack IS NULL)
                      LIMIT ".$start.", ".$perpage;
                     $result = mysqli_query($link, $sql);

                     $rows = mysqli_num_rows($result);

                     if($rows){
                        echo '<div class="row row-book">';
                     $i = 0;
                     while($post = mysqli_fetch_assoc($result)) {
                     
                     ?>
                           <div class="col-sm-auto mt-4">
                              <div class="card" style="width: 20rem;">
                                 <img class="card-img-top" src="<?php echo $post['bookImage'];?>" alt="Card image cap">
                                 <h5 class="card-title name-book"><?php echo $post['bookName'];?></h5>
                                 <div class="row">
                                    <p> <a class="btn btn-primary btn-primary-book" data-toggle="collapse" href="#book-detail-<?php echo $post['bookCode'];?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Chi tiết</a></p>
                                    <p> <a class="btn btn-danger btn-danger-book" data-toggle="collapse" href="#book-detail" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Mượn</a></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col">
                                    <div class="collapse multi-collapse" id="book-detail-<?php echo $post['bookCode'];?>">
                                       <div class="card card-body-book-detail">
                                          <p class="card-text card-text-book">Tác giả: <?php echo $post['authorName'];?></p>
                                          <p class="card-text card-text-book">Thể loại: <?php echo $post['categoryName'];?></p>
                                          <p class="card-text card-text-book">Nhà xuất bản: <?php echo $post['publisherName'];?></p>
                                          <p class="card-text card-text-book">Thời hạn: 50 ngày</p>
                                          <p class="card-text card-text-book">Tình trạng: Còn sách</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     <?php }} else{echo "<h2>Bạn chưa mượn quyển sách nào!</h2>";}?>
                           <!---->
                        </div>
                        </div>
                        <!-- <nav aria-label="Page navigation example">
                           <ul class="pagination justify-content-center"> -->
                        <?php

                        if(isset($page))
                        {
                        $result = mysqli_query($link,"select Count(*) As Total from actions where cardNumber=".$_SESSION['id']);
                        $rows = mysqli_num_rows($result);
                        if($rows)
                        {
                            echo '<nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">';
                           $rs = mysqli_fetch_assoc($result);

                           $total = $rs["Total"];

                        }

                           $totalPages = ceil($total / $perpage);

                           if($page <=1 ){

                           echo '<li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                 </li>';

                        }

                        else
                        {
                           $j = $page - 1;
                           echo "<li class='page-item'>
                                    <a class='page-link' href='borrow.php?page=$j' tabindex='-1' aria-disabled='true'>Previous</a>
                                 </li>";
                        }

                        for($i=1; $i <= $totalPages; $i++)

                        {
                        if($i<>$page)
                        {
                           echo "<li class='page-item'><a class='page-link' href='borrow.php?page=$i'>$i</a></li>";
                        }
                        else
                        {
                           echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                        }

                        }

                        if($page == $totalPages )
                        {
                           echo '<li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                 </li>';
                        }
                        else

                        {
                           $j = $page + 1;
                           echo '<li class="page-item">
                                    <a class="page-link" href="borrow.php?page="'.$j.'>Next</a>
                                 </li>';
                        }
                        echo '</ul>
                                </nav>';
                        }
                     ?>
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
      </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="v/jquery/jquery.min.js"></script>
      <script src="v/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="v/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="v/datatables/jquery.dataTables.min.js"></script>
      <script src="v/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
   </body>
</html>
