<?php
include('./connect.php');

if (isset($_GET['TTKH_MSKH'])) {
    $makh = $_GET['TTKH_MSKH'];
    // var_dump($mssv);
    // die();
    $sql = "CALL KH_Xoa('$makh');";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // header('location : refresh:0');
        header('location: khachhang.php');
    } else {
        echo 'Lỗi';
    }
}
