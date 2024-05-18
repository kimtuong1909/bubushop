<?php
    session_start();
    include("config/config.php");
    // Đăng nhập tài khoàn admincp
    if(isset($_POST['login'])){
        $username=$_POST['email'];
        $password=$_POST['password'];
        $sql_account="SELECT * FROM tbl_admin WHERE username='".$username."' AND password_admin='".$password."' ";
        $query_account=mysqli_query($mysqli,$sql_account);
        $row_account=mysqli_num_rows($query_account);
        if($row_account==1){
            $_SESSION['login']=$username;
            header("Location: index.php");
        }else{
            header("Location: login.php");
        }
    }
    // Đăng xuất tài khoàn admincp
    if(isset($_GET['dangxuat'])){
        $dangxuat=$_GET['dangxuat'];
        if($dangxuat==1){
            unset($_SESSION['login']);
        }
    }
    // Đăng ký tài khoàn admincp
    if(isset($_POST['create_account'])){
        $new_username=$_POST['new_username'];
        $new_password=$_POST['new_password'];
        $new_password_retype=$_POST['new_password_retype'];
        if($new_username!=''&&$new_password!=''&&$new_password==$new_password_retype){
            $sql_create_account="INSERT INTO tbl_admin(username,password_admin,admin_state) VALUES('".$new_username."','".$new_password."','1')";
            $query_create_account=mysqli_query($mysqli,$sql_create_account);
            header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admincp_login.css">
    <link rel="stylesheet" href="../css/gird.css">
    <title>ĐĂNG NHẬP / ĐĂNG KÝ</title>
</head>
<body>
<div class="login">
            <div class="grid">
                <div class="row">
                    <div class="col l-5">
                        <div class="login-1">
                            <form action="#" method="POST" autocomplete="on">
                                <h3 class="login_header">Đăng Nhập</h3>
                                    <label for="email">Địa chỉ Email :</label>
                                    <input class="login_input" name="email" type="email" id="email" name="email"><br><br>
                                    <label for="pass">Mật Khẩu :</label>
                                    <input class="login_input" name="password" type="password" id="pass" name="pass"><br><br>
                                    <a class="login_a" href="forgot_password.html">
                                        <p class="login_p  hover-1">Quên Mật Khẩu ?</p>
                                    </a>
                                    <div class="login_position">
                                        <p class="login_p login_line">Hoặc</p>
                                    </div>
                                    <input class="login_input-1" type="submit" name="login" value="ĐĂNG NHẬP">
                                    <a class="login_a" href="http://www.google.com" target="_blank">
                                        <button class="login_button  hover-1">
                                            <img src="images/gg.png" alt="" width="10%" height="10%" style="margin-right: 8px;">
                                            Đăng nhập bằng Google
                                        </button>
                                        </a>
                                        <a class="login_a login_a-1" href="https://www.facebook.com/" target="_blank">
                                            <button class="login_button  hover-1">
                                                <img src="images/fbxanh.png" alt="" width="10%" height="10%" style="margin-right: 8px;">
                                                Đăng nhập bằng Facebook
                                            </button>
                                        </a>
                                        <p>Bằng cách đăng nhập vào tài khoản của bạn, bạn đồng ý với <pr class="text_color">Chính sách bảo mật & Cookie</pr> và <pr class="text_color  hover-1" > Điều khoản và Điều kiện</pr> của chúng tôi</p>
                                        <p class="text_color_red  hover-1">ĐĂNG NHẬP ĐỂ NHẬN THÊM ƯU ĐÃI</p>
                                        <p class="accept">Xác nhận và kiếm thêm <pr class="point">100 </pr>điểm</p>
                            </form>
                        </div>
                    </div>
                    <div class="col l-2 center-1">
                        <div class="line_right"></div>
                    </div>
                    <div class="col l-5">
                        <div class="login-2">
                            <form action="#" method="POST">
                                <h3 class="login_header">Mới Đến BUBU</h3>
                                    <label for="email">Địa chỉ Email :</label>
                                    <input class="login_input" name="new_username" type="email" id="email" name="email"><br><br>
                                    <label for="pass">Mật Khẩu :</label>
                                    <input class="login_input" name="new_password" type="password" id="pass" name="pass"><br><br>
                                    <label for="pass">Xác Nhận Mật Khẩu :</label>
                                    <input class="login_input" name="new_password_retype" type="password" id="pass" name="pass"><br><br>
                                    <input class="login_input-1" name="create_account" type="submit" value="ĐĂNG KÝ">
                                    <p class="text_color center  hover-1">Tại sao đăng ký?</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
