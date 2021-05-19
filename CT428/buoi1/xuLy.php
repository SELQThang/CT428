<!DOCTYPE html>
<html>

<head>
    <title>Thông Tin Cá Nhân</title>
</head>
<body>
    <?php
    $tenDangNhap = $_POST['tenDangNhap'];
    $matKhau = md5($_POST['matKhau']);
    $nhapLaiMatKhau = md5($_POST['nhapLaiMatKhau']);
    $hinhAnh = "./../img/" . $_FILES['hinhAnh']['name'];
    $gioiTinh = $_POST['gioiTinh'];
    $ngheNghiep = $_POST['ngheNghiep'];
    $soThich = "";

    foreach ($_POST['thich'] as $value) {
        $soThich = $soThich . " " . $value;
    }

    if ($matKhau === $nhapLaiMatKhau) {
        $con = new mysqli("localhost", "root", "", "id16021442_buoi3");
        $con->set_charset("utf8");

        $sql = "INSERT INTO thanhvien (tendangnhap,matkhau, hinhanh, gioitinh, nghenghiep, sothich) VALUES ('$tenDangNhap', '$matKhau', '$hinhAnh', '$gioiTinh', '$ngheNghiep', '$soThich')";
        $con->query($sql);
        move_uploaded_file(
            $_FILES['hinhAnh']['tmp_name'],
            $hinhAnh
        );
        $con->close();
        header("Location: ./../buoi3/dangnhap.html");
    }
    else{
        echo "alert 'Mật khẩu không giống! Vui lòng nhập lại mật khẩu!'";
    }
    ?>

</body>

</html>