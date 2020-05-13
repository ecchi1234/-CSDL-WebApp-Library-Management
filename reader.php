<?php
// start session
session_start();
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
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.google.com/specimen/Montserrat" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/lib.css" rel="stylesheet">
      <!--This need to be on top of this html-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="js/sb-admin-2.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.see').click(function(){
               var cardNumber = $(this).data('id');
               // AJAX request
               $.ajax({
                  url: 'see-reader.php',
                  type: 'post',
                  data: {cardNumber: cardNumber},
                  success: function(response){
                     // Add response in Modal Body
                     $('#informModal .modal-body').html(response);

                     // // Display Modal
                     //  $('#see-informbook-Modal').modal('show'); 
                  }
               })
            });

            $('.edit').click(function(){
               var cardNumber = $(this).data('id');
               // AJAX request
               $.ajax({
                  url: 'formdisplay-reader.php',
                  type: 'post',
                  data: {cardNumber: cardNumber},
                  success: function(response){
                     // Add response in Modal Body
                     $('#edit-inform-user-Modal .modal-body').html(response);

                     // // Display Modal
                     //  $('#edit-informbook-Modal').modal('show'); 
                  }
               })
            });
            //------------------------------------
            //Code for open bootstrap modal pop up
            var addmodalHtml = ""; // this is varibale, in which we will save modal html before open
            $('#add-book').click(function(){
               addmodalHtml = $('#add-book-Modal').html();
               $('#add-book-Modal').modal("show");
            });
            //Code for close bootstrap modal popup
            $("#add-book-Modal").on("hidden.bs.modal", function () {
               //here you can get old html of you modal popup
               $("#add-book-Modal").html(addmodalHtml);// In this, we are adding old html in modal pop for achieving reset trick
            });

            //-----------------------------------
            // xóa một bản ghi

            $('.delete').click(function(){
               var bookCode = $(this).data('id');
               $tr = $(this).closest('tr');
               var data = $tr.children('td').map(function(){
                  return $(this).text();
               }).get();

               console.log(data);

               $('#deleteModal .modal-body span b').text(' ' + data[1]);
               $('#delete-id').val(data[0]);
            });
        });
    </script>
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
            <li class="nav-item active">
               <a class="nav-link" href="borrow.php">
               <i class="fas fa-book-open"></i>
               <span>Quản lý mượn sách</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
                <span class="mr-2 d-none d-lg-inline text-blue-600 "><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
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
               <div class="card shadow mb-4">
               <div class="card-header py-3">
               <h3 class="m-0 font-weight-bold text-primary">QUẢN LÝ NGƯỜI ĐỌC</h3>
               </div>
               <div class="card-body">
               <form>
               <a class="btn btn-primary-add " href="#" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus" style="display: inline;"></i>Thêm</a>
               </form>
               <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT r.cardNumber, r.readerName, r.gender, r.dateOfBirth, r.address, r.phoneNumber, c.createdDay FROM reader r
                    INNER JOIN card c ON r.cardNumber=c.cardNumber";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Mã thẻ</th>";
                                        echo "<th>Tên</th>";
                                        echo "<th>Giới tính</th>";
                                        echo "<th>Ngày sinh</th>";
                                        echo "<th>Địa chỉ</th>";
                                        echo "<th>Số điện thoại</th>";
                                        echo "<th>Ngày gia nhập</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['cardNumber'] . "</td>";
                                        echo "<td>" . $row['readerName'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['dateOfBirth'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['phoneNumber'] . "</td>";
                                        echo "<td>" . $row['createdDay'] . "</td>";
                                        echo "<td>";
                                            echo "<a class='see' href='#' data-toggle='modal' role='button' data-target='#informModal' data-id=".$row['cardNumber']."><span class='fas fa-fw fa-eye' title='View Record' data-toggle='tooltip'></span></a>";
                                            echo "<a class='edit' href='#' data-toggle='modal' role='button' data-target='#edit-inform-user-Modal' data-id=".$row['cardNumber']."><span class='fas fa-fw fa-pencil-alt' title='Edit Record' data-toggle='tooltip'></span></a>";
                                            echo "<a class='delete' href='#' data-toggle='modal' role='button' data-target='#deleteModal' data-id=".$row['cardNumber']."><span class='fas fa-fw fa-trash' title='Delete Record' data-toggle='tooltip'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                  //   // Close connection
                  //   mysqli_close($link);
                    ?>
               </table>
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
                     <a class="btn btn-primary" href="index.php">Logout</a>
                  </div>
               </div>
            </div>
         </div>
         <!--Add User Modal-->
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content-info">
                  <div class="modal-header">
                     <h5 class="modal-title" id="informLabel">Tạo hồ sơ mới</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form action="create-reader.php" method="post">
                        <div class="col-md-8">
                           <div class="form-text">
                              <label for="inputName">Họ và tên</label>
                              <input type="text" class="form-info" id="inputName" placeholder="Họ và tên" name="readerName">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-text">
                              <label for="inputAddress">Địa chỉ</label>
                              <input type="text" class="form-info" id="inputAddress" placeholder="Địa chỉ" name="address">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-text">
                              <label for="inputBirth">Ngày sinh</label>
                              <input type="text" class="form-info" id="inputBirth" placeholder="Ngày sinh" name="dob">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-text">
                              <label for="inputGender">Giới tính</label>
                              <input type="text" class="form-info" id="inputGender" placeholder="Giới tính" name="gender">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-text">
                              <label for="inputPhone">Số điện thoại</label>
                              <input type="text" class="form-info" id="inputPhone" placeholder="Số điện thoại" name="phoneNumber">
                           </div>
                        </div>
                        <div class="col-md-6 ">
                           <form><img class="card-img card-img-au" src="https://salt.tikicdn.com/cache/200x200/ts/product/16/72/03/48f9819bda92d598cc2fa44452416b27.jpg" alt="Card image cap"></form>
                        </div>
                        <div class="col-md-6 ">
                           <div class="custom-file upImage">
                              <input type="file" class="custom-file-input" id="inputGroupFile03">
                              <label class="custom-file-label" for="inputGroupFile03">Tải ảnh đại diện</label>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                           <button type="submit" class="btn btn-primary ">Chấp nhận</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

 <!--##################################################################################-->

         <!--Edit User Profile-->
         <div class="modal fade" id="edit-inform-user-Modal" tabindex="-1" role="dialog" aria-labelledby="edit-inform-user-Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content-info">
                  <div class="modal-header">
                     <h5 class="modal-title" id="informBookLabel">Chỉnh sửa thông tin người dùng</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col">
                        <img class="float-left " id="imgBookInfo" src="data:image/jpeg;base64,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" alt="">
                     </div>
                     <form>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <p class="label-pb" id="nameBook">Họ và tên</p>
                              <input type="text" class="form-control form-control-eu" id="name" value="Nguyễn Phương Thảo" required>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <p class="label-pb" id="nameBook">Tên đăng nhập</p>
                              <input type="text" class="form-control form-control-eu" id="nameUser" value="BI" required>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <p class="label-pb" id="nameBook">Địa chỉ</p>
                              <input type="text" class="form-control form-control-eu" id="place" value="Thanh Hóa" required>
                           </div>
                        </div>
                        <div class="form-row ">
                           <div class="col-md-12 mb-3">
                              <p class="label-pb" id="nameBook">Ngày sinh</p>
                              <input type="date" class="form-control form-control-eu" id="birth" value="10/06/2000" required>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3 col-pb">
                              <p class="label-pb" id="year">Giới tính</p>
                              <select class="form-control form-control-gender">
                                 <option selected>Choose...</option>
                                 <option>Nữ</option>
                                 <option>Nam</option>
                                 <option>Khác</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3 ">
                              <p class="label-pb" id="quantity">Số điện thoại</p>
                              <input type="text" class="form-control form-control-pb" value="0355847056" required>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <p class="label-pb" id="expired">Mã số thẻ</p>
                              <input type="text" class="form-control form-control-pb" id="timeToExpired" value="18021198" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col float-right">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                              <a class="btn btn-primary" href="book.html">Chấp nhận</a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

<!--############################################################################################################################-->

         <!--See Information Modal-->
         <div class="modal fade" id="informModal" tabindex="-1" role="dialog" aria-labelledby="informLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content-info modal-content-iu">
                  <div class="modal-header">
                     <h5 class="modal-title" id="informLabel">Thông tin người dùng</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <!--php lo-->
                  </div>
               </div>
            </div>
         </div>

         <!--#########################################################################################-->
      
      <!--Delete book modal-->

      <div class="modal fade" id="deleteModal">
         <div class="modal-dialog" role=>
            <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
               <h4 class="modal-title">Xóa bản ghi</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">                     
                  Bạn có chắc chắn muốn xóa <span><b></b></span>?
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                  <form action="delete.php" method="post">
                     <input type="hidden" name="delete-id" id="delete-id"></input>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                     <button class="btn btn-primary" type="submit">Chấp nhận</button>
                  </form>
               </div>

            </div>
         </div>
      </div>

      <!--Hết modal delete book-->
      </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
   </body>
</html>