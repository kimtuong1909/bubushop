<?php
if (isset($_GET['idbaiviet'])) {
    $idbaiviet = $_GET['idbaiviet'];
}
$sql_baiviet = "SELECT * FROM tbl_baiviet WHERE id_baiviet='$idbaiviet'";
$query_baiviet = mysqli_query($mysqli, $sql_baiviet);
$row_baiviet = mysqli_fetch_array($query_baiviet);
?>
<div class="size">
    <h1 class="size_header"><?php echo $row_baiviet['tenBaiViet'] ?></h1>
    <span class="size_title"><?php echo $row_baiviet['tomTat'] ?></span>
    <div class="grid">
        <div class="row">
            <div class="col l-o-4 l-4">
                <div>
                    <p class=""><?php echo $row_baiviet['noiDung'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>