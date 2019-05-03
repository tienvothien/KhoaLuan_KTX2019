<?php
if (isset($_POST['id_toanha_tinhtrang'])) {
	include 'conn.php';
	$selecet_phong = mysqli_query($con, "SELECT DISTINCT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong FROM phong, toa_nha, loai_phong, sinh_vien WHERE phong.xoa=0 and toa_nha.id_toanha='$_POST[id_toanha_tinhtrang]' AND sinh_vien.gioi_tinh= toa_nha.loai_toa_nha AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong ");
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
				<th>Giá/người <br>/tháng (VNĐ)</th>
				<th>Sinh viên <br> đang ở</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				// đêm số sinh viên ở trong phong
				$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
			echo "
			<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
						<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
						<td class='canhgiua'>$row_phong[stt_tang]</td>
						<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>
						<td class='chuinthuong'>".number_format ($row_phong["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
						<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
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
	<?php
		}
	}
	if (isset($_POST['id_toanha_tinhtrang12']) && isset($_POST['tang_p_tinhtrang12'])) {
	include 'conn.php';
	$selecet_phong = mysqli_query($con, "SELECT DISTINCT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong FROM phong, toa_nha, loai_phong, sinh_vien WHERE phong.xoa=0 and toa_nha.id_toanha='$_POST[id_toanha_tinhtrang12]'  and phong.stt_tang ='$_POST[tang_p_tinhtrang12]'AND sinh_vien.gioi_tinh= toa_nha.loai_toa_nha AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong ");
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
					<th>Giá/người <br>/tháng (VNĐ)</th>
					<th>Sinh viên <br> đang ở</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 1;
				while ($row_phong = mysqli_fetch_array($selecet_phong)) {
					// đêm số sinh viên ở trong phong
					$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
				echo "
				<tr>
							<td style='text-align:center;'>$stt</td>
							<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
							<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
							<td class='canhgiua'>$row_phong[stt_tang]</td>
							<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>
							<td class='chuinthuong'>".number_format ($row_phong["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
							<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
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
		<?php
			}
		}
		if (isset($_POST['chon_phong_tinhtrang12']) ) {
		include 'conn.php';
		$selecet_phong = mysqli_query($con, "SELECT DISTINCT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong FROM phong, toa_nha, loai_phong, sinh_vien WHERE phong.xoa=0   and phong.idphong ='$_POST[chon_phong_tinhtrang12]'AND sinh_vien.gioi_tinh= toa_nha.loai_toa_nha AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong ");
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
						<th>Giá/người <br>/tháng (VNĐ)</th>
						<th>Sinh viên <br> đang ở</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$stt = 1;
					while ($row_phong = mysqli_fetch_array($selecet_phong)) {
						// đêm số sinh viên ở trong phong
						$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
					echo "
					<tr>
								<td style='text-align:center;'>$stt</td>
								<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
								<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
								<td class='canhgiua'>$row_phong[stt_tang]</td>
								<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>
								<td class='chuinthuong'>".number_format ($row_phong["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
								<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
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
			<?php
				}
			}
			?>