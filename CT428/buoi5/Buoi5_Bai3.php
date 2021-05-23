<?php
include('./session.php');
include('./connectDB.php');
$sql = "select idsp, tensp, giasp from sanpham";
$result = $conn->query($sql);
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
        <div class="" style="border: 1px solid black; padding: 10px; margin-top:20px;">
            <table style="width: 100%; text-align: center;">
                <thead>
                    <tr style="background-color: rgb(179, 179, 179);">
                        <th style="width: 10%;">STT</th>
                        <th style="width: 40%;">Tên sản phẩm</th>
                        <th style="width: 20%;">Giá sản phẩm</th>
                        <th style="width: 30%;" colspan="3">Lựa chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $string = "";
                    while ($row = $result->fetch_assoc()) {
                        $idItem = $row['idsp'];
                        $tenItem = $row['tensp'];
                        $giaItem = $row['giasp'];
                        $string .= "
                                <tr>
                                    <td>" . $idItem . "</td>
                                    <td onmouseover='show(" . $idItem . ")' onmouseout='hide()'>" . $tenItem . "</td>
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
                    ?>
                </tbody>
                <tfoot id="tfoot">
                    <tr>
                        <td colspan="6" id="hinhAnh" style="padding: 0; margin: 0; height: 300px"></td>
                    </tr>
                </tfoot>
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
        function show(idsp) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("hinhAnh").style = "visibility: visible";
                    document.getElementById("hinhAnh").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "Buoi5_Bai3PHP.php?idSP=" + idsp, true);
            xmlhttp.send();
        }

        function hide() {
            document.getElementById("hinhAnh").style = "visibility: hidden";
        }
    </script>
</body>

</html>