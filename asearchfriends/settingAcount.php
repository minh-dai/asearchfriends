<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login-user.php');
} else {
    include 'connect.php';
    if (isset($_POST["submit"])) {
        $tenhienthi = $_POST["tenhienthi"];
        $sdt = $_POST["sdt"];
        $diaChi = $_POST["diachi"];
        $tuoi = $_POST["tuoi"];
        $gioiTinh = $_POST["gioitinh"];
        
        $milliseconds = round(microtime(true) * 1000);
        if ($_FILES["file"]["name"] != NULL) {
            if ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/gif"
            ) {
                if ($_FILES["file"]["size"] > 1048576) {
                    echo "file quá nang";
                }
// kiem tra su ton tai cua file
                elseif (file_exists("" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " file da ton tai. ";
                } else {

                    $path = "images/"; // file luu vào thu muc chua file upload
                    $tmp_name = $_FILES['file']['tmp_name'] ;
                    $name = $_FILES['file']['name'] . $milliseconds ;
                    $type = $_FILES['file']['type'];
                    $size = $_FILES['file']['size'];
// Upload file
                    move_uploaded_file($tmp_name, $path . $name);
                    $image_path = $path . $name;
                    $id = $_SESSION["user_id"];
                    $sql = "UPDATE `user` SET `user_name`='$tenhienthi',`user_old`='$tuoi',`user_phone_number`='$sdt',`user_address`='$diaChi',`user_sex`='$gioiTinh',`user_image`='$image_path' WHERE user_id ='$id'";
                    mysqli_query($conn, $sql);
                }
            } else {
                echo "file duoc chon khong hop le";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Chỉnh sử thông tin</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index-user.php">
                                <img src="images/icon/friends_logo.png" alt="Friends" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">                            
                            <li>
                                <a href="map.php">
                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                            </li>
                            <li>
                                <a href="list-friend.php">
                                    <i class="fas fa-users"></i>Danh sách bạn bè</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-book"></i>Quản lý thông tin</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="account.php">Xem thông tin</a>
                                    </li>
                                    <li>
                                        <a href="settingAcount.php">Chỉnh sửa thông tin</a>
                                    </li>
                                    <li>
                                        <a href="change-pass.php">Đổi mật khẩu</a>
                                    </li>
                                    <li>
                                        <a href="gioiThieu.php">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="huongDan.php">Hướng dẫn sử dụng</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="index-user.php">
                        <img src="images/icon/friends_logo.png" alt="Friends" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">

                            <li>
                                <a href="map.php">
                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                            </li>
                            <li>
                                <a href="list-friend.php">
                                    <i class="fas fa-users"></i>Danh sách bạn bè</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-book"></i>Quản lý thông tin</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="account.php">Xem thông tin</a>
                                    </li>
                                    <li>
                                        <a href="settingAcount.php">Chỉnh sửa thông tin</a>
                                    </li>
                                    <li>
                                        <a href="change-pass.php">Đổi mật khẩu</a>
                                    </li>
                                    <li>
                                        <a href="gioiThieu.php">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="huongDan.php">Hướng dẫn sử dụng</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <form class="form-header" action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                                <div class="header-button">                                    
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="<?php echo $_SESSION["user_image"]; ?>" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"><?php echo $_SESSION["user_name"] ?></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="<?php echo $_SESSION["user_image"]; ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#"><?php echo $_SESSION["user_name"]; ?></a>
                                                        </h5>
                                                        <span class="email"><?php echo $_SESSION["user_email"]; ?></span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>

                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="login-user.php">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="card">
                        <div class="card-body" >
                            <div class="card-title">
                                <h3 class="text-center title-2">Chỉnh sửa thông Tin cá nhân</h3>
                            </div>
                            <hr>
                            <form method="post" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group" >
                                    <label for="cc-payment" class="control-label mb-1" style="margin-right: 10px">Ảnh đại diện</label>
                                    <img style="margin-left: 20px; margin-bottom: 20px" src="<?php echo $_SESSION["user_image"]; ?>" />
                                </div>

                                <div class="form-group">
                                    <input type="file" name="file" id="InputFile">
                                    <br>
                                    <label class="help-block" >Upload JPEG Files với dung lượng nhỏ hơn 100 KiloBytes</label>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Tên hiển thị</label>
                                    <input class="form-control" style="width: 30%;" name="tenhienthi" placeholder="<?php echo $_SESSION["user_name"]; ?>" >
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Email</label>
                                    <input disabled class="form-control" style="width: 40%;" value="<?php echo $_SESSION["user_email"]; ?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Tuổi </label>
                                    <input class="form-control" style="width: 10%;" id="tuoi" name="tuoi" placeholder="<?php echo $_SESSION["user_old"]; ?>">

                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Số điện thoại</label>
                                    <input class="form-control" style="width: 20%;" id="sdt" name="sdt" placeholder="<?php echo $_SESSION["user_phone"]; ?>">

                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Giới Tính</label>                                    
                                    <select style="width: 100px; margin-left: 10px;" name="gioitinh">					
                                        <option value="Nam" >Nam</option>
                                        <option value="Nữ" >Nữ</option>
                                    </select>
                                    </option>
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Địa Chỉ</label>
                                    <input class="form-control" style="width: 60%;" id="diachi" placeholder="<?php echo $_SESSION["user_address"]; ?>">
                                </div>
                                <div class="form-group has-success">                                    
                                    <button class="btn btn-info" type="button" id="submit" name="submit">Chỉnh sửa thông tin</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>
        <script src="vendor/vector-map/jquery.vmap.js"></script>
        <script src="vendor/vector-map/jquery.vmap.min.js"></script>
        <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
        <script src="vendor/vector-map/jquery.vmap.world.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document-->