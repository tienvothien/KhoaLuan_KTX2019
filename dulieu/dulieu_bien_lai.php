<?php
	include 'conn.php';
	if (isset($_POST['timkiem_bien_lai_ngay_batdau']) && isset($_POST['timkiem_bien_laigngay_kethuc']) && isset($_POST['timkiem_bien_lai_id_toanha'])) {
		$timkiem_bien_lai_ngay_batdau=$_POST['timkiem_bien_lai_ngay_batdau'];
		$timkiem_bien_laigngay_kethuc=$_POST['timkiem_bien_laigngay_kethuc'];
		$timkiem_bien_lai_id_toanha=$_POST['timkiem_bien_lai_id_toanha'];
		$timkiem_bien_lai_loai_tien=$_POST['timkiem_bien_lai_loai_tien'];
		if ($timkiem_bien_lai_ngay_batdau=='') {
			$timkiem_bien_lai_ngay_batdau='2015/1/1';
		}
		if ($timkiem_bien_laigngay_kethuc=='') {
			$timkiem_bien_laigngay_kethuc=date("Y/m/d");
		}
		if ($timkiem_bien_lai_id_toanha!='' && $timkiem_bien_lai_loai_tien!='') {
			$selecet_bien_lai = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE toa_nha.id_toanha='$timkiem_bien_lai_id_toanha' and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc' and bien_lai.id_loai_bien_lai='$timkiem_bien_lai_loai_tien' order by bien_lai.ngay_them DESC");
		}else if ($timkiem_bien_lai_id_toanha=='' && $timkiem_bien_lai_loai_tien!='') {
			$selecet_bien_lai = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc' and bien_lai.id_loai_bien_lai='$timkiem_bien_lai_loai_tien' order by bien_lai.ngay_them DESC");
		}else if ($timkiem_bien_lai_id_toanha!='' && $timkiem_bien_lai_loai_tien=='') {
			$selecet_bien_lai = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE toa_nha.id_toanha='$timkiem_bien_lai_id_toanha' and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc'  order by bien_lai.ngay_them DESC");
		}else{
			$selecet_bien_lai = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE  (bien_lai.ngay_them BETWEEN '$timkiem_bien_lai_ngay_batdau' and '$timkiem_bien_laigngay_kethuc') and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo order by bien_lai.ngay_them DESC");
		}
	}else{
		$selecet_bien_lai = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo order by bien_lai.ngay_them DESC"); 
	}
	if (!mysqli_num_rows($selecet_bien_lai)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Số <br> biên lai</th>
				<th>Loại <br>biên lai</th>
				<th>Sinh viên</th>
				<th>MSSV</th>
				<th>Phòng</th>
				<th>Số tiền</th>
				<th>Ngày đón</th>
				<th>Người thu</th>
				<th>Mã cán bộ</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			$tong=0;
			$tong_tien=0;
			while ($row_bien_lai = mysqli_fetch_array($selecet_bien_lai)) {
				$tong_tien+=$row_bien_lai["so_tien"];
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_bien_lai[so_bien_lai]</td>
				<td class='chuinthuong'>$row_bien_lai[ten_bien_lai] </td>
				<td class='chuinthuong'>$row_bien_lai[ho_sv] $row_bien_lai[ten_sv] </td>
				<td class='canhgiua'>$row_bien_lai[mssv] </td>
				<td class='chuinhoa canhgiua'>$row_bien_lai[ma_phong] - $row_bien_lai[ma_toa_nha]</td>
				<td class='chuinthuong canhgiua'>". number_format ($row_bien_lai["so_tien"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'>".date('d/m/Y', strtotime($row_bien_lai['ngay_them']))." </td>
				<td class='chuinthuong '>$row_bien_lai[ho_can_bo] $row_bien_lai[ten_can_bo]  </td>
				<td class='canhgiua'>$row_bien_lai[ma_can_bo] </td>
			";?>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			echo "<tr>
					<td class='canhgiua' style='color:red; font-size:20px'>$stt</td>
					<td style='color:red; font-size:20px'>Tổng</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class='canhgiua' style='color:red; font-size:20px'>". number_format ($tong_tien , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>";
			?>
		</tbody >
			
		</style>
	</table>

	
<?php
}
?>