<?php
function insert_sanpham($tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua,$iddm){
    $sql = "insert into sanpham(name,giacu,giamoi,img,mota,ngaytao,ngaysua,iddm) values('$tensp','$giacu','$giamoi','$hinh','$mota','$ngaytao','$ngaysua','$iddm')";
    pdo_execute($sql);
}
function update_sanpham($id,$tenloai){
    $sql = "update sanpham set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}

function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}

function loadall_sanpham($kyw,$iddm){
    $sql = "select * from sanpham where 1";
    if($kyw!="") {
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0) {
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.= " order by id desc";
  $listsanpham=  pdo_query($sql);
  return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $san= pdo_query_one($sql);
    return $sanpham;
}
?>