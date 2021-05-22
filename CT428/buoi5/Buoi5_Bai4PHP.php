<?php
include('./session.php');
include('./connectDB.php');
$tensp = $_GET['tensp'];
$sql = "select idsp, tensp, giasp from sanpham where tensp = '$tensp'";
$result = $conn->query($sql);
$item = $result->fetch_all();
echo "
        <?php
        foreach ($item as $row) : array_map('htmlentities', $row); ?>
            <tr>
                <td><?php echo implode('</td><td>', $row); ?></td>
                <td>
                    <a href='./xemct.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>Xem chi tiết</a>
                </td>
                <td>
                    <a href='./edit.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>
                        <img src='./../img/edit.png' alt=''>
                    </a>
                </td>
                <td>
                    <a href='./del.php?idSP=<?php echo $idItem = $row[0][0]; ?>'>
                        <img src='./../img/delete.png' alt=''>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

";
$conn->close();
