<?php
function insert_sanpham($tenloai){
    $sql = "insert into sanpham(name) values('$tenloai')";
    pdo_execute($sql);
}
function update_sanpham($id,$tenloai){
    $sql = "update danhmuc set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
function delete($id){
    $sql = "delete from danhmuc where id=".$id;
    pdo_execute($sql);
}
function loadall_danhmuc(){
    $sql = "select * from danhmuc order by id desc";
  $listdanhmuc=  pdo_query($sql);
  return $listdanhmuc;
}
function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id=".$id;
    $dm= pdo_query_one($sql);
    return $dm;
}
?>