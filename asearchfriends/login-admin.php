<?php
session_start();
include("connect.php");
if (isset($_POST["submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $password = $_POST["password"];
    $email = $_POST["email"];

    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($password == "" || $email == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    } elseif (strlen($password) < 6) {
        echo 'Mật khẩu sai';
    } else {
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql = "select admin_id from admin where admin_email='$email' and admin_password = '$password'";
        // thực thi câu $sql với biến conn lấy từ file connection.php
        $kt = mysqli_query($conn, $sql);

        if (mysqli_num_rows($kt) > 0) {
            header('Location: index-admin.php');
        } else {
            echo "Email không tồn tại !";
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
        <title>Login</title>

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
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <h4 style="text-align:center">ĐĂNG NHẬP</h4>
                            <div class="login-form">
                                <form action="login-admin.php" method="post">
                                    <div class="form-group">
                                        <label>Địa chỉ Email</label>
                                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login-checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" checked>Nhớ đăng nhập
                                        </label>
                                        <label>
                                            <u><a href="#">Quên mật khẩu?</a></u>
                                        </label>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit">Đăng nhập</button>
                                    
                                </form>
                               
                            </div>
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
        <script src="vendor/slick/slick.min.js">
        </script>
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

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document-->