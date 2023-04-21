<?php
include('./connect.php');
$tmp = 0;
$sql = "CALL gia";
$sv = mysqli_query($conn, $sql);

$stt = 1;
// while(mysqli_next_result(($conn)){
// $t = mysqli_close($conn);
// $sql1 = "select tongthu()";
// $tongthu = mysqli_query($conn, $sql1);
// }

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

<body>

    <div id="pageWrapper">
        <div id="header">
            <img src="" id="">
            <img src="" id="">
            <h2 id="siteTitle2">Hệ Thống Quản Lý Khách Sạn</h2>
        </div>
        <div class="btn-primary">
            <a href="index.php" class="btn btn-primary ">Trang chủ</a> |
            <a href="khachhang.php" class="btn btn-primary">Thông Tin Khách Hàng</a> |
            <a href="phong.php" class="btn btn-primary">Quản lý Phòng Ở</a> |
            <a href="giaphong.php" class="btn btn-primary bg-success">Quản lý Giá Phòng</a>

        </div>

        <div>
            <div class="mt-4 ml-5 mr-5 mb-5">

                <div class="mt-1 row">
                    <div class="mt-2 mb-2 text-info col-9" style="font-size: 30px;"><b>THÔNG TIN GIÁ PHÒNG</b></div>
                    </div>
                    <table id="contacts" class="table table-bordered  table-striped mt-3" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Loại phòng</th>
                                <th>Tên phòng</th>
                                <th>Sức chứa</th>
                                <th>Giá</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sv as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $stt++ ?></td>


                                    <td><?php echo $value['L_MaLoai'] ?></td>

                                    <td><?php echo $value['L_Ten'] ?></td>

                                    <td><?php echo $value['L_SucChua'] ?></td>

                                    <td><?php echo $value['G_Gia'] ?>đ</td>
                                    <td>
                                        <a href="update_gia.php?L_MaLoai=<?php echo $value['L_MaLoai'] ?>" class="btn  btn-info" title="xoa">Edit</a>
                                    </td>
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