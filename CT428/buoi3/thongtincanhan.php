<?php
include('./session.php');
include('connectDB.php');
$sql = "select * from thanhvien where tendangnhap ='$tenDangNhap'";
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
<style>
    .form-inline {
        display: inline;
    }
</style>

<body>
    <div class="container" style="width: 30%; margin: 0 auto; text-align: center;margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: red; margin-top: 30px;">Xin chào: <?php echo $row['tendangnhap'] ?></h2>
        <p><strong>Các thông tin đã nhập</strong></p>
        <div class="form-style" style="border: 1px solid black; padding: 10px;">
            <form method="" action="" style=" background-color: rgb(179, 179, 179);" enctype="multipart/form-data">
                <table style="padding:10px;text-align: left;">
                    <tr>
                        <th style="font-weight: normal; width: 40%;">Tên đăng nhập</th>
                        <td style="width: 10%;"></td>
                        <td style="display: inline-block;  width: 40%;">
                            <?php echo $row['tendangnhap']; ?>
                        </td>
                        <td style=" width: 20%;"></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="font-weight: normal;">Hình đại diện</th>
                        <td></td>
                        <td>
                            <img src="<?php echo $row['hinhanh']; ?>" alt="" width="100px">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="font-weight: normal;">Giới tính</th>
                        <td></td>
                        <td>
                            <?php echo $row['gioitinh']; ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="font-weight: normal;">Nghề nghiệp</th>
                        <td></td>
                        <td>
                            <?php echo $row['nghenghiep']; ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="height: 15px;"></th>
                        <td></td>
                        <td>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="text-align: left; font-weight: normal;">Sở thích</th>
                        <td></td>
                        <td colspan="2">
                            <?php echo $row['sothich']; ?>
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