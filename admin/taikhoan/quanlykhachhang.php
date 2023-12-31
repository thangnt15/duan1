<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/quanlytaikhoan.css">
</head>

<body>
    <div class="container">
        <h1>Quản lý khách hàng</h1>
        <table class="content-table">
            <thead>
                <tr>
                    <th class="id_sp">Mã tài khoản</th>
                    <th class="maSP">Tên đăng nhập</th>
                    <th class="tenSP">Mật khẩu</th>
                    <th class="tenSP">Họ tên</th>
                    <th class="price">Email</th>
                    <th class="img">Địa chỉ</th>
                    <th class="tenDM">Số điện thoại</th>
                    <!-- <th class="mota">Mô tả</th> -->
                    <th class="day">Vai trò</th>
                    <th class="xl">Chức năng</th>
                </tr>
            </thead>
            <?php
                       $connection = new PDO("mysql:host=localhost;dbname=duan1pass;charset=utf8","root","");
                       $query = "select * from taikhoan order by id desc";
                       $stmt = $connection->prepare($query);
                       $stmt->execute();
                       $listtaikhoan = $stmt->fetchAll();
                      
                    ?>
            <tbody>

                <?php
                       foreach ($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                        echo ' <tr>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$hoten.'</td>
                        <td>'.$email.'</td>
                        <td>'.$dress.'</td>
                        <td>'.$tell.'</td>
                        <td>'.$vaitro.'</td>';
                        if ($vaitro != 1) {
                            echo '<td>
                                <a href="'.$suatk.'"><input id="edit" type="button" value="Sửa"></a>
                                <a href="'.$xoatk.'"><input id="del" type="button" value="Xóa"></a>
                            </td>';
                        } else {
                            echo '<td></td>';
                        }
                    
                        echo '</tr>';
                    }
                    ?>

            </tbody>

        </table>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </div>
</body>

</html>