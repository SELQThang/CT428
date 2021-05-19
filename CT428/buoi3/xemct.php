<?php
include('./session.php');
include('./connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "select * from sanpham where idsp = '$idspSelect'";
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
    <title>Chi tiết sản phẩm</title>
    <!-- <script>
        // bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao
        var IMAGE_PATHS = [];

        slide = 0;

        function changeSlide(pos) {
            // sinh vien tu viet code cho changeSlide:
            // pos = 1: hien thi file anh tiep theo 
            // pos = -1: hien thi file anh truoc do
            if (slide < IMAGE_PATHS.length) {
                slide = slide + pos;
                if (slide > IMAGE_PATHS.length - 1) {
                    slide = 0;
                }
                if (slide >= 0 && slide <= 3) {
                    document.getElementById("laptopImg").src = IMAGE_PATHS[slide];
                    document.getElementById("laptopSel").value = slide;
                }
                if (slide < 0) {
                    slide = 3;
                    document.getElementById("laptopImg").src = IMAGE_PATHS[slide];
                    document.getElementById("laptopSel").value = slide;
                }
                if (slide > 3) {
                    slide = 0;
                }
            }
        }

        function chooseSlide(pos) {
            // sinh vien tu viet code cho chooseSlide:
            // pos = x: hien thi file anh x
            pos = pos * 1;
            document.getElementById("laptopImg").src = IMAGE_PATHS[pos];;
            slide = pos;
        }
        
    </script> -->
</head>
<style>
    form {
        display: inline;
    }
</style>

<body>
    <div class="container" style="width: 30%; margin: 0 auto; text-align: center;margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px; color: red; margin-top: 30px;">Xin chào: <?php echo $login_session ?></h2>
        <p><strong>Sản phẩm của bạn là:</strong></p>
        <div class="" style="border: 1px solid black; padding: 10px;">
            <table style="padding:10px;text-align: left; background-color: rgb(179, 179, 179); width: 100%;">
                <tr>
                    <th style="font-weight: normal; width: 40%;">ID sản phẩm:</th>
                    <td style="display: inline-block;  width: 40%;">
                        <?php echo $row['idsp']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                    <td></td>
                </tr>
                <tr>
                    <th style="font-weight: normal; width: 40%;">Tên sản phẩm:</th>
                    <td style="display: inline-block;  width: 40%;">
                        <?php echo $row['tensp']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                    <td></td>
                </tr>
                <th style="font-weight: normal;">Chi tiết sản phẩm:</th>
                <td>
                    <?php echo $row['chitietsp']; ?>
                </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                    <td></td>
                </tr>
                <tr>
                    <th style="font-weight: normal;">Giá sản phẩm:</th>
                    <td>
                        <?php echo $row['giasp']; ?>
                        <span>(VND)</span>
                    </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                </tr>
                <tr>
                    <th style="font-weight: normal;">Hình ảnh sản phẩm:</th>
                    <td>
                        <img src="<?php echo $row['hinhanhsp']; ?>" alt="" style="width: 200px; height: 100px">
                    </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                    <td>
                        <input type="button" name="previous" value="Previous" onclick="changeimgItem(-1)">
                        <input type="button" name="next" value="Next" onclick="changeimgItem(1)">
                    </td>
                </tr>
                <tr>
                    <th style="height: 15px;"></th>
                    <td></td>
                </tr>
            </table>

        </div>
        <form action="./tuychon.php">
            <button type="submit" style="padding: 10px; margin-top: 20px;">Trang chủ</button>
        </form>
        <form action="./dssp.php">
            <button type="submit" style="padding: 10px; margin-top: 20px;">Danh sách sản phẩm</button>
        </form>
        <form action="./themsp.php">
            <button type="submit" style="padding: 10px; margin-top: 20px;">Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html>