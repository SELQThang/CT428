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
    <title>Tùy chọn</title>
</head>
<style>
    ul {
        padding: 0;
        margin: 0;
    }

    li {
        list-style-type: none;
        padding-bottom: 20px;
    }

    a {
        text-decoration: none;
        text-align: center;
        padding: 5px;
        display: block;
        border: 1px solid black;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container" style="width: 30%; margin: 0 auto; text-align: center;margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: red; margin-top: 30px;">Xin chào: <?php echo $row['tendangnhap'] ?></h2>
        <h3>Bạn muốn làm gì?</h3>
        <ul>
            <li>
                <a href="./thongtincanhan.php">
                    Xem thông tin cá nhân
                </a>
            </li>
            <li>
                <a href="./themsp.php">
                    Thêm sản phẩm
                </a>
            </li>
            <li>
                <a href="./xemct.php?idSP=1">
                    Xem danh sách sản phẩm
                </a>
            </li>
            <li>
                <a href="./dangxuat.php">
                    Đăng xuất
                </a>
            </li>
        </ul>
    </div>
</body>

</html>