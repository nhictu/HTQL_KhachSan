<?php
include('./connect.php');

if (isset($_GET['P_TenPhong'])) {
    $tenphong = $_GET['P_TenPhong'];

    $sql = "call ctphong('$tenphong')";
    $sv = mysqli_query($conn, $sql);
    // $s = mysqli_fetch_assoc($sv);
    // var_dump(empty($s["kt_mssv('$keyword')"]));
    // die();
}
$stt=1;
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
            <a href="khachhang.php" class="btn btn-primary">Thông Tin Khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary bg-success">Quản lý Phòng Ở</a> |
            <a href="giaphong.php" class="btn btn-primary">Quản lý Giá Phòng</a>
        </div>

        <div>
            <div class="mt-4 ml-5 mr-5 mb-5">
                <div class="mt-1">
                    
                    <div class="mt-4 mb-3 text-info" style="font-size: 30px;"><b>THÔNG TIN KHÁCH HÀNG Ở PHÒNG <?php echo $tenphong?></b></div>

                </div>
                <table id="contacts" class="table table-bordered  table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Khách Hàng</th>
                            <th>Tên SV</th>
                            <th>Giới tính</th>
                            <th>Số điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sv as $key => $value) : ?>
                            <tr>
                                <td><?php echo $stt++ ?></td>


                                <td><?php echo $value['TTKH_MSKH'] ?></td>

                                <td><?php echo $value['TTKH_Ten'] ?></td>

                                <td><?php echo $value['TTKH_GioiTinh'] ?></td>

                                <td><?php echo $value['TTKH_SDT'] ?></td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <hr>
                <div class="m-3">Copyright&copy;liennhi</div>
            </div>
        </div>
        <!-- <div class="">


            <div class="mt-1 ml-5">
                <div class="mb-3 ml-5" style="float: right;">
                    <form class="form-inline" method="GET" action="search_donhang.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search..." name="keyword">
                        <button class="btn btn-primary" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                    </form>
                </div>
                <div class="mt-4 text-info "><b>THÔNG TIN SINH VIÊN:</b></div>

            </div>
            <div class="text-center">
                <hr>
                <div class="m-3">Copyright&copy;CT467_B1910154</div>
            </div>
        </div> -->
    </div>
    <div class="col-1"></div>


</body>

</html>