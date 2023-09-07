<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../view/css/gioHang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<div class="center">
<table class="content-table">
<?php
if (!empty($_SESSION['msg-error'])) {
    $msgErr = $_SESSION['msg-error'];
    unset($_SESSION['msg-error']);
?>
<div>
    <span style="color: red;">
        <?= $msgErr ?>
    </span>
</div>
<?php
}
?>
</table> 
<table border="1">
    <thead>
        <style>
        tbody {
            line-height: 50px;
            width: 900px;
        }

        .bill a {
            border: 5px;
            color: white;
        }
        </style>
    </thead>
    <tbody>
        <?php
        viewcart(1);
        ?>
    </tbody>
</table>
<div class="bill">
    <a href="index.php?act=bill"> <input style="height: 30px; margin-top: 10px; border" type="button" value="TIẾP TỤC ĐẶT HÀNG"></a> <a href="index.php?act=delcart">
        <input style="height: 30px; margin-top: 10px;" type="button" value="XÓA GIỎ HÀNG"></a>
</div>
</div>
</body>

</html>