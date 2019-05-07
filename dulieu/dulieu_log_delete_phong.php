<?php
include 'conn.php';

	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, phong.id_canboxoa, phong.ngay_xoa FROM phong, toa_nha, loai_phong WHERE phong.xoa=1 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
	?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped" id="myTable">
			<thead>
				<tr>
					<th style="text-align:center;">STT</th>
					<th>Tòa nhà</th>
					<th>Phòng</th>
					<th>Tầng</th>
					<th>Loại phòng</th>
					<th>Sinh viên <br> đang ở</th>
					<th>Người xóa</th>
					<th>Ngày xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 1;
				while ($row_phong = mysqli_fetch_array($selecet_phong)) {
					// đêm số sinh viên ở trong phong
					$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
					$can_bo = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo where can_bo.id_canbo = '$row_phong[id_canboxoa]'"));

				echo "
				<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
						<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
						<td class='canhgiua'>$row_phong[stt_tang]</td>
						<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>
						<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
						
						<td class='chuinthuong'>$can_bo[ho_can_bo] $can_bo[ten_can_bo] <br> $can_bo[ma_can_bo]</td>
						<td class='chuinhoa'>".date('d/m/Y', strtotime($row_phong['ngay_xoa']))."</td>
				";
					?>
					<?php echo "
				</tr>
				";
				$stt++;
				}
				?>
			</tbody>
		</table>
	</div>
		<?php
		}
	?>