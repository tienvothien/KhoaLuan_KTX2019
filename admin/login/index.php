<!DOCTYPE html>
<html lang="en"><head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="./../../images/vnkgu.png"/>
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="./../../js/js_md5.js"></script>
    <script type="text/javascript" src="1.js"></script>
    <link rel="stylesheet" href="vendor/bootstrap.css">
    <link rel="stylesheet" href="1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body >
    <div class="bg"></div>

    <div class="container-fluid">
        <div class="row text-right">
            <div class="login1">
                <div class="anhbia">
                    <img src="images/vnkgu.png" class="img-responsive" alt="Image">
                </div>
                <form action="index.php" method="POST" role="form" id="formdangnhap">
                    <legend >Đăng nhập</legend>
                    <div class="form-group">
                        <input type="text"  id="tendangnhap" name="tendangnhap" placeholder="" required="">
                        <label for="">Tên đăng nhập</label>
                    </div>
                    <div class="form-group">
                        <input type="password"  id="matkhaudangnhap" name="matkhaudangnhap" placeholder="" required="">
                        <label for="">Mật khẩu</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="nutdangnhap">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
