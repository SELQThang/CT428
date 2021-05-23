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
    header("location: ./dangnhap_js.html");
    // die();
}
$sql = "select idsp, tensp, giasp from sanpham";
$result = $conn->query($sql);
$item = $result->fetch_all();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<style>
    #tblt,
    td,
    th {
        border: 1px solid black;
        border-spacing: 0;
    }

    #tblt td {
        border: 1px solid black;
        border-spacing: 0;
    }

    #tblt th {
        border: 1px solid black;
        border-spacing: 0;
    }

    table, td, th{
        border: none;
    }

    img {
        width: 25px;
        height: 25px;
    }

    th {
        padding: 0;
        margin: 0;
    }

    form {
        display: inline;
    }
</style>

<body>
    <div class="container" style="width: 40%; margin: 0 auto; text-align: center;margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: red; margin-top: 30px;">Xin chào: <?php echo $row['tendangnhap'] ?></h2>
        <p><strong>Danh sách sản phẩm của bạn là:</strong></p>
        <div class="" style="border: 1px solid black; padding: 10px;">
            <table style="width: 100%; text-align: center;" id="tblt">
                <thead>
                    <tr style="background-color: rgb(179, 179, 179);">
                        <th>STT</th>
                        <th style="width: 30%;">Tên sản phẩm</th>
                        <th style="width: 30%;">Giá sản phẩm</th>
                        <th style="width: 30%;" colspan="3">Lựa chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($item as $row) : array_map('htmlentities', $row); ?>
                        <tr>
                            <td><?php echo implode('</td><td>', $row); ?></td>
                            <td>
                                <!-- <a href='./Buoi5_Bai2PHP.php?idSP=<?php /*echo $idItem = $row[0][0]; */ ?>'>Xem chi tiết</a> -->
                                <input type="submit" style="border: none; background-color:transparent; cursor: pointer;" value="Xem chi tiết" onclick='showHint(<?php echo $idItem = $row[0][0] ?>)'>
                            </td>
                            <td>
                                <a href='./edit.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>
                                    <img src="./../img/edit.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href='./del.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>
                                    <img src="./../img/delete.png" alt="">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="./tuychon.php" class="form-inline">
                <button type="submit" style="padding: 10px; margin-top: 20px;">Trang chủ</button>
            </form>
            <form action="./themsp.php">
                <button type="submit" style="padding: 10px; margin-top: 20px;">Thêm sản phẩm</button>
            </form>
        </div>
        <div id="xemCT" style="margin-top: 20px;"></div>
        <script>
            function showHint(idItem) {
                if (idItem.length == "") {
                    document.getElementById("xemCT").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('xemCT').innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "Buoi5_Bai2PHP.php?idSP=" + idItem, true);
                    xmlhttp.send();
                }
            }
        </script>
    </div>
</body>

</html>