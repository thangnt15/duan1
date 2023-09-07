<div class="row">
    <div class="row mb"></div>
    <div class="row">
        <div class="boxcontent">
            <h2>Cảm ơn quý khách đã đặt hàng</h2>
        </div>
    </div>
    <?php
    if (isset($bill) && (is_array($bill))) {
        extract($bill);
    }
    ?>
    <div class="row">
        <div class="boxtitle">Thông tin đơn hàng</div>
        <div class="boxcontent">
            <li>
                Mã đơn hàng: <?= $bill['id'] ?? ''; ?>
            </li>
            <li>
                Ngày đặt hàng: <?= $bill['ngaydathang'] ?? ''; ?>
            </li>
            <li>
                Tổng đơn hàng: <?= $bill['total'] ?? ''; ?>
            </li>
            <li>
                Phương thức thanh toán: <?= $bill['bill_pttt'] ?? ''; ?>
            </li>
        </div>
        br
        <div class="mb">
            <div class="boxtile">THÔNG TIN ĐẶT HÀNG</div>
            <div class="boxcontent billform">
                <table>
                    <tr>
                        <td>Người đặt hàng: </td>
                        <td><?= $bill['bill_name'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ: </td>
                        <td><?= $bill['bill_address'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?= $bill['bill_email'] ?? '' ?></td>
                    </tr>
                    <tr>
                        <td>Điện thoại: </td>
                        <td><?= $bill['bill_tell'] ?? '' ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="mb">
            <div class="boxtitle">Chi tiết giỏ hàng</div>
            <div class="boxcontent cart">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    if (!empty($billct)) :
                        bill_chi_tiet($billct);
                    endif;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>