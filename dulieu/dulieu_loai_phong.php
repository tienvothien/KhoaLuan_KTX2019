<?php
	include 'conn.php';
	$selecet_loai_phong = mysqli_query($con, "SELECT * FROM loai_phong WHERE loai_phong.xoa=0 ");
	if (!mysqli_num_rows($selecet_loai_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Loại phòng</th>
				<th>Tên Loại phòng</th>
				<th>Giá phòng/ <br> người/tháng <br> (VNĐ)</th>
				<th>Người ở</th>
				<th>Số phòng</th>
				<th>Số Gường</th>
				<th>Sinh Viên <br>đang ở</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Danh sách</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_loai_phong = mysqli_fetch_array($selecet_loai_phong)) {
				// đếm số lượng phòng ở của tòa nhà
				$slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_loaiphong='$row_loai_phong[id_loaiphong]'"));
				// đếm số lượng gường
				$slguong = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(loai_phong.sl_nguoi_o) AS slguong FROM phong, loai_phong WHERE phong.xoa=0 AND phong.id_loaiphong='$row_loai_phong[id_loaiphong]' AND phong.id_loaiphong=loai_phong.id_loaiphong"));
				// đếm số lượng sinh viên của tòa nhà
				$slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM phong, o_phong WHERE phong.xoa=0 and o_phong.ngay_ket_thuc='' AND phong.id_loaiphong='$row_loai_phong[id_loaiphong]' AND phong.idphong=o_phong.id_ophong"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_loai_phong[ma_loai_phong]</td>
				<td class='chuinthuong'>$row_loai_phong[ten_loai_phong] </td>
				<td class='chuinthuong canhgiua'>". number_format ($row_loai_phong["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'>$row_loai_phong[sl_nguoi_o] </td>
				<td class='chuinthuong canhgiua'>$slphong[slphong] </td>
				<td class='chuinthuong canhgiua'>$slguong[slguong] </td>
				<td class='chuinthuong canhgiua'>$slsinhvien[slsinhvien] </td>
			";?>
				<td class="canhgiuanek12">
					<input type="button" name="edit" value="Sửa" id="<?php echo $row_loai_phong['id_loaiphong']; ?>" class="btn btn-primary btn-xs id_sua_loai_phong" /></td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="&nbsp; Chi tiết &nbsp;" id="<?php echo $row_loai_phong['id_loaiphong']; ?>" class="btn btn-success btn-xs view_chitietloai_phong" />
					
				</td>
				<td class="canhgiua">
					<a href="./../admin/danhsach_phong_cua_loai_phong.php?loaiphong=<?php echo $row_loai_phong['id_loaiphong']; ?>" title="">
					<input type="button" name="view" value="Danh sách" id="" class="btn btn-info btn-xs ds_phong_cualoaiphong" /></a>
				</td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_loai_phong['id_loaiphong']; ?>" class="btn btn-info btn-danger btn-xs xoa_loai_phong" /></td>
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