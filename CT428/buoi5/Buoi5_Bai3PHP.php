<?php
include('./session.php');
include('./connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "select hinhanhsp from sanpham where idsp = '$idspSelect'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
echo "<img src='$row[hinhanhsp]' height='300' width='300' />";
