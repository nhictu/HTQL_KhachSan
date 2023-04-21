<?php
include('./connect.php');

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
}

$err = [];
$sql = "select kt_phong('$keyword')";
$sv = mysqli_query($conn, $sql);
$s = mysqli_fetch_assoc($sv);

if (!empty($s["kt_phong('$keyword')"])) {
    $sql1 = "call search_phong('$keyword')";
    $query = mysqli_query($conn, $sql1);
    $sr = mysqli_fetch_assoc($query);
} else {
    $err['phong'] = "Tên phòng không tồn tại!";
}
$stt = 1;
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
    <style>
        .err {
            color: red;
        }
    </style>
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
                    <div class="mb-3 ml-5" style="float: right;">
                        <form class="form-inline" method="GET" action="searchphong.php">
                            <?php if (!empty($s["kt_phong('$keyword')"])) { ?>
                                <input class="form-control mr-sm-2" type="text" placeholder="Nhập tên phòng..." name="keyword" value="<?php echo $sr['P_TenPhong'] ?>">
                            <?php } else { ?>
                                <input class="form-control mr-sm-2" type="text" placeholder="<?php echo $err['phong'] ?>" name="keyword" value="">
                            <?php } ?>
                            <button class="btn btn-primary" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                        </form>
                    </div>
                    <div class="mt-4 text-info" style="font-size: 30px;"><b>THÔNG TIN PHÒNG Ở</b></div>

                </div>

                <table id="contacts" class="table table-bordered  table-striped mt-3" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên phòng</th>
                            <th>Đang ở</th>
                            <th>Còn trống</th>
                            <th>Sức chứa</th>
                            <th>Loại phòng</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($s["kt_phong('$keyword')"])) { ?>
                            <tr>
                                <td><?php echo $stt++ ?></td>
                                <td><?php echo $sr['P_TenPhong'] ?></td>
                                <td><?php echo $sr['P_SoLuongDangO'] ?></td>
                                <td><?php echo $sr['P_ConTrong'] ?></td>
                                <td><?php echo $sr['L_SucChua'] ?></td>
                                <td><?php echo $sr['L_Ten'] ?></td>
                                <td> <a href="ctphong.php?P_TenPhong=<?php echo $value['P_TenPhong'] ?>" class="btn  btn-primary" title="chitiet">Chi tiết</a>
                                    <a href="editphong.php?P_TenPhong=<?php echo $value['P_TenPhong'] ?>" class="btn  btn-info" title="xoa">Edit</a>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <div class="err mb-2"><?php echo $err['phong'] ?></div>
                        <?php } ?>
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