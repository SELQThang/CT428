<?php
$TenDangNhap = $_GET['TenDangNhap'];
$conn = new mysqli("localhost", "root", "", "id16021442_buoi3");
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection fail: " . $conn->connect_error);
}
$sql = "select tendangnhap from thanhvien where tendangnhap = '$TenDangNhap'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Trùng tên đăng nhập!";
}
$conn->close();
