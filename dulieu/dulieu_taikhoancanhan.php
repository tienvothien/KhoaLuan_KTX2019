<?php
include 'conn.php';
	
	$selecet_ttcanhan = mysqli_query($con, "SELECT can_bo.id_canbo, can_bo.hinhanh, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo, can_bo.gioitinh, can_bo.ngay_sinh, can_bo.sdt, can_bo.email, chucvu.idchucvu, chucvu.tenchucvu FROM can_bo INNER JOIN cochucvu ON can_bo.id_canbo = cochucvu.id_canbo INNER JOIN chucvu ON cochucvu.idchucvu = chucvu.idchucvu WHERE can_bo.id_canbo ='$_SESSION[id_canbo]' AND can_bo.xoa =0 ");
	if (!mysqli_num_rows($selecet_ttcanhan)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
		$row_canhan = mysqli_fetch_array($selecet_ttcanhan);
			
?>
<div class="table-responsive">
	<table class="table table-hover " width="50%" id="tt_cannhan">
		
		<tbody>
			<tr>
				<th width="30%" style="text-align: right;"> Ảnh cá nhân:</th>
				<td class=""><img src="./../images/<?php echo $row_canhan['hinhanh'] ?>"  style =" width: 100px; " class="img-responsive" alt="Image"></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Mã số:</th>
				<td class=""><?php echo $row_canhan['ma_can_bo'] ?></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Họ và tên:</th>
				<td class=""><?php echo $row_canhan['ho_can_bo'] . $row_canhan['ten_can_bo']?></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Ngày sinh:</th>
				<td class=""><?php echo date('d/m/Y', strtotime($row_canhan['ngay_sinh'])) ?></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Giới tính:</th>
				<td class=""><?php echo $row_canhan['gioitinh'] ?></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Số điện thoại:</th>
				<td class=""><?php echo $row_canhan['sdt'] ?></td>
			</tr>
			<tr>
				<th width="30%" style="text-align: right;"> Email:</th>
				<td class=""><?php echo $row_canhan['email'] ?></td>
			</tr>
			<tr>
				<th width="30%"   style="text-align: right;"> Chức vụ:</th>
				<td class='chuinthuong'>
					<?php 
					$selecet_s3 = mysqli_query($con, "SELECT chucvu.tenchucvu FROM can_bo INNER JOIN cochucvu ON can_bo.id_canbo = cochucvu.id_canbo INNER JOIN chucvu ON cochucvu.idchucvu = chucvu.idchucvu WHERE can_bo.id_canbo ='$_SESSION[id_canbo]' AND can_bo.xoa=0 and cochucvu.xoa=0 order by chucvu.idchucvu "); 
					while ($row_canhan2 = mysqli_fetch_array($selecet_s3)) {
						echo " - ".$row_canhan2['tenchucvu']."<br>";
					} 
				?>
				</td>
			</tr>

		</tbody>
	</table>
	
<?php
}
?>