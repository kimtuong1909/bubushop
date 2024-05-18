<?php
// session_start();
include("admincp/config/config.php");

// Đăng nhập tài khoản người dùng
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql_account = "SELECT * FROM tbl_khachhang WHERE email='" . $username . "' AND password_user='" . $password . "' ";
    $query_account = mysqli_query($mysqli, $sql_account);
    $row_account = mysqli_num_rows($query_account);
    if ($row_account == 1) {
        $row_account = mysqli_fetch_array($query_account);
        $_SESSION['dangky'] = $row_account['name_user'];
        $_SESSION['id_customer'] = $row_account['id_customer'];
        $_SESSION['email'] = $row_account['email'];
        // header("Location: index.php?quanly=giohang");
        echo ("<script>location.href = 'index.php?quanly=giohang';</script>");
    }
}

// Đăng ký tài khoản người dùng
if (isset($_POST['create_account'])) {
    $new_name = $_POST['new_name'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_password_retype = $_POST['new_password_retype'];
    $new_address = $_POST['new_address'];
    $new_phone = $_POST['new_phone'];
    if ($new_name != '' && $new_username != '' && $new_password != '' && $new_address != '' && $new_phone != '' && $new_password == $new_password_retype) {
        $sql_create_account = "INSERT INTO tbl_khachhang(name_user,email,password_user,address_user,phone) VALUES('" . $new_name . "','" . $new_username . "','" . $new_password . "','" . $new_address . "','" . $new_phone . "')";
        $query_create_account = mysqli_query($mysqli, $sql_create_account);
        if ($query_create_account) {
            echo '<p>Đăng ký thành công</p>';
        }
        // header("Location: index.php");
    }
}
?>
<div class="login">
    <div class="grid">
        <div class="row">
            <div class="col l-5 c-12">
                <div class="login-1">
                    <form action="#" method="POST" autocomplete="on">
                        <h3 class="login_header">Đăng Nhập</h3>
                        <label for="email">Địa chỉ Email :</label>
                        <input class="login_input" name="email" type="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"><br><br>
                        <label for="pass">Mật Khẩu :</label>
                        <input class="login_input" name="password" type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"><br><br>
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
                        <p>Bằng cách đăng nhập vào tài khoản của bạn, bạn đồng ý với <pr class="text_color">Chính sách bảo mật & Cookie</pr> và <pr class="text_color  hover-1"> Điều khoản và Điều kiện</pr> của chúng tôi</p>
                        <p class="text_color_red  hover-1">ĐĂNG NHẬP ĐỂ NHẬN THÊM ƯU ĐÃI</p>
                        <p class="accept">Xác nhận và kiếm thêm <pr class="point">100 </pr>điểm</p>
                    </form>
                </div>
            </div>
            <div class="col l-2 c-0 center-1">
                <div class="line_right"></div>
            </div>
            <div class="col l-5 c-12">
                <div class="login-2">
                    <form action="#" method="POST">
                        <h3 class="login_header">Mới Đến BUBU</h3>
                        <label for="name">Họ và Tên :</label>
                        <input class="login_input" name="new_name" type="text" id="name"><br><br>
                        <label for="email">Địa chỉ Email :</label>
                        <input class="login_input" name="new_username" type="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"><br><br>
                        <label for="pass">Mật Khẩu :</label>
                        <input class="login_input" name="new_password" type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"><br><br>
                        <label for="pass1">Xác Nhận Mật Khẩu :</label>
                        <input class="login_input" name="new_password_retype" type="password" id="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"><br><br>
                        <label for="address">Địa chỉ :</label>
                        <input class="login_input" name="new_address" type="text" id="address"><br><br>
                        <label for="numberphone">Số điện thoại :</label>
                        <input class="login_input" name="new_phone" type="number" id="numberphone"><br><br>
                        <input class="login_input-1" name="create_account" type="submit" value="ĐĂNG KÝ">
                        <p class="text_color hover-1">Tại sao đăng ký?</p>
                        <p class="text_color_red hover-1">GIẢM THÊM 20% CHO ĐƠN HÀNG ĐÂU TIÊN</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>