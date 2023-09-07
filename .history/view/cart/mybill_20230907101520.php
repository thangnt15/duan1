<div class="row">
    <div class="boxleft">
        <div class="row">
            <div class="boxtitle">
                ĐƠN HÀNG CỦA BẠN
            </div>
            <div class="boxcontent">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>MA ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT</th>
                        <th>SỐ LƯỢNG ĐẶT HÀNG</th>
                        <th>TỔNG</th>
                        <th>Tình trạng</th>
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