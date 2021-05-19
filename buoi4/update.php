<?php
include('./session.php');
include('./connectDB.php');
$idspUpdate = $_GET['idsp'];
$tenSP = $_POST['tenSP'];
$chiTietSP = $_POST['chiTietSP'];
$GiaSP = $_POST['GiaSP'];
$hinhSP = "./../img/" . $_FILES['hinhSP']['name'];
$idtv = $id_session;


$sql = "UPDATE sanpham SET  tensp = '$tenSP',
                            chitietsp = '$chiTietSP',
                            giasp = '$GiaSP',
                            hinhanhsp = '$hinhSP',
                            idtv = '$idtv'
                        where idsp = '$idspUpdate'";
if ($conn->query($sql) === TRUE) {
    move_uploaded_file($_FILES['hinhSP']['tmp_name'], $hinhSP);
    header('Location: dssp.php');
} else {
    echo "error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
