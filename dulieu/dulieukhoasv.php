<?php
include 'conn.php';
	$trangbandau = 1; //khởi tạo trang ban đầu
	$soluongnoidung = 20; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)
	$soluongbai = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa=0");
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
	$selecet_khoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa=0 limit $start,$soluongnoidung ");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã khoa</th>
				<th>Tên khoa</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_khoa = mysqli_fetch_array($selecet_khoa)) {
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khoa[ma_khoa]</td>
				<td class='chuinthuong'>$row_khoa[ten_khoa]</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-primary btn-xs id_sua_khoa" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-success btn-xs view_chitietkhoa" /></td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-info btn-danger btn-xs xoa_lop" /></td>
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
		echo " <ul class='pagination phantrang_1123'>
										<li ><a href='./../admin/quanlykhoa.php?page=1'>&nbsp&nbspTrang đầu&nbsp&nbsp</a></li>
										";
							echo "";
							for ($trangbandau = 1; $trangbandau <= $tongsotrang; $trangbandau++) {
								echo "<li ><a href='./../admin/quanlykhoa.php?page={$trangbandau}'>{$trangbandau}</a></li>";
							}
							echo " <li><a href='./../admin/quanlykhoa.php?page=$tongsotrang'>&nbsp&nbspTrang cuối&nbsp&nbsp</a></li>
		</ul>";
		?>
	</div>
</div>
<?php
}?>
<?php
}
?>