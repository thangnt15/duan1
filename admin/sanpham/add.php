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
    
    
        <h1>Thêm sản phẩm</h1>
       
    
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <div class="form5">
            Danh mục: <select name="iddm">
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form2">
            <input type="text" name="tensp" placeholder="Tên sản phẩm">
        </div>
        <div class="form2">
            <input type="text" name="giacu" placeholder="Giá cũ">
        </div>
        <div class="form2">
            <input type="text" name="giamoi" placeholder="Giá mới">
        
        </div>
        <div class="upload-box">
        <input type="file" name="hinh">
    
        </div>
        <div class="form9 ">
            <textarea name="mota" placeholder="Mô tả"></textarea>
            
        </div>
        <div class="ac" style="display: flex; gap: 20px;">
            <input class="add" type="submit" name="themmoi" value="Thêm mới">
            <a href="index.php?act=qlsp"><input type="button"  class="list" value="Danh sách"></a>
        </div>
        </form>

        <?php
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
         ?>
        
    </div>
    
</body>
</html>