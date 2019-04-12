<?php
session_start();
include 'connect.php';
if (isset($_POST["submit"])) {
    $user_name = $_POST["username"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    $image = "images/anonymous-person.jpg";
    $aggree = (isset($_POST["aggree"])) ? TRUE : FALSE;
    
    if (!empty($user_name) && !empty($user_email) && !empty($user_password) && $aggree ) {
        $query = "select user_id from user where user_email = '$user_email'";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 0) {
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_email"] = $user_email;
            $_SESSION["user_password"] = $user_password;
            $_SESSION["user_image"] = $image;
            $sql_insert = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`, `user_image`) VALUES ('$user_name','$user_email','$user_password','$image')";
            
            mysqli_query($conn, $sql_insert);
            header('Location: index-user.php');
        } else {
            echo 'Đăng ký thất bại';
        }
    }else{
        echo 'Đăng ký thất bại !!';
    }
}
?>
<!DOCTYPE html>
<html lang="vn">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>ĐĂNG KÝ</title>

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
            <div class="page-content">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <h4>ĐĂNG KÝ</h4>
                            </div>
                            <div class="login-form">
                                <form action="register.php" method="post" name="register" onsubmit="return show_confirm()">
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input class="au-input au-input--full" type="text" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ Email</label>
                                        <input class="au-input au-input--full" type="email" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input class="au-input au-input--full" id="password" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login-checkbox" style="font-family:'Times New Roman', Times, serif">
                                        <label>
                                            <input type="checkbox" id="aggree" name="aggree">Đồng ý với các điều khoản và chính sách
                                        </label>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit" onclick="">đăng ký</button>
                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button class="au-btn au-btn--block au-btn--blue m-b-20">đăng ký với facebook</button>
                                            <button class="au-btn au-btn--block au-btn--blue2">đăng ký với twitter</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="register-link">
                                    <p>
                                        Bạn đã có tài khoản?
                                        <u><a href="login-user.php">Đăng nhập</a></u>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            function show_confirm() {
                
                var name = document.getElementById("username").value;
                var email = document.getElementById("email").value;
                var pass = document.getElementById("password").value;
                var aggree = document.getElementById("aggree").checked;
                if (name == "" || email == "" || pass == "" || aggree == false) {                    
                    alert("Hãy nhập đủ thông tin !");
                }else{
                    if(pass.length < 6){
                        alert("Mật khẩu quá ngắn, xin nhập lại !");
                    }
                }
            }
        </script>
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