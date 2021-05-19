<?php
    session_start();
    $tenDangNhap = $_POST['tenDangNhap'];
    $matKhau = md5($_POST['matKhau']);
    include('./connectDB.php');
    $sql = "select * from thanhvien where tendangnhap = '$tenDangNhap' and matkhau = '$matKhau'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['tendangnhap'] = $tenDangNhap;
        header("Location: ./tuychon.php");
    } else {
        echo "Sai thông tin đăng nhập!";
    }
    $conn->close();
