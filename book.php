<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
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
      <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('.see').click(function(){
               var bookCode = $(this).data('id');
               // AJAX request
               $.ajax({
                  url: 'see-book.php',
                  type: 'post',
                  data: {bookCode: bookCode},
                  success: function(response){
                     // Add response in Modal Body
                     $('#see-informbook-Modal .modal-body').html(response);

                     // // Display Modal
                     //  $('#see-informbook-Modal').modal('show'); 
                  }
               })
            });

            $('.edit').click(function(){
               var bookCode = $(this).data('id');
               // AJAX request
               $.ajax({
                  url: 'formdisplay.php',
                  type: 'post',
                  data: {bookCode: bookCode},
                  success: function(response){
                     // Add response in Modal Body
                     $('#edit-informbook-Modal .modal-body').html(response);

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
                        <h3 class="m-0 font-weight-bold text-primary">QUẢN LÝ TÀI LIỆU</h3>
                     </div>
                     <div class="card-body">
                        <div class="col-sm-12 col-md-6">
                              <div id="dataTable_filter" class="dataTables_filter">
                                 <form>
                                    <a class="btn btn-primary-add " href="#" data-toggle="modal" data-target="#add-book-Modal" id="add-book"><i class="fas fa-plus" style="display: inline;"></i>Thêm</a>
                                 </form>
                              </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT b.bookCode, b.bookName, a.authorName, c.categoryName, p.publisherName, b.publishYear, b.quantity FROM books b
                    INNER JOIN authors a ON a.authorCode=b.authorCode
                    INNER JOIN category c ON c.categoryCode=b.categoryCode
                    INNER JOIN publisher p ON p.publisherCode=b.publisherCode";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Tên</th>";
                                        echo "<th>Tác giả</th>";
                                        echo "<th>Thể loại</th>";
                                        echo "<th>NXB</th>";
                                        echo "<th>Năm</th>";
                                        echo "<th>SL</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['bookCode'] . "</td>";
                                        echo "<td>" . $row['bookName'] . "</td>";
                                        echo "<td>" . $row['authorName'] . "</td>";
                                        echo "<td>" . $row['categoryName'] . "</td>";
                                        echo "<td>" . $row['publisherName'] . "</td>";
                                        echo "<td>" . $row['publishYear'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>";
                                            echo "<a class='see' href='#' data-toggle='modal' role='button' data-target='#see-informbook-Modal' data-id=".$row['bookCode']."><span class='fas fa-fw fa-eye' title='View Record' data-toggle='tooltip'></span></a>";
                                            echo "<a class='edit' href='#' data-toggle='modal' role='button' data-target='#edit-informbook-Modal' data-id=".$row['bookCode']."><span class='fas fa-fw fa-pencil-alt' title='Edit Record' data-toggle='tooltip'></span></a>";
                                            echo "<a class='delete' href='#' data-toggle='modal' role='button' data-target='#deleteModal' data-id=".$row['bookCode']."><span class='fas fa-fw fa-trash' title='Delete Record' data-toggle='tooltip'></span></a>";
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

      <!--####################################################################################-->

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

      <!--####################################################################################-->

      <!--Add Book Modal-->
      <div class="modal fade" id="add-book-Modal" tabindex="-1" role="dialog" aria-labelledby="add-book-Label" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content-info">
               <div class="modal-header">
                  <h5 class="modal-title" id="informLabel">Tạo thông tin sách</h5>
                  <button class="close dismiss" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="create-book.php" method="post">
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputNameBook">Tên sách</label>
                        <input name="bookName" type="text" class="form-info" id="inputNameBook" placeholder="Tên sách">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputAuthor">Tác giả</label>
                        <select name="authorName" class="form-info" id="inputAuthor" >
                           <option value="" selected>Tác giả</option>
                           <?php
                              $sql1 = "SELECT * FROM `authors`";
                              $query = mysqli_query($link, $sql1);
                           ?>
                           <?php
                              while($row1=mysqli_fetch_array($query)):;
                           ?>
                           <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                           <?php endwhile;?>    
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputCategory">Thể loại</label>
                        <select name="categoryName" class="form-info" id="inputCategory" >
                           <option value="" selected>Thể loại</option>
                           <?php
                                 $sql1 = "SELECT * FROM `category`";
                                 $query = mysqli_query($link, $sql1);
                              ?>
                              <?php
                                 while($row1=mysqli_fetch_array($query)):;
                              ?>
                              <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                              <?php endwhile;?>    
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputPublisher">Nhà xuất bản</label>
                        <select name="publisherName" class="form-info" id="inputPublisher" >
                           <option value="" selected>Nhà xuất bản</option>
                           <?php
                                 $sql1 = "SELECT * FROM `publisher`";
                                 $query = mysqli_query($link, $sql1);
                              ?>
                              <?php
                                 while($row1=mysqli_fetch_array($query)):;
                              ?>
                              <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                           <?php endwhile;?>    
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputPublishYear">Năm xuất bản</label>
                        <input name="publishYear" type="text" class="form-info" id="inputPublishYear" placeholder="Năm xuất bản">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputQuantity">Số lượng</label>
                        <input name="quantity" type="text" class="form-info" id="inputQuantity" placeholder="Số lượng">
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputExpired">Thời hạn mượn</label>
                        <select name="duration" class="form-info" id="inputExpired" >
                           <option selected>Thời hạn mượn</option>
                           <option>50</option>
                           <option>100</option>
                           <option>150</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-text">
                        <label for="inputURLImage">Ảnh sách</label>
                        <input name="bookImage" typ="text" class="form-info" id="inputURLImage" placeholder="Điền link ảnh...">
                        </input>
                     </div>
                  </div>
                  <div class="modal-footer modal-footer-ab">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal" class="dismiss">Hủy</button>
                     <button class="btn btn-primary" type="submit">Chấp nhận</button>
                  </div>
                  </form>
               </div>
               <!--Hết modal body-->
            </div>
         </div>
      </div>

      <!--####################################################################################-->

      <!--See Information Book Modal-->
      <div class="modal fade" id="see-informbook-Modal" tabindex="-1" role="dialog" aria-labelledby="seeinformBookLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content-info" id="see-pb">
               <div class="modal-header">
                  <h5 class="modal-title" id="informBookLabel">Thông tin sách</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  <!--php cũng lo chỗ này rồi-->
               </div>
            </div>
         </div>
      </div>

      <!--####################################################################################-->

      <!-- Edit Information book modal-->
      <div class="modal fade" id="edit-informbook-Modal" tabindex="-1" role="dialog" aria-labelledby="informBookLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content-info">
               <div class="modal-header">
                  <h5 class="modal-title" id="informBookLabel">Chỉnh sửa thông tin sách</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                  </button>
               </div>
            <div class="modal-body">
               <!--php lo chỗ này rồi-->
            </div>
            <!--Hết modal body-->
      </div>
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
                  <form action="delete-book.php" method="post">
                     <input type="hidden" name="delete-id" id="delete-id"></input>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                     <button class="btn btn-primary" type="submit">Chấp nhận</button>
                  </form>
               </div>

            </div>
         </div>
      </div>

      <!--Hết modal delete book-->

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