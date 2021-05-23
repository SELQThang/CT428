<?php
$db = mysqli_connect("localhost", "root", "", "id16021442_buoi3");
session_start();
$tenDangNhap = $_SESSION['tendangnhap'];
$session_sql = mysqli_query($db, "select * from thanhvien where tendangnhap = '$tenDangNhap'");
$row = mysqli_fetch_array($session_sql, MYSQLI_ASSOC);
$login_session = $row['tendangnhap'];
$id_session = $row['id'];
if (!isset($_SESSION['tendangnhap'])) {
    header("location: ./dangnhap_js.html");
    die();
}
