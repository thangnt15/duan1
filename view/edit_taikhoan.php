<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../view/css/profile.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i"
        rel="stylesheet" type="text/css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="wrapper_inner">
            <div class="vertical_wrap">
                <div class="backdrop"></div>
                <?php
                if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    $user=$_SESSION['user']['user'];
                    $hoten=$_SESSION['user']['hoten'];
                    $email=$_SESSION['user']['email'];
                    $dress=$_SESSION['user']['dress'];
                    $tell=$_SESSION['user']['tell'];
                    $vaitro=$_SESSION['user']['vaitro'];
                }else{
                    
                }
                ?>
                <div class="vertical_bar">
                    <div class="profile_info">
                        <p class="title">Xin chào <br><?=$hoten?></p>
                        <p class="sub_title"><?=$email?></p>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php?act=profile" class="active">
                                <span class="icon"><i class="fas fa-address-card"></i></span>
                                <span class="text">Thông tin</span>
                            </a></li>
                        <li><a href="index.php?act=edit_taikhoan">
                                <span class="icon"><i class="fas fa-exchange-alt"></i></span>
                                <span class="text">Đổi thông tin tài khoản</span>
                            </a></li>
                        <?php if ($vaitro==1){ ?>
                        <li><a href="./admin/index.php">
                                <span class="icon"><i class="fas fa-user-lock"></i></span>
                                <span class="text">Đăng nhập admin</span>
                            </a></li>
                        <?php }?>
                        <li><a href="index.php?act=mybill">
                                <span class="icon"><i class="far fa-list-alt"></i></span>
                                <span class="text">Hóa đơn của tôi</span>
                            </a></li>
                        <li><a href="./index.php">
                                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                <span class="text">Đăng xuất</span>
                            </a></li>

                    </ul>
                </div>
                <!-- end vertical_bar -->
            </div>
            <!-- end vertical_wrap -->
            <div class="main_container">
                <div class="top_bar">
                    <div class="hamburger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="logo">
                        <span> Thông tin Tài khoản</span>
                    </div>
                </div>
                <div class="container">
                    <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">

                        <div class="content">
                            <div class="item">
                                <h3>Tên tài khoản</h3>
                                <div class="form">
                                    <input type="text" name="user" value="<?=$user?>" required />

                                </div>

                            </div>
                            <div class="item">
                                <h3>Mật khẩu</h3>
                                <div class="form">
                                    <input type="text" name="pass" value="<?=$pass?>" required />

                                </div>

                            </div>
                            <div class="item">
                                <h3>Họ tên tài khoản</h3>
                                <div class="form">
                                    <input type="text" name="hoten" value="<?=$hoten?>" required />

                                </div>

                            </div>

                            <div class="item">
                                <h3>Email tài khoản</h3>
                                <div class="form">
                                    <input type="text" name="email" value="<?=$email?>" required />

                                </div>

                            </div>

                            <div class="item">
                                <h3>Địa chỉ</h3>
                                <div class="form">
                                    <input type="text" name="dress" value="<?=$dress?>" required />

                                </div>

                            </div>
                            <div class="item">
                                <h3>Số điện thoại</h3>
                                <div class="form">
                                    <input type="text" name="tell" value="<?=$tell?>" required />

                                </div>

                            </div>
                            <div class="item">
                                <div class="form">
                                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
                                    <input type="submit" value="Cập nhật tài khoản" name="capnhat">
                                    <!-- <input type="reset" value="Nhập lại" name="nhaplai"> -->
                                </div>
                            </div>

                        </div>

                    </form>
                    <!-- end container -->
                </div>
                <!-- end main_container -->
            </div>
            <!-- end wrapper_inner -->
        </div>
        <!-- end wrapper -->

        <script>
        var hamburger = document.querySelector(".hamburger");
        var wrapper = document.querySelector(".wrapper");
        var backdrop = document.querySelector(".backdrop");

        hamburger.addEventListener("click", function() {
            wrapper.classList.add("active");
        })

        backdrop.addEventListener("click", function() {
            wrapper.classList.remove("active");
        })
        </script>
</body>

</html>