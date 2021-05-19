<?php
session_start();
$conn = new mysqli("localhost", "root", "", "id16021442_buoi3");
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection fail: " . $conn->connect_error);
}
$tenDangNhap = $_SESSION['tendangnhap'];
$session_sql = mysqli_query($conn, "select * from thanhvien where tendangnhap = '$tenDangNhap'");
$row = mysqli_fetch_array($session_sql, MYSQLI_ASSOC);
$login_session = $row['tendangnhap'];
$id_session = $row['id'];
if (!isset($_SESSION['tendangnhap'])) {
    header("location: ./../buoi3/dangnhap.html");
    // die();
}
$idspSelect = $_GET['idSP'];
$sql = "select * from sanpham where idsp = '$idspSelect'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();

echo "
        <div class='' style='border: 1px solid black; padding: 10px;'>
            <table style='padding:10px;text-align: left; background-color: rgb(179, 179, 179); width: 100%;'>
                <tr>
                    <th style='font-weight: normal; width: 40%;'>ID sản phẩm:</th>
                    <td style='display: inline-block;  width: 40%;'>" 
                    . $row['idsp'] . 
                    "</td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                    <td></td>
                </tr>
                <tr>
                    <th style='font-weight: normal; width: 40%;'>Tên sản phẩm:</th>
                    <td style='display: inline-block;  width: 40%;'>"
                    . $row['tensp'] .
                    "</td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                    <td></td>
                </tr>
                <th style='font-weight: normal;'>Chi tiết sản phẩm:</th>
                <td>"
                . $row['chitietsp'] .
                "  
                </td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                    <td></td>
                </tr>
                <tr>
                    <th style='font-weight: normal;'>Giá sản phẩm:</th>
                    <td>"
                      .  $row['giasp'] .
                        "<span>(VND)</span>
                    </td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                </tr>
                <tr>
                    <th style='font-weight: normal;'>Hình ảnh sản phẩm:</th>
                    <td>
                        <img src='" . $row['hinhanhsp'] . "' alt='' style='width: 200px; height: 100px'>
                    </td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                    <td>
                        <!-- <input type='button' name='previous' value='Previous' onclick='changeimgItem(-1)'>
                        <input type='button' name='next' value='Next' onclick='changeimgItem(1)'> -->
                    </td>
                </tr>
                <tr>
                    <th style='height: 15px;'></th>
                    <td></td>
                </tr>
            </table>
        </div>
";
