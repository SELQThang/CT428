<?php
include('conn.php');
$tenhieu = $_GET['tenhieu'];
$sqlFilterProduct = "SELECT * FROM NUOCHOA where thuocnhanhieu = '$tenhieu'";
$resultFilterProduct = $conn->query($sqlFilterProduct);
$productFilter = "";
while ($row = $resultFilterProduct->fetch_assoc()) {
    $productFilter .= '
    <tr>
      <td>' . $row['stt'] . '</td>
      <td>' . $row['tennuochoa'] . '</td>
      <td>' . $row['muihuong'] . '</td>
      <td>' . $row['phongcach'] . '</td>
      <td>' . $row['gioitinh'] . '</td>
      <td>' . /*$row['dungtich']*/ 'null' . ' ml</td>
      <td>' . $row['gia'] . ' VND</td>
    </tr>
  ';
}
echo '
<table id="tblOfFilterPerfume">
  <thead id="theadOfFilterPerfume">
    <tr>
      <th>STT</th>
      <th>Tên nước hoa</th>
      <th>Mùi hương</th>
      <th>Phong cách</th>
      <th>Giới tính</th>
      <th>Dung tích</th>
      <th>Giá tiền</th>
    </tr>
  </thead>
  <tbody id="tbodyOfFilterPerfume">
    ' . $productFilter . '
  </tbody>
</table>
</div>
';
