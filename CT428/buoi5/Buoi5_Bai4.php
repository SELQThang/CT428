<?php
include('./session.php');
include('./connectDB.php');
$sql = "select idsp, tensp, giasp from sanpham";
$result = $conn->query($sql);
$item = $result->fetch_all();
// echo "<script>console.log(JSON.parse('" . json_encode($item) . "'));</script>";

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
    table,
    td,
    th {
        border: 1px solid black;
        border-spacing: 0;
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
        <form action="">
            <label for="tim">Tìm kiếm sản phẩm:</label>
            <input type="text" value="" name="tim" onkeyup="search(this.value)">
        </form>
        <div class="" style="border: 1px solid black; padding: 10px; margin-top:20px;">
            <table style="width: 100%; text-align: center;">
                <thead>
                    <tr style="background-color: rgb(179, 179, 179);">
                        <th>STT</th>
                        <th style="width: 30%;">Tên sản phẩm</th>
                        <th style="width: 30%;">Giá sản phẩm</th>
                        <th style="width: 30%;" colspan="3">Lựa chọn</th>
                    </tr>
                </thead>
                <tbody id="res">
                    <?php
                    foreach ($item as $row) : array_map('htmlentities', $row); ?>
                        <tr>
                            <td><?php echo implode('</td><td>', $row); ?></td>
                            <td>
                                <a href='./xemct.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>Xem chi tiết</a>
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
    </div>
    <script type="text/javascript">
        function search(value) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("res").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "Buoi5_Bai4PHP.php?tensp=" + value, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>