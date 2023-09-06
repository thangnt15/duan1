<?php
// Đảm bảo biến $idbill đã tồn tại và hợp lệ
if (isset($idbill) && $idbill > 0) {
    // Lấy thông tin đơn hàng dựa vào $idbill
    $bill = loadone_bill($idbill);

    if (!$bill) {
        echo "Đơn hàng không tồn tại.";
    } else {
        // Xử lý biểu mẫu cập nhật trạng thái đơn hàng
        if (isset($_POST['update']) && ($_POST['update'])) {
            $bill_status = $_POST['bill_status'];

            // Thực hiện cập nhật trạng thái đơn hàng
            update_bill($idbill, $bill_status);
            echo "Cập nhật trạng thái đơn hàng thành công!";

            // Sau khi cập nhật, bạn có thể chuyển người dùng đến trang danh sách đơn hàng
            header("Location: index.php?act=listbill");
            exit;
        }

        // Hiển thị biểu mẫu cập nhật trạng thái đơn hàng
?>
        <h1>Cập Nhật Trạng Thái Đơn Hàng</h1>
        <form method="post" action="">
            <input type="hidden" name="idbill" value="<?php echo $bill['id']; ?>">
            <label for="bill_status">Trạng Thái Đơn Hàng:</label>
            <select name="bill_status" id="bill_status">
                <option value="0" <?php if ($bill['bill_status'] == 0) echo "selected"; ?>>Đơn hàng mới</option>
                <option value="1" <?php if ($bill['bill_status'] == 1) echo "selected"; ?>>ĐANG XỬ LÍ</option>
                <option value="2" <?php if ($bill['bill_status'] == 2) echo "selected"; ?>>ĐANG GIAO HÀNG</option>
                <option value="3" <?php if ($bill['bill_status'] == 3) echo "selected"; ?>>Hoàn tất</option>
            </select>
            <br><br>
            <input type="submit" name="update" value="Cập Nhật">
        </form>
<?php
    }
} else {
    echo "ID đơn hàng không hợp lệ.";
}
?>