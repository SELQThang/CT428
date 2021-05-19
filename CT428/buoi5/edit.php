<?php
include('./session.php');
include('./connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "select tensp, chitietsp, giasp, hinhanhsp from sanpham where idsp = $idspSelect";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" style="width: 40%; margin: 0 auto; text-align: center;margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: red; margin-top: 30px;">Xin chào: <?php echo $login_session ?></h2>
        <p><strong>Sản phẩm</strong></p>
        <div class="form-style" style="border: 1px solid black; padding: 10px;">
            <form method="POST" action="./update.php?idsp=<?php echo $idspSelect;?>" style=" background-color: rgb(179, 179, 179);" enctype="multipart/form-data">
                <table style="padding:10px;text-align: left;">
                    <tr>
                        <th style="font-weight: normal; width: 40%;">Tên sản phẩm:</th>
                        <td style="width: 10%;"></td>
                        <td style="display: inline-block;  width: 40%;">
                            <input type="text" name="tenSP" id="tenSP" value="<?php echo $row['tensp']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td></td>
                    </tr>
                    <th style="font-weight: normal;">Chi tiết sản phẩm:</th>
                    <td></td>
                    <td>
                        <textarea name="chiTietSP" id="chiTietSP" cols="30" rows="10" style="width: 250px; height: 120px;"><?php echo $row['chitietsp']; ?></textarea>
                    </td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="font-weight: normal;">Giá sản phẩm:</th>
                        <td></td>
                        <td>
                            <input type="number" name="GiaSP" id="GiaSP" value="<?php echo $row['giasp']; ?>">
                            <span>(VND)</span>
                        </td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="font-weight: normal;">Hình ảnh sản phẩm:</th>
                        <td></td>
                        <td>
                            <img src="<?php echo $row['hinhanhsp']; ?>" alt="" width="100px">
                            <input type="file" name="hinhSP" id="hinhSP">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td>
                            <button type="submit">
                                Lưu sản phẩm
                            </button>
                            <button type="reset">Làm lại</button>
                        </td>
                    </tr>
                </table>
            </form>

        </div>
        <form action="./tuychon.php" class="form-inline">
            <button type="submit" style="padding: 10px; margin-top: 20px;">Trang chủ</button>
        </form>
    </div>
</body>

</html>