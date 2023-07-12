<?php 
    if(is_array($sanpham)) {
        extract($sanpham);
    }

    $hinhpath="../upload/".$img;
        if(is_file($hinhpath)){
    $hinh="<img src='".$hinhpath."'";
        }else{
    $hinh="no photo";
}
?>
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addhanghoa.css">
</head>
<body>
    <div class="container-update">

        <!-- Viết code ở đây -->
    
    
        <h1>Cập nhật sản phẩm</h1>
       
    
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        <div class="form5">
            Danh mục: <select name="iddm" style="width: 100px; height: 33px; border-radius: 10px;">
                    <option value="0" selected>All</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>
                    
                </select>
        </div>
        <div class="form2">
            <input type="text" name="tensp" placeholder="Tên sản phẩm" value="<?=$name?>">
        </div>
        <div class="form2">
            <input type="text" name="giacu" placeholder="Giá cũ" value="<?=$giacu?>">
        </div>
        <div class="form2">
            <input type="text" name="giamoi" placeholder="Giá mới" value="<?=$giamoi?>">
        
        </div>
        <div class="upload-box">
        <input type="file" name="hinh">
        <?=$hinh?>
    
        </div>
        <div class="form9 ">
            <textarea name="mota" placeholder="Mô tả"><?=$mota?></textarea>
            
        </div>
        <div class="ac" style="display: flex; gap: 20px;">
            <input class="add" type="submit" name="themmoi" value="Cập nhật">
            <a href="index.php?act=qlsp"><input type="button"  class="list" value="Danh sách"></a>
        </div>

        <?php if(isset($thongbao)&&($thongbao!="")) echo $thongbao; ?>

        </form>
        
    </div>
    
</body>
</html>