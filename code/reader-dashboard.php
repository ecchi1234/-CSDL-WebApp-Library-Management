<?php
// start session
session_start();

// check login

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
   header("location: index.php");
   exit;
}
else{
   require_once "config.php";

   $sql = "SELECT datediff(expiredDay, DATE(NOW())) AS dayLeft FROM card WHERE cardNumber = ".$_SESSION['id'];

   if ($result = mysqli_query($link, $sql)){
      if($row = mysqli_fetch_array($result)){
         $dayLeft = $row['dayLeft'];
         if ($dayLeft <= 0){
            echo "<script>alert('Thẻ của bạn đã hết hạn, hãy liên hệ thủ thư để gia hạn thẻ!')</script>";
         }
      }
   }
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
         <li class="nav-item active"  style="background-color: #31dc89;">
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
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <h3 class="m-0 font-weight-bold text-primary">TRANG CHỦ</h3>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="img-lib-help ">
                           <blockquote><i class="quote">"Lonely? Don't worry! Every book can be your best friend!"</i></blockquote>
                           <div class="quote-2"><i>Lãnh hội tri thức mỗi ngày với DEADLIB !!!</i></div>
                           <div class="title-help">THƯ VIỆN ĐỌC VÀ MƯỢN SÁCH ĐIỆN TỬ</div>
                           <a class="btn btn-help-back " href="borrow.php?page=1">Let's read!!!</a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="card card-help-1 mb-3" style="max-width: 18rem;">
                              <div class="row"><i class="fas fa-fw fa-users icon-help-1"></i></div>
                              <div class="row number-help-1">300.000+ người dùng</div>
                           </div>
                        </div>
                        <div class="col">
                           <div class="card card-help-1 mb-3" style="max-width: 18rem;">
                              <div class="row"><i class="fas fa-fw fa-book icon-help-1"></i></div>
                              <div class="row number-help-1">10 triệu+ đầu sách</div>
                           </div>
                        </div>
                        <div class="col">
                           <div class="card card-help-1 mb-3" style="max-width: 18rem;">
                              <div class="row"><i class="fas fa-fw fa-map-marked-alt icon-help-1"></i></div>
                              <div class="row number-help-1">Đọc mọi lúc mọi nơi!</div>
                           </div>
                        </div>
                     </div>
                     <div class="row book-favo-help">Những cuốn sách được yêu thích nhất</div>
                     <div class="row ">
                        <div class="col-md-4">
                           <div class="card card-book-help" style="width: 20rem;">
                              <img class="card-img-top" src="https://salt.tikicdn.com/cache/200x200/ts/product/8f/40/91/31bf4ef5cee626cae1c9c0b0ddad5c96.jpg" alt="Card image cap">
                              <h5 class="card-title name-book">Nhà thờ Đức Bà Paris</h5>
                              <div class="row">
                                 <p> <a class="btn btn-primary btn-primary-book" data-toggle="collapse" href="#book-help-1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Chi tiết</a></p>
                                 <p> <a class="btn btn-danger btn-danger-book" data-toggle="collapse" href="#book-detail" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Mượn</a></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="collapse multi-collapse" id="book-help-1">
                                    <div class="card card-body-book-detail">
                                       <p class="card-text card-text-book">Tác giả: Arthur Conan Doyle</p>
                                       <p class="card-text card-text-book">Thể loại: Trinh thám</p>
                                       <p class="card-text card-text-book">Nhà xuất bản: Văn học</p>
                                       <p class="card-text card-text-book">Thời hạn: 50 ngày</p>
                                       <p class="card-text card-text-book">Tình trạng: Còn sách</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card card-book-help" style="width: 20rem;">
                              <img class="card-img-top" src="https://salt.tikicdn.com/cache/200x200/media/catalog/product/i/m/img521.u335.d20160401.t100806.jpg" alt="Card image cap">
                              <h5 class="card-title name-book">Thần thoại Hy Lạp</h5>
                              <div class="row">
                                 <p> <a class="btn btn-primary btn-primary-book" data-toggle="collapse" href="#book-help-1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Chi tiết</a></p>
                                 <p> <a class="btn btn-danger btn-danger-book" data-toggle="collapse" href="#book-detail" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Mượn</a></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="collapse multi-collapse" id="book-help-1">
                                    <div class="card card-body-book-detail">
                                       <p class="card-text card-text-book">Tác giả: Arthur Conan Doyle</p>
                                       <p class="card-text card-text-book">Thể loại: Trinh thám</p>
                                       <p class="card-text card-text-book">Nhà xuất bản: Văn học</p>
                                       <p class="card-text card-text-book">Thời hạn: 50 ngày</p>
                                       <p class="card-text card-text-book">Tình trạng: Còn sách</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card card-book-help" style="width: 20rem;">
                              <img class="card-img-top" src="https://salt.tikicdn.com/cache/200x200/media/catalog/product/c/h/cha%20con%20giao%20hoang%20-%20bia%201.u335.d20160701.t101021.jpg" alt="Card image cap">
                              <h5 class="card-title name-book">Cha con Giáo hoàng</h5>
                              <div class="row">
                                 <p> <a class="btn btn-primary btn-primary-book" data-toggle="collapse" href="#book-help-1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Chi tiết</a></p>
                                 <p> <a class="btn btn-danger btn-danger-book" data-toggle="collapse" href="#book-detail" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Mượn</a></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="collapse multi-collapse" id="book-help-1">
                                    <div class="card card-body-book-detail">
                                       <p class="card-text card-text-book">Tác giả: Arthur Conan Doyle</p>
                                       <p class="card-text card-text-book">Thể loại: Trinh thám</p>
                                       <p class="card-text card-text-book">Nhà xuất bản: Văn học</p>
                                       <p class="card-text card-text-book">Thời hạn: 50 ngày</p>
                                       <p class="card-text card-text-book">Tình trạng: Còn sách</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row book-favo-help why-title-help">Tại sao nên chọn DEADLIB? </div>
                     <div class="row">
                        <i class="why-text-help">Ra đời từ năm 2020, đến nay, DEADLIB có hơn 3 triệu người dùng và hơn 13.000 nội dung điện tử đa dạng về thể loại, bao gồm: Kinh doanh, kỹ năng, văn học, khoa học – công nghệ, văn hóa – xã hội, thiếu nhi… Kho nội dung của DEADLIB liên tục được cập nhật, bổ sung những đầu sách “best seller” trên thị trường của các nhà xuất bản, công ty phát hành, các tác giả trong và ngoài nước.</i>
                        <i class="why-text-help">100% nội dung trên DEADLIB là nội dung có bản quyền. DEADLIB cam kết là nhà cung cấp dịch vụ và đối tác uy tín của bạn, hoạt động vì quyền lợi và sự phát triển bền vững của các bên.</i>
                        <i class="why-text-help-1">Đối với độc giả:</i>
                        <br>
                        <i class="why-text-help-2">+ Đọc cả kho sách điện tử hoàn toàn miễn phí.</i>
                        <i class="why-text-help-2">+ Đăng ký tài khoản nhanh chóng, thuận tiện. Hỗ trợ đăng ký từ các tài khoản Mạng xã hội như Facebook, Google+.</i>
                        <i class="why-text-help-2">+ Sách mới được lựa chọn và cập nhật liên tục bởi đội ngũ biên tập viên giàu kinh nghiệm.</i>
                        <i class="why-text-help-2">+ Đọc sách mọi lúc, mọi nơi, đồng bộ nội dung và lịch sử đọc sách trên đa màn hình, đa thiết bị.</i>
                        <i class="why-text-help-2">+ Cơ hội được hưởng thêm những quyền lợi ưu đãi hấp dẫn khi trở thành thành viên của DEADLIB</i>
                        <i class="why-text-help-1">Đối với nhà xuất bản, nhà phát hành, tác giả độc lập:</i>
                        <i class="why-text-help-2">+ Được tạo kho sách riêng biệt và phát triển thương hiệu trong mảng sách điện tử</i>
                        <i class="why-text-help-2">+ Được tiếp cận và giới thiệu tác phẩm đến với hơn 3 triệu người đọc trên nền tảng DEADLIB một cách nhanh chóng và hiệu quả nhất.</i>
                        <i class="why-text-help-2">+ Bản quyền sách số được bảo vệ: Nội dung số được bảo vệ bằng công nghệ DRM, tránh sao chép và tái sử dụng nội dung.Tất cả các trường hợp vi phạm bản quyền sách đều được xử lý nhanh chóng và nghiêm ngặt.</i>
                        <i class="why-text-help-2"> + Được hỗ trợ về công nghệ và nhân lực để khai thác phiên bản sách số với doanh thu tối ưu.</i>
                     </div>
                     <div class="row book-favo-help why-title-help">Độc giả nói gì về DEADLIB </div>
                     <div class="row">
                        <div class="card mb-3 card-reader" style="max-width: 1147px;">
                           <div class="row no-gutters">
                              <div class="col-md-4">
                                 <img class="rounded-circle img-reader-comment" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhAQDw8VFRAQFRAVDw8PDw8QEBUQFRUWFhUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGhAQGC0dHR8tLS0tLS0rLSstKystLSstLS0tKy0tLSsrKy0tLS0tLS8tLzUtLSstKy0tMDUzKy0tK//AABEIAKsBJwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAACAAEDBQYEBwj/xAA9EAACAQIDBAcGBAYCAgMAAAABAgADEQQSIQUxQVEGImFxgZGxEzJCocHRFCNy4QczUmLw8YKSssIkQ2P/xAAZAQACAwEAAAAAAAAAAAAAAAAAAQIDBAX/xAAoEQACAgIBAwQCAgMAAAAAAAAAAQIRAyExBBJBEyIyUWFxodEjM4H/2gAMAwEAAhEDEQA/APGwY94wjxEwgYYggSRRBjHEePaOBEAwETi4hGJYhkOWTYVVv1zZRqbe8ewdpgmSUKRYgAXJIAHbLUVM0+y9oYnEMlDD2o0UGiUxZUXmx3sx58TPTej+ANlTMzHizsSb8+wSh6O7IWjTVQNd7txLfblNZs+rl0HHfztymlKkZpyTejVYCkiAW/7cSezslgjSm2e2a7tuXy7pa0CTqfASmRZFk4jxrxAyBMNYUBTETEMOKMI8QxRRRRgKKKKACjHsjxRAYTpttnD5Wwu0MM4Rh1KyWcqeDre3ynge1ECs4VsygkKwBAYX0IB1F59LdN9iDFYWotvzKYLUjxuNSviPpPmzbFErcHgYMlEpiZMjSIiHTMTGg3aQZobSIwodkyvHvIhHLwoLJbxi0jLQbwoCXNGjXiiGc14QMjJiBkiBOpkoM5gZIGiJHQDCBkCvCBioZIZPg6qg2dcyHeL2Pep4GcbGIGAma3AbBw1fWnWbtTq5h3i00GyuilCmyv1mZSCCzaXHYLTzenVKkFSQRuIJBHjPVOitGsKQbEVCzNYhWt1V4AneTNWOn4MuW15L+hTtOyhOdRJaTay1lBpMMb5KQ3D3u07zLlqoUa7uAlFsM+853Ab+/wD1DbGZ3ufdHDsEqastT0XVKpcXPH0jU6+ZrDcJUYvHfCP+X2nXshrhj3SDiSUi1vFAvHvI0TslBhXkamPmkSQRjwTGBgAUe8Ex7wGPFBYxw0AEe2fOH8SdkHD4qrT+G+Zf0tqJ9HEX0nmH8QuimJx2JQ0aegRVao3VQEE6k91t0ATo8IYWkVVps+nmyKeDelg0bO1FC2IqDQNWqG+g4AKFmKrb4miSdoEVIWeRWitALJbxt8C8cNAdhwIcVoANeKNeKArImggx7xoASRwYIMUBkyQ80iVoeaIYca8jNSHSiA0fRTZQrVMzjqU7Ejm3Ad2k9A2TtAVXdaetOloz8C/9K93Oeerj/ZYZaaGz1szORoQl7DztNr0RpinQopfrVFNQjjrb7qJqxPVGXNzZqLw0kN90JWlxQWVLFEIVHxEX7hIxXInIGhXiodnT7TWX2ya1kPawEzQMs9n1/dXmymRktDT2ag1Re3dJbyjq4z8y1+IHkZY4fFAm3O/yMqcSxM7QY95HeEpkCyyS8FT8orxjvHb/AJ94h2HeK8aM0ACgIdbeH1EZn0v4wM17EcR6H94BZOTM90w6VU8DRLEhqrA+ypA6k8zyUc5dGsAbE79xnlf8ZNjZMmMQdVzkqjk3wt46jygFnlG3Me9ao9So2Z6hLO3Mn6Sked2IM5TIltEEcNDdJGRAVD74+WBHvAA80djIyIQgA0UeNGBAsKBJFiEh7RScUY3sIDIQY5N5L7GL2UKDYCSURloyVMOYUMkFQnfwAHgBabTo9tLNiqS30/Doij+7KGP+dky+zKFMVENZS1K/5io2V8v9p5z0jZuxcCMtXD0mPFXq1TUPgBYCW4k7Ks2lsus2h8BJb8O75/6kXGw4/YiEh1Hh6GaTIT3hXkanXujNU3mAEmeTUK+Ug8j6Srp1SajcgoHje5k/tPlvkU0xtUWC4jW/beWWy8R117/X/czmFr3UNzlps+rqp7RB7Q1ybNX0J5Xj0n4cgJX0q/5dRu1h52t6xYPE3qAc1EpaLEzqXHqcw+JCbg8QNDaHja9lBHYQf875ldoM1OqSdz6juMszic2GDE6owv3HT6yuD7iySaLnDVw1xzHz4zoRrjt498zGBxhDDXjNEj7+2x89PpJNEYuyKu9iO9h4EX+sekTnI4Zcw7zb7Sv2xVs1v0mS4LFXGY8Cqnusdfn8oUF7ObpLV/Lb+5XB4aEXHjrPN9vdKPxew39ob1krUaTniSCGDeKj1mo/iBtcUqNYXswuq/qa4HrfwnhtauRTNEHqlw7a6Ehcq6eLecb0hxVuytrmc950VKUjNKVF9ERaCTJTSiWnACK0YiGywLQEISQSO8kEACVYo4jwJHBCUxowjKzspPJLzkRrSX2ogSTJjEsiFUQhVEB2dCLOlROAVpKuIiodlhTM0XRJWz1ajVWShh0NSqAdCToq27T6TIrXncm0yKFWip0qvSL8yEDWHmbyUdOxT2qPR9g7W/EB3tYK+VBxy2G/tlqujAcOHz+8866HbS9n+IueqKZe3aDl9Gm9TFrdV0zNdg3JFFreJL/9RNHfpGN49s689h2n6zkq4jfbcNBIsZiraDfuHYJW4jFBQLm3Lfv8JXlzKGieLC5bLLDvqe6SYqp1SOLen+pXYSvcFr2A3k3t87SN9oKx3jkCCtvWVxbji/LLJRUsv4Rb0nyoByE7cDV0HYBKKpih7txppa438fpLHB1N/Zb5AS+Mt0UzjqzUDFWw4HF3PkAD9pFsrGXrrruH3lLXxRygcAdB2m1/T5SHBY8U6hdzZRYHXcN0Uwhs2/SHB3oq3FAL9xt9ZwbMpGpQq0r2LZMp7SxH0nDj+maVL01yIrA9aobdXsvb0kezto0waJZuqub2qkkjeWS6+MxR+bNUl7UFTcqbHeND3iafCYm9MN2KPJx95nNoY2jXfNh7lhYVFCsNeHDfYHy7504aufYt/aQT3Ej6kTTF3FGeS7ZHVt2t1zyXeQCbADebbhrvleMWVBF9DvhJtcLVAIBWufZNe9wHIUW8cvhKH8VdF1GbKu/dcjjJxduhSjqzNfxFq1XqIXv7NlujfCzbmPeNBb7zAVjNttDpjZalDEYRX11p1GJUPwYEAEeG8TCYnEBiSABfgL2HdeVzNGK6I2aAWglxALyBMlvAvBzxs0AHMhJjs0EmBEcwkkckBgCJIpGWiiJWQEQYTQYyDHijxoxIeEIIENREMMSVRI1MkBgSRIohWgAw7xDJ8HiMhbkysp7iPvaeg7Dq5sPhKpNyoamx4hhWqmx/4unmJ5oTrNT0P2kBnwzmwr29kx3LXGi9wbd5co5N1a8EVy0berRzBmHw5b9xLft5zhrUAwsw0ln0fqe1d6ZFmqJUXKd4cDOARzvTtOWoliRMvVP32X9P8KI6aMAFGUi1iKqmoCO3UTqwGyG1FKigvvyI5I7rsbQaRmkwm28lA01HW1GbsP1lfrzfLJelFcIyOM2cA92HWU8Od534G+XvMjxb3N5NgzuUeMv6fLVyl4Kc+O0kkXGH2JUqhCON8gPGw1bu3ecgwmwnwzljTBJIP5i50uOI57zPQNk0QKdM8cijwtLDIJOTlPdkUlFUZY4NMWqrVSgSt7BqDhhfflZagNp30NiEKEDU0RQwUUMOENmtfVmbXQa2vLn2C/0jyEO0cU/Im0VGG2JSpAFV1Uklm1J6rD679+nYJT1cNkwrsd9R1t+ka/Sa2otwRzmb6W1woRL2VVZ2HC25fRpOLohJWZbB0xUrqp92llqMb6DKS3/qPOec9IdoMv4bEUahGenlJG45TezA6H3j5Gabpftr8Jh2orpi8YCXHGjhmsNeTPbdwE8wqYtshp3ul82U8G5jkbaSMJu2/ss7NJfRNtPaT1iDUykj4giq1uRPEStJiZoBjuw4GaDE0a8YD3jExoJMBDmNHBjQENCvGigMe8eNaKMCKKNHiEPGijRiDAhQQYV4iQgZKpkUIGAEwMLNIQY+aIdhsZJSeQExI0kiLPVOimNZxQxVyatMg1P/ANBTIu36so157+c0nSXBinWbL7rdZLbsrazFdAKv5Li/uVLggkEaA3B4T0TFoK2DpONWoflPxNh7pPgV85R1OL29xZhye6jNpJLyM6QhMBsGYXnXgF1E5hOrBHUQE0epbN/l0/0r6TtEr9kNelT/AErO8Gb4cIxS5HiiilpEYzKdI66JmqsA9QtahTPujJ1c7jiA2Y99vDTYuuER3O5QT32G6eVbUxB9kWJucpYkkknefvpCMe50KT7VZ5JtzGtVrVqrMWZ3clmN2OunylUWh1GkN4Vss8CJjXjMYMBDkwTFGJjExExiY1414AEDFGiEYgogY14ohhx4KmKMCIxo5gwIhRo4iMAEIQMGK8Qw44MG8V4AHePeBmjgwGSCdWCwRc3Oi8+fdDwGCzdZvd9f2lvTUEMF0yKTpu0tpF+jdh6eKj6mbS+vLLbYOIWiuUaBqtNSO8MDeb7YGOVXelUNqVdFVidytqFbwIt49k8jFWygX+LN5DT6zZ4bG56jj+kU/IrePL/q2ZHJTzXFUi6x1Eo7KRqpIMiUwauKLWDnrAWDHiBuBPMbu23ZGUzls2IlEkokggg94O7/AHIWBO4+Nrx6KG9s5v8A8PtEBvNiYypUCU06qqBmfe3hfd/m6aynumL2Jh3QAnE2Xfoaf1Wa/Cm4Bz5lIuDYX8xofKasL0Zci2dAiMa8r9q7SFJdNaje4v1PYJocklZVRy7cr5itEbveqdw1A+V/Ac55rteqBTI4+zYgdgXX1HnN5Rpn2Ves2rFKmp4nKST/AJynlXSDFha9EE9TI6t3PYX81HlJdO7tsjk1RjsThEqaqbN8vESkxWHZDZhaXLLlNuI0nQtqi5ai3A48j2GDVHQXp9Rx7ZfwzKkxXlhtPZrU9Rqh3MPQ8jK0xmScJQdSVMe8EmCWjEwKxExRrxCABXj3gx4wCjwRCgAhFEIoAATBjmNAQQijRQGhGNeOYMAJVEfLI1Mlo0yxAUXJgNK9ISpLTBbNt1qngv3nRhcGtMZm1bny7p0IhqB8vwjNbmLi8jzwdCOHH0678234X9kVWvwXzk+APVrfo/8AYSPCYFqhsg3b+6SsnswwO9lHqD9JZGNGPP1EssrkcRmh6N1S1SqTxC/LQTOtvM0PRZDmc8CAB4b5Vn+DIYvkjTFLiCjEHKfA8/3kyxqlO4tObZuJqZky4dW3qD3iVtDEFTlffwPA/vL7Y6B3VeZAiaFZabA2MGYWQWG823TfUVygAbhoJyYKiqKAosJw7d2/Tw6Elhm4DtmnGu1bM0nbO3a21Forc6sfdXiTMtRL1ql2N2cjuA5DslWMY9Y+0e923A/Cv3ms6N4Kw9oR2L9TIOTySoK7UdO2vysHiCPgo1SL9iGfPu1q2YUid4Qg+DNPoTpQmbCYlf6qTr/2FvrPnHaKlWZGFipsZsg6dFMt7OQmXfR6iHFZDxS47x/uUQM0nQ/+Y36D/wCQmgjbWwcVserTpLVZM1F7KTbQMRfKR9Zl9pbG3tS1HFOI+4nuVTCK+FVCOFRrHdpp6Tzza+yDTJen7u8rfUd3MSEoVtHSxZ8fULszafh/2eZulpGZrMdg6dTVhlb+ofUTLV0AYgG4B3jcZFOyjqemlglUiOEIIjxmYKKMIoAEDHvBEeABAxRo0AHaDCaBeDEPGMeCYAImMYooDHUzS4CmqpdNbi9+JMzVpabKqOu/3DwO/vAikjX0WaOOdy8+fr8nY7knX9pf9GKQLX71I79R6GUtWnfrLLbovWtWUX0bT6iTg0VdVCcZPu3fn7NbsLo8RUqn/wCuwIPZfUeFxMv0toZKum7KLeBInqmx6v5FZRvUFgfD9hPOOm4uyNx63rf7yx8GNMyirdgOZHzm02bQCkgbgF+cyezkvVpj+5flrNvhk3k8T8hoJh6mXg2YF5OoQ4AhAzEaTkx1G9u+3n+9pFgdrPQbrXOU6G/WHnv/AGnbWW4I48O/eJyYnCCoARoeBk01wxNfRcVenlTLYE+OVfmNZUYKtUxVT2tU3Vdw4E77AcucqhsxzUCHdvvv04mbDZeEACqo0G6OTSWiCX2XexcEXYDn6TfYekFUKNwlV0fwHs1zH3m+Ql1LsMKVlE5Wys6RD/49XuH/AJCeIdNsEuU1QOsttRxUm1j5z3jaWH9pSqIN7KwHfbT52njvSmlmp1RzVtOINr2PbDI2ppkobTR5teaPok/5luJt5C5PoJmjLrotUtWQn3Rq1v6Qbn6TdEzM9I2/tP2KZAdVpKp/U+v1mK2ljWrFaNK5FwNN7Ny7pHtjaRru5voXZj6AevnNRsDow9Oj+JIIcEFb3sq8QRxJF7+AjfudI39PCOGHrT58I8s6QJWR2pVKbU8u9HUqx7+yULoZ9VvsfDbRw4pYqkGK6K+gqpwurcCNRyNp5J0p/hZi8Kxq4ce3pKcyvTW9QW1Gen9riVuNcGfJllll3SZghgk/Ce2sfaZrXud2a1rbpUzY4mrVGGLt/NRx8IFrNbUSux1JauH/ABBQLUVgHy6BtQPqJjxZZJvuXMq54/H6NmbBCSXY9qKfFWvL/ZQCKdtWgoznKwCswy5hfeo323ax2wajNcnq30B1K2Yj4dPd5mafURj9KVnEI87RhVshOazFALFbjPrvtraCmGQqGuQGvYFgbWvyXXdu0h6iD0pHLGjXjyZWKNHMYQEPBMKEogAASXezejNetY5Mqn4n08hvmm6KbNpezFT2Yz/1G5Pz3TW01EsjAi5UYw9FkoUzUKmpUA0uOqDzy9koXW09TqCYXpHRVahygC4BNucbjQosqaNXKeydI6pDoe3T1nFOrCHfKpa2dHpZer/hnx4/B6Z0U2sKijX31ZHHJiPvbzmS6XNdh2Zh6H6wOi1UiqQDYWvbtBFoulZ647vvLrtHOlGpUVmxFvXp+J+Rm2pzGdH/AOcnc31mzSc7qfkbcHxJBCvAEcTKXBGR0Tqy8tR3H97wjAT3z+lfVowOyhRF721Nte6bDo1svMQ7Dqj5mZvZq6iek7OQBEAFtB6SeOPcyrJKkdq6Qla85cYxCm0np7hNaZmYZnnnTbY4VmqruqXuOGbj9T4mehmZ/pcoOHe43ZbecjlVonj5PmuulmYciR85Z7LfIlR/iayJ3nUn0nHtP+bU/W/qZPhTqg4AEgdpM0xftsjjh35FH7ZsP4f7B/EV1BHUp2Z7jS/AfXwntrYRfZmmB1bWAmP/AIUUVGFdwBmaqQTxICiwm3guC/rJXlcfEdGU2DWNOqEO5rr/AMl6p9AfOayYjaLWqm2mWspFuBNYqfkSJtFOg7hJzMiKPpD0Tw+LBzoFc76iqLn9Q+KebdI/4XV0o1EwuWorEHKLo4sQdAd+7nPZoxmd4YN91bL11GRR7b1tf8Z8jbT2PWpMUqo6sN6uGB8jK2oG3Em2uhJtrvn1xtnZNDEIy16KuADbMNRpwO8T5z6V4GnTrOqIAoJsLk+ssoqtmOJPM+cSuRoCR3EjST1lnOYgsaKKKMR//9k=" class="card-img">
                              </div>
                              <div class="col">
                                 <div class="card-body card-body-reader-comment">
                                    <h5 class="card-title">SAKATA GINTOKI</h5>
                                    <p class="card-text">2 năm là một khoảng thời gian lãng phí nếu như chỉ lướt facebook để like hình và status dạo. Nhưng 2 năm đến với DEADLIB sẽ là một hành trình dài của sự trải nghiệm từng ngày, mỗi ngày một cuốn sách- 1 bài học làm người. Cám ơn DEADLIB đã mang lại một ứng dụng đọc sách thông minh. Nhờ DEADLIB, có lẽ không chỉ tôi mà còn rất rất nhiều người đã ngày càng thích đọc sách hơn, thêm yêu cuộc sống này hơn, từ những câu chuyện của DEADLIB mà rút ra những bài học đắt giá để hoàn thiện bản thân mình..... cám ơn DEADLIB rất nhiều!!! Chúc DEADLIB ngày càng phát triển và có thêm thật nhiều đầu sách mới, nhiều độc giả mới !!! <3</p> </div> </div> </div> </div> </div> <div class="row">
                                          <div class="card mb-3 card-reader" style="max-width: 1147px;">
                                             <div class="row no-gutters">
                                                <div class="col-md-4">
                                                   <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/6d21d095af8a581a_2bcf88d82839fcdb_6527415370939299154671.jpg">
                                                </div>
                                                <div class="col">
                                                   <div class="card-body card-body-reader-comment">
                                                      <h5 class="card-title">HASEGAWA TAIZOU</h5>
                                                      <p class="card-text">Tôi chỉ biết cảm ơn cho những gì đã đọc ở đây. Chẳng biết xã hội này được mấy ai đọc những bài viết ấy và hơn nữa là trong số họ sẽ được mấy ai thấy hiểu và đưa nó vào cuộc sống này. Rất cảm ơn page đã liên kết giữa sách và người để từ đó con người hiểu nhau hơn và yêu cuộc sống này hơn. Yêu DEADLIB nhiều </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                 </div>
                                 <div class="row">
                                    <div class="card mb-3 card-reader" style="max-width: 1147px;">
                                       <div class="row no-gutters">
                                          <div class="col-md-4">
                                             <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/3922e1c1620753bb_f76e448a18647cbe_9878115370939445154671.jpg">
                                          </div>
                                          <div class="col">
                                             <div class="card-body card-body-reader-comment">
                                                <h5 class="card-title">KONDOU ISAO</h5>
                                                <p class="card-text">Tôi rất yêu sách, vì vậy cho nên khi gặp DEADLIB tôi vô cùng yêu thích. Tôi cài DEADLIB trên điện thoại, trên máy tính trong phòng làm việc của tôi, và đọc bất cứ khi nào có thời gian. Đọc sách giúp tôi cân bằng được bản thân mình trong cuộc sống và công viêc. DEADLIB chưa phải là tốt nhất, vẫn có những lỗi nhỏ nhỏ. Nhưng tôi vẫn yêu DEADLIB, chúng tôi hoàn thiện mình qua những trang sách, DEADLIB hoàn thiện hơn qua những góp ý của độc giả. Mong DEADLIB sẽ là cây cầu vững chắc nối độc giả với những cuốn sách hay.</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="card mb-3 card-reader" style="max-width: 1147px;">
                                       <div class="row no-gutters">
                                          <div class="col-md-4">
                                             <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/4da6f015f30fc8a4_87f9458a010e87c3_5799115370940098154671.jpg">
                                          </div>
                                          <div class="col">
                                             <div class="card-body card-body-reader-comment">
                                                <h5 class="card-title">OTOSE</h5>
                                                <p class="card-text">Tôi rất yêu sách và luôn muốn sở hữu cho mình những cuốn sách đối với tôi là quý. Nhưng không phải lúc nào cũng có thời gian tìm hiểu, tìm mua. DEADLIB là trang sách bổ ích, lời bình của ad rất hay, nhiều cuốn page giới thiệu hiệu sách cũng không có. Tôi thích nhất mục Cafe buổi sáng, nó là món quà ý nghĩa để bắt đầu một ngày mới</p>
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
                     <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                           <div class="copyright text-center my-auto">
                              <i class="footer-text-1">THÔNG TIN LIÊN HỆ</i>
                              <i class="footer-text-2">DEADLIB Corporation- Tầng 3, tháp văn phòng quốc tế Hòa Bình, số 106, đường Hoàng Quốc Việt, phường Nghĩa Đô, quận Cầu Giấy, thành phố Hà Nội</i>
                              <i class="footer-text-2">Email: phuongthaon10062000@gmail.com | Tel: 035.5847056</i>
                           </div>
                        </div>
                     </footer>
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