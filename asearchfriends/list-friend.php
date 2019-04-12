<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login-user.php');
} else {
    include 'getFriendForId.php';
    include 'connect.php';
    
    $array_friend = getFriends();
    
    
    if (isset($_POST["myLat"])) {
        $position = 'lat: ' . $_POST["myLat"] . ", lng: " . $_POST["myLon"];
        $id = $_SESSION["user_id"];
        $sql_insert_position = "UPDATE `user` SET `user_position`= '$position' WHERE user_id = '$id'";
        mysqli_query($conn, $sql_insert_position);
    }    

    if (isset($_POST["index"])) { 
        $friend = array();        
        $id_friend = (int)$_POST["index"];         
       // $friend = getUser($id_friend); 
        echo json_encode(getUser($id_friend));
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
        <title>Danh sách bạn bè </title>

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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5GysKXaYPeFY5q-2tRtcSWwG_83Frd60"
        defer></script>
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
                                <form class="form-header" action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm theo tên , email" />
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
                                                        <span class="email" name ="email" id="email"><?php echo $_SESSION["user_email"]; ?></span>
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
                            <div id="map_friends">
                                <div id="mapholder"></div>
                                <input type="button" id="huy_map" class="next action-button" value="HỦy" />
                            </div>                            

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35">Danh sách bạn bè</h3>

                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>Tên bạn bè</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Email</th>
                                                    <th>Gửi tin nhắn</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($array_friend); ++$i) {
                                                    $id = $array_friend[$i]->getUser_id();
                                                    ?>

                                                    <tr class="tr-shadow">
                                                        <td><?php echo $array_friend[$i]->getUser_name() ?></td>
                                                        <td>
                                                            <img src="<?php echo $array_friend[$i]->getUser_image() ?>">
                                                        </td>
                                                        <td>
                                                            <span class="block-email" id="<?php echo $i ?>"> <?php echo $array_friend[$i]->getUser_email() ?></span>
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
                                                            <div class="table-data-feature">
                                                                <button type="button" id="dinhvi" onclick="dinhvi(<?php echo $id ?>)" class="btn btn-danger">Định vị</button>
                                                            </div>

                                                            <div class="table-data-feature" >
                                                                <button type="button" class="btn btn-danger" style="margin-top: 5px;">Xóa Kết Bạn</button>
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
                              <!--  <i class="sc fa fa-hand-pointer-o" id = "cuon" onclick="lendautrang()" >  Lên đầu trang</i>-->
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
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>

        <script type="text/javascript"> 
       
            var check = false;
            var myOptions;
            var map;
            var my_lat, my_lon;
            var my_error = false;
            var json;
            var id_friend = 1;
            var name;
            var myLatlon;
            var my_position ;
            var friend_position ;
            var directionsService;
            var directionsDisplay ;

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                    check = true;
                } else {
                    alert("Geolocation không được hỗ trợ bởi trình duyệt này.");
                    check = false;
                }
            }

            window.setInterval(function () {
                if (check) {
                    if ($("#map_friends").is(":visible") && json.length > 0) {
                        getLocal();
                    }
                }
            }, 10000);

            function showPosition(position) {                
                directionsService = new google.maps.DirectionsService();
                directionsDisplay = new google.maps.DirectionsRenderer();                
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                var latlon = new google.maps.LatLng(lat, lon);
                my_position = latlon;
                my_lat = lat;
                my_lon = lon;

                var mapholder = document.getElementById('mapholder');
                mapholder.style.height = '400px';
                mapholder.style.width = '900px';

                myOptions = {
                    center: latlon, zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
                };

                map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
                directionsDisplay.setMap(map);
                var marker = new google.maps.Marker({position: latlon, map: map, title: "You are here!"});
                
                postPosition(lat, lon);
            }

            function showPositionLocal(position) {

                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                var latlon = new google.maps.LatLng(lat, lon)
                // console.log(position);        
                my_lat = lat;
                my_lon = lon;

                var marker = new google.maps.Marker({position: latlon, map: map, title: "You are here!"});

                postPosition(lat, lon);
            }

            function postPosition(lat, lon) {
                $.post("list-friend.php", {myLat: lat, myLon: lon}, function (data) {        
                });
                showMultiplePosition();
            }          

            function showMultiplePosition() {             
                var index = myLatlon.indexOf(":");
                var last = myLatlon.lastIndexOf(":");
                var play = myLatlon.indexOf(",");
                var lat = myLatlon.slice(index + 1, play).trim();
                var lon = myLatlon.slice(last + 1, myLatlon.length).trim();
                var latlon = new google.maps.LatLng(lat, lon)
                friend_position = latlon;
                var marker = new google.maps.Marker({
                    position: latlon,
                    map: map,
                    title: name,
                    icon: 'images/navigation.png',
                });
                calcRoute();
            }

            function showError(error) {
                my_error = true;
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
            
            function dinhvi(i){      
                id_friend = i;                  
                button_show();
                lendautrang();
                getLocal();
            }
            
            function getLocal(){
                $.post("list-friend.php",{index: id_friend}, function (data){
                    json = JSON.parse(data);  
                    name = json[0];                    
                    myLatlon = json[1];
                    getLocation();                                      
                });
            }
            
            function calcRoute() {  
                
                var request = {
                  origin: my_position,
                  destination: friend_position,
                  travelMode: 'DRIVING',
                  provideRouteAlternatives : true
                };
                directionsService.route(request, function(result, status) {
                    //console.log("result " + result);
                  if (status == 'OK') {
                    directionsDisplay.setDirections(result);
                  }
                });
              }

            $("#huy_map").click(function () {
                button_hide();
            });

            function button_hide() {
                $("#map_friends").hide();
                $("#huy_map").hide();
            }
            
            function button_show() {
                if(!my_error){
                    $("#map_friends").show();
                    $("#huy_map").show();
                 }
            }
            
            button_hide();

            function lendautrang(){			
                    $('body,html').animate({scrollTop:0},600);
                    return false;			
		};
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

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document-->