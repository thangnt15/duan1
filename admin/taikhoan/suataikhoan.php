<?php 

    if(is_array($sp)){
        extract($sp);
    }

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
        <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
            <h1>
                Cập nhật tài khoản
            </h1>
            <div class="form2">
                <input type="text" placeholder="Tên tài khoản" name="user" value="<?=$user?>">

                <input type="text" placeholder="Mật khẩu tài khoản" name="pass" value="<?=$pass?>">

                <input type="text" placeholder="Họ tên tài khoản" required name="hoten"
                    value="<?php if(isset($hoten)&&($hoten!="")) echo $hoten; ?>">

                <input type="text" placeholder="Email tài khoản" required name="email"
                    value="<?php if(isset($email)&&($email!="")) echo $email; ?>">

                <input type="text" placeholder="Địa chỉ tài khoản" required name="dress"
                    value="<?php if(isset($dress)&&($dress!="")) echo $dress; ?>">

                <input type="text" placeholder="SDT tài khoản" required name="tell"
                    value="<?php if(isset($tell)&&($tell!="")) echo $tell; ?>">

                <!-- <input type="text" placeholder="Vai trò" required name="vaitro"
                    value="<?php if(isset($vaitro)&&($vaitro!="")) echo $vaitro; ?>"> -->
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
                <input type="submit" value="capnhat" name="capnhat">
                <!-- <input type="reset" value="Nhập lại" name="nhaplai"> -->
            </div>
            <div class="ds">
                <a href="index.php?act=qltk"><input type="button" class="list" value="Danh sách"></a>
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