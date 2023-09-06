<?php 
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "global.php";
    include "view/header.php";

    


    if((isset($_GET['act']))&&($_GET['act']!="")) {
        $act=$_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            case 'tintuc':
                include "view/tintuc.php";
                break;
            case 'sanphamct':
                if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                    $id = $_GET['idsp'];
                    $onesp = loadone_sanpham($id);
                    extract($onesp);
                    $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                    include "view/chitiet.php";
                }
                break;
            case 'sanpham':
                    if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                        $iddm = $_GET['iddm'];
                    } else {
                        $iddm = 0;
                    }
                    $dsdm = loadall_danhmuc();
                    $dssp = loadall_sanpham($kyw, $iddm);
        
                    include "view/sanPham.php";
                    break;
            case 'search_by_image':
        
                    $target_dir = "../search_by_image/";
                    $file_extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
                    $file_name = uniqid(rand(), true) . "." . $file_extension;
                    $target_file = $target_dir . basename($file_name);
        
                    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        
                    }else {
                    
                    }
        
                    $uri = 'localhost:5000/search_by_image?img=' . $file_name;
                    $get_data = callAPI('GET', $uri, false);
                    $response = json_decode($get_data, true);
        
                    $keep = $response['result'];
                    $map = array();
                    $cnt = 0;
                    foreach ($keep as $p) {
                        $map[$p] = $cnt;
                        $cnt = $cnt + 1;
                    }
        
                    $dssp = loadall_sanpham_with_keep($keep);
        
                    function cmp($a, $b) {
                        global $map;
                        $x = $map[$a['img']];
                        $y = $map[$b['img']];
                        if($x == $y) {
                            return 0;
                        } else if ($x > $y) {
                            return 1;
                        }
                        return -1;
                    }
        
                    usort($dssp, "cmp");
        
                    $file_display_image = $target_file;
        
                include "view/sanPham.php";
                break;
            case 'profile':
                    include "view/profile.php";
                    break;
            
                    case 'addtocart':
                        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                            $isset = false;
                            $sanpham = loadone_sanpham($_POST['id']);
                            if ($sanpham['soluong'] != 0) {
                                foreach ($_SESSION['mycart'] as $key => $value) {
                                    if ($value[0] == $_POST['id']) {
                                        $isset = true;
                                        $value[4]++;
                                        if ($value[4] <= $sanpham['soluong']) {
                                            $_SESSION['mycart'][$key] = $value;
                                        } else {
                                            $msg = "Sản phẩm {$sanpham['name']} có số lượng tối đa là {$sanpham['soluong']}";
                                            $_SESSION['msg-error'] = $msg;
                                            header('location: ?act=sanphamct&idsp=' . $sanpham['id']);
                                            exit;
                                        }
                                    }
                                }
                                if ($isset === false) {
                                    $id = $_POST['id'];
                                    $name = $_POST['name'];
                                    $img = $_POST['img'];
                                    $giamoi = $_POST['giamoi'];
                                    $soluong = 1;
                                    $ttien = $soluong * $giamoi;
                                    $spadd = [$id, $name, $img, $giamoi, $soluong, $ttien];
                                    array_push($_SESSION['mycart'], $spadd);
                                }
                            } else {
                                $msg = "Sản phẩm {$sanpham['name']} có số lượng tối đa là {$sanpham['soluong']}";
                                $_SESSION['msg-error'] = $msg;
                                header('location: ?act=sanphamct&idsp=' . $sanpham['id']);
                                exit;
                            }
            
                            // echo '<pre>';
                            // print_r($_SESSION['mycart']);
                            // // print_r($_POST);
                            // die;
                        }
                        include "view/cart/viewcart.php";
                        break;
                        // case 'delcart':
                        //     if (isset($_GET['idcart'])) {
                        //         array_slice($_SESSION['mycart'], $_GET['idcart'], 1);
                        //     } else {
                        //         $_SESSION['mycart'] = [];
                        //     }
                        //     header('location: index.php?act=viewcart');
                        //     break;
                    case 'delcart':
                        if (isset($_GET['idcart'])) {
                            $idcart = $_GET['idcart'];
                            if (isset($_SESSION['mycart'][$idcart])) {
                                unset($_SESSION['mycart'][$idcart]);
                            }
                        } else {
                            $_SESSION['mycart'] = [];
                        }
                        header('location: index.php?act=viewcart');
                        break;
            
                    case 'viewcart':
                        include "view/cart/viewcart.php";
                        break;
                    case 'bill':
                        include "view/cart/bill.php";
                        break;
                    case 'mybill':
                        $listbill = loadall_bill($_SESSION['user']['id']);
                        include "view/cart/mybill.php";
                        break;
                    case 'billcomfirm':
                        // echo '<pre>';
                        // print_r($_POST);
                        // die;
                        if (($_POST['dongydathang'])) {
                            // die('1');
                            // Khong nhay vao day nen cac bien o duoi khong duoc khoi tao
                            // ma trong view van goi nen bi loi 
                            if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                            else $id = 0;
                            $hoten = $_POST['hoten'];
                            $email = $_POST['email'];
                            $dress = $_POST['dress'];
                            $tell = $_POST['tell'];
                            $pttt = $_POST['pttt'];
                            $ngaydathang = date('h:i:s d/m/Y');
                            $tongdonhang = tongdonhang();
                            // print_r($_SESSION);
                            // tạo bill  
                            $idbill = insert_bill($iduser, $hoten, $dress, $tell, $email, $pttt, $tongdonhang, $ngaydathang);
                            // $idbill = 5;
                            // insert into cart: $session['mycart'] & idbill
                            foreach ($_SESSION['mycart'] as $cart) {
                                $sanpham = loadone_sanpham($cart[0]);
                                if ($sanpham['soluong'] >= $cart[4]) {
                                    up_so_luong($sanpham['soluong'] - $cart[4], $sanpham['id']);
                                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                                } else {
                                    $msg = "Sản phẩm {$sanpham['name']} có số lượng tối đa là {$sanpham['soluong']}, vui lòng giảm số lượng đã có trong giỏ hàng";
                                    $_SESSION['msg-error'] = $msg;
                                    header('location: ?act=viewcart');
                                    exit;
                                }
                            }
                            // xóa session cart 
                            $_SESSION['cart'] = [];
                            $_SESSION['mycart'] = [];
                            $billct = loadall_cart($idbill);
                            $bill = loadone_bill($idbill);
                        }
                        // die('2');
                        include "view/cart/billcomfirm.php";
            
                        break;

            case 'edit_taikhoan':
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            function loadone_taikhoan($id){
                                 $sql = "select * from taikhoan where id=".$id;
                                 $sp= pdo_query_one($sql);
                                 return $sp;
                                 }
                                $sp=loadone_taikhoan($_GET['id']);
                            }
                        
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                            $id=$_POST['id'];
                            $user=$_POST['user'];
                            $pass=$_POST['pass'];
                            $hoten=$_POST['hoten'];
                            $email=$_POST['email'];
                            $dress=$_POST['dress'];
                            $tell=$_POST['tell'];
                            // $vaitro=$_POST['vaitro'];
                            function update_taikhoan($id,$user,$pass,$hoten,$email,$dress,$tell){
                                 $sql="update taikhoan set user='".$user."', pass='".$pass."', hoten='".$hoten."', email='".$email."', dress='".$dress."', tell='".$tell."' where id=".$id;   
                                pdo_execute($sql);
                            }
                            update_taikhoan($id,$user,$pass,$hoten,$email,$dress,$tell);
                            $thongbao="Update thành công";
                            
                         function checkuser($user)
                            {
                                $sql = "select * from taikhoan where user='" . $user . "'";
                                $sp = pdo_query_one($sql);
                                return $sp;
                            }
                            $_SESSION['user'] = checkuser($user);
                        }
                         include "view/edit_taikhoan.php";
                         break;

                        
            default: 
                include "view/home.php";
                break;
        }
    }else {
        include "view/home.php";
        }
    include "view/footer.php";
?>