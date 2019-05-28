<?php
include './../dulieu/kiemtradangnhap_sinhvien.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
    <title> Hệ thông KTX ĐH Kiên Giang </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
    <script type="text/javascript" src="./../vendor/bootstrap.js"></script>
    <script type="text/javascript" src="./../js/js_md5.js"></script>
    <script type="text/javascript" src="./../js/js_sinhvien1.js"></script>
    <link rel="stylesheet" href="./../vendor/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/ad_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body >
    <div class="container-fluid">
        <a href="index.php" title="">
            <div class="container-fluid">
                <div class="row anhbia  text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img class="img-responsive" src="../images/anhbia.PNG" alt="">
                    </div>
                </div>
            </div>
        </a>
        <div class="container-fluid">
            <div class="row">
                <?php include 'menutrai2.php';?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 benphai">
                    <div class="container-fluid">
                        <div class="row"><!-- nho doi ten class -->
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3" >
                            <a href="#"  class="xemchitiettaikhoansv width_100px"  id="<?php echo $_SESSION['id_sinhvien']; ?>">
                                <div class="thumbnail maunen-1" >
                                    <div class="caption text-center mauchu123">
                                        <h3>Thông Tin</h3>
                                        <p>
                                            <i class="fa fa-address-book fa-3x" aria-hidden="true"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#timban_ocungphong" class=" width_100px"  id="<?php echo $_SESSION['id_sinhvien']; ?>">
                                <div class="thumbnail maunen-2">
                                    <div class="caption text-center mauchu123">
                                        <h3>Tìm bạn</h3>
                                        <p>
                                            <i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#tinh_trang_phong1_modal"  class="tinh_trang_phong1 width_100px"  id="<?php echo $_SESSION['id_sinhvien']; ?>">
                                <div class="thumbnail maunen-3">
                                    <div class="caption text-center mauchu123">
                                        <h3>Tình trạng phòng</h3>
                                        <p>
                                            <i class="fa fa-search fa-3x" aria-hidden="true"></i>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div><!-- end thaydoi1 -->
                        </div><!-- end noidungthaydoi -->
                        </div> <!-- end col-9 -->
                        </div> <!-- end row noi dung -->
                        <?php include './../admin/food.php'; ?>
                    </div>
                </body>
            </html>
            <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
            } );
            </script>
            <!-- xem thông tin sinhvien -->
            <div id="dataModal" class="modal fade">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thông tin Sinh viên</h4>
                        </div>
                        <div class="modal-body" id="thongtin_chitietsinh_vien123">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="timban_ocungphong" class="modal fade">
                <div class="modal-dialog " style=" width: 60%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thông tin danh sách sinh viên</h4>
                        </div>
                        <div class="modal-body" id="dl_ds_sinhvien_timban"><?php include './../dulieu/dulieu_timbab_o_phong.php'; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="doimatkhau_sinhvien" class="modal fade">
                <div class="modal-dialog width_350px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Đổi mật khẩu</h4>
                        </div>
                        <div class="modal-body" >
                            <form action="" method="POST" role="form" id="doi_matkhau_tk_sv" enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
                                <div class="form-group">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" id="mat_khau_cu_sv" name="mat_khau_cu_sv" placeholder="Nhập mật khẩu củ" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="mat_khau_moi_sv" name="mat_khau_moi_sv" placeholder="Nhập mật khẩu mới" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="nhapkai_mat_khau_moi_sv" name="mat_khau_moi_sv" placeholder="Nhập lại mật khẩu mới" required="">
                                </div>
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tinh_trang_phong1_modal" class="modal fade">
                <div class="modal-dialog " style=" width: 60%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tình trạng phòng cần tìm</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="">Tòa nhà</label>
                                    <select name="id_toanha_tinhtrang" id="id_toanha_tinhtrang" class="form-control" required="required">
                                        <option value="">Chọn tòa nhà</option>
                                        <?php
                                        include './../dulieu/conn.php';
                                        $q_tn = (mysqli_query($con,"SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, toa_nha.loai_toa_nha FROM toa_nha, sinh_vien WHERE toa_nha.xoa=0 AND sinh_vien.id_sinhvien='$_SESSION[id_sinhvien]' AND sinh_vien.gioi_tinh= toa_nha.loai_toa_nha ORDER BY toa_nha.ten_toa_nha"));
                                        while ($r_tn = mysqli_fetch_array($q_tn)) {
                                        echo "<option value='".$r_tn['id_toanha']."'>".$r_tn['ten_toa_nha']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="">Tầng</label>
                                    <select name="tang_p_tinhtrang" id="tang_p_tinhtrang" class="form-control" required="required">
                                        <option value="">Chọn tầng</option>
                                        
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="">Phòng</label>
                                    <select name="chon_phong_tinhtrang" id="chon_phong_tinhtrang" class="form-control" required="required">
                                        <option value="">Chọn Phòng</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div id="dl_tinhtrangphong"><?php include './../dulieu/dulieuphong_tinhtrang.php'; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>