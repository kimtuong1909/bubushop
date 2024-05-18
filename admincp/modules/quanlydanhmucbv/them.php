<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Danh mục bài viết</h2>
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
                Danh mục bài viết
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
    <h2 class="title">Thêm danh mục bài viết</h2>
    <form action="modules/quanlydanhmucbv/xuly.php" method="POST">
        <div>
            <label for="name">Tên danh mục bài viết:</label>
            <br>
            <input class="danhmuc_them-ip" id="name" type="text" name="tendanhmuc" placeholder="Nhập tên danh mục bài viết">
        </div>
        <div>
            <br>
            <label for="index">Thứ tự:</label>
            <br>
            <input class="danhmuc_them-ip" id="index" type="text" name="thutu" placeholder="Nhập thứ tự">
            <br>
        </div>
        <div>
            <br>
            <input class="danhmuc_them-btn" name="themdanhmuc" type="submit" value="Thêm danh mục bài viết">
        </div>
    </form>
</div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->
