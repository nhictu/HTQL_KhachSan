<?php
include('./connect.php');

if (isset($_POST['tenloai'])) {
    $tenloai = $_POST['tenloai'];
    $giamoi = $_POST['giamoi'];
    // var_dump($tenloai);
    // var_dump($giamoi);
    // die();
    $sql = "CALL gia_update('$tenloai','$giamoi')";
    // $sql = "CALL SV_Them('$mssv','$ten','$gt','$sdt','$phong')";
    $query = mysqli_query($conn, $sql);
    // $tmp = mysqli_fetch_array($query);


    if ($query) {
        // header('location : refresh:0');
        header('location: giaphong.php');
    } else {
        echo 'Lỗi';
    }
}
mysqli_close($conn);


?>
<?php
include('./connect.php');

if (isset($_GET['L_MaLoai'])) {

    $id = trim($_GET['L_MaLoai']);
    $data = mysqli_query($conn, "call gia_can_update('$id')");
    $loai = mysqli_fetch_assoc($data);
}
mysqli_close($conn);
?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Hệ Thống Quản Lý Khách Sạn</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/fa204eeff7.js" crossorigin="anonymous"></script>
</head>
</head>

<body>

    <div id="pageWrapper">
        <div id="header">
            <img src="" id="">
            <img src="" id="">
            <h2 id="siteTitle2">Hệ Thống Quản Khách Sạn</h2>
        </div>
        <div class="btn-primary">
            <a href="index.php" class="btn btn-primary ">Trang chủ</a> |
            <a href="khachhang.php" class="btn btn-primary ">Thông Tin khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary">Quản lý Phòng Ở</a> |
            <a href="giaphong.php" class="btn btn-primary bg-success">Quản lý Giá Phòng</a>

        </div>
        <br>
        <div class="container-fluid row">
            <div class="col-3"></div>
            <div class="card col-6">
                <div class="text-uppercase text-center ">
                    <br>
                    <h2 class="font-weight-bold" style=" font-size:30px">Thay Đổi Giá Phòng</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <input type="text" name="tenloai" hidden class="form-control" maxlen="255" id="name" value="<?php echo $loai['L_MaLoai'] ?>" />

                        </div>
                        <div class="form-group">
                            <label for="name">Phòng: </label>
                            <input type="text" name="tenloai1" readonly class="form-control" maxlen="255" id="name" value="<?php echo $loai['L_Ten'] ?>" />

                        </div>

                        <div class="form-group">
                            <label for="name">Giá: </label>
                            <input type="text" name="giamoi" class="form-control" maxlen="255" id="name" placeholder="Nhập mã Khách hàng" value="<?php echo $loai['G_Gia'] ?>" />

                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block text-uppercase" style="font-size: 20px;">Lưu Thông Tin</button>
                    </form>
                </div>
            </div>


</body>

</html>