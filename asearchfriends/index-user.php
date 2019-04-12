<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login-user.php');
} else {
    if (isset($_POST["submit"]) && !empty($_POST["search"])) {
        $_SESSION["search"] = $_POST["search"];
        header('Location: SearchFriends.php');
    }

    include 'getFriendForId.php';
    include 'connect.php';

    $array_friend = getFriends();
 
    if (isset($_POST["myLat"])) {

        $position = 'lat: ' . $_POST["myLat"] . ", lng: " . $_POST["myLon"];
        // die();
        $id = $_SESSION["user_id"];
        //  $user = getUser($id);

        $sql_insert_position = "UPDATE `user` SET `user_position`= '$position' WHERE user_id = '$id'";

        mysqli_query($conn, $sql_insert_position);
    }

    if (isset($_POST["getArray"])) {
        $leng = count($array_friend);

        $arr = array();

        for ($i = 0; $i < $leng; ++$i) {

            $arr[$i] = $array_friend[$i]->getUser_name() . " : " . $array_friend[$i]->getUser_position();
        }
        echo json_encode($arr);
        exit();
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
        <title>Bản đồ</title>

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
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5GysKXaYPeFY5q-2tRtcSWwG_83Frd60"
        defer></script>
<!--        <script  src="js/gmap.js"></script>-->
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
                                <form class="form-header" action="index-user.php" method="POST" >
                                    <input class="au-input au-input--xl" id="search" type="text" name="search" placeholder="Tìm kiếm theo tên , email" />
                                    <button class="au-btn--submit"  name="submit" type="submit">
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
                    <p id="my_position">0</p>
                    <div id="mapholder"></div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Nhóm 13 , liên hệ: hà minh đai , gmail : haminhdai997@gmail.com !</p>
                        </div>
                    </div>
                </div> 
            </div>

        </div> 

        <!-- Jquery JS-->

        <script type="text/javascript">
            var arrayFromPHP = new Array();
            var arrayPosition = new Array();
            var check = false;
            var myOptions;
            var map;
            var number = 1;

            function getLocation() {
                if (navigator.geolocation) {
                    if (number == 1) {
                        number = 2;
                        navigator.geolocation.getCurrentPosition(showPosition, showError);
                    } else {
                        navigator.geolocation.getCurrentPosition(showPositionLocal, showError);
                    }
                    console.log(number);
                    check = true;
                } else {
                    alert("Geolocation không được hỗ trợ bởi trình duyệt này.");
                    check = false;
                }
            }

            window.setInterval(function () {
                if (check) {
                    getLocation();
                }
            }, 10000);


            window.onload = getLocation;

            function showPosition(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                var latlon = new google.maps.LatLng(lat, lon)
                //console.log(position);
                
                $('my_position').val(latlon);
                
                var mapholder = document.getElementById('mapholder')
                mapholder.style.height = '600px';
                mapholder.style.width = '900px';

                myOptions = {
                    center: latlon, zoom: 5,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
                }

                map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
                var marker = new google.maps.Marker({position: latlon, map: map, title: "You are here!"});

                postPosition(lat, lon);
            }
            
            function showPositionLocal(position) {

                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                var latlon = new google.maps.LatLng(lat, lon)
               // console.log(position);               
               $('my_position').val(latlon);

                var marker = new google.maps.Marker({position: latlon, map: map, title: "You are here!"});

                postPosition(lat, lon);
            }

            function postPosition(lat, lon) {
                $.post("index-user.php", {myLat: lat, myLon: lon}, function (data) {
                    //  console.log(data);
                });
                getJsonPosition();
            }

            function getJsonPosition() {
                $.post("index-user.php", {getArray: "getArray"}, function (data) {
                    var json = JSON.parse(data);
                    console.log("json " + json);
                    var leng = json.length;
                    for (var i = 0; i < leng; ++i) {
                        arrayFromPHP[i] = json[i];
                    }
                    showMultipleMarker();
                });
            }

            function showMultiplePosition(position) {

                var text = position.toString();

                var leng = text.length;
                var index = text.indexOf(":");
                // cat chuoi tu 0 toi index
                var name = text.slice(0, index).toString();

                var myLatlon = text.slice(index + 1, leng);

                var index = myLatlon.indexOf(":");
                var last = myLatlon.lastIndexOf(":");
                var play = myLatlon.indexOf(",");

                var lat = myLatlon.slice(index + 1, play).trim();
                var lon = myLatlon.slice(last + 1, myLatlon.length).trim();

                var latlon = new google.maps.LatLng(lat, lon)
                //alert(latlon);

                //var map = new google.maps.Map(document.getElementById("mapholder"), latlon);
                var marker = new google.maps.Marker({
                    position: latlon,
                    map: map,
                    title: name,
                    icon: 'images/pin.png',
                });

            }

            function showMultipleMarker() {
                var leng = arrayFromPHP.length;
                for (var j = 0; j < leng; ++j) {
                    showMultiplePosition(arrayFromPHP[j]);
                }
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("Người sử dụng từ chối cho xác định vị trí.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Thông tin vị trí không có sẵn.");
                        break;
                    case error.TIMEOUT:
                        alert("Yêu cầu vị trí người dùng vượt quá thời gian quy định.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("Một lỗi xảy ra không rõ nguyên nhân.");
                        break;
                }
            }

        </script>

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
        <script src="vendor/vector-map/jquery.vmap.js"></script>
        <script src="vendor/vector-map/jquery.vmap.min.js"></script>
        <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
        <script src="vendor/vector-map/jquery.vmap.world.js"></script>
        <script src="vendor/vector-map/jquery.vmap.brazil.js"></script>
        <script src="vendor/vector-map/jquery.vmap.europe.js"></script>
        <script src="vendor/vector-map/jquery.vmap.france.js"></script>
        <script src="vendor/vector-map/jquery.vmap.germany.js"></script>
        <script src="vendor/vector-map/jquery.vmap.russia.js"></script>
        <script src="vendor/vector-map/jquery.vmap.usa.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document-->