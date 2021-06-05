<?php
include('conn.php');
$sqlBrandName = 'select * from nhanhieu';
$resultBrandName = $conn->query($sqlBrandName);
$option = "";
while ($row = $resultBrandName->fetch_assoc()) {
  $option .= '<option value=' . $row['mahieu'] . '>' . $row['tenhieu'] . '</option>';
}
echo '
<div class="content-filterBrandName">
<label for="">Nước hoa của nhãn hiệu:</label>
<select name="brandName" id="" onchange="lietKeTenHieu(value)">
  ' .
  $option
  . '
</select>
<div id="content3">
          
</div>
</div>
';
$conn->close();
