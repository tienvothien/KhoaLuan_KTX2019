<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Trang chủ sinh viên</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			
			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['ho_sv'].
					$_SESSION['ten_sv'] ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#"  class="xemchitiettaikhoansv width_100px"  id="<?php echo $_SESSION['id_sinhvien']; ?>">Tài khoản</a></li>
						<li><a href="./../dulieu/dangxuat_sv.php">Đăng xuất</a></li>
						<li><a href="#" data-toggle="modal" data-target="#doimatkhau_sinhvien">Đổi mật khẩu</a></li>
						
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>