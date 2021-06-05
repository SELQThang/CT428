<?php
include('conn.php');
$sql = "select * from nuochoa where stt = (select max(stt) from nuochoa)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$htmlResult = "";
$htmlResult .= '
    <div class="content-index">
        <div class="content-index-item">
            <div class="content-index-item-img">
                <img
                src='. $row['hinhanh'] .'
                alt="a3"
                />
            </div>
            <div class="content-index-item-info">
                <h2>'. $row['tennuochoa'] .'</h2>
                <p>'. $row['muihuong'] .'</p>
                <p>Gioi tinh: '. $row['phongcach'] .'</p>
                <p>Dung tich: '. $row['gioitinh'] .'</p>
                <p>Gia tien: '. $row['gia'] .' VND</p>
            </div>
            <div class="content-index-item-footer">
                <button>Dat hang</button>
            </div>
        </div>
    </div>
';
$sql2 = "select * from nuochoa where stt = (select max(stt) - 1 from nuochoa)";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$htmlResult .= '
    <div class="content-index">
        <div class="content-index-item">
            <div class="content-index-item-img">
                <img
                src='. $row2['hinhanh'] .'
                alt="a2"
                />
            </div>
            <div class="content-index-item-info">
                <h2>'. $row2['tennuochoa'] .'</h2>
                <p>'. $row2['muihuong'] .'</p>
                <p>Gioi tinh: '. $row2['phongcach'] .'</p>
                <p>Dung tich: '. $row2['gioitinh'] .'</p>
                <p>Gia tien: '. $row2['gia'] .' VND</p>
            </div>
            <div class="content-index-item-footer">
                <button>Dat hang</button>
            </div>
        </div>
    </div>
';
echo $htmlResult;