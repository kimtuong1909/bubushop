<?php
$sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham=$_GET[id_sanpham]";
$sql_sanpham = mysqli_query($mysqli, $sql_sua_sanpham);
$row_sanpham = mysqli_fetch_array($sql_sanpham);
?>
<div>
    <p>Sửa sản phẩm</p>
    <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['id_sanpham'] ?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Tên sản phẩm:</label>
            <br>
            <input class="danhmuc_them-ip" id="name" type="text" name="tensanpham" value="<?php echo $row_sanpham['tenSanPham'] ?>">
        </div>
        <div>
            <br>
            <label for="code">Mã sản phẩm:</label>
            <br>
            <input class="danhmuc_them-ip" id="code" type="text" name="masanpham" value="<?php echo $row_sanpham['maSanPham'] ?>">
            <br>
        </div>
        <div>
            <br>
            <label for="price">Giá:</label>
            <br>
            <input class="danhmuc_them-ip" id="price" type="text" name="gia" value="<?php echo $row_sanpham['gia'] ?>">
            <br>
        </div>
        <div>
            <br>
            <label for="number">Số lượng:</label>
            <br>
            <input class="danhmuc_them-ip" id="number" type="text" name="soluong" value="<?php echo $row_sanpham['soLuong'] ?>">
            <br>
        </div>
        <div>
            <br>
            <label for="picture">Hình ảnh:</label>
            <br>
            <img src="modules/quanlysp/uploads/<?php echo $row_sanpham['hinhAnh'] ?>" alt="" width="100px">
            <input type="file" name="hinhanh" id="picture">
            <br>
        </div>
        <div>
            <br>
            <label for="summary">Tóm tắt:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="summary" name="tomtat"><?php echo $row_sanpham['tomTat'] ?></textarea>
            <br>
        </div>
        <div>
            <br>
            <label for="content">Nội dung:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="content" name="noidung"><?php echo $row_sanpham['noiDung'] ?></textarea>
            <br>
        </div>
        <div>
            <br>
            <label>Danh mục sản phẩm:</label>
            <br>
            <select name="danhmucsp" id="">
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                    <?php
                    if ($row_danhmuc['id_danhmuc'] == $row_sanpham['id_danhmuc']) {
                    ?>
                        <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tenDanhMuc'] ?></option>
                    <?php
                    } else {
                    ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tenDanhMuc'] ?></option>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </select>
            <br>
        </div>
        <div>
            <br>
            <label for="status">Tình trạng:</label>
            <br>
            <select name="tinhtrang" id="status">
                <?php
                if ($row_sanpham['tinhTrang'] == 1) {
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
            <input class="danhmuc_them-btn" name="suasanpham" type="submit" value="Sửa sản phẩm">
        </div>
    </form>
</div>