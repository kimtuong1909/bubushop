<?php
$sql_baiviet = "SELECT * FROM tbl_baiviet WHERE id_baiviet=$_GET[idbaiviet]";
$query_baiviet = mysqli_query($mysqli, $sql_baiviet);
$row_baiviet = mysqli_fetch_array($query_baiviet);
?>
<div>
    <p>Sửa bài viết</p>
    <form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row_baiviet['id_baiviet'] ?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Tên bài viết:</label>
            <br>
            <input class="danhmuc_them-ip" id="name" type="text" name="tenbaiviet" value="<?php echo $row_baiviet['tenBaiViet'] ?>">
        </div>
        <div>
            <br>
            <label for="picture">Hình ảnh:</label>
            <br>
            <img src="<?php echo 'uploads/' . $row_baiviet['hinhAnh'] ?>" alt="" width="150px">
            <input id="picture" type="file" name="hinhanh">
            <br>
        </div>
        <div>
            <br>
            <label for="summary">Tóm tắt:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="summary" name="tomtat"><?php echo $row_baiviet['tomTat'] ?></textarea>
            <br>
        </div>
        <div>
            <br>
            <label for="content">Nội dung:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="content" name="noidung"><?php echo $row_baiviet['noiDung'] ?></textarea>
            <br>
        </div>
        <div>
            <br>
            <label>Danh mục bài viết:</label>
            <br>
            <select name="danhmuc">
                <?php
                $sql_danhmucbv = "SELECT * FROM tbl_danhmuc_baiviet ORDER BY id_danhmucbv DESC";
                $query_danhmucbv = mysqli_query($mysqli, $sql_danhmucbv);
                while ($row = mysqli_fetch_array($query_danhmucbv)) {
                    if ($row_baiviet['id_danhmucbv'] == $row['id_danhmucbv']) {
                ?>
                        <option selected value="<?php echo $row['id_danhmucbv'] ?>"><?php echo $row['tenDanhMucBV'] ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="<?php echo $row['id_danhmucbv'] ?>"><?php echo $row['tenDanhMucBV'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <br>
        </div>
        <div>
            <br>
            <label for="state">Tình trạng:</label>
            <br>
            <select name="tinhtrang">
                <?php
                if ($row_baiviet['tinhTrang'] == 1) {
                ?>
                    <option selected value="1">ON</option>
                    <option value="0">OFF</option>
                <?php
                } else {
                ?>
                    <option value="1">ON</option>
                    <option selected value="0">OFF</option>
                <?php
                }
                ?>
            </select>
            <br>
        </div>
        <div>
            <br>
            <input class="danhmuc_them-btn" name="suabaiviet" type="submit" value="Sửa bài viết">
        </div>
    </form>
</div>