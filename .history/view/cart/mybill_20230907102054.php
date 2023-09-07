<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/listbill.css">
</head>
<body>
<div class="row">
    <div class="boxleft">
        <div class="row">
            <div class="boxtitle">
                ĐƠN HÀNG CỦA BẠN
            </div>
            <div class="content-table">
                <table>
                    <tr>
                    <th>Mã đơn</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Tình trạng đơn hàng</th>
                    </tr>
                    <?php
                    if (is_array($listbill)) {
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadall_cart_count($bill['id']);
                            echo ' <tr>
                            <th>DAM-' . $bill['id'] . '</th>
                            <th>' . $bill['ngaydathang'] . '</th>
                            <th>' . $countsp . '</th>
                            <th>' . $bill['total'] . '</th>
                            <th>' . $ttdh . '</th>
                        </tr>';
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>