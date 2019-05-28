<?php
	include 'conn.php';
	$selecet_toa_nha = mysqli_query($con, "SELECT * FROM toa_nha WHERE toa_nha.xoa=0 ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha");
	if (!mysqli_num_rows($selecet_toa_nha)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Tòa Nhà</th>
				<th style="width: 150px">Tên Tòa Nhà</th>
				<th>Loại</th>
				<th>Số phòng</th>
				<th>Số Gường</th>
				<th>Sinh Viên <br>đang ở</th>
				<th>Gường <br>trống</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Danh sách</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			$tongsoguong=$tongsosvo=$tongsoguong_trong=$tongsophong=0;
			while ($row_toa_nha = mysqli_fetch_array($selecet_toa_nha)) {
				// đếm số lượng phòng ở của tòa nhà
				$slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$row_toa_nha[id_toanha]'"));
				$tongsophong+=$slphong['slphong'];
				// đếm số lượng gường
				$slguong = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(loai_phong.sl_nguoi_o) AS slguong FROM phong, loai_phong WHERE phong.xoa=0 AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.id_loaiphong=loai_phong.id_loaiphong"));
				$tongsoguong+=$slguong['slguong'];

				// đếm số lượng sinh viên của tòa nhà
				$slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is NULL AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.idphong=o_phong.id_phong"));
				$tongsosvo+=$slsinhvien['slsinhvien'];
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_toa_nha[ma_toa_nha]</td>
				<td class='chuinthuong'>$row_toa_nha[ten_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$row_toa_nha[loai_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$slphong[slphong] </td>
				<td class='chuinthuong canhgiua'>$slguong[slguong] </td>
				<td class='chuinthuong canhgiua'>$slsinhvien[slsinhvien] </td>
				<td class='chuinthuong canhgiua'>".($slguong['slguong']-$slsinhvien['slsinhvien'])." </td>
			";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_toa_nha['id_toanha']; ?>" class="btn btn-primary btn-xs id_sua_toa_nha" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_toa_nha['id_toanha']; ?>" class="btn btn-success btn-xs view_chitiettoa_nha" /></td>
				<td class="canhgiuanek12">
					<a href="./../admin/quanlyphong.php?toanha=<?php echo $row_toa_nha['id_toanha']; ?>" title="">
						<input type="button" name="view" value="Danh sách" class="btn btn-warning btn-xs " />
					</a>
				</td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_toa_nha['id_toanha']; ?>" class="btn btn-info btn-danger btn-xs xoa_toa_nha" /></td>
				<?php echo "
			</tr>
			";
			$stt++;
			$tongsoguong_trong=($tongsoguong-$tongsosvo);

			}
			
			?>
			<tr>
					<td class="canhgiua" style="color: red; font-size: 17px;"><?php echo $stt ?></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>
					<td class='canhgiua 'style="color: red; font-size: 17px;">Tổng</td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"><?php echo $tongsophong ?></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"><?php echo $tongsoguong ?></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"><?php echo $tongsosvo ?></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"><?php echo $tongsoguong_trong ?></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>
					<td class="canhgiua" style="color: red; font-size: 17px;"></td>

				</tr>
		</tbody>
	</table>

<?php
}
?>