<?php
include 'conn.php';
	$trangbandau = 1; //khởi tạo trang ban đầu
	$soluongnoidung = 20; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)
	$soluongbai = mysqli_query($con, "SELECT * FROM lop WHERE lop.xoa=0");
	$total_record = mysqli_num_rows($soluongbai); //tính tổng số bản ghi có trong bảng posts
	$tongsotrang = ceil($total_record / $soluongnoidung); //tính tổng số trang sẽ chia
	//xem trang có vượt giới hạn không:
	if (isset($_GET["page"])) {
		$trangbandau = $_GET["page"];
	}
	//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
	if ($trangbandau < 1) {
		$trangbandau = 1;
	}
	//nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
	if ($trangbandau > $tongsotrang) {
		$trangbandau = $tongsotrang;
	}
	//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
	//tính start (vị trí bản ghi sẽ bắt đầu lấy):
	$start = ($trangbandau - 1) * $soluongnoidung;
	$selecet_lop = mysqli_query($con, "SELECT * FROM lop WHERE lop.xoa=0 limit $start,$soluongnoidung ");
	if (!mysqli_num_rows($selecet_lop)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<h3 class="canhgiua chuinhoa"> Danh Sách Lớp</h3>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Lớp</th>
				<th>Tên Lớp</th>
				<th>Khóa</th>
				<th>Niên Khóa</th>
				<th>Khoa</th>
				<th>Số lượng sinh viên</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
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
				$nam_kt = $row_lop['nam_BD']+4;
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_lop[ma_lop]</td>
				<td class='chuinthuong'>$row_lop[ten_lop]</td>
				<td class='chuinthuong canhgiua'>$row_lop[khoa]</td>
				<td class='chuinthuong canhgiua'>$row_lop[nam_BD] - $nam_kt</td>
				<td class='canhgiua chuinthuong'>$slkhoa[ten_khoa]</td>
				<td class='canhgiua'>$slsinh_vien[solsinh_vien]</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-primary btn-xs id_sua_lop" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-success btn-xs view_chitietlop" /></td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_lop['id_lop']; ?>" class="btn btn-info btn-danger btn-xs xoa_lop" /></td>
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>
	<?php if ($total_record > 20) {
	?>
	<div style="text-align: center;width: 100%; float: left; padding-right: ">
		<?php
		echo " 
			<ul class='pagination phantrang_1123'>
				<li ><a href='./../admin/quanlylop.php?page=1'>&nbsp&nbspTrang đầu&nbsp&nbsp</a></li>";
		for ($trangbandau = 1; $trangbandau <= $tongsotrang; $trangbandau++) {
			echo "<li ><a href='./../admin/quanlylop.php?page={$trangbandau}'>{$trangbandau}</a></li>";
		}
		echo " 
				<li>
					<a href='./../admin/quanlylop.php?page=$tongsotrang'>&nbsp&nbspTrang cuối&nbsp&nbsp</a>
				</li>
			</ul>";
		?>
	</div>
</div>
<?php
}?>
<?php
}
?>