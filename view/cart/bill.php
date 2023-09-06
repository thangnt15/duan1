<!DOCTYPE html>
<html>
<link rel="stylesheet" href="bill.css">


<head>
    <title>Hóa đơn</title>
</head>

<body>
    <div class="bill-container">
        <div class="bill-header">
            <h1>Hóa đơn</h1>
        </div>
        <form action="index.php?act=billcomfirm" method="post">
            <table class="bill-table">
                <?php
                if (isset($_SESSION['user'])) {
                    $hoten = $_SESSION['user']['hoten'];
                    $dress  = $_SESSION['user']['dress'];
                    $email = $_SESSION['user']['email'];
                    $tell = $_SESSION['user']['tell'];
                } else {
                    $hoten = "";
                    $dress = "";
                    $email = "";
                    $tell = "";
                }
                ?>
                <tr>
                    <td>Người đặt hàng</td>
                    <td><input type="text" name="hoten" value="<?= $hoten ?>"> </td>
                </tr>
                <tr>
                    <td>ĐỊA CHỈ </td>
                    <td><input type="text" name="dress" value="<?= $dress  ?>"> </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?= $email ?>"> </td>
                </tr>
                <tr>
                    <td>ĐIỆN THOẠI</td>
                    <td><input type="number" name="tell" value="<?= $tell ?>"> </td>
                </tr>
            </table>
            <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
            <div class="boxcontent">
                <table>
                    <tr>
                        <td><input type="radio" name="pttt" checked> trả tiền khi nhận hàng</td>
                        <td><input type="radio" name="pttt"> chuyển khoản ngân hàng</td>
                        <td><input type="radio" name="pttt"> thanh toán online</td>
                    </tr>
                </table>
                <table border="1">
                    <?php viewcart(0); ?>
                </table>
            </div>
            <div class="bill">
                <input type="submit" name="dongydathang" value=" đồng ý đặt hàng">
            </div>
        </form>
    </div>
</body>

</html>