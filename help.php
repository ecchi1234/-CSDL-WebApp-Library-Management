<?php
// start session
session_start();
if (!isset($_SESSION["aloggedin"]) || $_SESSION["aloggedin"] !== true) {
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
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
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
            <li class="nav-item active" style="background-color: #31dc89;">
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">GIỚI THIỆU VỀ DEADLIB</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="img-lib-help ">
                                    <blockquote><i class="quote">"Lonely? Don't worry! Every book can be your best friend!"</i></blockquote>
                                    <div class="quote-2"><i>Lãnh hội tri thức mỗi ngày với DEADLIB !!!</i></div>
                                    <div class="title-help">THƯ VIỆN ĐỌC VÀ MƯỢN SÁCH ĐIỆN TỬ</div>
                                    <a class="btn btn-help-back " href="borrow.php">Let's read!!!</a>
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
                            <div class="row book-favo-help" style="margin-top: 15%; margin-bottom: 7%;">Những cuốn sách được yêu thích nhất</div>
                            <div class="owl-carousel owl-theme">
                                <?php 
                                require_once "config.php";
                                 $sql = "SELECT bookCode,sum(quantity) AS total FROM actions GROUP BY bookCode  
                                ORDER BY total DESC LIMIT 30";
                                 $query = mysqli_query($link, $sql);
                                 $result_count = mysqli_num_rows($query);
                                 if($result_count > 0)
                                 {
                                     while($row = mysqli_fetch_assoc($query))
                                     {
                                         $sql = "SELECT bookImage FROM books WHERE bookCode =".$row['bookCode'];
                                         $query_t = mysqli_query($link, $sql);
                                         $row_t = mysqli_fetch_assoc($query_t);
                                         if($row_t != NULL)
                                         echo "<img src='".$row_t['bookImage']."'>";
                                     }
                                 }
                                 ?> 
                            </div>
                            </div>
                            <div class="row book-favo-help why-title-help" style="margin-left: 34%">Tại sao nên chọn DEADLIB? </div>
                            <div class="row">
                                <i class="why-text-help">Ra đời từ năm 2020, đến nay, DEADLIB có hơn 3 triệu người dùng và hơn 13.000 nội dung điện tử đa dạng về thể loại, bao gồm: Kinh doanh, kỹ năng, văn học, khoa học – công nghệ, văn hóa – xã hội, thiếu nhi… Kho nội dung của DEADLIB liên tục được cập nhật, bổ sung những đầu sách “best seller” trên thị trường của các nhà xuất bản, công ty phát hành, các tác giả trong và ngoài nước.</i>
                                <i class="why-text-help">100% nội dung trên DEADLIB là nội dung có bản quyền. DEADLIB cam kết là nhà cung cấp dịch vụ và đối tác uy tín của bạn, hoạt động vì quyền lợi và sự phát triển bền vững của các bên.</i>
                                <i class="why-text-help-1">Đối với độc giả:</i>
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
                            <div class="row book-favo-help why-title-help" style="margin-left: 34%">Độc giả nói gì về DEADLIB </div>
                            <div class="row">
                                <div class="card mb-3 card-reader" style="max-width: 1147px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/6d21d095af8a581a_2bcf88d82839fcdb_6527415370939299154671.jpg" class="card-img">
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
                                                            <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/6d21d095af8a581a_2bcf88d82839fcdb_6527415370939299154671.jpg">
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
                                                            <img class="rounded-circle img-reader-comment" src="https://i.imacdn.com/ta/2018/09/16/6d21d095af8a581a_2bcf88d82839fcdb_6527415370939299154671.jpg">
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
                                <!-- /.container-fluid --><footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <i class="footer-text-1">THÔNG TIN LIÊN HỆ</i>
                                        <i class="footer-text-2">DEADLIB Corporation- Tầng 3, tháp văn phòng quốc tế Hòa Bình, số 106, đường Hoàng Quốc Việt, phường Nghĩa Đô, quận Cầu Giấy, thành phố Hà Nội</i>
                                        <i class="footer-text-2">Email: phuongthaon10062000@gmail.com | Tel: 035.5847056</i>
                                    </div>
                                </div>
                            </footer> 
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
                                    <a class="btn btn-primary" href="login.html">Logout</a>
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
            <script src="./js/owl.carousel.min.js"></script>
            <script src='./main.js'></script>

</body>

</html>
