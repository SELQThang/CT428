<?php
include('./session.php');
include('./connectDB.php');
$tenSP = $_POST['tenSP'];
$chiTietSP = $_POST['chiTietSP'];
$GiaSP = $_POST['GiaSP'];
$hinhSP = "./../img/" . $_FILES['hinhSP']['name'];
$idtv = $id_session;

$sql = "INSERT INTO sanpham(tensp,chitietsp,giasp,hinhanhsp,idtv) VALUES('$tenSP', '$chiTietSP', '$GiaSP', '$hinhSP', '$idtv')";
if ($conn->query($sql) === TRUE) {
    move_uploaded_file($_FILES['hinhSP']['tmp_name'], $hinhSP);
    header('Location: dssp.php');
} else {
    echo "error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
