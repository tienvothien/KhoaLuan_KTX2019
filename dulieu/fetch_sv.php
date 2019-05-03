<?php if (isset($_POST['id_toanha_tinhtrang'])) {
		$id_toanha_tinhtrang = $_POST['id_toanha_tinhtrang'];
		include 'conn.php';
		$sql_tang = "SELECT DISTINCT phong.stt_tang FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$id_toanha_tinhtrang'";
		$query_tang = mysqli_query($con, $sql_tang);
		echo " <option value=''>Chọn tầng</option>";
		while ($row_tang = mysqli_fetch_array($query_tang)) {
			$stt_tang = $row_tang['stt_tang'];
			echo "<option value='$stt_tang'> $stt_tang</option>";
		}

}//end tthong tin tang của tòa nhà
//thong tin tang phòng và của tòa nhà khi chọn phòng
if (isset($_POST['id_toanha_tinhtrang12']) && isset($_POST['tang_p_tinhtrang12'])) {
		$id_toanha_tinhtrang12 = $_POST['id_toanha_tinhtrang12'];
		$tang_p_tinhtrang12 = $_POST['tang_p_tinhtrang12'];
		include 'conn.php';
		$sql_phong = "SELECT phong.idphong, phong.ma_phong FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$id_toanha_tinhtrang12' AND phong.stt_tang='$tang_p_tinhtrang12'";
		$query_phong = mysqli_query($con, $sql_phong);
		echo " <option value=''>Chọn Phòng</option>";
		while ($row_phong = mysqli_fetch_array($query_phong)) {
			$idphong = $row_phong['idphong'];
			$ma_phong = $row_phong['ma_phong'];
			echo "<option value='$idphong'> $ma_phong</option>";
		}
}//end thong tin tang phòng và của tòa nhà khi chọn phòng
?>