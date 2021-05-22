<?php
include('./buoi3/session.php');
include('./buoi3/connectDB.php');
$idspSelect = $_GET['idSP'];
$sql = "select * from sanpham where idsp = '$idspSelect'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

	<script>
		// bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao
		var IMAGE_PATHS = [
			<?php
			$sql = 'SELECT hinhanhsp FROM sanpham';
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo '"' . $row["hinhanhsp"] . '",';
				}
			}
			?>
		];
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
		//-->
	</script>
</head>

<body>
	<div id="wrap">
		<div id="title">
			<h1>Bài 2 - Buổi 4</h1>
		</div>
		<!--end div title-->
		<div id="menu">
			<!-- chèn menu của sinh viên vào-->
		</div>
		<!--end div menu-->
		<div id="content">
			<!--Nội dung trang web-->
			<h1>Slide show</h1>
			<form>
				<img id="laptopImg" src="img/hp.jpg" height="300" width="300" />
				<br />
				<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
				<input type="button" name="next" value="Next" onclick="changeSlide(1)">
				<br />
				<select name="laptopSel" id="laptopSel" onchange="chooseSlide(value)">
					<option value="0">HP</option>
					<option value="1">Dell</option>
					<option value="2">Acer</option>
					<option value="3">Asus</option>
				</select>
			</form>
			<p>Yêu cầu:<br />
				Có 4 hình ảnh về máy tính đính kèm, mặc định hiển thị hình máy HP.<br />
			<ul>
				<li>Khi người dùng nhấn Next thì hiển thị hình tiếp theo (theo thứ tự Hp -> Dell -> Acer -> Asus).</li>
				<li>Khi người dùng nhấp Previous thì hiển thị hình trước đó.</li>
				<li>Cả nút Next và Previous đều hiển thị vòng tròn (nếu đang xem hình HP mà nhấn Previous thì sẽ chuyển sang hình Asus).</li>
				<li>Người dùng có thể chọn xem một hình nào đó từ danh sách bên dưới nút Previous và Next.</li>
				<li>Khi người dùng thay đổi hình bằng cách nhấn Previous hoặc Next thì tên hiển thị bên dưới cũng thay đổi theo.</li>
			</ul>
			</p>
		</div>
		<!--end div content-->
		<div id="footer">
			<p>Họ tên SV: <br /> Email: </p>
		</div>
		<!--end div footer-->
	</div>
	<!--end div wrap-->
</body>

</html>