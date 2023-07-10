<?php 

    if(is_array($dm))

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addloaihang.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="index.php?act=adddm" method="post">
        <h1>
            Cập nhật danh mục loại hàng
        </h1>
        <div class="form2">
            <input type="text" placeholder="Tên danh mục" required name="tenloai" value="">
        </div>
        <div class="submit">
        <input type="submit" value="Thêm mới" name="themmoi" >
        <input type="reset" value="Nhập lại" name="nhaplai" >
        </div>
        <div class="ds">
            <a href="index.php?act=qldm"><input type="button" value="Danh sách"></a>
        </div>

        <div class="tbadd">
        <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
        </div>

        </form>
    </div>
</body>
</html>