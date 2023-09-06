<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/listbill.css">
</head>
<body>
<div class="frm">
    <div class="frm">
        <table>
            <tr>
                <th>MÃ ĐƠN HÀNG</th>
                <th>Infor</th>
                <th>TỔNG GIÁ Ị ĐƠN HÀNG</th>
                
                <th>NGÀY ĐẶT</th>
                <th>SỐ LƯỢNG ĐẶT HÀNG</th>
                <th>Tình trạng đơn hàng</th>
                <th>Thao tác</th>
            </tr>
            <?php
            foreach ($listbill as $bill) {
                extract($bill);
                $kh = $bill["bill_name"] . '<br>' . $bill["bill_email"] . '<br>' . $bill["bill_address"] . '<br>' . $bill["bill_tell"];
                $countsp = loadall_cart_count($bill["id"]);
                $ttdh = get_ttdh($bill["bill_status"]);
                $xoabill = "index.php?act=xoabill&id=" . $bill['id']; // Sửa đoạn này để truyền id của đơn hàng
                $suabill = "index.php?act=suabill&id=" . $bill['id'];
                echo '
                <tr>
                
                <td>DAM=' . $bill['id'] . '</td>
                <td>' . $kh . '</td>
                <td>' . $countsp . '</td>
                <td>' . $bill["total"] . '</td>
                <td>' . $ttdh . '</td>
                <td>' . $bill["ngaydathang"] . '</td>
                <td><a href="' . $suabill . '"><input id="edit" type="button" value="Sửa"></a> <a href="' . $xoabill . '"><input id="del" type="button" value="Xóa" ></a></td>
                
                </tr>';
            }
            ?>
        </table>
    </div>
    <div class="row">
        <input type="button" value="chọn tất cả">
        <input type="button" value="bỏ chọn tất cả">
        <input type="button" value="xóa các mục đã chọn">
        <a href="index.php?act=addsp"><input type="button" value="nhập thêm"></a>
    </div>
</div>
</body>
</html>