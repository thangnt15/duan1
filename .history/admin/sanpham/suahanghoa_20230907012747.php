<?php 
    if(is_array($sanpham)) {
        extract($sanpham);
    }

    $hinhpath="../upload/".$img;
        if(is_file($hinhpath)){
    $img="<img src='".$hinhpath."' height='100%' width='100%'> ";
        }else{
    $img="no photo";
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
        Danh mục:<select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
               if($danhmuc['id']==$iddm) $s="selected"; else $s="";
                echo '<option value="'.$danhmuc['id'].'"'.$s.'>'.$danhmuc['name'].'</option>';
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
        <input type="file" name="img">
        <?=$hinh?>
    
        </div>
        <div class="form9 ">
            <textarea name="mota" placeholder="Mô tả"><?=$mota?></textarea>
            
            
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
        <div class="ac" style="display: flex; gap: 20px;">
            <input class="add" type="submit" name="capnhat" value="Cập nhật">
            <a href="index.php?act=qlsp"><input type="button"  class="list" value="Danh sách"></a>
        </div>

        <?php if(isset($thongbao)&&($thongbao!="")) echo $thongbao; ?>

        </form>
        
    </div>
    
</body>
</html>