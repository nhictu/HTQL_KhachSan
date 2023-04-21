<?php
include('./connect.php');
$tmp = 0;
if (isset($_POST['xs'])) {
    $tmp = $_POST['xs'];
    // var_dump($tmp);
    // die();
    if ($tmp == 2) {
        $sql = "CALL sx_ttkh_ten";
        $sv = mysqli_query($conn, $sql);
    } else if ($tmp == 3) {
        $sql = "CALL sx_ttkh_phong";
        $sv = mysqli_query($conn, $sql);
    } else {
        $sql = "CALL sx_ttkh_makh";
        $sv = mysqli_query($conn, $sql);
    }
} else {
    $sql = "CALL sx_ttkh_makh";
    $sv = mysqli_query($conn, $sql);
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
        <div>
            <div class="mt-4 ml-5 mr-5 mb-5">
                <div class="mt-1">
                    <div class="mb-3 ml-5" style="float: right;">
                        <form class="form-inline" method="GET" action="searchkh.php">
                            <input class="form-control mr-sm-2" type="text" placeholder="Nhập mã khách hàng..." name="keyword">
                            <button class="btn btn-primary" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                        </form>
                        <a href="themkh.php" class="btn btn-primary m-4" style="float: right;">
                            <i class="fa fa-plus"></i>Khách Hàng Mới</a>
                    </div>

                    <div class="mt-4 text-info" style="font-size: 30px;"><b>THÔNG TIN KHÁCH HÀNG</b></div>
                </div>
                <div class="mt-3">
                    <?php if ($tmp == 1) { ?>
                        <form class="form-inline" method="POST" action="khachhang.php">Sắp xếp theo:
                            <select name="xs" id="" class="ml-2">
                                <option value="1">Mã Khách hàng</option>
                                <option value="2">Tên</option>
                                <option value="3">Phòng</option>
                            </select>
                            <button class="btn btn-primary ml-2" name="sx" type="submit">Cập nhật</i></button>
                        </form>
                    <?php } else if ($tmp == 2) { ?>
                        <form class="form-inline" method="POST" action="khachhang.php">Sắp xếp theo:
                            <select name="xs" id="" class="ml-2">
                                <option value="2">Tên</option>
                                <option value="1">Mã khách Hàng</option>
                                <option value="3">Phòng</option>
                            </select>
                            <button class="btn btn-primary ml-2" name="sx" type="submit">Cập nhật</i></button>
                        </form>
                    <?php } else  if ($tmp == 3) { ?>
                        <form class="form-inline" method="POST" action="khachhang.php">Sắp xếp theo:
                            <select name="xs" id="" class="ml-2">
                                <option value="3">Phòng</option>
                                <option value="1">Mã Khách Hàng</option>
                                <option value="2">Tên</option>
                            </select>
                            <button class="btn btn-primary ml-2" name="sx" type="submit">Cập nhật</i></button>
                        </form>
                    <?php } else { ?>
                        <form class="form-inline" method="POST" action="khachhang.php">Sắp xếp theo:
                            <select name="xs" id="" class="ml-2">
                                <option value="1">Mã Khách Hàng</option>
                                <option value="2">Tên</option>
                                <option value="3">Phòng</option>
                            </select>
                            <button class="btn btn-primary ml-2" name="sx" type="submit">Cập nhật</i></button>
                        </form>
                    <?php } ?>
                </div>
                <table id="contacts" class="table table-bordered  table-striped" style="width: 100%;">
                    <thead>
                        <tr class="">
                            <th>STT</th>
                            <th>Mã Khách Hàng</th>
                            <th>Tên KH</th>
                            <th>Giới tính</th>
                            <th>Số điện thoại</th>
                            <th>Phòng</th>
                            <th>Action</th>
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
                                <td><?php echo $value['TTKH_Phong'] ?></td>
                                <td><a href="edit.php?TTKH_MSKH=<?php echo $value['TTKH_MSKH'] ?> " class="btn btn-info" title="xoa">Edit</a>
                                    <a href="delete.php?TTKH_MSKH=<?php echo $value['TTKH_MSKH'] ?> " class="btn  btn-danger" title="delete" onclick="return confirm ('Bạn có muốn xóa khách hàng <?php echo $value['TTKH_MSKH'] ?> không ?')">Delete</a>
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