<?php
include('conn.php');

$tenNuocHoa = $_POST['tenNuocHoa'];
$hinhAnh = "./image/" . $_FILES['hinhAnh']['name'];
$muiHuongNuocHoa = $_POST['muiHuongNuocHoa'];
$phongCachNuocHoa = $_POST['phongCachNuocHoa'];
$gioiTinh = $_POST['gioiTinh'];
$dungTich = $_POST['dungTich'];
$gia = $_POST['gia'];
$nhanHieu = $_POST['nhanHieu'];
move_uploaded_file(
    $_FILES['hinhAnh']['tmp_name'],
    $hinhAnh
);
 
$sql = "INSERT INTO nuochoa(tennuochoa, hinhanh, muihuong, phongcach, gioitinh, dungtich, gia, thuocnhanhieu) VALUES ('$tenNuocHoa', '$hinhAnh', '$muiHuongNuocHoa', '$phongCachNuocHoa', '$gioiTinh', '$dungTich', '$gia', '$nhanHieu')";
$conn->query($sql);
$conn->close();
header('location: index.html');
