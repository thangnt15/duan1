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
        <h1>DANH SÁCH BÌNH LUẬN</h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th></th>
                    <!-- <th>ID</th> -->
                    <th>Nội dung bình luận</th>
                    <th>Mã tài khoản</th>
                    <th>Mã sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
              
                    $xoabl = "index.php?act=xoabl&id=" . $id;
                    # code...
                    echo '
                                <tr>
                                <td><input type="checkbox" name="" id=""></td>
                             
                                <td>' . $noidung . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $ngaybinhluan . '</td>
                                <td>
                                    <a href="' . $xoabl . '"><input type="button" value="Xoá"></a></td>
                            </tr> ';
                }
                ?>

            </tbody>
        </table>


</body>

</html>