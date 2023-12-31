<?php 
include 'conect/conect.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGUIN</title>
    <link rel="stylesheet" href="./view/css/head.css">
    <link rel="stylesheet" href="./view/css/profile.css">
    <link rel="stylesheet" href="./view/css/editPass.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <!-- <script src="./abc.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i"
        rel="stylesheet" type="text/css" media="all">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<style>
.spngang {
    display: flex;
}
</style>

<body>
    <header>
        <div class="content_head">
            <div class="logo">
                <p>
                    <strong>
                        <span>$</span>
                        <span>M</span>
                        <span>A</span>
                        <span>K</span>
                        <span>E</span>
                        <span>R</span>
                        <!-- <span>R</span> -->


                    </strong>
                </p>
            </div>
            <!-- end logo -->
            <div class="menu_head">
                <nav>
                    <ul class="container">
                        <li><a class="spngang" href='index.php'>
                                <h1 class="fa fa-home" aria-hidden="true"></h1>
                                <h1 class="fa">Trang chủ</h1>
                            </a></li>
                        <li class='dropdown'>
                            <a class="spngang" href='index.php?act=sanpham'>
                                <h1 class="fa">Sản phẩm</h1>
                                <h1 class="fa fa-angle-down"></h1>
                            </a>
                            <div class='mega-menu'>
                                <div class="container">
                                    <div class="item">
                                        <h2>Danh mục</h2>
                                        <ul>
                                            <?php 
                                            $dsdm=loadall_danhmuc();
                                            foreach ($dsdm as $dm) {
                                                extract($dm);
                                                $linkdm="index.php?act=sanpham&iddm=".$id;
                                                echo ' <ul><li><a href="'.$linkdm.'">'.$name.'</a></li> </ul>';
                                            }  ?>
                                            <!-- <li><a href='#'>Danh mục 1</a></li>
                                            <li><a href='#'>Danh mục 2</a></li>
                                            <li><a href='#'>Danh mục 3</a></li>
                                            <li><a href='#'>Danh mục 4</a></li>  -->
                                        </ul>
                                    </div> <!-- /.item -->

                                </div><!-- /.container -->
                            </div><!-- /.mega-menu -->
                        </li><!-- /.dropdown -->


                        <li><a href='index.php?act=lienhe'>
                                <h1 class="fa">Liên hệ</h1>
                            </a></li>
                        <li><a href='index.php?act=gioithieu'>
                                <h2 class="fa">Giới thiệu</h2>
                            </a></li>
                        <!-- <li><a  href='index.php?act=tintuc'><h2 class="fa">Tin tức</h2></a></li> -->
                    </ul>
                    <!-- .container -->
                </nav>

            </div>
            <!-- end menu -->

            <div class="right_head">
                <!-- <div class="abc search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Tìm kiếm">
                </div> -->
                <div class="abc search">
                    <div class="search-box">

                        <form action="index.php?act=sanpham" method="post">
                            <input type="text" placeholder="Search" class="input" name="kyw">

                        </form>
                        <?php
                        if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                            $kyw=$_POST['kyw'];
                        }else{
                            $kyw="";
                        }
                        if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                            $iddm=$_GET['iddm'];
                        }else{
                            $iddm=0;
                        }
                        $dssp=loadall_sanpham($kyw,$iddm);
                                    $tendm=load_ten_dm($iddm);
                        ?>
                    </div>
                </div>
                <script>
                $(".xyz").click(function() {
                    $(".input").toggleClass("active").focus;
                    $(this).toggleClass("animate");
                    $(".input").val("");
                });
                </script>
                <!-- <div class="abc search_by_image">
                    <form action="index.php?act=search_by_image" method="post" id="searchByImageForm"
                        enctype="multipart/form-data">
                        <label for="fileToUpload">
                            <ul>
                                <li> <i class="fa fa-camera" aria-hidden="true"></i> </li>
                            </ul>
                        </label>
                        <input style="display:none;" id="fileToUpload" type="file" name="fileToUpload">
                    </form>
                </div> -->
                <script>
                document.getElementById("fileToUpload").onchange = function() {
                    document.getElementById("searchByImageForm").submit();
                };
                </script>
                <?php if(isset($user['email'])){?>
                <div class="abc profile">
                    <ul>
                        <li><a href="index.php?act=profile"> <i class="fa fa-user-circle" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="abc shop_cart">
                    <ul>
                        <li><a href="index.php?act=viewcart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a></li>
                    </ul>
                </div>
                <div class="abc login">
                    <ul>
                        <li>
                            <a href="view/logOut.php">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }else{?>
                <div class="abc shop_cart" style="margin-top: 20px;">
                    <ul>
                        <li style=""><a href="index.php?act=viewcart"> <i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i> </a></li>
                    </ul>
                </div>
                <div class="abc login">
                    <ul>
                        <li>
                            <a href="view/loginUser.php">
                                <ion-icon name="log-in-outline"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }?>
            </div>
            <!-- end right_head -->
        </div>
        <!-- end content_head -->
    </header>
    <!-- end header -->
</body>

</html>