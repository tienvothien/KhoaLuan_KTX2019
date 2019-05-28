<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT phong.ma_phong, tb.tenthietbi, tr.id_tinhtrang, tr.slhong, tr.ngay_kt, tr.can_bo_kt, toa_nha.ma_toa_nha FROM tinhtrang_thietbi_phong tr, thietbi tb, loaiphongcothietbi ctb, phong, toa_nha WHERE tr.idcothietbi = ctb.idcothietbi AND tb.idtb = ctb.idtb AND tr.idphong= phong.idphong and phong.id_toanha= toa_nha.id_toanha ORDER BY tr.ngay_kt DESC");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th >Phòng</th>
				<th >Thiết bị</th>
				<th>Số lượng hỏng</th>
				<th>Người KT</th>
				<th >Mã số cán bộ</th>
				<th>Thời gian KT</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					// Thông tin các bộ
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[can_bo_kt]'"));
					// thông tin lớp
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='canhgiua chuinhoa'>$row[ma_phong] - $row[ma_toa_nha]</td>
						<td class=' chuinthuong'>$row[tenthietbi] </td>
						<td class='canhgiua'>$row[slhong]</td>
						<td class=''>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
						<td class='canhgiua'>$canbotdoi[ma_can_bo] </td>
						<td class='canhgiua'>".date("d/m/Y H:i:s", strtotime($row['ngay_kt']))."</td>
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
