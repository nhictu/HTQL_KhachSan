<?php
include('./connect.php');

// $sql = "call phong";
// $ph = mysqli_query($conn, $sql);
// $stt = 1;

if (isset($_GET['P_TenPhong'])) {

    $id = trim($_GET['P_TenPhong']);
    $data = mysqli_query($conn, "call phong_maphong( '$id')");
    $tenph = mysqli_fetch_assoc($data);
    // var_dump($tenph['P_TenPhong']);
    // die();
}
mysqli_close($conn);
?>
<?php

include('./connect.php');

if (isset($_POST['tenphong'])) {
    $tenphong = $_POST['tenphong'];
    $tenloaiphong = $_POST['tenloaiphong'];
    // var_dump($tenphong);
    // die();
    $sql1 = "CALL phong_UpdatePhong('$tenphong','$tenloaiphong')";
    // $sql = "CALL SV_Them('$mssv','$ten','$gt','$sdt','$phong')";
    $query = mysqli_query($conn, $sql1);
    // $tmp = mysqli_fetch_array($query);

    // var_dump($tmp);
    // die();
    if ($query) {
        header('location: phong.php');
    } else {
        echo 'Lỗi';
    }
}
mysqli_close($conn);

?>


<?php
include('./connect.php');
$sql2 = "call loaiphong";
$loaiph = mysqli_query($conn, $sql2);
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
            <img src="images/logo1.png" id="logo">
            <img src="images/logo2.png" id="logo2">
            <h2 id="siteTitle2">Hệ Thống Quản Lý Khách Sạn</h2>
        </div>
        <div class="btn-primary">
            <a href="index.php" class="btn btn-primary ">Trang chủ</a> |
            <a href="khachhang.php" class="btn btn-primary  ">Thông Tin Khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary bg-success">Quản lý Phòng Ở</a> |
            <a href="giaphong.php" class="btn btn-primary">Quản lý Giá Phòng</a>

        </div>
        <br>
        <div class="container-fluid row">
            <div class="col-3"></div>
            <div class="card col-6">
                <div class="text-uppercase text-center ">
                    <br>
                    <h2 class="font-weight-bold" style=" font-size:30px">Thay Đổi Phòng</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <label for="name">Tên phòng </label>
                            <input type="text" name="tenphong" readonly class="form-control" maxlen="255" id="name" placeholder="Nhập mã khách hàng" value="<?php echo $tenph['P_TenPhong'] ?>" />

                        </div>



                        <div class="form-group">
                            <label for="">Phòng:</label>
                            <select name="tenloaiphong" id="">
                                <option value="<?php echo $tenph['L_Ten'] ?>"><?php echo $tenph['L_Ten'] ?></option>
                                <?php foreach ($loaiph as $key => $value) {
                                    if ($value['L_MaLoai'] != $tenph['P_LoaiPhong']) { ?>
                                        <option value="<?php echo $value['L_Ten'] ?>"><?php echo $value['L_Ten'] ?></option>
                                    <?php } ?>
                                <?php } ?>

                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block text-uppercase" style="font-size: 20px;">Lưu Thông Tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>