<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login-user.php');
} else {
    include 'connect.php';
    if (isset($_POST["pass_old"])) {
        $password = $_POST["pass_old"];
        $password_new = $_POST["pass_new"];
        $pass_server = "";

        $email = $_SESSION["user_email"];
        $sql = "select user_password from user where user_email='$email'";

        $kt = mysqli_query($conn, $sql);

        if (mysqli_num_rows($kt) > 0) {
            while ($row = mysqli_fetch_array($kt)) {
                $pass_server = $row["user_password"];
            }
        }

        if ($pass_server != $password) {
            echo FALSE;
            exit();
        } else {
            $sql = "UPDATE `user` SET `user_password`= '$password_new' where user_email='$email'";
            mysqli_query($conn, $sql);
            echo TRUE;
            exit();
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
        <title>Đổi mật khẩu</title>

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
                                <img src="images/icon/friends_logo.png" alt="CoolAdmin" />
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
                        <img src="images/icon/friends_logo.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">

                            <li>
                                <a href="index-user.php">
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
                                                        <a href="account.php">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="settingAcount.php">
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
                <div class="main-content" style="padding-top: 0;">
                    <div class="card">
                        <div class="card-body" style="margin: 0 auto;padding-top: 150px;margin-bottom: 110px;">
                            <div class="card-title">
                                <h3 class="text-center title-2">Đổi mật khẩu</h3>
                            </div>
                            <hr>
                            <form>                                              
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Mật khẩu cũ</label>
                                    <input class="form-control" type="password" name="pass_old" id = "pass_old">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Mật khẩu mới</label>
                                    <input class="form-control" type="password" name="pass_new" id="pass_new">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nhập lại mật khẩu mới</label>
                                    <input class="form-control" type="password" name="pass_cf" id="pass_cf">
                                </div>
                                <div class="form-group">              
                                    <button class="btn btn-info" type="button" id="submit" name="submit">Đổi mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>

        <script type="text/javascript">
            $("#submit").click(function (e) {
                e.preventDefault();
                var pass_new = $("#pass_new").val();
                var pass_old = $("#pass_old").val();
                var pass_cf = $("#pass_cf").val();

                if (pass_new === "" || pass_old === "" || pass_cf === "") {
                    alert("Nhập đủ thông tin !");
                } else {
                    if (pass_new.length > 6 && pass_cf.length > 6) {
                        alert("Chiều dài mật khẩu quá ngắn !");
                    } else if (pass_new !== pass_cf) {
                        alert("Mật khẩu nhập sai !");
                    } else {
                        $.post("change-pass.php", {pass_new: pass_new, pass_old: pass_old}, function (data) {
                            if (data) {
                                alert("Thay đổi mật khẩu thành công !");
                            } else {
                                alert("Không đổi được mật khẩu!");
                            }
                        });
                    }
                }
            });
        </script>
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