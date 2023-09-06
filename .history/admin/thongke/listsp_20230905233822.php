<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>danh sách thông kê</title>
    <link rel="stylesheet" href="css/thongke.css">
</head>
<body>
<div class="row">
    <div class="row frmtitle">
        <h1>THỐNG KÊ SẢN PHẨM DANH MỤC</h1>
    </div>
    <!-- <div class="menuthongke">
        <div class="tksp">
        <a href="index.php?act=thongkesp">Sản phẩm</a>
        </div>
        <div class="tkds">
        <a href="index.php?act=thongkeds">Doanh thu</a>
        </div>
        
    </div> -->
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table border="1px">
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                    
                </tr>
                <?php
                foreach($listthongke as $thongke){
                    extract($thongke);
                    echo '<tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$maxprice.'</td>
                    <td>'.$minprice.'</td>
                    <td>'.$avgprice.'</td>
                </tr>';
                }
                ?>
                
            </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
        </div>
    </div>
</div>
</body>
</html>