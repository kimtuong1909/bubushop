<?php
    include("../../config/config.php");
    require('../../../tfpdf/tfpdf.php');

    $pdf = new tFPDF();
    $pdf->AddPage("0");

    
    // Add a Unicode font (uses UTF-8)
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);
    $pdf->SetFillColor(193,229,252);

    $idgiohang=$_GET['idgiohang'];
    $sql_chitiet = "SELECT * FROM tbl_giohang_chitiet INNER JOIN tbl_sanpham 
                            ON tbl_giohang_chitiet.id_sanpham=tbl_sanpham.id_sanpham 
                            WHERE id_giohang='".$idgiohang."'";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    $sql_khachhang = "SELECT * FROM tbl_giohang INNER JOIN tbl_khachhang 
                            ON tbl_giohang.id_customer=tbl_khachhang.id_customer
                            WHERE id_giohang='".$idgiohang."'";   
    $query_khachhang = mysqli_query($mysqli, $sql_khachhang);
    $row_kh = mysqli_fetch_array($query_khachhang);
	$pdf->Write(10,'Đơn Hàng.');
	$pdf->Ln(10);
    $pdf->Write(10,'Ngày đặt: '.$row_kh['ngayDat']);
	$pdf->Ln(10);
    $pdf->Write(10,'Tên khách hàng: '.$row_kh['name_user']);
	$pdf->Ln(10);
    $pdf->Write(10,'Email: '.$row_kh['email']);
	$pdf->Ln(10);
    $pdf->Write(10,'Số điện thoại: '.$row_kh['phone']);
	$pdf->Ln(10);
    $pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(5,35,80,20,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
    $total=0;
	while($row = mysqli_fetch_array($query_chitiet)){
		$i++;
        $total+=$row['soLuongMua']*$row['gia'];
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['id_sanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tenSanPham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['soLuongMua'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['gia']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['soLuongMua']*$row['gia']),1,1,'C',$fill);
	$fill = !$fill;
	}
	$pdf->Cell($width_cell[0]+$width_cell[1],10,'Tổng',1,0,'C',true);
	$pdf->Cell($width_cell[2]+$width_cell[3]+$width_cell[4],10,'','B',0,'C',false);
	$pdf->Cell($width_cell[5],10,number_format($total),1,1,'C',true); 
	$pdf->Ln(10);
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
    $pdf->Output();
?>