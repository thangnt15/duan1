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
<table border="1">
    <thead>
        <style>
        tbody {
            line-height: 50px;
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
    <a href="index.php?act=bill"> <input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a> <a href="index.php?act=delcart">
        <input type="button" value="XÓA GIỎ HÀNG"></a>
</div>