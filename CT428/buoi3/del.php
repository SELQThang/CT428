<?php
include('./session.php');
include('./connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "DELETE FROM sanpham WHERE idsp = $idspSelect";
$conn->query($sql);
$conn->close();
header('location: dssp.php');
