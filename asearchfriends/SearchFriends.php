<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: login-user.php');
} else {
    include 'getFriendForId.php';

    $search = trim($_SESSION["search"]);

    if (CheckEmail($search)) {
        $query = "select * from user where user_email like '%$search%'";
    } else {
        $query = "select * from user where user_name like '%$search%'";
    }

    $new_friends = getFriendsWithSql($query);

    if (isset($_POST["search"])) {
        var_dump("search");
        die();
        $_SESSION["search"] = $_POST["search"];
        header('Location: SearchFriends.php');
    }

    if (isset($_POST["user_id"])) {

        $friends = getFriendsID($_SESSION["user_id"]);
        $mang = explode(",", $friends);
        
        // kiem tra co post["user_id"] khong
        $check = $mang.includes($_POST["user_id"]);
        
//        $check = false;
//        for ($i = 0; $i < count($mang); ++$i) {
//            if ($mang[$i] == $_POST["user_id"]) {
//                $check = true;
//                break;
//            }
//        }
//        var_dump($check);
       // die();
        if (!$check) {
            updateFriends($friends . "," . $_POST["user_id"]);
            echo TRUE;
        }else{
            echo FALSE;
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
        <title>Trang chủ</title>

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
                                <img src="images/icon/logo.png" alt="CoolAdmin" />
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
                                        <a href="#">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="#">Hướng dẫn sử dụng</a>
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
                        <img src="images/icon/logo.png" alt="Cool Admin" />
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
                                        <a href="#">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="#">Hướng dẫn sử dụng</a>
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
                                <form class="form-header" id="form_search" method="POST">
                                    <input class="au-input au-input--xl" type="text" id="search" name="search" value="<?php echo $search; ?>" />
                                    <button class="au-btn--submit" id="submit" name="submit">
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
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35">Tìm bạn bè</h3>

                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên bạn bè</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Email</th>
                                                    <th>Gửi tin nhắn</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($new_friends); ++$i) {
                                                    ?>
                                                    <tr class="tr-shadow">
                                                        <td><text id="user_id"><?php echo $new_friends[$i]->getUser_id() ?></text></td>
                                                        <td><text><?php echo $new_friends[$i]->getUser_name() ?></text></td>
                                                        <td>
                                                            <img src="<?php echo $new_friends[$i]->getUser_image() ?>">
                                                        </td>
                                                        <td>
                                                            <text class="block-email" id="email" ><?php echo $new_friends[$i]->getUser_email() ?></text>
                                                        </td>
                                                        <td>
                                                            <div class="table-data-feature">
                                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                                        title="Send">
                                                                    <i class="zmdi zmdi-mail-send"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table-data-feature" >
                                                                <button type="button" id="ketban" class="btn btn-danger">Kết Bạn</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by Group DHQ.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>
        <script src="vendor/jquery-3.2.1.min.js"></script>

        <script language="javascript">
            $('#submit').click(function () {
                var search = $("#search").val();

                if (search == "") {
                    alert("Nhập từ khóa tìm kiếm ");
                } else {
                    $.post("SearchFriends.php", {search: search}, function (data) {

                    });
                }
            });

        </script>      

        <script language="javascript">
            $('#ketban').click(function () {
                var user_id = $('#user_id').text();

                $.post("SearchFriends.php", {user_id: user_id}, function (data) {
                    if(data == true){
                        alert("Đã kết bạn ");
                    }else{
                        alert("Bạn đã tồn tại");
                    }
                });
            });
        </script>                               

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document-->
