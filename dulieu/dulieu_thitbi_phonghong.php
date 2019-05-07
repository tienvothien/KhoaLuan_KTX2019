<?php
include 'conn.php';

	$selecet_phong = mysqli_query($con, "SELECT phong.idphong, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, ctb.idtb, ctb.soluong, thietbi.tenthietbi , tr.slhong, tr.ngay_kt, tr.can_bo_kt, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM tinhtrang_thietbi_phong tr, loaiphongcothietbi ctb, phong, thietbi, toa_nha, can_bo WHERE tr.xoa=0 AND tr.idcothietbi = ctb.idcothietbi AND ctb.xoa=0 AND tr.idphong=phong.idphong AND ctb.idtb = thietbi.idtb AND toa_nha.id_toanha= phong.id_toanha AND can_bo.id_canbo = tr.can_bo_kt ORDER BY toa_nha.ten_toa_nha, phong.ma_phong");
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
				<th>Thiết bị</th>
				<th>Số  thiết bị <br>(Cái)</th>
				<th>Số hỏng <br>(cái)</th>
				<th>Ngày kiểm tra</th>
				<th>Người kiểm tra</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				// đêm số sinh viên ở trong phong
				
			echo "
			<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinhoa canhgiua'>$row_phong[ma_phong]-$row_phong[ma_toa_nha]</td>
						<td class='canhgiua'>$row_phong[tenthietbi]</td>
						<td class='canhgiua'>$row_phong[soluong]</td>
						<td class='canhgiua'>$row_phong[slhong]</td>
						<td class='canhgiua'>".date("d/m/Y", strtotime($row_phong['ngay_kt']))."</td>
						<td class='chuinthuong canhgiua'>$row_phong[ho_can_bo] $row_phong[ten_can_bo] <br> $row_phong[ma_can_bo]</td>

						";
					if (isset($_GET['thietbi'])) {
					
					}else{
					?>
				
				
				
				<?php }echo "
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