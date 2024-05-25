<!-- ========== table components start ========== -->
<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Danh mục sản phẩm</h2>
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
                                Danh mục sản phẩm
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
            <h2 class="title">Thêm danh mục sản phẩm</h2>
            <form action="modules/quanlydanhmucsp/xuly.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name">Tên danh mục:</label>
                    <br>
                    <input class="danhmuc_them-ip" id="name" type="text" name="tendanhmuc" placeholder="Nhập tên danh mục" required>
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
                    <label for="">Hình ảnh:</label>
                    <br>
                    <input type="file" name="hinhanh">
                </div>
                <div>
                    <br>
                    <label for="">Hình ảnh banner:</label>
                    <br>
                    <input type="file" name="hinhanhbanner">
                </div>
                <div>
                    <br>
                    <input class="danhmuc_them-btn" name="themdanhmuc" type="submit" value="Thêm danh mục sản phẩm">
                </div>
            </form>
        </div>
        <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
</section>
<!-- ========== table components end ========== -->