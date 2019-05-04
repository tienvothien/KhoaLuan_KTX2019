<?php
include 'conn.php';
	
	$selecet_lop = mysqli_query($con, "SELECT * FROM lop WHERE lop.xoa=0 order by  id_khoa, khoa, ten_lop");
	if (!mysqli_num_rows($selecet_lop)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Lớp</th>
				<th style="    width: 80px;">Tên Lớp</th>
				<th>Khóa</th>
				<th style="    width: 140px;">Khoa</th>
				<th>Số lượng <br> sinh viên</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Danh sách</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_lop = mysqli_fetch_array($selecet_lop)) {
				// tinh số lượng sinh vien
				$slsinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_sinhvien) as solsinh_vien FROM sinh_vien WHERE id_lop='$row_lop[id_lop]'"));
				//tìm khoa
				$slkhoa = mysqli_fetch_array(mysqli_query($con, "SELECT khoa.ten_khoa FROM khoa WHERE id_khoa='$row_lop[id_khoa]'"));
				$nam_kt = $row_lop['khoa'];
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_lop[ma_lop]</td>
				<td class='chuinthuong'>$row_lop[ten_lop]</td>
				<td class='chuinthuong canhgiua'>$row_lop[khoa]</td>
				<td class=' chuinthuong'>$slkhoa[ten_khoa]</td>
				<td class='canhgiua'>$slsinh_vien[solsinh_vien]</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-primary btn-xs id_sua_lop" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-success btn-xs view_chitietlop" /></td>
				<td class="canhgiuanek12">
					<a href="./../admin/dssinhviencualop.php?lop=<?php echo $row_lop['id_lop']; ?>" title="">
						<input type="button" name="view" value="Danh sách" id="" class="btn btn-success btn-xs " />
					</a>
				</td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-info btn-danger btn-xs xoa_lop" /></td>
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
}?>
