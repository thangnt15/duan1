<!DOCTYPE html>
<html>

<head>
    <title>Giỏ hàng</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>stt</th>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa sp</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị trang giỏ hàng
            $tong = 0;
            $i = 0;
            foreach ($_SESSION['mycart'] as $cart) {
                $img = $img_path . $cart[2];
                $ttien = $cart[3] * $cart[4];
                $tong += $ttien;
                $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"> <input type="button" value="xóa"> </a>';
                echo '<tr>
                    <td><img src="' . $img . '"></td>
                    <td>' . $cart[0] . '</td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $cart[3] . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $ttien . '</td>
                    <td>' . $xoasp . '</td> 
                </tr>';
                $i += 1;
            }
            echo '<tr>
                <td colspan="4">Tổng đơn</td>
                <td>' . $tong . '</td>
                <td></td>
            </tr>';
            ?>
        </tbody>
    </table>
</body>

</html>