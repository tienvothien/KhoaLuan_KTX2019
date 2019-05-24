<?php
include 'conn.php';
if (isset($_GET['thietbiphong'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong,loaiphongcothietbi ctb WHERE ctb.idcothietbi ='$_GET[thietbiphong]' and ctb.id_loaiphong = loai_phong.id_loaiphong  and ctb.xoa=0 and phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
}else if (isset($_GET['thietbi'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong,loaiphongcothietbi ctb WHERE ctb.idtb ='$_GET[thietbi]' and ctb.id_loaiphong = loai_phong.id_loaiphong and ctb.xoa=0  and phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
}else{
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
}
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Phòng</th>
				<th>Sinh viên <br> đang ở</th>
				<th>Số  <br> Loại thiết bị <br>(loại)</th>
				<th>Số <br> thiết bị <br>(cái)</th>
				<th style="color: red;">Số <br> thiết bị <br> hỏng(cái)</th>
				<th style="color: red;">Tổng số<br>đã hỏng</th>
				<th>Kiểm tra</th>
				<th>Chi tiết</th>
				
			s</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				// đêm số sinh viên ở trong phong
				$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
				// số lượng loại thiết bị trong phòng
				$slloaithietbi = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(loaiphongcothietbi.idtb) as slloaithietbi FROM loaiphongcothietbi, phong WHERE phong.xoa=0 AND phong.idphong='$row_phong[idphong]' AND loaiphongcothietbi.xoa=0 and phong.id_loaiphong=loaiphongcothietbi.id_loaiphong"));
				// số lượng  thiết bị trong phòng
				$slthietbi = mysqli_fetch_array(mysqli_query($con,"SELECT sum(loaiphongcothietbi.soluong) as slthietbi FROM loaiphongcothietbi, phong WHERE phong.xoa=0 AND phong.idphong='$row_phong[idphong]' AND loaiphongcothietbi.xoa=0 and phong.id_loaiphong=loaiphongcothietbi.id_loaiphong"));
				// dữ liệu số thiết bị hỏng
				$slhong = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(tr.slhong) AS slhong FROM tinhtrang_thietbi_phong tr WHERE tr.xoa=0 AND tr.idphong ='$row_phong[idphong]'"));
				$slhong1=$slhong['slhong'];
				if ($slhong1=='') {
					$slhong1=0;
				}
				$sl_tong_hong = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(tr.slhong) AS sl_tong_hong FROM tinhtrang_thietbi_phong tr WHERE tr.idphong ='$row_phong[idphong]'"));
				$sl_tong_hong12=$sl_tong_hong['sl_tong_hong'];
				if ($sl_tong_hong12=='') {
					$sl_tong_hong12=0;
				}
			echo "
			<tr>
							<td style='text-align:center;'>$stt</td>
							<td class='chuinhoa canhgiua'>$row_phong[ma_phong]-$row_phong[ma_toa_nha]</td>
							<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
							<td class='canhgiua'>$slloaithietbi[slloaithietbi]</td>
							<td class='canhgiua'>$slthietbi[slthietbi]</td>
							<td class='canhgiua' style='color: red;'>$slhong1</td>
							<td class='canhgiua' style='color: red;'>$sl_tong_hong12</td>
				";?>
				
				<td class="canhgiuanek12">
					<input type="button" name="edit" value="Kiểm tra" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-primary btn-xs id_sua_phong" />
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
				</td>
				
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>
	<?php
	}
	?>