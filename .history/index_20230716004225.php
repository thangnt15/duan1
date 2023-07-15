<?php 
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "view/header.php";
    include "global.php";

    $spnew=loadall_sanpham_home();
    $dsdm=loadall_danhmuc();
    $dstop = loadall_sanpham_top();

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
        
                    include "../views/sanPham.php";
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
        
                include "./view/sanPham.php";
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