<?php
include('./connect.php');

if (isset($_GET['TTKH_MSKH'])) {

    $id = trim($_GET['TTKH_MSKH']);
    $data = mysqli_query($conn, "call ttkh_makh('$id')");

    $sv = mysqli_fetch_assoc($data);
    // var_dump($sv['TTSV_MSSV']);
    // die();
}
mysqli_close($conn);
?>

<?php
include('./connect.php');

if (isset($_POST['makh'])) {
    $makh = $_POST['makh'];
    $phong = $_POST['phong'];
    // var_dump($phong);

    // die();
    $sql1 = "CALL KH_UpdatePhong('$makh','$phong')";
    // $sql = "CALL SV_Them('$mssv','$ten','$gt','$sdt','$phong')";
    $query = mysqli_query($conn, $sql1);
    // $tmp = mysqli_fetch_array($query);

    // var_dump($tmp);
    // die();
    if ($query) {
        header('location: khachhang.php');
    } else {
        echo 'Lỗi';
    }
}


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
            <h2 id="siteTitle2">Hệ Thống Quản Lý Khách Sạn</h2>
        </div>
        <div class="btn-primary">
            <a href="index.php" class="btn btn-primary ">Trang chủ</a> |
            <a href="khachhang.php" class="btn btn-primary  bg-success">Thông Tin Khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary">Quản lý Phòng Ở</a> |
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
                            <label for="name">Mã Khách Hàng: </label>
                            <input type="text" name="makh" readonly class="form-control" maxlen="255" id="name" placeholder="Nhập mã khách hàng" value="<?php echo $sv['TTKH_MSKH'] ?>" />

                        </div>

                        <div class="form-group">
                            <label for="name">Tên Khách Hàng:</label>
                            <input type="text" name="ten" readonly class="form-control" maxlen="255" id="name" placeholder="Nhập tên khách hàng" value="<?php echo $sv['TTKH_Ten'] ?>" />

                        </div>


                        <?php
                        $sql2 = "call phong";
                        $ph = mysqli_query($conn, $sql2);
                        ?>
                        <div class="form-group">
                            <label for="">Phòng:</label>
                            <select name="phong" id="">
                                <option value="<?php echo $sv['TTKH_Phong'] ?>"><?php echo $sv['TTKH_Phong'] ?></option>
                                <?php foreach ($ph as $key => $value) {
                                    if ($value['P_TenPhong'] != $sv['TTKH_Phong']) { ?>
                                        <option value="<?php echo $value['P_TenPhong'] ?>"><?php echo $value['P_TenPhong'] ?></option>
                                    <?php } ?>
                                <?php } ?>

                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block text-uppercase" style="font-size: 20px;">Lưu Thông Tin</button>
                    </form>
                </div>
            </div>


</body>

</html>