<?php
    include "../model/pdo.php";
    include "header.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "model/thongke.php";

    if(isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

            case 'qldm':
                $sql="select * from danhmuc order by id desc";
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)) {
                    delete($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;
            
            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sql="select * from danhmuc where id=".$_GET['id'];
                    $dm=loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/sualoaihang.php";
                break;

            case 'updatedm':
                if(isset($_POST['update'])&&($_POST['update'])) {
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao="Update thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/quanlyloaihang.php";
                break;


                // Sản phẩm

                case 'addsp':
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $giacu=$_POST['giacu'];
                        $giamoi=$_POST['giamoi'];
                        $mota=$_POST['mota'];
                        $hinh=$_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                        if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){
            
                        }else {
                        
                        }
                        $timetao = time();
                        $ngaytao = date('Y-m-d H:i:s',$timetao);
                        $timesua = time();
                        $ngaysua = date('Y-m-d H:i:s',$timesua);
                        insert_sanpham($tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua,$iddm);
                       $thongbao="Thêm thành công";
                }
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/add.php";
                    break;
                
                case 'qlsp':
                    if(isset($_POST['listok'])&&($_POST['listok'])){
                        $kyw=$_POST['kyw'];
                        $iddm=$_POST['iddm'];
                    }else {
                        $kyw="";
                        $iddm=0;
                    }
                    $listdanhmuc= loadall_danhmuc();
                    $listsanpham=loadall_sanpham($kyw,$iddm);
                    include "sanpham/quanlyhanghoa.php";
                    break;
                case 'xoasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)) {
                        delete_sanpham($_GET['id']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/quanlyhanghoa.php";
                    break;
                
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $sanpham=loadone_sanpham($_GET['id']);
                    }
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/suahanghoa.php";
                    break;
    
                    case 'updatesp':
                        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                            $id=$_POST['id'];
                            $iddm=$_POST['iddm'];
                            $tensp=$_POST['tensp'];
                            $giacu=$_POST['giacu'];
                            $giamoi=$_POST['giamoi'];
                            $mota=$_POST['mota'];
                            $hinh=$_FILES['hinh']['name'];
                            $target_dir = "../upload/";
                            $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                            if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){
                
                            }else {
                            
                            }
                            $timetao = time();
                            $ngaytao = date('Y-m-d H:i:s',$timetao);
                            $timesua = time();
                            $ngaysua = date('Y-m-d H:i:s',$timesua);
                            update_sanpham($id,$iddm,$tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua);
                            $thongbao="Cập nhật thành công";
                
                        }
                        $listdanhmuc= loadall_danhmuc();
                        $listsanpham= loadall_sanpham("",0);
                        include "sanpham/quanlyhanghoa.php";
                        break;
            
    //qltk
    case 'qltk':
        include "taikhoan/quanlykhachhang.php";
        break;
    case 'xoatk':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            function deletetk($id){
                $sql = "delete from taikhoan where id=".$id;
                pdo_execute($sql);
              }
            deletetk($_GET['id']);
        }
        function loadall_taikhoan(){
            $sql="select * from taikhoan order by id desc";
            $listtaikhoan=pdo_query($sql);
            return $listtaikhoan;
        }
        $listtaikhoan= loadall_taikhoan();
        include "taikhoan/quanlykhachhang.php";
        break;


        case 'suatk':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                function loadone_taikhoan($id){
                    $sql = "select * from taikhoan where id=".$id;
                    $sp= pdo_query_one($sql);
                      return $sp;
                    }
                    $sp=loadone_taikhoan($_GET['id']);
                }
            include "taikhoan/suataikhoan.php";
            break;

        case 'updatetk':
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
                
                function loadall_taikhoan(){
                    $sql="select * from taikhoan order by id desc";
                    $listtaikhoan=pdo_query($sql);
                    return $listtaikhoan;
                }
            }
            
             $listtaikhoan=loadall_taikhoan();
            include "taikhoan/quanlykhachhang.php";
            break;

<<<<<<< HEAD
            //thống kê
            case 'thongke':
                $listthongke=loadall_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listthongke=loadall_thongke();
                include "thongke/bieudo.php";
                break;
                
=======
             // bình luận
             case 'dsbl':
                function loadall_binhluan($idpro)
                {
                    $sql = "SELECT * FROM binhluan where 1";
                    if($idpro>0)
                    $sql.=" AND idpro='".$idpro."'";
                    $sql.=" order by id desc";
                    $listbl = pdo_query($sql);
                    return $listbl;
                }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                    }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
    

>>>>>>> 4096e3c3f4a6fc2df2c154550e3a9c51676f4bb1
            default:
                include "home.php";
                break;
        }
    } else {
        include "home.php";
    }

    include "footer.php"

?>