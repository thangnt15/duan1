<?php
function insert_sanpham($tenloai){
    $sql = "insert into sanpham(name,giacu,giamoi,img,mota) values('$tenloai')";
    pdo_execute($sql);
}
function update_sanpham($id,$tenloai){
    $sql = "update sanpham set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}

function loadall_sanpham(){
    $sql = "select * from sanpham order by id desc";
  $listsanpham=  pdo_query($sql);
  return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $dm= pdo_query_one($sql);
    return $dm;
}
?>