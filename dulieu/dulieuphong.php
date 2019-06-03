<?php
include 'conn.php';
if (isset($_GET['toanha'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha='$_GET[toanha]' AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");

}elseif (isset($_GET['loaiphong'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_loaiphong='$_GET[loaiphong]' AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");

}elseif (isset($_GET['phong_day'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");

}elseif (isset($_GET['thietbi'])) {
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong, loaiphongcothietbi WHERE phong.xoa=0 AND toa_nha.xoa=0 AND loaiphongcothietbi.idtb='$_GET[thietbi]' and loaiphongcothietbi.xoa=0 and loaiphongcothietbi.id_loaiphong= loai_phong.id_loaiphong AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");

}elseif (isset($_GET['phong_co_sv_o'])) {
	$selecet_phong = mysqli_query($con, "SELECT DISTINCT  toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong, o_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong and o_phong.ngay_ket_thuc IS null AND phong.idphong = o_phong.id_phong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");

}elseif (isset($_GET['phong_khong_co_sv_o'])) {
	$selecet_phong = mysqli_query($con, "SELECT DISTINCT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND phong.idphong not in (SELECT o_phong.id_phong as sl_moi_p FROM o_phong, phong WHERE o_phong.ngay_ket_thuc IS null AND phong.idphong = o_phong.id_phong GROUP by o_phong.id_phong) and toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong
");

}else{
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha,toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
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
					<th>Tòa nhà</th>
					<th>Phòng</th>
					<th>Tầng</th>
					<th>Loại phòng</th>
					<th>Sinh viên <br> đang ở</th>
					<th>Sửa</th>
					<th>Chi tiết</th>
					<th>Sinh viên</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 1;
				while ($row_phong = mysqli_fetch_array($selecet_phong)) {
					if (isset($_GET['phong_day']) || isset($_GET['phong_con_cho'])) {
						$slsvop_1=$sl_nguoi_o_p=0;
						$slsvop=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) as slsvop FROM o_phong WHERE o_phong.ngay_ket_thuc IS NULL and o_phong.id_phong = '$row_phong[idphong]'"));
						$slsvop_1=$slsvop['slsvop'];
						// lấy số lượng lloaij phòng đó
						$sl_ngoclp=mysqli_fetch_array(mysqli_query($con, "SELECT loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM loai_phong, phong WHERE phong.xoa =0 AND phong.idphong='$row_phong[idphong]' AND loai_phong.xoa=0"));
						$sl_nguoi_o_p=$sl_ngoclp['sl_nguoi_o'];
						if ($slsvop_1==$sl_nguoi_o_p && isset($_GET['phong_day'])) {
						$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
						echo "
							<tr>
								<td style='text-align:center;'>$stt</td>
								<td class='chuinthuong canhgiua'> <span class='chuinhoa'>$row_phong[ma_toa_nha]</span> </td>
								<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
								<td class='canhgiua'>$row_phong[stt_tang]</td>
								<td class='chuinthuong'><span class='chuinhoa'>$row_phong[ma_loai_phong]</span>  -$row_phong[ten_loai_phong]</td>
								<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
								";
							?>
								<td class="canhgiuanek12">
									<input type="button" name="edit" value="Sửa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-primary btn-xs id_sua_phong" />
								</td>
								<td class="canhgiuanek12">
									<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
								</td>
								<td class="canhgiuanek12">
									<a href="./../admin/quanly_o_phong.php?phongo=<?php echo $row_phong['idphong']; ?>" title="">
										<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
									</a>
								</td>
								<td class="canhgiuanek12">
									<input type="button" name="delete" value="Xóa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-info btn-danger btn-xs xoa_phong" />
								</td>
								<?php echo "
							</tr>
						";
						$stt++;
						}
						if ($slsvop_1!=$sl_nguoi_o_p && isset($_GET['phong_con_cho'])){
							$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));
							echo "
								<tr>
									<td style='text-align:center;'>$stt</td>
									<td class='chuinthuong canhgiua'> <span class='chuinhoa'>$row_phong[ma_toa_nha]</span> </td>
									<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
									<td class='canhgiua'>$row_phong[stt_tang]</td>
									<td class='chuinthuong'><span class='chuinhoa'>$row_phong[ma_loai_phong]</span>  -$row_phong[ten_loai_phong]</td>
									<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
									";
								?>
									<td class="canhgiuanek12">
										<input type="button" name="edit" value="Sửa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-primary btn-xs id_sua_phong" />
									</td>
									<td class="canhgiuanek12">
										<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
									</td>
									<td class="canhgiuanek12">
										<a href="./../admin/quanly_o_phong.php?phongo=<?php echo $row_phong['idphong']; ?>" title="">
											<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
										</a>
									</td>
									<td class="canhgiuanek12">
										<input type="button" name="delete" value="Xóa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-info btn-danger btn-xs xoa_phong" />
									</td>
									<?php echo "
								</tr>
							";
							$stt++;
						}
					}else{
					// đêm số sinh viên ở trong phong
					$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$row_phong[idphong]'"));

				echo "
				<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong canhgiua'> <span class='chuinhoa'>$row_phong[ma_toa_nha]</span> </td>
						<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
						<td class='canhgiua'>$row_phong[stt_tang]</td>
						<td class='chuinthuong'><span class='chuinhoa'>$row_phong[ma_loai_phong]</span>  -$row_phong[ten_loai_phong]</td>
						<td class='canhgiua'>$slsinhvien[slsinhvien]/$row_phong[sl_nguoi_o]</td>
						";
					?>
					<td class="canhgiuanek12">
						<input type="button" name="edit" value="Sửa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-primary btn-xs id_sua_phong" />
					</td>
					<td class="canhgiuanek12">
						<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
					</td>
					<td class="canhgiuanek12">
						<a href="./../admin/quanly_o_phong.php?phongo=<?php echo $row_phong['idphong']; ?>" title="">
							<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
						</a>
					</td>
					<td class="canhgiuanek12">
						<input type="button" name="delete" value="Xóa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-info btn-danger btn-xs xoa_phong" />
					</td>
					<?php echo "
				</tr>
				";
				$stt++;
				}
				}
				?>
			</tbody>
		</table>
	</div>
		<?php
		}
	?>