<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quanlyloaihang.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>
            Quản lý danh mục
        </h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Xử lý</th>
                </tr>
                </thead>
                <?php
                
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        $suadm="index.php?act=suadm";
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>Xử lý</td>
                    </tr>';
                    }

                ?>
        </table>
        <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
    </div>
</body>
</html>