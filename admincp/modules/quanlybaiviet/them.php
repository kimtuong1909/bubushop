<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Bài viết</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                Bài viết
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div>
    <h2 class="title">Liệt kê bài viết</h2>
    <form action="modules/quanlybaiviet/xuly.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Tên bài viết:</label>
            <br>
            <input class="danhmuc_them-ip" id="name" type="text" name="tenbaiviet" placeholder="Nhập tên bài viết">
        </div>
        <div>
            <br>
            <label for="picture">Hình ảnh:</label>
            <br>
            <input id="picture" type="file" name="hinhanh">
            <br>
        </div>
        <div>
            <br>
            <label for="summary">Tóm tắt:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="summary" name="tomtat"></textarea>
            <br>
        </div>
        <div>
            <br>
            <label for="content">Nội dung:</label>
            <br>
            <textarea class="danhmuc_them-ip" id="content" name="noidung"></textarea>
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
                ?>
                    <option value="<?php echo $row['id_danhmucbv'] ?>"><?php echo $row['tenDanhMucBV'] ?></option>
                <?php
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
                <option value="1">ON</option>
                <option value="0">OFF</option>
            </select>
            <br>
        </div>
        <div>
            <br>
            <input class="danhmuc_them-btn" name="thembaiviet" type="submit" value="Thêm bài viết">
        </div>
    </form>
</div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->
