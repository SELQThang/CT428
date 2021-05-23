<?php
include('./session.php');
include('./connectDB.php');
$tensp = $_GET['tensp'];
$sql = "select idsp, tensp, giasp from sanpham where tensp like '%$tensp%'";
$result = $conn->query($sql);
$string = "";
while ($row = $result->fetch_assoc()) {
    $idItem = $row['idsp'];
    $tenItem = $row['tensp'];
    $giaItem = $row['giasp'];
    $string .= "
            <tr>
                <td>" . $idItem . "</td>
                <td>" . $tenItem . "</td>
                <td>" . $giaItem . "</td>
                <td>
                    <a href='./xemct.php?idSP=" . $idItem . "'>Xem chi tiết</a>
                </td>
                <td>
                    <a href='./edit.php?idSP=" . $idItem . "'>
                        <img src='./../img/edit.png' alt=''>
                    </a>
                </td>
                <td>
                    <a href='./del.php?idSP=" . $idItem . "'>
                        <img src='./../img/delete.png' alt=''>
                    </a>
                </td>
            </tr>    
    ";
}
echo $string;
$conn->close();
