<?php
if (!isset($_SESSION['dangky'])) {
    echo ("<script>location.href = 'index.php';</script>");
}
$id_kh = $_SESSION['id_customer'];
if (isset($_SESSION['dangky'])) {
    $sql_kh = "SELECT * FROM tbl_khachhang WHERE id_customer='$id_kh' LIMIT 1";
    $query_kh = mysqli_query($mysqli, $sql_kh);
    $row_kh = mysqli_fetch_array($query_kh);
}
if (isset($_POST['save'])) {
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];
    if ($avatar != "") {
        $avatar = time() . '_' . $avatar;
        $sql_update_kh = "UPDATE tbl_khachhang SET name_user='" . $name . "',avatar='" . $avatar . "',phone='" . $phone . "'
        ,birthDay='" . $day . "',birthMonth='" . $month . "',birthYear='" . $year . "',gender='" . $gender . "' WHERE id_customer='$id_kh' ";
        move_uploaded_file($avatar_tmp, 'admincp/modules/quanlykhachhang/uploads/' . $avatar);
        // xoa anh cu
        $sql_select_kh = "SELECT * FROM tbl_khachhang WHERE id_customer='$id_kh'";
        $query_select_kh = mysqli_query($mysqli, $sql_select_kh);
        $row_select_kh = mysqli_fetch_array($query_select_kh);
        unlink('admincp/modules/quanlykhachhang/uploads/' . $row_select_kh['avatar']);
    } else {
        $sql_update_kh = "UPDATE tbl_khachhang SET name_user='" . $name . "',phone='" . $phone . "'
        ,birthDay='" . $day . "',birthMonth='" . $month . "',birthYear='" . $year . "',gender='" . $gender . "' WHERE id_customer='$id_kh' ";
    }
    mysqli_query($mysqli, $sql_update_kh);
    echo ("<script>location.href = 'index.php?quanly=taikhoan';</script>");
}
?>
<div class="grid wide">
    <div class="row">
        <div class="col l-o-4 l-6 m-o-2 m-12 c-o-1 c-12">
            <h1 class="accout_title">Thông tin tài khoản</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form_info">
                    <div class="form_avatar">
                        <div class="form_avatar_view" onclick="getFile()">
                            <div class="avatar_view">
                                <?php
                                if (isset($row_kh['avatar'])) {
                                    echo '<img src="admincp/modules/quanlykhachhang/uploads/' . $row_kh['avatar'] . '" alt="avatar" class="avatar avatar1">';
                                } else {
                                    echo '<img src="https://frontend.tikicdn.com/_desktop-next/static/img/account/avatar.png" alt="avatar" class="avatar">';
                                }
                                ?>
                            </div>
                            <div class="avatar_edit">
                                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/account/edit.png" alt="edit" class="avatar_edit_img">
                            </div>
                            <input type="file" name="avatar" class="form_avatar_file" id="file-input">
                        </div>
                    </div>
                    <div class="form_name">
                        <div class="form_control">
                            <label class="form_control_label" for="name">Họ & Tên</label>
                            <div>
                                <div>
                                    <input class="form_control_input" id="name" name="name" value="<?php echo $row_kh['name_user'] ?>" type="text" maxlength="128">
                                </div>
                            </div>
                        </div>
                        <div class="form_control">
                            <label class="form_control_label" for="nickname">Nickname</label>
                            <div>
                                <div>
                                    <input class="form_control_input" id="nickname" placeholder="Thêm nickname" name="nickname" value="" type="text" maxlength="128">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_control">
                    <label class="form_control_label" for="phone">Số điện thoại</label>
                    <div>
                        <div>
                            <input class="form_control_input" id="phone" name="phone" minlength="10" value="<?php echo $row_kh['phone'] ?>" type="text" maxlength="128">
                        </div>
                    </div>
                </div>
                <div class="form_control">
                    <label class="form_control_label" for="email">Email</label>
                    <div>
                        <div>
                            <input class="form_control_input input_no" id="email" disabled name="email" value="<?php echo $row_kh['email'] ?>" type="text" maxlength="128">
                        </div>
                    </div>
                </div>
                <div class="form_control">
                    <label class="form_control_label" for="">Ngày sinh</label>
                    <div>
                        <select class="from_select" name="day" id="">
                            <option class="from_option" value="0">Ngày</option>
                            <?php
                            for ($i = 1; $i < 32; $i++) {
                                if ($row_kh['birthDay'] == $i) {
                                    echo '<option class="from_option" selected value="' . $i . '">' . $i . '</option>';
                                } else {
                                    echo '<option class="from_option" value="' . $i . '">' . $i . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <select class="from_select" name="month" id="">
                            <option class="from_option" value="0">Tháng</option>
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                if ($row_kh['birthMonth'] == $i) {
                                    echo '<option class="from_option" selected value="' . $i . '">' . $i . '</option>';
                                } else {
                                    echo '<option class="from_option" value="' . $i . '">' . $i . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <select class="from_select" name="year" id="">
                            <option class="from_option" value="0">Năm</option>
                            <?php
                            $date = getdate();
                            $year = $date['year'];
                            for ($i = $year; $i > $year - 123; $i--) {
                                if ($row_kh['birthYear'] == $i) {
                                    echo '<option class="from_option" selected value="' . $i . '">' . $i . '</option>';
                                } else {
                                    echo '<option class="from_option" value="' . $i . '">' . $i . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <label class="form_control_label" for="">Giới tính</label>
                    <label for="" class="input_label">
                        <input class="form_control_radio" type="radio" id="male" name="gender" <?php if ($row_kh['gender'] == 'male') {
                                                                                                    echo 'checked="checked"';
                                                                                                } ?> value="male">
                        <label for="male" class="form_control_span-label">Nam</label>
                    </label>
                    <label for="" class="input_label">
                        <input class="form_control_radio" type="radio" id="female" name="gender" <?php if ($row_kh['gender'] == 'female') {
                                                                                                        echo 'checked="checked"';
                                                                                                    } ?> value="female">
                        <label for="female" class="form_control_span-label">Nữ</label>
                    </label>
                    <label for="" class="input_label">
                        <input class="form_control_radio" type="radio" id="other" disabled name="gender" value="other">
                        <label for="other" class="form_control_span-label">Khác</label>
                    </label>
                </div>
                <div class="form_control">
                    <span class="btn_span"></span>
                    <input class="form_control_btn" type="submit" name="save" value="Lưu thay đổi">
                </div>
            </form>
        </div>
    </div>
</div>