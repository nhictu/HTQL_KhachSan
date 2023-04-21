<?php
include('./connect.php');

// $sql = "call phong";
// $ph = mysqli_query($conn, $sql);
// $stt = 1;

if (isset($_POST['makh'])) {
    $makh = $_POST['makh'];
    $ten = $_POST['ten'];
    $gt = $_POST['gt'];
    $sdt = $_POST['sdt'];
    $phong = $_POST['phong'];
    // var_dump($phong);

    // die();
    $sql1 = "CALL KH_Them('$makh','$ten','$gt','$sdt','$phong')";
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
            <a href="khachhang.php" class="btn btn-primary bg-success">Thông Tin Khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary">Quản lý Phòng Ở</a> |
            <a href="giaphong.php" class="btn btn-primary">Quản lý Giá Phòng</a>
        </div>
        <br>
        <div class="container-fluid row">
            <div class="col-3"></div>
            <div class="card col-6">
                <div class="text-uppercase text-center ">
                    <br>
                    <h2 class="font-weight-bold" style=" font-size:30px">Thêm Khách Hàng</h2>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="name">Mã KH: </label>
                            <input type="text" name="makh" class="form-control" maxlen="255" id="name" placeholder="Nhập mã khách hàng" value="" />

                        </div>

                        <div class="form-group">
                            <label for="name">Tên Khách Hàng:</label>
                            <input type="text" name="ten" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sinh viên" value="" />

                        </div>
                        <div class="form-group">
                            <label for="name">Giới tính:</label>
                            <input type="radio" name="gt" checked value="M" /> Nam
                            <input type="radio" name="gt" value="F" /> Nữ
                        </div>
                        <div class="form-group">
                            <label for="name">Số điện thoại:</label>
                            <input type="text" name="sdt" class="form-control" maxlen="255" id="name" placeholder="Nhập sô điện thoại" value="" />

                        </div>
                        <?php
                        $sql2 = "call phong";
                        $ph = mysqli_query($conn, $sql2);
                        ?>

                        <div class="form-group">
                            <label for="">Phòng:</label>
                            <select name="phong" id="">
                                <option value="-1">---Chọn--</option>
                                <?php foreach ($ph as $key => $value) {  ?>
                                    <option value="<?php echo $value['P_TenPhong'] ?>"><?php echo $value['P_TenPhong'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block text-uppercase" style="font-size: 20px;">Lưu Thông Tin</button>
                    </form>
                </div>
            </div>


</body>

</html>