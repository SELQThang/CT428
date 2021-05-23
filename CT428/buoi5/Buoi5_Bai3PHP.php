<?php
include('./session.php');
include('./connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "select * from sanpham where idsp = '$idspSelect'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<img src='$row[hinhanhsp]' style='width: 100%; height:300px' />";
$conn->close();