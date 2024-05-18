<?php
    if(isset($_GET['iddanhmuc'])){
        $sql_danhmuc="SELECT * FROM tbl_danhmuc_baiviet WHERE id_danhmucbv='$_GET[iddanhmuc]'";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        $row=mysqli_fetch_array($query_danhmuc);
    }
?>
<div>
    <p>Sửa danh mục bài viết</p>
    <form action="modules/quanlydanhmucbv/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'];?>" method="POST">
        <div>
        <label for="name">Tên danh mục bài viết:</label>
        <br>
        <input class="danhmuc_them-ip" id="name" type="text" name="tendanhmuc" placeholder="<?php echo $row['tenDanhMucBV']?>" >
        </div>
        <div>
        <br>   
        <label for="index">Thứ tự:</label>
        <br>
        <input class="danhmuc_them-ip" id="index" type="text" name="thutu" placeholder="<?php echo $row['thuTu']?>">
        <br>   
        </div>
        <div>
            <br>
            <input class="danhmuc_them-btn" name="suadanhmuc" type="submit" value="Sửa danh mục bài viết">
        </div>
    </form>
</div>
