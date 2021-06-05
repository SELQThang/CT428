<?php
include('conn.php');
$sql = 'select * from nhanhieu';
$result=$conn->query($sql);
$option = "";
while($row=$result->fetch_assoc()){
  $option .= '<option value=' . $row['mahieu'] . '>' . $row['tenhieu'] . '</option>';
}
#
echo '
<div class="content-addProduct">
<h2>THÊM NƯỚC HOA</h2>
<form action="themnuochoaPHP.php"  onsubmit="return ThemNuocHoa()" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <th>Tên nước hoa:</th>
      <td class="td2"></td>
      <td>
        <input type="text" name="tenNuocHoa" id="tenNuocHoa" required/>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Hình nước hoa:</th>
      <td class="td2"></td>
      <td>
      <input type="file" value="" name="hinhAnh" id="hinhAnh" required>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Mùi hương nước hoa:</th>
      <td class="td2"></td>
      <td>
        <textarea
          name="muiHuongNuocHoa"
          id="muiHuongNuocHoa"
          cols="30"
          rows="10" required
        ></textarea>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Phong cách nước hoa:</th>
      <td class="td2"></td>
      <td>
        <textarea
          name="phongCachNuocHoa"
          id="phongCachNuocHoa"
          cols="30"
          rows="10" required
        ></textarea>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Giới tính:</th>
      <td class="td2"></td>
      <td>
        <input type="radio" name="gioiTinh" id="" value="Nam"/>
        <label for="nam">Nam</label>
        <br />
        <input type="radio" name="gioiTinh" id=""  value="Nu" checked/>
        <label for="nu">Nu</label>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Dung tích:</th>
      <td class="td2"></td>
      <td>
        <input type="number" name="dungTich" id="dungTich" min="1" required/>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Giá:</th>
      <td class="td2"></td>
      <td>
        <input type="number" name="gia" id="gia"  min="100000" max="999999999" required/>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <th>Thuộc nhãn hiệu:</th>
      <td class="td2"></td>
      <td>
        <select name="nhanHieu" id="nhanHieu">
          ' . 
              $option
          . '
        </select>
      </td>
      <td></td>
    </tr>
    <tr class="tr2"></tr>
    <tr>
      <td></td>
      <td class="td2"></td>
      <td>
        <button type="submit">Thêm</button>
        <button type="reset">Làm lại</button>
      </td>
    </tr>
  </table>
</form>
</div>

';
