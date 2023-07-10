<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quanlyhanghoa.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>
            Quản lý sản phẩm
        </h1>
        <form action="index.php?act=qlsp" method="post" >
        <input type="text" name="kyw">
        <select name="iddm" >
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
            }
            ?>
            
        </select>
        <input type="submit" name="listok" value="Go">
    </form>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá cũ</th>
                    <th>Giá mới</th>
                    <th>Hình</th>
                    <th>Lượt xem</th>
                    <th>Ngày tạo</th>
                    <th>Ngày sửa</th>
                    <th>Xử lý</th>
                </tr>
                </thead>
                <?php
                
                    foreach ($listsanpham as $sanpham){
                        extract($sanpham);
                        $suasp="index.php?act=suasp&id=".$id;
                        $xoasp="index.php?act=xoasp&id=".$id;
                        $hinhpath="../upload/".$img;
                        if(is_file($hinhpath)) {
                            $hinh="<img src='".$hinhpath."' height='80px'>";
                        } else {
                            $hinh="No photo";
                        }
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$giacu.'</td>
                        <td>'.$giamoi.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$luotxem.'</td>
                        <td>'.$ngaytao.'</td>
                        <td>'.$ngaysua.'</td>
                        <td><a href="'.$suasp.'"><input id="edit" type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input id="del" type="button" value="Xóa" ></a></td>
                    </tr>';
                    }

                ?>
        </table>
        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
    </div>
</body>
</html>