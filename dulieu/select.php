<?php
include 'kiemtradangnhap.php';
  if (isset($_POST["id_chitietkhoa"])) {
  $output = '';
  include 'conn.php';
  $query = "SELECT * FROM khoa INNER JOIN can_bo ON khoa.id_canbothem = can_bo.id_canbo WHERE khoa.xoa=0 AND khoa.id_khoa='".$_POST["id_chitietkhoa"] . "'";
  $result = mysqli_query($con, $query);
  $output .= '
<div class="table-responsive">
  <table class="table table-bordered table-hover">';
      while ($row = mysqli_fetch_array($result)) {
        //dem số lượng lớp đang có sinh viên ở
        //đếm số lượng sinh viên đang ở trong ký túc xá
        $output .= '
    <tr>
      <td width="30%"><label>Mã khoa</label></td>
      <td width="70%" style="text-transform: uppercase;">' . $row["ma_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Tên khoa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Cán bộ thêm</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ho_can_bo"] . " " . $row["ten_can_bo"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Ngày thêm</label></td>
      <td width="70%">' . date('d/m/Y', strtotime($row["ngay"])) . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng lớp</label></td>
      <td width="70%" style=" text-transform: capitalize;">nhó viets thuat toán</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng sinh viên</label></td>
      <td width="70%" style=" text-transform: capitalize;">nhó viets thuat toán</td>
    </tr>
    ';
      }
      $output .= '
  </table>
</div>
';
  echo $output;
}
// dữ liệu lớp
  if (isset($_POST["id_chitietlop"])) {
  $output = '';
  include 'conn.php';
  $query = "SELECT * FROM  khoa INNER JOIN  lop  on lop.id_khoa = khoa.id_khoa INNER JOIN can_bo ON lop.id_canbothem = can_bo.id_canbo WHERE lop.xoa=0  and lop.id_lop='".$_POST["id_chitietlop"] . "'";
  $result = mysqli_query($con, $query);
  $output .= '
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">';
      while ($row = mysqli_fetch_array($result)) {
        //dem số lượng lớp đang có sinh viên ở
        //đếm số lượng sinh viên đang ở trong ký túc xá
        $output .= '
    <tr>
      <td width="30%"><label>Mã Lớp</label></td>
      <td width="70%" style="text-transform: uppercase;">' . $row["ma_lop"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Tên Lớp</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_lop"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Khoa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Cán bộ thêm</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ho_can_bo"] . " " . $row["ten_can_bo"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Ngày thêm</label></td>
      <td width="70%">' . date('d/m/Y', strtotime($row["ngay"])) . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng sinh viên</label></td>
      <td width="70%" style=" text-transform: capitalize;">nhớ viết thuật toán tính số lượng</td>
    </tr>
    ';
      }
      $output .= '
  </table>
</div>
';
  echo $output;
 }// end xử lý hiện thông tin lớp
?>