<?php
	include 'conn.php';
	$selecet_loai_phong = mysqli_query($con, "SELECT phong.idphong, phong.ma_phong, phong.stt_tang, toa_nha.id_toanha, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha FROM phong INNER JOIN toa_nha ON phong.id_toanha = toa_nha.id_toanha WHERE phong.xoa=0 and phong.id_loaiphong='$_GET[loaiphong]' ORDER BY toa_nha.id_toanha, phong.stt_tang, phong.ma_phong
");
	if (!mysqli_num_rows($selecet_loai_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Phòng</th>
				<th>Tên Tòa nhà</th>
				<th>Sinh Viên <br>đang ở</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_loai_phong = mysqli_fetch_array($selecet_loai_phong)) {
				// đếm số lượng phòng ở của tòa nhà
				
				$slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM  o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong='$row_loai_phong[idphong]'"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_loai_phong[ma_phong]</td>
				<td class='chuinthuong'>$row_loai_phong[ten_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$slsinhvien[slsinhvien]</td>
			";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_loai_phong['id_loaiphong']; ?>" class="btn btn-primary btn-xs id_sua_loai_phong" /></td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="&nbsp; Chi tiết &nbsp;" id="<?php echo $row_loai_phong['id_loaiphong']; ?>" class="btn btn-success btn-xs view_chitietloai_phong" />
					<a href="./../admin/danhsach_phong_cua_loai_phong.php?loaiphong=<?php echo $row_loai_phong['id_loaiphong']; ?>" title="">
						<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs ds_phong_cualoaiphong" />
					</a>
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