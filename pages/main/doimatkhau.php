<?php
// Nếu không đăng nhập thì không truy cập  
if (!isset($_SESSION['dangky'])) {
    // header("Location: index.php");
    echo ("<script>location.href = 'index.php';</script>");
}

if (isset($_POST['change_password'])) {
    $email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $sql_user = "SELECT * FROM tbl_khachhang WHERE email='$email' AND password_user='$old_password'";
    $query_user = mysqli_query($mysqli, $sql_user);
    $count = mysqli_num_rows($query_user);
    if ($count == 1) {
        if ($confirm_password == $new_password) {
            $sql_update = "UPDATE tbl_khachhang SET password_user='" . $new_password . "' WHERE email='$email' AND password_user='$old_password'";
            $query_update = mysqli_query($mysqli, $sql_update);
            echo ("<script>alert('Đổi mật khẩu thành công');</script>");
        } else {
            echo ("<script>alert('Xác nhận không khớp');</script>");
        }
    } else {
        echo ("<script>alert('Tài khoản, mật khẩu không đúng');</script>");
    }
}
?>
<div class="login">
    <div class="grid">
        <div class="row">
            <div class="col l-o-3 l-6 m-12 c-12">
                <div class="login-1">
                    <form action="#" method="POST" autocomplete="on">
                        <h3 class="login_header">Đổi mật khẩu</h3>
                        <label for="email">Địa chỉ Email :</label>
                        <input class="login_input" name="email" type="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"><br><br>
                        <label for="pass">Mật khẩu cũ :</label>
                        <input class="login_input" name="old_password" type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"><br><br>
                        <label for="pass1">Mật khẩu mới :</label>
                        <input class="login_input" name="new_password" type="password" id="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"><br><br>
                        <label for="pass2">Xác nhận mật khẩu mới :</label>
                        <input class="login_input" name="confirm_password" type="password" id="pass2"><br><br>
                        <a class="login_a" href="">
                            <p class="login_p  hover-1">Quên Mật Khẩu ?</p>
                        </a>
                        <div class="login_position">
                            <p class="login_p login_line">Hoặc</p>
                        </div>
                        <input class="login_input-1" type="submit" name="change_password" value="Đổi">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>